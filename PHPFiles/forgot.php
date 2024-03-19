<?php
require_once 'db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();
session_start();
error_reporting(0);

require_once 'SMTP.php';
$sendEmail = new SMTPMail();

function generateCode($length = 6)
{
    $code = 'aAbBc1CdDeEfFgG2hHiIj3JkKl4LmMnN5oOpP6qQrRs7StTu8UvVwW9xXyY0zZ';
    $codeLength = strlen($code);
    $randomString = "";

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, $codeLength - 1);
        $randomString .= $code[$randomIndex];
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
    $UserID = validate($_POST['UserID']);

    if (empty($UserID)) {
        echo "2";
        exit;
    }

    try {
        $connection->beginTransaction();

        $stmtCheckUserID = $connection->prepare("SELECT AccountID FROM tbl_account WHERE UserID = ?");
        $stmtCheckUserID->bindParam(1, $UserID, PDO::PARAM_STR);
        $stmtCheckUserID->execute();
        $accountID = $stmtCheckUserID->fetchColumn();

        if ($accountID) {
            $code = generateCode();

            $stmtInsertCode = $connection->prepare("INSERT INTO tbl_reset_pass (AccountID, code, created_at) VALUES (?, ?, NOW())");
            $stmtInsertCode->execute([$accountID, $code]);

            $recipient = $UserID;
            $subject = "Password Verification";
            $body = "Your Password Reset Verification is $code";
            if ($sendEmail->sendMail($recipient, $subject, $body)) {
                $_SESSION['code'] = $code;
                $connection->commit();
                echo "0";
            } else {
                $connection->rollback();
                echo "5";
            }
        } else {
            echo "6";
        }
    } catch (PDOException $err) {
        $connection->rollback();
        echo "4";
    }
} else {
    echo "1";
}
