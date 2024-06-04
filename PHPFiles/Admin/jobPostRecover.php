<?php

require_once '../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

$DateTime = date('Y-m-d H:i:s');
$AccountID = 23;
$Area = 'Job List';
$Action = 'Recovered Job';


if(isset($_POST['JobPostID'])){
    $JID = $_POST['JobPostID'];

    try{
        $connection->beginTransaction();
        $sQryRepostJobPost = "UPDATE 
                                tbl_companyjob
                            SET 
                                Status = ?
                            WHERE 
                                JobID = ?";

        $stmtRepostJobPost = $connection->prepare($sQryRepostJobPost);
        $stmtRepostJobPost->bindValue(1, 3, PDO::PARAM_INT);
        $stmtRepostJobPost->bindValue(2, $JID, PDO::PARAM_INT);
        $stmtRepostJobPost->execute();

        $sQryClearPendingDeletion = "DELETE FROM
                                        tbl_markdelete as md
                                    INNER JOIN
                                        tbl_jobposting AS jp ON jp.JobPostingID = md.JobPostingID
                                    INNER JOIN
                                        tbl_companyjob AS cj ON cj.JobID = jp.JobID
                                    WHERE 
                                        cj.JobID = ?";

        $stmtClearPendingDeletion = $connection->prepare($sQryClearPendingDeletion);
        $stmtClearPendingDeletion->bindValue(1, $JID, PDO::PARAM_INT);
        $stmtClearPendingDeletion->execute();

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