<?php
require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();

if (!isset($_SESSION['AccountID'])) {
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

if (isset($_POST['address']) && isset($_POST['emailadd'])) {
    $address = validate($_POST['address']);
    $emailadd = validate($_POST['emailadd']);

    if (empty($address)) {
        echo "2";
        exit;
    } elseif (empty($emailadd)) {
        echo "3";
        exit;
    } 

    try {
        $connection->beginTransaction();

        $accountID = $_SESSION['AccountID'];
        $stmtCheckUserID = $connection->prepare("SELECT CompanyID FROM tbl_employerinfo WHERE AccountID = ?");
        $stmtCheckUserID->bindParam(1, $accountID, PDO::PARAM_INT);
        $stmtCheckUserID->execute();
        $companyId = $stmtCheckUserID->fetch(PDO::FETCH_ASSOC)['CompanyID'];

        $query = "UPDATE tbl_companyinfo SET EmailAddress = :emailadd, address_line = :address WHERE CompanyID = :companyId";
        $statement = $connection->prepare($query);
        $statement->bindValue(':address', $address, PDO::PARAM_STR);
        $statement->bindValue(':emailadd', $emailadd, PDO::PARAM_STR);
        $statement->bindValue(':companyId', $companyId, PDO::PARAM_INT);
        $statement->execute();

        $connection->commit();

        echo "0";
        exit;
    } catch (PDOException $e) {
        $connection->rollBack();
        echo "1";
        exit;
    }
} else {
    echo "6";
    exit;
}
?>
