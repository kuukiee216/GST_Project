<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'Job Title';
$Action = 'Add';


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['JobTitle']) && isset($_POST['MainClassification']) && isset($_POST['SubClassification'])){
    
    if($_POST['JobTitle'] == ''){
        echo '4';
        exit();
    }

    $JtID = '';
    $JobTitle = $_POST['JobTitle'];
    $MainClassification = $_POST['MainClassification'];
    $SubClassificaition = $_POST['SubClassification'];

    $arrayDataResult = array();

    try{
        $connection->beginTransaction();

        $sQryInsertJobTitle = "INSERT INTO tbl_jobtitle(JobTitleName) VALUES(?)";
        $stmtInsertJobTitle = $connection->prepare($sQryInsertJobTitle);
        $stmtInsertJobTitle->bindValue(1, $JobTitle, PDO::PARAM_STR);
        $stmtInsertJobTitle->execute();

        $sQryGetSubClassifications = "INSERT INTO tbl_jobdescriptive (ClassificationID, SubClassificationID, JobTitleID)
        VALUES ((SELECT ClassificationID FROM tbl_jobclassification WHERE Classification = ? LIMIT 1),
                (SELECT SubClassificationID FROM tbl_subclassification WHERE SubClassification = ? LIMIT 1),
                (SELECT JobTitleID FROM tbl_jobtitle ORDER BY JobTitleID DESC LIMIT 1));";
        $stmtGetSubClassifications = $connection->prepare($sQryGetSubClassifications);
        $stmtGetSubClassifications->bindValue(1, $MainClassification, PDO::PARAM_INT);
        $stmtGetSubClassifications->bindValue(2, $SubClassificaition, PDO::PARAM_INT);
        $stmtGetSubClassifications->execute();

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
        echo $err;
    }
}else{
    echo '3';
}

?>