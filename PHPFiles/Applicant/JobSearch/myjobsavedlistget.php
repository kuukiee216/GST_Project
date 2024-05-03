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
            $sQryGetSavedJobPostings = "SELECT
                    b.BookmarkID,
                    jp.JobPostingID,
                    jp.DateTimeStamp,
                    cj.JobTitle,
                    ci.CompanyName,
                    class.Classification,
                    city.CityName,
                    pro.ProvinceName,
                    co.CountryName,
                    c.Symbol,
                    js.Minimum,
                    js.Maximum,
                    jp.CompanyPrivacyStatus,
                    jp.SalaryPrivacyStatus
                FROM
                    tbl_bookmark AS b
                INNER JOIN
                    tbl_jobposting AS jp ON jp.JobPostingID = b.JobPostingID
                INNER JOIN
                    tbl_companyjob AS cj ON cj.JobID = jp.JobID
                INNER JOIN
                    tbl_employerinfo AS ei ON ei.EmployerID = cj.EmployerID
                INNER JOIN
                    tbl_companyinfo AS ci ON ci.CompanyID = ei.EmployerID
                INNER JOIN
                    tbl_classification AS class ON class.ClassificationID = cj.ClassificationID
                INNER JOIN
                    tbl_companyjoblocation AS cjl ON cjl.JobID = cj.JobID
                INNER JOIN
                    tbl_country AS co ON co.CountryID = cjl.CountryID
                INNER JOIN
                    tbl_province AS pro ON pro.ProvinceID = cjl.ProvinceID
                INNER JOIN
                    tbl_city AS city ON city.CityID = cjl.CityID
                INNER JOIN 
                    tbl_jobsalary AS js ON js.JobID = cj.JobID
                INNER JOIN
                    tbl_currency AS c ON c.CurrencyID = js.CurrencyID
                WHERE
                    b.ApplicantID = :CredentialID AND cj.Status = '0' AND :currentDateTime BETWEEN jp.DateTimeStamp AND jp.DateTimeStampSpan";
            $stmtGetSavedJobPostings = $connection->prepare($sQryGetSavedJobPostings);
            $stmtGetSavedJobPostings->bindValue(":CredentialID", $CredentialID, PDO::PARAM_INT);
            $stmtGetSavedJobPostings->bindValue(":currentDateTime", $currentDateTime, PDO::PARAM_STR);
            $stmtGetSavedJobPostings->execute();

            if($stmtGetSavedJobPostings->rowCount() > 0){
                while($rowSavedJobPost = $stmtGetSavedJobPostings->fetch(PDO::FETCH_ASSOC)){ 
                    
                    $jobLocation = $rowSavedJobPost['CityName'].', '.$rowSavedJobPost['ProvinceName'].', '.$rowSavedJobPost['CountryName'];
                    $jobSalary = "";

                    if(strlen($rowSavedJobPost['Maximum'])){
                        $jobSalary = '₱ '.number_format($rowSavedJobPost['Minimum'], 2).' - '.number_format($rowSavedJobPost['Maximum'], 2);
                    }
                    else{
                        $jobSalary = '₱ '.number_format($rowSavedJobPost['Minimum'], 2);
                    }
                ?>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="col-md-6">
                                <h2><?PHP ECHO $rowSavedJobPost['JobTitle']; ?></h2>
                                <?PHP 
                                    ECHO ($rowSavedJobPost['CompanyPrivacyStatus'] == '0') ? '<h5>'.$rowSavedJobPost['CompanyName'].' <i>('.getDateTimeDifference($rowSavedJobPost['DateTimeStamp'], $currentDateTime).')</i></span></h5>' : ''
                                ?>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <div class="btn-group dropright">
                                    <button type="button" class="btn btn-light btn-round m-3 btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v fa-lg"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                        <button class="dropdown-item btn btn-light" id="btnRemoveSavedJob<?PHP ECHO $rowSavedJobPost['BookMarkID']; ?>" onclick="removeSavedJobPosting(this.id);"><i class="fas fa-trash mr-2 fa-lg"></i> Remove</a>
                                        <button class="dropdown-item btn btn-light"><i class="fa fa-flag mr-2 fa-lg"></i> Report Job</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5><span class="mr-2 text-danger"><i class="fas fa-map-marker-alt fa-lg"></i></span><?PHP ECHO $jobLocation; ?></h5>
                                    <h5><span class="mr-2 text-danger"><i class="fas fa-clone fa-lg"></i></span><?PHP ECHO $rowSavedJobPost['Classification']; ?></h5>
                                </div>
                        
                                <div class="col-md-5">
                                    <h5><span class="mr-2 text-danger"><i class="fas fa-clock fa-lg"></i></span>Full-Time</h5>
                                    <?PHP 
                                        ECHO ($rowSavedJobPost['SalaryPrivacyStatus'] == '0') ? 
                                            '<h5><span class="mr-2 text-danger"><i class="fas fa-database fa-lg"></i></span>'.$jobSalary.'</h5>' 
                                            : 
                                            ''
                                    ?>
                                </div>

                                <div class="col-md-2 d-flex justify-content-end align-items-center">
                                    <button class="btn btn-danger" id="btnViewSavedJobPosting<?PHP ECHO $rowSavedJobPost['JobPostingID']; ?>" onclick="viewSavedJobPostDetails(this.id);">View Post</button>
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

    function getDateTimeDifference($postedDateTime, $currentDateTime) {
        $interval = date_diff(date_create($postedDateTime), date_create($currentDateTime));

        $result = "Posted ";
        
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