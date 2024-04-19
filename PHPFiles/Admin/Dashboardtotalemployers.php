<?php
$localConfigPath = '../../Essentials/db_config_local.php';

// Require the db_config_local.php file
require_once $localConfigPath;
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();
$sqryGETTOTALEMPLOYERS = "select count(EmployerID) as total employers from tbl_employerinfo;";
$stmtGETTOTALEMPLOYERS = $connection->prepare($sqryGETTOTALEMPLOYERS);
$stmtGETTOTALEMPLOYERS->execute();
if($stmtGETTOTALEMPLOYERS->rowCount() > 0){
    $rowtotalemployer = $stmtGETTOTALEMPLOYERS ->fetch(PDO::FETCH_ASSOC);
    $dataresult = array();
    $dataresult['totalemployers'] = $rowtotalemployer['totalemployers'];
    $jsonresult = json_encode($dataresult);
    echo $jsonresult;
}
else{echo "3";}

?>