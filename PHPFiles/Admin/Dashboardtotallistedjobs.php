<?php
$localConfigPath = '../Essentials/db_config_local.php';

// Require the db_config_local.php file
require_once $localConfigPath;
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();
$sqryGETTOTALLISTEDJOBS = "select count(JobPostingID) as totaljobs from tbl_jobposting;";
$sqryGETTOTALLISTEDJOBS = $connection->prepare($sqryGETTOTALLISTEDJOBS);
$sqryGETTOTALLISTEDJOBS->execute();
if ($sqryGETTOTALLISTEDJOBS->rowCount() > 0) {
    $rowtotaljobs = $sqryGETTOTALLISTEDJOBS->fetch(PDO::FETCH_ASSOC);
    $dataresult = array();
    $dataresult['totaljobs'] = $rowtotaljobs['totaljobs'];
    $jsonresult = json_encode($dataresult);
    echo $jsonresult;
} else {
    echo "3";
}

?>