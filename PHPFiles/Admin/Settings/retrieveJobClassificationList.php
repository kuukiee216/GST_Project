<?php

require_once '../../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['ActiveTable'])){

    $activeTable = $_POST['ActiveTable'];

    $sQryGetJobClassifications = '';

    if($activeTable == 1){
        $sQryGetJobClassifications = "SELECT
                                        *
                                    FROM
                                        tbl_jobclassification";
    }else if($activeTable == 2){
        $sQryGetJobClassifications = "SELECT
                                        *
                                    FROM
                                        tbl_subclassification";
    }

    try{
        $dataResultArray = array();

        $stmtGetJobClassification = $connection->prepare($sQryGetJobClassifications);
        $stmtGetJobClassification->execute();

        if($stmtGetJobClassification->rowCount() > 0){

            while($rowJobClassification = $stmtGetJobClassification->fetch(PDO::FETCH_ASSOC)){
                $rowData = array();    

                if($activeTable == 1){
                    $CID = $rowJobClassification['ClassificationID'];
                    $rowData['ClassificationID'] = $CID;
                    $rowData['Classification'] = $rowJobClassification['Classification'];
                    $rowData['Action'] = '<button class="btn-secondary" id="btnViewClassification'.$CID.'" onclick="viewClassification(this.id);" name="btnViewClassification"><i class="far fa-eye"></i></button>
                    <button class="btn-danger"><i class="fas fa-trash" id="btnDeleteClassification'.$CID.'" onclick="deleteClassification(this.id);" name="btnDeleteClassification"></i></button>';
                
                }else if($activeTable == 2){
                    $SID = $rowJobClassification['SubClassificationID'];
                    $rowData['SubClassificationID'] = $SID;
                    $rowData['SubClassification'] = $rowJobClassification['SubClassification'];
                    $rowData['Action'] = '<button class="btn-secondary" id="btnViewClassification'.$SID.'" onclick="viewClassification(this.id);" name="btnViewClassification"><i class="far fa-eye"></i></button>
                    <button class="btn-danger"><i class="fas fa-trash" id="btnDeleteClassification'.$SID.'" onclick="deleteClassification(this.id);" name="btnDeleteClassification"></i></button>';
                }
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
}else if(isset($_POST['MainClassification'])){
    try{
        $dataResultArray = array();
        $sQryGetJobTitles = "SELECT
                            jc.Classification
                        FROM
                            tbl_jobclassification as jc";
    
        $stmtGetJobTitles = $connection->prepare($sQryGetJobTitles);
        $stmtGetJobTitles->execute();
    
        if($stmtGetJobTitles->rowCount() > 0){
    
            while($rowJobs = $stmtGetJobTitles->fetch(PDO::FETCH_ASSOC)){
                $rowData = array();    
                $rowData['Classification'] = $rowJobs['Classification'];
    
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

}else if(isset($_POST['SubClassification'])){
    try{
        $dataResultArray = array();
        $sQryGetJobTitles = "SELECT
                            js.SubClassification
                        FROM
                            tbl_subclassification as js";
    
        $stmtGetJobTitles = $connection->prepare($sQryGetJobTitles);
        $stmtGetJobTitles->execute();
    
        if($stmtGetJobTitles->rowCount() > 0){
    
            while($rowJobs = $stmtGetJobTitles->fetch(PDO::FETCH_ASSOC)){
                $rowData = array();    
                $rowData['SubClassification'] = $rowJobs['SubClassification'];
    
                $dataResultArray[] = $rowData;
            }
            $jsonDataResult = json_encode($dataResultArray);
            echo $jsonDataResult;
    
        }else{
            echo '1';
        }
    
    
    }catch(PDOException $err){
        echo $err;
    }
}
?>