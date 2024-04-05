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
        $sQryAcceptJobRequest = 'UPDATE 
                                    tbl_companyjob
                                SET
                                    Status = ?
                                WHERE 
                                    JobID = ?';

        $stmtAcceptJobRequest = $connection->prepare($sQryAcceptJobRequest);
        $stmtAcceptJobRequest->bindValue(1, 1, PDO::PARAM_INT);
        $stmtAcceptJobRequest->bindValue(2, $JID, PDO::PARAM_INT);
        echo $stmtAcceptJobRequest->execute();


    }catch(PDOException $err){
        echo '2';
    }

}
else{
    echo '3';
}


?>