<?php
require_once 'db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();
session_start();
error_reporting(0);

if (!isset($_SESSION['code'])) {
    echo "1";
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
    $inputCode = validate($_POST['code']);
    $sessionCode = validate($_SESSION['code']);

    if ($inputCode == $sessionCode) {
        try {
            $stmtCheckCode = $connection->prepare("SELECT AccountID FROM tbl_reset_pass WHERE code = ?");
            $stmtCheckCode->bindParam(1, $inputCode, PDO::PARAM_STR);
            $stmtCheckCode->execute();
            $accountID = $stmtCheckCode->fetchColumn();

            if ($accountID) {
                $_SESSION['AccountID'] = $accountID;
                unset($_SESSION['code']); 
                echo "0"; 
                exit;
            }
        } catch (PDOException $err) {
            echo "4"; 
            exit;
        }
    } else {
        echo "3";
        exit;
    }
} else {
    echo "6"; 
    exit;
}
