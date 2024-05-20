<?php

require_once '../../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

try{
    $dataResultArray = array();
    $sQryGetPromos = "SELECT
                            *
                        FROM
                            tbl_promo";

    $stmtGetPromos = $connection->prepare($sQryGetPromos);
    $stmtGetPromos->execute();

    if($stmtGetPromos->rowCount() > 0){

        while($rowPromos = $stmtGetPromos->fetch(PDO::FETCH_ASSOC)){
            $rowData = array();    

            $PID = $rowPromos['PromoID'];

            $rowData['PromoName'] = $rowPromos['PromoName'];
            $rowData['PromoCode'] = $rowPromos['PromoCode'];
            $rowData['Discount'] = $rowPromos['Discount'];
            $rowData['Description'] = $rowPromos['Description'];

            $rowData['Action'] = '<button class="btn-secondary" id="btnViewPromo'.$PID.'" onclick="viewPromoCode(this.id);" name="btnViewPromo"><i class="far fa-eye"></i></button>
            <button class="btn-danger"><i class="fas fa-trash" id="btnDeletePromo'.$PID.'" onclick="deletePromoCode(this.id);" name="btnDeletePromo"></i></button>';

            $dataResultArray[] = $rowData;
        }
        $jsonDataResult = json_encode($dataResultArray);
        echo $jsonDataResult;

    }else{
        echo '1';
    }


}catch(PDOException $err){
    echo '2';
}


?>