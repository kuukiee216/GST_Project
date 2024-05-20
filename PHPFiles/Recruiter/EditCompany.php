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
    if (isset($_POST['telephone']) && isset($_POST['country']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['postal'])) {
        $telephone = validate($_POST['telephone']);
        $country = validate($_POST['country']);
        $address = validate($_POST['address']);
        $city = validate($_POST['city']);
        $state = validate($_POST['state']);
        $postal = validate($_POST['postal']);
        $accountID = $_SESSION['AccountID'];

        // Update tbl_companyinfo
        try {
            $connection->beginTransaction();

            $stmtCheckCompanyID = $connection->prepare("SELECT CompanyID FROM tbl_employerinfo WHERE AccountID = :accountID");
            $stmtCheckCompanyID->bindParam(':accountID', $accountID, PDO::PARAM_INT);
            $stmtCheckCompanyID->execute();
            $companyId = $stmtCheckCompanyID->fetch(PDO::FETCH_ASSOC)['CompanyID'];

            $stmtUpdateCompanyInfo = $connection->prepare("UPDATE tbl_companyinfo SET ContactNumber1 = :telephone, country = :country, state = :state, city = :city, address_line = :address, postal = :postal WHERE CompanyID = :companyId");
            $stmtUpdateCompanyInfo->bindParam(':telephone', $telephone, PDO::PARAM_STR);
            $stmtUpdateCompanyInfo->bindParam(':country', $country, PDO::PARAM_STR);
            $stmtUpdateCompanyInfo->bindParam(':state', $state, PDO::PARAM_STR);
            $stmtUpdateCompanyInfo->bindParam(':city', $city, PDO::PARAM_STR);
            $stmtUpdateCompanyInfo->bindParam(':address', $address, PDO::PARAM_STR);
            $stmtUpdateCompanyInfo->bindParam(':postal', $postal, PDO::PARAM_INT);
            $stmtUpdateCompanyInfo->bindParam(':companyId', $companyId, PDO::PARAM_INT);
            $stmtUpdateCompanyInfo->execute();

            $connection->commit();
            
            echo "0"; // Success
            exit;
        } catch (PDOException $e) {
            $connection->rollBack();
            echo "2"; // Error updating company info
            exit;
        }
    } else {
        echo "3"; // Required fields are missing
        exit;
    }
} else {
    echo "4"; // Invalid request method
    exit;
}
?>
