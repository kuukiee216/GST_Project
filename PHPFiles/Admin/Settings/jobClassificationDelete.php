<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'Job Classification';
$Action = 'Delete';


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['ClassificationID'])){

    $CID = $_POST['ClassificationID'];

    try{
        $connection->beginTransaction();
        $sQryViewClassification = "DELETE FROM tbl_jobclassification WHERE ClassificationID = ?";
        $stmtViewClassification = $connection->prepare($sQryViewClassification);
        $stmtViewClassification->bindValue(1, $CID, PDO::PARAM_INT);
        $stmtViewClassification->execute();

        $sQryViewClassification = "DELETE FROM tbl_subclassification WHERE SubClassificationID = ?";
        $stmtViewClassification = $connection->prepare($sQryViewClassification);
        $stmtViewClassification->bindValue(1, $CID, PDO::PARAM_INT);
        $stmtViewClassification->execute();

        $sQrySystemLog = "INSERT INTO tbl_systemlog(DateTimeStamp, Action, Area, AccountID) VALUES(?,?,?,?)";
        $stmtSystemLog = $connection->prepare($sQrySystemLog);
        $stmtSystemLog->bindValue(1, $DateTime, PDO::PARAM_STR);
        $stmtSystemLog->bindValue(2, $Action, PDO::PARAM_STR);
        $stmtSystemLog->bindValue(3, $Area, PDO::PARAM_STR);
        $stmtSystemLog->bindValue(4, $AccountID, PDO::PARAM_INT);
        $stmtSystemLog->execute();
       
        $connection->commit();
        echo '1';

    }catch(PDOException $err){  
        echo '2';
    }
}else{
    echo '3';
}

?>