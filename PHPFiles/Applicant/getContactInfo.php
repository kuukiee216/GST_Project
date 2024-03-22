<?php
require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();
session_start();

if (!(isset($_SESSION['AccountID']) && isset($_SESSION['AccountID']) && $_SESSION['Token'] == null)) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['UserID'];
$sql = "SELECT a.UserID, app.*, loc.*
        FROM tbl_account a
        JOIN tbl_applicantinfo app ON a.UserID = app.EmailAddress
        JOIN tbl_location loc ON app.LocationID = loc.LocationID
        WHERE a.UserID = :UserID";

try {
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':UserID', $userId, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
