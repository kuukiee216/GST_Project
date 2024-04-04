<?PHP 
    // Path to db_config_local.php file relative
    $localConfigPath = '../../Essentials/db_config_local.php';

    // Require the db_config_local.php file
    require_once $localConfigPath;
    $clsConnect = new dbConnection();
    $connection = $clsConnect->dbConnect();

    SESSION_START();
    ERROR_REPORTING(0);

    //if(isset($_SESSION['AccountID']) && isset($_SESSION['Access']) && isset($_SESSION['Access']) == '2' && isset($_SESSION['CredentialID']) &&
    // isset($_POST['JobTitle']) && isset($_POST['Location'])){

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y/m/d H:i:s");

        $JobTitle = $_POST['JobTitle'];
        $Location = $_POST['Location'];

        try{
            $sQrySearchJobPostings = "SELECT
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
                    tbl_jobposting AS jp
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
                    cj.Status = '0' AND '2024/04/03 13:18:22' BETWEEN jp.DateTimeStamp AND jp.DateTimeStampSpan AND 
                    (cj.JobTitle = :JobTitle OR (l.City = :Location OR l.Province = :Location OR l.Country = :Location))";
            $stmtSearchJobPostings = $connection->prepare($sQrySearchJobPostings);
            $stmtSearchJobPostings->bindValue(":currentDateTime", $currentDateTime, PDO::PARAM_STR);
            $stmtSearchJobPostings->bindValue(":JobTitle", "%$JobTitle%", PDO::PARAM_STR);
            $stmtSearchJobPostings->bindValue(":Location", "%$Location%", PDO::PARAM_STR);
            $stmtSearchJobPostings->execute();

            if($stmtSearchJobPostings->rowCount() > 0){
                while($rowJobPost = $stmtSearchJobPostings->fetch(PDO::FETCH_ASSOC)){ 
                    
                    $jobLocation = $rowJobPost['City'].', '.$rowJobPost['Province'].', '.$rowJobPost['Country'].' '.$rowJobPost['ZipCode'];
                    $jobSalary = "";

                    if(strlen($rowJobPost['Maximum'])){
                        $jobSalary = '₱ '.number_format($rowJobPost['Minimum'], 2).' - '.number_format($rowJobPost['Maximum'], 2);
                    }
                    else{
                        $jobSalary = '₱ '.number_format($rowJobPost['Minimum'], 2);
                    }
                ?>

                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                            <h2><?PHP ECHO $rowJobPost['JobTitle']; ?></h2>
                            <?PHP 
                                ECHO ($rowJobPost['CompanyPrivacyStatus'] == '0') ? '<h5>'.$rowJobPost['CompanyName'].'</h5>' : ''
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-5">
                                <h5><span class="mr-2 text-danger"><i class="fas fa-map-marker-alt fa-lg"></i></span><?PHP ECHO $jobLocation; ?></h5>
                                <h5><span class="mr-2 text-danger"><i class="fas fa-clone fa-lg"></i></span><?PHP ECHO $rowJobPost['Classification']; ?></h5>
                            </div>
                    
                            <div class="col-md-5">
                                <h5><span class="mr-2 text-danger"><i class="fas fa-clock fa-lg"></i></span>Full-Time</h5>
                                <?PHP 
                                    ECHO ($rowJobPost['SalaryPrivacyStatus'] == '0') ? 
                                        '<h5><span class="mr-2 text-danger"><i class="fas fa-database fa-lg"></i></span>'.$jobSalary.'</h5>' 
                                        : 
                                        ''
                                ?>
                            </div>

                            <div class="col-md-2 d-flex justify-content-end align-items-center">
                                <button class="btn btn-danger float-right" id="btnViewJobPosting<?PHP ECHO $rowJobPost['JobPostingID']; ?>" onclick="viewJobPostDetails(this.id);">View Post</button>
                            </div>
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