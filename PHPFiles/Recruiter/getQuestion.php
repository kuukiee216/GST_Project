<?php

require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

try {
    $sQryApplicantInfo = "SELECT * FROM tbl_questionnaire";
    $stmtApplicantInfo = $connection->prepare($sQryApplicantInfo);
    $stmtApplicantInfo->execute();

    $result = $stmtApplicantInfo->fetchAll(PDO::FETCH_ASSOC); 

    if ($result) {
        echo json_encode($result); 
    } else {
        echo json_encode(["error" => "No data found"]);
    }
}catch(PDOException $err){
    echo 'Error: ' . $err->getMessage();
}
