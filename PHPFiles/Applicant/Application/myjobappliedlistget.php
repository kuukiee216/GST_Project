<?PHP 
    // Path to db_config_local.php file relative
    $localConfigPath = '../../Essentials/db_config_local.php';

    // Require the db_config_local.php file
    require_once $localConfigPath;
    $clsConnect = new dbConnection();
    $connection = $clsConnect->dbConnect();

    SESSION_START();
    ERROR_REPORTING(0);

    if(isset($_SESSION['AccountID']) && isset($_SESSION['Access']) && $_SESSION['Access'] == '0' && isset($_SESSION['CredentialID'])){

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y/m/d H:i:s");

        $CredentialID = $_SESSION['CredentialID'];

        try{
            $sQryGetAppliedJobPostings = "SELECT DISTINCT
                    a.ApplicationID,
                    a.DateTimeStamp,
                    a.Status,
                    jp.JobPostingID,
                    cj.JobTitle,
                    ci.CompanyName,
                    class.Classification,
                    l.City,
                    l.Province,
                    l.Country,
                    l.ZipCode,
                    c.Symbol,
                    js.Minimum,
                    js.Maximum,
                    jp.CompanyPrivacyStatus,
                    jp.SalaryPrivacyStatus
                FROM
                    tbl_application AS a
                INNER JOIN
                    tbl_jobposting AS jp ON jp.JobPostingID = a.JobPostingID
                INNER JOIN
                    tbl_companyjob AS cj ON cj.JobID = jp.JobID
                INNER JOIN
                    tbl_employerinfo AS ei ON ei.EmployerID = cj.EmployerID
                INNER JOIN
                    tbl_companyinfo AS ci ON ci.CompanyID = ei.EmployerID
                INNER JOIN
                    tbl_classification AS class ON class.ClassificationID = cj.ClassificationID
                INNER JOIN
                    tbl_location AS l ON l.LocationID = cj.LocationID
                INNER JOIN 
                    tbl_jobsalary AS js ON js.JobID = cj.JobID
                INNER JOIN
                    tbl_currency AS c ON c.CurrencyID = js.CurrencyID
                WHERE
                    a.ApplicantID = :CredentialID AND cj.Status = '0' AND (a.Status = '0' || a.Status = '2');";
            $stmtGetAppliedJobPostings = $connection->prepare($sQryGetAppliedJobPostings);
            $stmtGetAppliedJobPostings->bindValue(":CredentialID", $CredentialID, PDO::PARAM_INT);
            $stmtGetAppliedJobPostings->execute();

            if($stmtGetAppliedJobPostings->rowCount() > 0){
                while($rowAppliedJobPost = $stmtGetAppliedJobPostings->fetch(PDO::FETCH_ASSOC)){ 
                    
                    $jobLocation = $rowAppliedJobPost['City'].', '.$rowAppliedJobPost['Province'].', '.$rowAppliedJobPost['Country'].' '.$rowAppliedJobPost['ZipCode'];
                    $jobSalary = "";

                    if(strlen($rowAppliedJobPost['Maximum'])){
                        $jobSalary = '₱ '.number_format($rowAppliedJobPost['Minimum'], 2).' - '.number_format($rowAppliedJobPost['Maximum'], 2);
                    }
                    else{
                        $jobSalary = '₱ '.number_format($rowAppliedJobPost['Minimum'], 2);
                    }
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h2><?PHP ECHO $rowAppliedJobPost['JobTitle']; ?></h2>
                            <?PHP 
                                ECHO ($rowAppliedJobPost['CompanyPrivacyStatus'] == '0') ? '<h5>'.$rowAppliedJobPost['CompanyName'].' <i> ('.getDateTimeDifference($rowAppliedJobPost['DateTimeStamp'], $currentDateTime).')</i></span></h5>' : ''
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5><span class="mr-2 text-danger"><i class="fas fa-map-marker-alt fa-lg"></i></span><?PHP ECHO $jobLocation; ?></h5>
                                    <h5><span class="mr-2 text-danger"><i class="fas fa-clone fa-lg"></i></span><?PHP ECHO $rowAppliedJobPost['Classification']; ?></h5>
                                </div>
                        
                                <div class="col-md-5">
                                    <h5><span class="mr-2 text-danger"><i class="fas fa-clock fa-lg"></i></span>Full-Time</h5>
                                    <?PHP 
                                        ECHO ($rowAppliedJobPost['SalaryPrivacyStatus'] == '0') ? 
                                            '<h5><span class="mr-2 text-danger"><i class="fas fa-database fa-lg"></i></span>'.$jobSalary.'</h5>' 
                                            : 
                                            ''
                                    ?>
                                </div>

                                <div class="col-md-2 d-flex justify-content-end align-items-center">
                                    <?PHP 

                                        if($rowAppliedJobPost['Status'] == 0){ ?>
                                            <button class="btn btn-danger mr-2" id="btnCancelAppliedJobPosting<?PHP ECHO $rowAppliedJobPost['ApplicationID']; ?>" onclick="cancelAppliedJobPosting(this.id);">Cancel</button>
                                            <button class="btn btn-primary" id="btnViewAppliedJobPosting<?PHP ECHO $rowAppliedJobPost['ApplicationID']; ?>" onclick="viewAppliedJobPosting(this.id);">View</button>
                                    <?PHP
                                        }
                                        else{ ?>
                                            <button class="btn btn-danger mr-2" id="btnCancelAppliedJobPosting<?PHP ECHO $rowAppliedJobPost['ApplicationID']; ?>" onclick="cancelAppliedJobPosting(this.id);">Cancel</button>
                                            <button class="btn btn-primary" id="btnContinueAppliedJobPosting<?PHP ECHO $rowAppliedJobPost['ApplicationID'].':'.$rowAppliedJobPost['JobPostingID']; ?>" onclick="continueAppliedJobPosting(this.id);">Continue</button>
                                    <?PHP
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?PHP
                }
            }
            else{
                ECHO "3";
            }
        }
        catch(PDOException $e){
            ECHO "2";
        }
    }
    else{
        ECHO "1";
    }


    function getDateTimeDifference($appliedDateTime, $currentDateTime) {
        $interval = date_diff(date_create($appliedDateTime), date_create($currentDateTime));

        $result = "Applied ";
        
        if($interval->y > 0){
            $result .= $interval->y;
            $result .= ($interval->y > 1) ? ' years ago' : ' year ago';

            return $result;
        }
        else if($interval->m > 0){
            $result .= $interval->m;
            $result .= ($interval->m > 1) ? ' months ago' : ' month ago';

            return $result;
        }
        else if($interval->d >= 7){
            $weeks = floor($interval->d / 7);
            $result .=  $weeks;
            $result .= ($weeks > 1) ? ' weeks ago' : ' week ago';

            return $result;
        }
        else if($interval->d > 0){
            $result .= $interval->d;
            $result .= ($interval->d > 1) ? ' days ago' : ' day ago';

            return $result;
        }
        else{
            $hours = $interval->h + $interval->i / 60 + $interval->s / 3600;
            $result .= round($hours, 2);
            $result .= (round($hours, 2) > 1) ? ' hours ago' : ' hour ago';

            return $result;
        }
    }
?>