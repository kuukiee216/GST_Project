<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}



if(isset($_POST['AID'])){

    $dataResult = array();
    $AID = $_POST['AID'];

    try{
        $sQryViewAdType = "SELECT
                                *
                            FROM
                                tbl_adtype AS ad
                            WHERE 
                                ad.AdTypeID = ?";
        $stmtViewAdType = $connection->prepare($sQryViewAdType);
        $stmtViewAdType->bindValue(1, $AID, PDO::PARAM_INT);
        $stmtViewAdType->execute();

        if($stmtViewAdType->rowCount() == 1){
            $rowAd = $stmtViewAdType->fetch(PDO::FETCH_ASSOC);

            $dataResult['AdType'] = $rowAd['AdType'];
            $dataResult['Price'] = $rowAd['Price'];
            $dataResult['Description'] = $rowAd['Description'];

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