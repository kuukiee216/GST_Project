<?php
$localConfigPath = '../Essentials/db_config_local.php';

// Require the db_config_local.php file
require_once $localConfigPath;
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();
$sqryGETTOTALJOBCATEGORY = "SELECT COUNT(ClassificationID) AS totaljobcategory FROM tbl_jobclassification;";
$sqryGETTOTALJOBCATEGORY = $connection->prepare($sqryGETTOTALJOBCATEGORY);
$sqryGETTOTALJOBCATEGORY->execute();
if ($sqryGETTOTALJOBCATEGORY->rowCount() > 0) {
    $rowtotaljobcategory = $sqryGETTOTALJOBCATEGORY->fetch(PDO::FETCH_ASSOC);
    $dataresult = array();
    $dataresult['totaljobcategory'] = $rowtotaljobcategory['totaljobcategory'];
    $jsonresult = json_encode($dataresult);
    echo $jsonresult;
} else {
    echo "3"; 
}

?>