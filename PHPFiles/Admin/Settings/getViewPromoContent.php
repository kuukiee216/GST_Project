<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['PID'])){

    $dataResult = array();
    $PID = $_POST['PID'];

    try{
        $sQryViewPromo = "SELECT
                                *
                            FROM
                                tbl_promo AS pro
                            WHERE 
                                pro.PromoID = ?";
        $stmtViewPromo = $connection->prepare($sQryViewPromo);
        $stmtViewPromo->bindValue(1, $PID, PDO::PARAM_INT);
        $stmtViewPromo->execute();

        if($stmtViewPromo->rowCount() == 1){
            $rowPromo = $stmtViewPromo->fetch(PDO::FETCH_ASSOC);

            $dataResult['PromoName'] = $rowPromo['PromoName'];
            $dataResult['PromoCode'] = $rowPromo['PromoCode'];
            $dataResult['Discount'] = $rowPromo['Discount'];
            $dataResult['Description'] = $rowPromo['Description'];

            $jsonDataResult = json_encode($dataResult);
            echo $jsonDataResult;
        }else{
            echo '4';
        } 


    }catch(PDOException $err){
        echo $err;
    }


}else{
    echo '3';
}

?>