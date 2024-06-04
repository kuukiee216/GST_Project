<?php
require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $applicantID = $_POST['applicationID'];
    $newStatus = $_POST['status'];

    // Update status in tbl_application
    $updateQuery = "UPDATE tbl_application SET Status = :status WHERE applicationID = :applicantID";
    $updateStatement = $connection->prepare($updateQuery);
    $updateStatement->bindParam(':status', $newStatus);
    $updateStatement->bindParam(':applicantID', $applicantID);

    if ($updateStatement->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $updateStatement->errorInfo()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
