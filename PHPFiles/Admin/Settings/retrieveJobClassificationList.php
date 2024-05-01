<?php

require_once '../../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

try{
    $dataResultArray = array();
    $sQryGetJobClassifications = "SELECT
                                    *
                                FROM
                                    tbl_jobclassification";

    $stmtGetJobClassification = $connection->prepare($sQryGetJobClassifications);
    $stmtGetJobClassification->execute();

    if($stmtGetJobClassification->rowCount() > 0){

        while($rowJobClassification = $stmtGetJobClassification->fetch(PDO::FETCH_ASSOC)){
            $rowData = array();    

            $CID = $rowJobClassification['ClassificationID'];

            $rowData['ClassificationID'] = $CID;
            $rowData['Classification'] = $rowJobClassification['Classification'];
            $rowData['SubClassification'] = $rowJobClassification['SubClassification'];
            $rowData['Action'] = '<button class="btn-secondary" id="btnViewClassification'.$CID.'" onclick="viewClassification(this.id);" name="btnViewClassification"><i class="far fa-eye"></i></button>
            <button class="btn-danger"><i class="fas fa-trash" id="btnDeleteClassification'.$CID.'" onclick="deleteClassification(this.id);" name="btnDeleteClassification"></i></button>';

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