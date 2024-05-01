<?php

require_once '../../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['SelectedMain'])){
    
    $SelectedMain = $_POST['SelectedMain'];
    $arrayDataResult = array();

    try{
        $sQryGetSubClassifications = "SELECT 
                                        scls.SubClassification
                                    FROM 
                                        tbl_subclassification as scls";
                                        
        $stmtGetSubClassifications = $connection->prepare($sQryGetSubClassifications);
        $stmtGetSubClassifications->bindValue(1, $SelectedMain, PDO::PARAM_STR);
        $stmtGetSubClassifications->execute();

        if($stmtGetSubClassifications->rowCount() > 0){
            while($rowSubClassf = $stmtGetSubClassifications->fetch(PDO::FETCH_ASSOC)){
                $dataRow = array();
                
                $dataRow['SubClassification'] = $rowSubClassf['SubClassification'];
                $arrayDataResult[] =  $dataRow;
            }
            $jsonDataResult = json_encode($arrayDataResult);
            echo $jsonDataResult;

        }else{
            echo '1';
        }

    }catch(PDOException $err){
        echo $err;
    }
}else{
    echo '3';
}

?>