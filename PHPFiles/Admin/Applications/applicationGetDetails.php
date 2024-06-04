<?php
require_once '../../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['ApplicationID'])){
    $dataResultArray = array();
    $AppID = $_POST['ApplicationID'];
    
    try{
        $sQryGetApplicationDetails = "SELECT
                                    app.Status,
                                    cj.JobTitle,
                                    ci.CompanyName,
                                    ct.CityName,
                                    co.CountryName,
                                    js.Minimum,
                                    js.Maximum
                                FROM
                                    tbl_application as app
                                LEFT JOIN
                                    tbl_jobposting as jp ON jp.JobPostingID = app.JobPostingID
                                LEFT JOIN
                                    tbl_joblocation as jl ON jl.JobPostingID = jp.JobPostingID
                                LEFT JOIN
                                    tbl_country as co ON co.CountryID = jl.CountryID
                                LEFT JOIN
                                    tbl_city as ct ON ct.CityID = jl.CityID 
                                LEFT JOIN
                                    tbl_companyjob as cj ON cj.JobID = jp.JobID
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

            $dataResultArray['Status'] = $rowApplicationDetails['Status'];
            $dataResultArray['JobTitle'] = $rowApplicationDetails['JobTitle'];
            $dataResultArray['Location'] = $rowApplicationDetails['CityName'] . ", " . $rowApplicationDetails['CountryName'];
            $dataResultArray['CompanyName'] = $rowApplicationDetails['CompanyName'];
            $dataResultArray['Salary'] = $rowApplicationDetails['Minimum']. ' - ' . $rowApplicationDetails['Maximum'];

            $jsonDataResult = json_encode($dataResultArray);
            echo $jsonDataResult;
        }else{
            echo '1';
        }

    }catch(PDOException $err){
        echo $err;
    }

}else{
    echo '3';
}


?>