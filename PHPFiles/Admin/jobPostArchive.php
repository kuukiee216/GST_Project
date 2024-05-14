<?php

require_once '../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['JobPostID'])){

    try{
        $JID = $_POST['JobPostID'];
        
        $sQryArchiveJobPost = "UPDATE 
                                    tbl_companyjob
                                SET 
                                    Status = 2 
                                WHERE 
                                    JobID = ?";
        $stmtArchiveJobPost = $connection->prepare($sQryArchiveJobPost);
        $stmtArchiveJobPost->bindValue(1, $JID, PDO::PARAM_INT);
        echo $stmtArchiveJobPost->execute();
    } catch(PDOException $err){


    }
}

echo "di pa tapos";



?>