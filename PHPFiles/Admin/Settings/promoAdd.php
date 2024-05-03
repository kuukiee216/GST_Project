<?php
    
require_once '../../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'Promo';
$Action = 'Add';

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['PromoName']) && isset($_POST['PromoCode']) && isset($_POST['Discount']) && isset($_POST['Description'])){

    $PromoName = $_POST['PromoName'];
    $PromoCode = $_POST['PromoCode'];
    $PromoDiscount = $_POST['Discount'];
    $PromoDescription = $_POST['Description'];


    try{
        $connection->beginTransaction();

        $sQryAddPromo = 'INSERT INTO tbl_promo
                            (PromoName, PromoCode, Discount, Description)
                        VALUES
                            (?,?,?,?)';
        $stmtAddPromo = $connection->prepare($sQryAddPromo);
        $stmtAddPromo->bindValue(1, $PromoName, PDO::PARAM_STR);
        $stmtAddPromo->bindValue(2, $PromoCode, PDO::PARAM_STR);
        $stmtAddPromo->bindValue(3, $PromoDiscount, PDO::PARAM_STR);
        $stmtAddPromo->bindValue(4, $PromoDescription, PDO::PARAM_STR);
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