<?php
require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();

if (!(isset($_SESSION['AccountID']) && isset($_SESSION['UserID']) && $_SESSION['Token'] == null)) {
    header('Location: ../recruiter/login.php');
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
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['number']) && isset($_POST['email'])) {
        $fname = validate($_POST['fname']);
        $lname = validate($_POST['lname']);
        $number = validate($_POST['number']);
        $email = validate($_POST['email']);
        $accountID = $_SESSION['AccountID'];

        // Update tbl_employerinfo
        try {

            $connection->beginTransaction();

            $stmtUpdateUserInfo = $connection->prepare("UPDATE tbl_employerinfo SET FirstName = :fname, LastName = :lname, Phone = :number, EmailAddress = :email WHERE AccountID = :accountID");
            $stmtUpdateUserInfo->bindParam(':fname', $fname, PDO::PARAM_STR);
            $stmtUpdateUserInfo->bindParam(':lname', $lname, PDO::PARAM_STR);
            $stmtUpdateUserInfo->bindParam(':number', $number, PDO::PARAM_STR);
            $stmtUpdateUserInfo->bindParam(':email', $email, PDO::PARAM_STR);
            $stmtUpdateUserInfo->bindParam(':accountID', $accountID, PDO::PARAM_INT);
            $stmtUpdateUserInfo->execute();

            $connection->commit();
        } catch (PDOException $e) {
            $connection->rollBack();
            echo "1"; // Error updating user info
            exit;
        }

        // Update tbl_account
        try {
            $stmtUpdateAccount = $connection->prepare("UPDATE tbl_account SET UserID = :email WHERE AccountID = :accountID");
            $stmtUpdateAccount->bindParam(':email', $email, PDO::PARAM_STR);
            $stmtUpdateAccount->bindParam(':accountID', $accountID, PDO::PARAM_INT);
            $stmtUpdateAccount->execute();
        } catch (PDOException $e) {
            echo "2"; // Error updating account info
            exit;
        }

        echo "0"; // Success
        exit;
    } else {
        echo "3";
        exit;
    }
} else {
    echo "4"; 
    exit;
}
?>
