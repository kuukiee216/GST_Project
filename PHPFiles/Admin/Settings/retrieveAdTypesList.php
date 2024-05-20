<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

try{
    $dataResultArray = array();
    $sQryGetAdTypes = "SELECT
                            *
                        FROM
                            tbl_adtype";

    $stmtGetAdTypes = $connection->prepare($sQryGetAdTypes);
    $stmtGetAdTypes->execute();

    if($stmtGetAdTypes->rowCount() > 0){

        while($rowAdTypes = $stmtGetAdTypes->fetch(PDO::FETCH_ASSOC)){
            $rowData = array();    

            $AID = $rowAdTypes['AdTypeID'];
            $rowData['AdType'] = $rowAdTypes['AdType'];
            $rowData['Price'] = $rowAdTypes['Price'];
            $rowData['Description'] = $rowAdTypes['Description'];

            $rowData['Action'] = '<button class="btn-secondary" id="btnViewAdType'.$AID.'" onclick="viewAdType(this.id);" name="btnViewAdType"><i class="far fa-eye"></i></button>
            <button class="btn-danger"><i class="fas fa-trash" id="btnDeleteAdType'.$AID.'" onclick="deleteAdType(this.id);" name="btnDeleteAdType"></i></button>';

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