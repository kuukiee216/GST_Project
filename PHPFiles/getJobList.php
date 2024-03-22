<?php
require_once 'db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

$dataResultArray = array();

try {

    $sQryGetJobList = "SELECT 
                    cj.JobTitle,
                    cj.Description,
                    cj.Summary
                FROM
                    tbl_companyjob as cj";

    $stmtGetJobList = $connection->prepare($sQryGetJobList);
    $stmtGetJobList->execute();

    if($stmtGetJobList->rowCount() >= 0){
        while($rowJob = $stmtGetJobList->fetch(PDO::FETCH_ASSOC)){

            $dataResult = array();
            $dataResult['JobTitle'] = $rowJob['JobTitle'];
            $dataResult['Description'] = $rowJob['Description'];
            $dataResult['Summary'] = $rowJob['Summary'];

            $dataResultArray[] = $dataResult;
        }
        $jsonDataResult = json_encode($dataResultArray);

        echo $jsonDataResult;
    }
    

} catch(PDOException $err){


}


?>
