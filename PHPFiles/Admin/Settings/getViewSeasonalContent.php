<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['SID'])){

    $dataResult = array();
    $SID = $_POST['SID'];

    try{
        $sQrySeasonal = "SELECT
                                *
                            FROM
                                tbl_seasonal AS se
                            WHERE 
                                se.SeasonalID = ?";
        $stmtSeasonal = $connection->prepare($sQrySeasonal);
        $stmtSeasonal->bindValue(1, $SID, PDO::PARAM_INT);
        $stmtSeasonal->execute();

        if($stmtSeasonal->rowCount() == 1){
            $rowSeason = $stmtSeasonal->fetch(PDO::FETCH_ASSOC);

            $dataResult['SeasonalName'] = $rowSeason['SeasonalName'];
            $dataResult['Price'] = $rowSeason['Price'];
            $dataResult['Description'] = $rowSeason['Description'];

            $jsonDataResult = json_encode($dataResult);
            echo $jsonDataResult;
        } 


    }catch(PDOException $err){
        echo '2';
    }


}else{
    echo '3';
}

?>