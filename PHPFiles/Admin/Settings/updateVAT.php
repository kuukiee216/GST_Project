<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'VAT';
$Action = 'Update';


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}


if(isset($_POST['VAT'])){

    $VAT = $_POST['VAT'];


    try{

        $connection->beginTransaction();

        $sQryUpdateVAT = "UPDATE tbl_vat SET VAT = ?";
        $stmtUpdateVAT = $connection->prepare($sQryUpdateVAT);
        $stmtUpdateVAT->bindValue(1, $VAT, PDO::PARAM_INT);
        $stmtUpdateVAT->execute();

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
        $connection->rollback();
        echo '2';
    }

}else{
    echo '3';
}


?>