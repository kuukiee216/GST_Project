<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

try{
    $sQryViewVAT = "SELECT
                        *
                    FROM
                        tbl_vat";
    $stmtViewVAT = $connection->prepare($sQryViewVAT);
    $stmtViewVAT->execute();

    if($stmtViewVAT->rowCount() == 1){
        $rowVAT = $stmtViewVAT->fetch(PDO::FETCH_ASSOC);

        $dataResult['VAT'] = $rowVAT['VAT'];

        $jsonDataResult = json_encode($dataResult);
        echo $jsonDataResult;
    }else{
        echo '3';
    }
}catch(PDOException $err){
    echo '2';
}

?>