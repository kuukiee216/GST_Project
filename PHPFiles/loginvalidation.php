<?php
require_once 'Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['UserID']) && isset($_POST['Password'])) {
    $Email = validate($_POST['UserID']);
    $Password = validate($_POST['Password']);

    if (empty($Email)) {
        echo "2";
        die();
    } else if (empty($Password)) {
        echo "3";
        die();
    }

    try {
        $sQryValidateAccount = "SELECT
                    acc.AccountID,
                    acc.Role,
                    acc.UserID,
                    acc.Password,
                    acc.Token,
                    acc.Status,
                    ai.ApplicantID,
                    ai.LastName,
                    ai.FirstName
                FROM
                    tbl_account as acc
                LEFT JOIN
                    tbl_applicantinfo AS ai ON ai.AccountID = acc.AccountID
                WHERE
                    UserID = ?";
        $stmtValidateAccount = $connection->prepare($sQryValidateAccount);
        $stmtValidateAccount->bindValue(1, $Email, PDO::PARAM_STR);
        $stmtValidateAccount->execute();

        if ($stmtValidateAccount->rowCount() == 1) {
            $rowAccount = $stmtValidateAccount->fetch(PDO::FETCH_ASSOC);
            if (password_verify($Password, $rowAccount['Password'])) {
                if ($rowAccount['Role'] == 0) {
                    echo "0";
                } else if ($rowAccount['Role'] == 1) {
                    echo "5";
                } else if ($rowAccount['Role'] == 2) {
                    echo "4";
                } else {
                    echo "6";
                }

                date_default_timezone_set('Asia/Manila');
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (60 * 360);
                $_SESSION['Role'] = $rowAccount['Role'];
                $_SESSION['AccountID'] = $rowAccount['AccountID'];
                $_SESSION['Access'] = $rowAccount['Role'];
                $_SESSION['UserID'] = $rowAccount['UserID'];
                $_SESSION['Token'] = $rowAccount['Token'];
                $_SESSION['CredentialID'] = $rowAccount['ApplicantID'];

            } else {
                echo "9";
            }
        } else {
            echo "7";
        }
    } catch (PDOException $err) {
        echo "8";
    }
} else {
    echo "1";
}
