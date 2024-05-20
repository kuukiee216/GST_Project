<?php
require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();

if (!isset($_SESSION['AccountID'])) {
    header('Location: ../applicant/login.php');
    exit;
}

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['pass']) && isset($_POST['rpass'])) {
    $password = validate($_POST['pass']);
    $confirmPassword = validate($_POST['rpass']);

    if (empty($password)) {
        echo "2";
        exit;
    } elseif (empty($confirmPassword)) {
        echo "3";
        exit;
    } elseif ($password !== $confirmPassword) {
        echo "4";
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $accountID = $_SESSION['AccountID'];
        $query = "UPDATE tbl_account SET Password = :password WHERE AccountID = :accountID";
        $statement = $connection->prepare($query);
        $statement->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
        $statement->bindValue(':accountID', $accountID, PDO::PARAM_INT);
        $statement->execute();

        echo "0";
        exit;
    } catch (PDOException $e) {
        echo "1";
        exit;
    }
} else {
    echo "6";
    exit;
}
