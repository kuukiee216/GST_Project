<?php
    $localConfigPath = '../../Essentials/db_config_local.php';

    // Require the db_config_local.php file
    require_once $localConfigPath;
    $clsConnect = new dbConnection();
    $connection = $clsConnect->dbConnect();

    // if(isset($_SESSION['AccountID']) && isset($_SESSION['Access']) && isset($_SESSION['Access']) == '0'){

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y/m/d H:i:s");

        $sQryGetDashboardTotals = "SELECT 
                (SELECT 
                    COUNT(ApplicantID) 
                FROM 
                    tbl_applicantinfo) AS TotalCandidates,
                (SELECT 
                    COUNT(jp.JobPostingID) 
                FROM 
                    tbl_jobposting AS jp 
                INNER JOIN 
                    tbl_companyjob AS cj ON cj.JobID = jp.JobID 
                WHERE 
                    cj.Status = '0' AND :currentDateTime BETWEEN jp.DateTimeStamp AND jp.DateTimeStampSpan) AS TotalListedJobs,
                (SELECT 
                    COUNT(EmployerID) 
                FROM 
                    tbl_employerinfo) AS TotalEmployers;";
        $stmtGetDashboardTotals = $connection->prepare($sQryGetDashboardTotals);
        $stmtGetDashboardTotals->bindValue(":currentDateTime", $currentDateTime, PDO::PARAM_STR);
        $stmtGetDashboardTotals->execute();

        if ($stmtGetDashboardTotals->rowCount() == 1){

            $rowDashboardTotals = $stmtGetDashboardTotals ->fetch(PDO::FETCH_ASSOC);

            $dataresult = array();

            $dataresult['TotalCandidates'] = $rowDashboardTotals['TotalCandidates'];
            $dataresult['TotalListedJobs'] = $rowDashboardTotals['TotalListedJobs'];
            $dataresult['TotalEmployers'] = $rowDashboardTotals['TotalEmployers'];

            $jsonresult = json_encode($dataresult);

            echo $jsonresult;
        }
        else {echo "3";}
    // }
    // else{
    //     ECHO "1";
    // }
?>