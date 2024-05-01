<?php

require_once '../../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'Ad Type';
$Action = 'Add';

echo 'worked';

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['AdType']) && isset($_POST['Price']) && isset($_POST['Discount']) && isset($_POST['Description'])){

    $AdType = $_POST['AdType'];
    $Price = $_POST['Price'];
    $Discount = $_POST['Discount'];
    $Description = $_POST['Description'];

    try{
        $connection->beginTransaction();

        $sQryAddPromo = 'INSERT INTO tbl_adtype
                            (AdType, Price, Discount, Description)
                        VALUES
                            (?,?,?,?)';
        $stmtAddPromo = $connection->prepare($sQryAddPromo);
        $stmtAddPromo->bindValue(1, $AdType, PDO::PARAM_STR);
        $stmtAddPromo->bindValue(2, $Price, PDO::PARAM_STR);
        $stmtAddPromo->bindValue(3, $Discount, PDO::PARAM_STR);
        $stmtAddPromo->bindValue(4, $Description, PDO::PARAM_STR);
        $stmtAddPromo->execute();

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
        $connection->rollBack();
        echo $err; 
    }
}
else{
    echo '3';
}

?>