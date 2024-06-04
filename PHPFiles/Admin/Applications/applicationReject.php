<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'Application';
$Action = 'Reject';

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['ApplicationID'])){
    
    $AID = $_POST['ApplicationID'];

    try{

        $connection->beginTransaction();

        $sQryUpdateApplicationStatus = "UPDATE
                                            tbl_application as app
                                        SET
                                            app.Status = 1
                                        WHERE
                                            app.ApplicationID = ?";
        $stmtUpdateApplicationStatus = $connection->prepare($sQryUpdateApplicationStatus);
        $stmtUpdateApplicationStatus->bindValue(1, $AID, PDO::PARAM_INT);
        $stmtUpdateApplicationStatus->execute(); 

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
        $connection-rollback();
        echo '2';
    }


}else{
    echo '3';
}

?>