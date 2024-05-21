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
$Action = 'Reject Job';

if(isset($_POST['JobPostID']) && isset($_POST['Reason'])){

    $JID = $_POST['JobPostID'];
    $Reason = $_POST['Reason'];


    try{
        $connection->beginTransaction();
        $sQryUpdateJobStatus = "UPDATE 
                                    tbl_companyjob as cj
                                INNER JOIN tbl_jobposting AS jp ON cj.JobID = jp.JobID
                                SET 
                                    cj.Status = 6, jp.RejectionReason = ?
                                WHERE 
                                    cj.JobID = ?";
        $stmtUpdateJobStatus = $connection->prepare($sQryUpdateJobStatus);
        $stmtUpdateJobStatus->bindValue(1, $Reason, PDO::PARAM_STR);
        $stmtUpdateJobStatus->bindValue(2, $JID, PDO::PARAM_INT);
        $stmtUpdateJobStatus->execute();

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
        echo '2';
    }

}else{
    echo '3';
}

?>