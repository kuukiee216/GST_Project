<?php

require_once  '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'Employer';
$Action = 'Pending Delete';

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['EmployerID'])){

    $DateTimeStamp = date('Y-m-d');
    $currentDate = new DateTime();
    $currentDate->modify('+15 days');
    $MarkedDate =  $currentDate->format('Y-m-d');

    $EID = $_POST['EmployerID'];

    try{
        $connection->beginTransaction();


        $sQryMarkForDeletion = "INSERT INTO tbl_employerdelete(EmployerID, AccountID, DateTimeStamp, DateTimeMarked) 
                                VALUES(?,
                                        (SELECT AccountID FROM tbl_employerinfo WHERE EmployerID = ?),
                                        ?,?)";
        $stmtMarkForDeletion = $connection->prepare($sQryMarkForDeletion);
        $stmtMarkForDeletion->bindValue(1, $EID, PDO::PARAM_INT);
        $stmtMarkForDeletion->bindValue(2, $EID, PDO::PARAM_INT);
        $stmtMarkForDeletion->bindValue(3, $DateTimeStamp, PDO::PARAM_STR);
        $stmtMarkForDeletion->bindValue(4, $MarkedDate, PDO::PARAM_STR);
        $stmtMarkForDeletion->execute();

        $sQryUpdateAccountStatus = "UPDATE 
                                    tbl_account as acc   
                                INNER JOIN tbl_employerinfo as te ON te.AccountID = acc.AccountID
                                SET 
                                    acc.Status = 3
                                WHERE 
                                    te.EmployerID = ?";
        $stmtUpdateAccountStatus = $connection->prepare($sQryUpdateAccountStatus);
        $stmtUpdateAccountStatus->bindValue(1, $EID, PDO::PARAM_INT);
        $stmtUpdateAccountStatus->execute();

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
        echo $err;
    }

}
else{
    echo '3';
}


?>