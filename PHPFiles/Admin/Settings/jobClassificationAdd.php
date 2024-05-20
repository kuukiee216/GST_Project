<?php


require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'Job Classification';
$Action = 'Add';

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['Classification']) && isset($_POST['ActiveTable'])){
    
    $sqryCheckClassification = '';
    $sQryAddJobClassification = '';
    $Classification = $_POST['Classification'];

    try{
        $connection->beginTransaction();

        if($_POST['ActiveTable'] == 1){
            $sQryCheckClassification = "SELECT ClassificationID FROM tbl_jobclassification WHERE Classification = ?";
            $sQryAddJobClassification = "INSERT INTO tbl_jobclassification(Classification) VALUES(?)";
        }
        else if($_POST['ActiveTable'] == 2){
            $sQryCheckClassification = "SELECT SubClassificationID FROM tbl_subclassification WHERE SubClassification = ?";
            $sQryAddJobClassification = "INSERT INTO tbl_subclassification(SubClassification) VALUES(?)";
        }
        
        $stmtCheckClassification = $connection->prepare($sQryCheckClassification);
        $stmtCheckClassification->bindValue(1, $Classification, PDO::PARAM_STR);
        $stmtCheckClassification->execute();

        if($stmtCheckClassification->rowCount() == 0){

            $stmtAddJobClassification = $connection->prepare($sQryAddJobClassification);
            $stmtAddJobClassification->bindValue(1, $Classification, PDO::PARAM_STR);
            $stmtAddJobClassification->execute();

            
            $sQrySystemLog = "INSERT INTO tbl_systemlog(DateTimeStamp, Action, Area, AccountID) VALUES(?,?,?,?)";
            $stmtSystemLog = $connection->prepare($sQrySystemLog);
            $stmtSystemLog->bindValue(1, $DateTime, PDO::PARAM_STR);
            $stmtSystemLog->bindValue(2, $Action, PDO::PARAM_STR);
            $stmtSystemLog->bindValue(3, $Area, PDO::PARAM_STR);
            $stmtSystemLog->bindValue(4, $AccountID, PDO::PARAM_INT);
            $stmtSystemLog->execute();
        
            $connection->commit();
            echo '1';
        }else{
            echo '4';
        }

    }catch(PDOException $err){
        $connection->rollBack();
        echo $err; 
    }

}else{
    echo '3';
}


?>