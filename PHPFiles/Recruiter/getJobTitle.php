<?php
require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();

if (isset($_SESSION['AccountID'])) {
    try {
        $sQryApplicantInfo = "SELECT * FROM tbl_jobtitle";
        $stmtApplicantInfo = $connection->prepare($sQryApplicantInfo);
        $stmtApplicantInfo->execute();

        $result = $stmtApplicantInfo->fetchAll(PDO::FETCH_ASSOC); 

        if ($result) {
            echo json_encode($result); 
        } else {
            echo json_encode(["error" => "No data found"]);
        }

    } catch (PDOException $err) {
        echo json_encode(["error" => "Error fetching data"]);
    }

} else {
    echo json_encode(["error" => "AccountID not set"]);
}
?>
