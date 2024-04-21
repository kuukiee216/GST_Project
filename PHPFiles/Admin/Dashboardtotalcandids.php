<?php
$localConfigPath = '../Essentials/db_config_local.php';

// Require the db_config_local.php file
require_once $localConfigPath;
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();
$sqryGETTOTALCANDIDS = "select count(ApplicantID) as totalcandids from tbl_applicantinfo;";
$sqryGETTOTALCANDIDS = $connection->prepare($sqryGETTOTALCANDIDS);
$sqryGETTOTALCANDIDS->execute();
if ($sqryGETTOTALCANDIDS->rowCount() > 0) {
    $rowtotalcandids = $sqryGETTOTALCANDIDS->fetch(PDO::FETCH_ASSOC);
    $dataresult = array();
    $dataresult['totalcandids'] = $rowtotalcandids['totalcandids'];
    $jsonresult = json_encode($dataresult);
    echo $jsonresult;
} else {
    echo "3";
}

?>