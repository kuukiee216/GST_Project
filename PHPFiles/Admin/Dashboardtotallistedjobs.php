<?php

$localConfigPath = '../../Essentials/db_config_local.php';

// Require the db_config_local.php file
require_once $localConfigPath;
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();
$sqryGETTOTALLISTEDJOBS = "select count(EmployerID) as totallistedjobs from tbl_companyjob;";
$stmtGETTOTALLISTEDJOBS = $connection->prepare($sqryGETTOTALLISTEDJOBS);
$stmtGETTOTALLISTEDJOBS->execute();
if ($stmtGETTOTALLISTEDJOBS)->rowCount() > 0){
    $rowtotallistedjobs = $stmtGETTOTALLISTEDJOBS ->fetch(PDO::FETCH_ASSOC);
    $dataresult = array();
    $dataresult ['totallistedjobs'] = $rowtotallistedjobs['totallistedjobs'];
    $jsonresult = json_encode($dataresult);
    echo $jsonresult;
}
else{echo "3";}
?>
