<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'Ad Type';
$Action = 'Delete';



if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['AdTypeID'])){

    $AID = $_POST['AdTypeID'];

    try{
        $connection->beginTransaction();

        $sQryDeletePromo = 'DELETE FROM tbl_adtype WHERE AdTypeID = ?';
        $stmtDeletePromo = $connection->prepare($sQryDeletePromo);
        $stmtDeletePromo->bindValue(1, $AID, PDO::PARAM_INT);
        $stmtDeletePromo->execute();

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
        $connection->rollBack();
        echo $err; 
    }
}
else{
    echo '3';
}


?>