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

if (isset($_POST['userID']) && isset($_POST['email'])) {
    $UserID = validate($_POST['userID']);
    $Email = validate($_POST['email']);

    if (empty($Email)) {
        echo "2";
        die();
    }

    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "4";
        exit;
    }

    try {
        $connection->beginTransaction();

        $sQryApplicantInfo = "UPDATE tbl_applicantinfo SET EmailAddress = :email WHERE EmailAddress = :userID;";
        $stmtApplicantInfo = $connection->prepare($sQryApplicantInfo);
        $stmtApplicantInfo->bindParam(":email", $Email, PDO::PARAM_STR);
        $stmtApplicantInfo->bindParam(":userID", $UserID, PDO::PARAM_STR);
        $stmtApplicantInfo->execute();

        $sQryUpdateAccount = "UPDATE tbl_account SET UserID = :email WHERE UserID = :userID;";
        $stmtUpdateAccount = $connection->prepare($sQryUpdateAccount);
        $stmtUpdateAccount->bindParam(":email", $Email, PDO::PARAM_STR);
        $stmtUpdateAccount->bindParam(":userID", $UserID, PDO::PARAM_STR);
        $stmtUpdateAccount->execute();

        echo "0";

        $connection->commit();
        $_SESSION['UserID'] = $Email;

    } catch (PDOException $err) {
        $connection->rollback();
        echo "Database Error: " . $err->getMessage();
        echo " (Error Code: " . $err->getCode() . ")";
        echo "3";

    }

} else {
    echo "1";
}
