<?php

require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

try{
    $dataResultArray = array();

    $sQryRetrieveApplicantList = " SELECT  c.JobTitle, c.Status, j.DateTimeStamp
    FROM
        tbl_companyjob c
    INNER JOIN
        tbl_jobposting j ON j.JobID = c.JobID
    WHERE
        c.status IN (1, 2)
    ORDER BY
        j.DateTimeStamp DESC
    LIMIT 5;"; 
    
    $stmtRetrieveApplicantList = $connection->prepare($sQryRetrieveApplicantList);
    $stmtRetrieveApplicantList->execute();

    if($stmtRetrieveApplicantList->rowCount() > 0){

        while($rowJob = $stmtRetrieveApplicantList->fetch(PDO::FETCH_ASSOC)){
            $rowData = array();

            $rowData['JobTitle'] = $rowJob['JobTitle'];
            $rowData['Status'] = $rowJob['Status'];

            $dataResultArray[] = $rowData;
        }

        $jsonDataResult = json_encode($dataResultArray);
        echo $jsonDataResult;

    }else{
        echo 'No records found.';
    }

}catch(PDOException $err){
    echo 'Error: ' . $err->getMessage();
}
