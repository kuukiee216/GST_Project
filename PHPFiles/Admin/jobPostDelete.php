<?php

require_once  '../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'Job Post';
$Action = 'Pending Delete';

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['JobPostID'])){

    $DateTimeStamp = date('Y-m-d');
    $currentDate = new DateTime();
    $currentDate->modify('+30 days');
    $MarkedDate =  $currentDate->format('Y-m-d');

    $JID = $_POST['JobPostID'];

    try{
        $connection->beginTransaction();


        $sQryMarkForDeletion = "INSERT INTO tbl_markdelete(JobPostingID, DateTimeStamp, DateTimeMarked) VALUES(?,?,?)";
        $stmtMarkForDeletion = $connection->prepare($sQryMarkForDeletion);
        $stmtMarkForDeletion->bindValue(1, $JID, PDO::PARAM_INT);
        $stmtMarkForDeletion->bindValue(2, $DateTimeStamp, PDO::PARAM_STR);
        $stmtMarkForDeletion->bindValue(3, $MarkedDate, PDO::PARAM_STR);
        $stmtMarkForDeletion->execute();

        $sQryUpdateJobStatus = "UPDATE 
                                    tbl_companyjob as cj
                                SET 
                                    cj.Status = 5
                                WHERE 
                                    cj.JobID = ?";
        $stmtUpdateJobStatus = $connection->prepare($sQryUpdateJobStatus);
        $stmtUpdateJobStatus->bindValue(1, $JID, PDO::PARAM_INT);
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
        

    } catch(PDOException $err){
        $connection->rollback();
        echo '2';
    }

}
else{
    echo '3';
}


?>