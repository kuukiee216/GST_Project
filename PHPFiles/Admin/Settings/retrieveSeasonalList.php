<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

try{
    $dataResultArray = array();
    $sQryGetSeasonals = "SELECT
                            *
                        FROM
                            tbl_seasonal";

    $stmtGetSeasonals = $connection->prepare($sQryGetSeasonals);
    $stmtGetSeasonals->execute();

    if($stmtGetSeasonals->rowCount() > 0){

        while($rowSeasonals = $stmtGetSeasonals->fetch(PDO::FETCH_ASSOC)){
            $rowData = array();    

            $AID = $rowSeasonals['SeasonalID'];
            $rowData['SeasonalName'] = $rowSeasonals['SeasonalName'];
            $rowData['Price'] = $rowSeasonals['Price'];
            $rowData['Description'] = $rowSeasonals['Description'];

            $rowData['Action'] = '<button class="btn-secondary" id="btnViewSeasonal'.$AID.'" onclick="viewSeasonal(this.id);" name="btnViewSeasonal"><i class="far fa-eye"></i></button>
            <button class="btn-danger"><i class="fas fa-trash" id="btnDeleteSeasonal'.$AID.'" onclick="deleteSeasonal(this.id);" name="btnDeleteSeasonal"></i></button>';

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
