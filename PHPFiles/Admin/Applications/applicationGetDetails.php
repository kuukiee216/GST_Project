<?php
require_once '../../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['ApplicationID'])){
    echo 'worked';
    $dataResultArray = array();
    $AppID = $_POST['ApplicationID'];
    
    try{
        $sQryGetApplicationDetails = "SELECT
                                    cj.JobTitle,
                                    loc.City,
                                    loc.Country,
                                    ci.CompanyName,
                                    js.Minimum,
                                    js.Maximum
                                FROM
                                    tbl_application as app
                                LEFT JOIN
                                    tbl_jobposting as jp ON jp.JobPostingID = app.JobPostingID
                                LEFT JOIN
                                    tbl_companyjob as cj ON cj.JobID = jp.JobID
                                LEFT JOIN
                                    tbl_location as loc ON loc.LocationID = cj.LocationID
                                LEFT JOIN
                                    tbl_employerinfo as ei ON ei.EmployerID = cj.EmployerID
                                LEFT JOIN
                                    tbl_companyinfo as ci ON ci.CompanyID = ei.CompanyID    
                                LEFT JOIN
                                    tbl_jobsalary as js ON js.JobID = cj.JobID
                                WHERE
                                    app.ApplicationID = ?";
        $stmtGetApplicationDetails = $connection->prepare($sQryGetApplicationDetails);
        $stmtGetApplicationDetails->bindValue(1, $AppID, PDO::PARAM_INT);
        $stmtGetApplicationDetails->execute();

        if($stmtGetApplicationDetails->rowCount() == 1){
            $rowApplicationDetails = $stmtGetApplicationDetails->fetch(PDO::FETCH_ASSOC);

            $dataResultArray['JobTitle'] = $rowApplicationDetails['JobTitle'];
            $dataResultArray['Location'] = $rowApplicationDetails['City'] . ', ' . $rowApplicationDetails['Country'];
            $dataResultArray['CompanyName'] = $rowApplicationDetails['CompanyName'];
            $dataResultArray['Salary'] = $rowApplicationDetails['Minimum']. ' - ' . $rowApplicationDetails['Maximum'];

            $jsonDataResult = json_encode($dataResultArray);
            echo $jsonDataResult;
        }else{
            echo '1';
        }

    }catch(PDOException $err){
        echo '2';
    }

}else{
    echo '3';
}


?>