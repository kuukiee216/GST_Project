<?PHP 
    // Path to db_config_local.php file relative
    $localConfigPath = '../../Essentials/db_config_local.php';

    // Require the db_config_local.php file
    require_once $localConfigPath;
    $clsConnect = new dbConnection();
    $connection = $clsConnect->dbConnect();

    SESSION_START();
    ERROR_REPORTING(0);

    //if(isset($_SESSION['AccountID']) && isset($_SESSION['Access']) && isset($_SESSION['Access']) == '2' && isset($_SESSION['CredentialID'])){

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y/m/d H:i:s");

        $CredentialID = $_SESSION['CredentialID'];

        try{
            $sQryGetSavedJobPostings = "SELECT
                    b.BookmarkID,
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
                    tbl_location AS l ON l.LocationID = cj.LocationID
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
                    
                    $jobLocation = $rowSavedJobPost['City'].', '.$rowSavedJobPost['Province'].', '.$rowSavedJobPost['Country'].' '.$rowSavedJobPost['ZipCode'];
                    $jobSalary = "";

                    if(strlen($rowSavedJobPost['Maximum'])){
                        $jobSalary = '₱ '.number_format($rowSavedJobPost['Minimum'], 2).' - '.number_format($rowJrowSavedJobPostobPost['Maximum'], 2);
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
                                    ECHO ($rowSavedJobPost['CompanyPrivacyStatus'] == '0') ? '<h5>'.$rowSavedJobPost['CompanyName'].'<i>(Posted 2 hours ago)</i></span></h5>' : ''
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
    // }
    // else{
    //     ECHO "1";
    // }
?>