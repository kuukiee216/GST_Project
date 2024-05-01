<?php


require_once '../../db_config.php';
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

if(isset($_POST['MainApplication'])){

    $Main_Classification = $_POST['MainApplication'];
    $Sub_Classification = $_POST['SubClassification'];

    try{
        $connection->beginTransaction();

        $sQryAddJobClassification = "INSERT INTO tbl_jobclassification(Classification) VALUES(?)";
        $stmtAddJobClassification = $connection->prepare($sQryAddJobClassification);
        $stmtAddJobClassification->bindValue(1, $Main_Classification, PDO::PARAM_STR);
        $stmtAddJobClassification->execute();

        $sQryAddJobClassification = "INSERT INTO tbl_subclassification(SubClassification) VALUES(?)";
        $stmtAddJobClassification = $connection->prepare($sQryAddJobClassification);
        $stmtAddJobClassification->bindValue(1, $Sub_Classification, PDO::PARAM_STR);
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

    }catch(PDOException $err){
        $connection->rollBack();
        echo $err; 
    }

}else{
    echo '3';
}


?>