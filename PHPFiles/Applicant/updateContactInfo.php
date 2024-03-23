<?php
require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();
session_start();

if (!(isset($_SESSION['AccountID']) && isset($_SESSION['UserID']) && $_SESSION['Token'] == null)) {
    header('Location: login.php');
    exit;
}

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = validate($_POST['firstName']);
    $lastName = validate($_POST['lastName']);
    $phoneNumber = validate($_POST['phoneNumber']);
    $country = validate($_POST['country']);
    $street = validate($_POST['street']);
    $city = validate($_POST['city']);
    $state = validate($_POST['state']);
    $postal = validate($_POST['postal']);

    if (empty($firstName) || empty($lastName) || empty($phoneNumber) || empty($country) || empty($street) || empty($city) || empty($state) || empty($postal)) {
        echo "2"; // Error code for empty fields
        exit; // Stop execution
    }

    try {
        // Begin transaction
        $connection->beginTransaction();

        // Update tbl_account
        $sqlAccount = "UPDATE tbl_account SET UserID = :email WHERE UserID = :email";
        $stmtAccount = $connection->prepare($sqlAccount);
        $stmtAccount->bindParam(':email', $_SESSION['UserID']);
        $stmtAccount->execute();

        // Update tbl_applicantinfo
        $sqlApplicantInfo = "UPDATE tbl_applicantinfo SET FirstName = :firstName, LastName = :lastName, Phone = :phoneNumber WHERE EmailAddress = :email";
        $stmtApplicantInfo = $connection->prepare($sqlApplicantInfo);
        $stmtApplicantInfo->bindParam(':firstName', $firstName);
        $stmtApplicantInfo->bindParam(':lastName', $lastName);
        $stmtApplicantInfo->bindParam(':phoneNumber', $phoneNumber);
        $stmtApplicantInfo->bindParam(':email', $_SESSION['UserID']);
        $stmtApplicantInfo->execute();

        // Update tbl_location
        $sqlLocation = "UPDATE tbl_location SET Country = :country, StreetAddress = :street, City = :city, Province = :state, ZipCode = :postal WHERE LocationID = (SELECT LocationID FROM tbl_applicantinfo WHERE EmailAddress = :email)";
        $stmtLocation = $connection->prepare($sqlLocation);
        $stmtLocation->bindParam(':country', $country);
        $stmtLocation->bindParam(':street', $street);
        $stmtLocation->bindParam(':city', $city);
        $stmtLocation->bindParam(':state', $state);
        $stmtLocation->bindParam(':postal', $postal);
        $stmtLocation->bindParam(':email', $_SESSION['UserID']);
        $stmtLocation->execute();

        // Commit the transaction
        $connection->commit();

        echo "0"; // Success code
    } catch (PDOException $e) {
        // Rollback the transaction on error
        echo "Error: " . $e->getMessage();

        $connection->rollBack();
        echo "1"; // Error code
    }
} else {
    echo "Invalid request"; // Error code
}
