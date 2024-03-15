<?php
require_once 'db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();
SESSION_START();
ERROR_REPORTING(0);
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'SMTP.php';
$sendEmail = new SMTPMail();

function generateRandomString($length = 30)
{
    $token = 'aAbBc1CdDeEfFgG2hHiIj3JkKl4LmMnN5oOpP6qQrRs7StTu8UvVwW9xXyY0zZ';
    $tokenLength = strlen($token);
    $randomString = "";

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, $tokenLength - 1);
        $randomString .= $token[$randomIndex];
    }

    return $randomString;
}

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = validate($_POST['UserID']);
    $Password = validate($_POST['Password']);

    if (empty($Email)) {
        echo "2";
        die();
    } elseif (empty($Password)) {
        echo "3";
        die();
    }

    $HashPass = password_hash($Password, PASSWORD_DEFAULT);

    try {

        $stmtCheckEmail = $connection->prepare("SELECT COUNT(*) FROM tbl_account WHERE UserID = ?");
        $stmtCheckEmail->execute([$Email]);
        $emailExists = $stmtCheckEmail->fetchColumn();

        if ($emailExists) {
            echo "6";
            die();
        }

        $Token = generateRandomString();
        $expirationTime = time() + 3600;
        $Token .= '_' . $expirationTime;

        $connection->beginTransaction();

        $sQrySignUp = "INSERT INTO tbl_account (UserID, Password, Token) VALUES (?, ?, ?)";
        $stmtSignUp = $connection->prepare($sQrySignUp);
        $stmtSignUp->bindValue(1, $Email, PDO::PARAM_STR);
        $stmtSignUp->bindValue(2, $HashPass, PDO::PARAM_STR);
        $stmtSignUp->bindValue(3, $Token, PDO::PARAM_STR);
        $stmtSignUp->execute();

        $accountID = $connection->lastInsertId();

        $sQryApplicantInfo = "INSERT INTO tbl_applicantinfo (AccountID, LastName, FirstName, MiddleName, EmailAddress) VALUES (?, '', '', '', ?)";
        $stmtApplicantInfo = $connection->prepare($sQryApplicantInfo);
        $stmtApplicantInfo->bindValue(1, $accountID, PDO::PARAM_INT);
        $stmtApplicantInfo->bindValue(2, $Email, PDO::PARAM_STR);
        $stmtApplicantInfo->execute();

        $connection->commit();

        $recipient = $Email;
        $subject = "Email Verification";
        $verificationLink = "http://localhost/GST_Project/applicant/thank_you.php?Token=$Token";
        $body = "Click <a href='$verificationLink' id='verificationLink'>here</a> to verify your account.";
        if ($sendEmail->sendMail($recipient, $subject, $body)) {
            echo "0";
        } else {
            echo "5";
        }
    } catch (PDOException $err) {
        $connection->rollback();
        echo "4";
    }
} else {
    echo "1";
}
