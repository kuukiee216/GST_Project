<?php
    
require_once '../../db_config.php';
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

if(isset($_POST['MainApplication'])){

    try{
        $connection->beginTransaction();
        $sQryAddJobTitle = 'INSERT INTO 
                                tbl_jobdescriptive 
                                (ClassificationID, SubClassificationID, JobTitleID) 
                            VALUES
                                ()';
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