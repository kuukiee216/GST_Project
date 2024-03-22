<?php
session_start();

if (!(isset($_SESSION['AccountID']) && isset($_SESSION['UserID']) && $_SESSION['Token'] == null)) {
    header('Location: login.php');
    exit;
}

require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $streetAddress = $_POST['StreetAddress'];

    $sql = "UPDATE tbl_applicantinfo AS app
            JOIN tbl_account AS a ON a.UserID = app.EmailAddress
            JOIN tbl_location AS loc ON app.LocationID = loc.LocationID
            SET app.FirstName = :firstName, app.LastName = :lastName, loc.StreetAddress = :streetAddress
            WHERE a.UserID = :userID";

    try {
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':streetAddress', $streetAddress);
        $stmt->bindParam(':userID', $_SESSION['UserID']);
        $stmt->execute();

        echo json_encode(array("status" => "success", "message" => "Contact information updated successfully"));
    } catch (PDOException $e) {
        echo json_encode(array("status" => "error", "message" => "Error updating contact information: " . $e->getMessage()));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}
?>
