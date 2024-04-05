<?php

require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['JobPostID'])){

    $JID = $_POST['JobPostID'];

    try{

        $sQryRepostJobPost = "UPDATE 
                                tbl_companyjob
                            SET 
                                Status = ?
                            WHERE 
                                JobID = ?";

        $stmtRepostJobPost = $connection->prepare($sQryRepostJobPost);
        $stmtRepostJobPost->bindValue(1, 1, PDO::PARAM_INT);
        $stmtRepostJobPost->bindValue(2, $JID, PDO::PARAM_INT);
        echo $stmtRepostJobPost->execute();
    }catch(PDOException $err){
        echo '2';
    }

}else{
    echo '3';
}



?>