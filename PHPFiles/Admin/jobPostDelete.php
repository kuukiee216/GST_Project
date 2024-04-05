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
        $sQryDeleteJobPost1 = "DELETE FROM tbl_companyjob WHERE JobID = ?";
        $stmtDeleteJobPost1 = $connection->prepare($sQryDeleteJobPost1);
        $stmtDeleteJobPost1->bindValue(1, $JID, PDO::PARAM_INT);
        $stmtDeleteJobPost1->execute();

        $sQryDeleteJobPost2 = "DELETE FROM tbl_jobposting WHERE JobID = ?";
        $stmtDeleteJobPost2 = $connection->prepare($sQryDeleteJobPost2);
        $stmtDeleteJobPost2->bindValue(1, $JID, PDO::PARAM_INT);
        $stmtDeleteJobPost2->execute();
        echo '1';
        

    } catch(PDOException $err){
        echo '2';
    }

}
else{
    echo '3';
}


?>