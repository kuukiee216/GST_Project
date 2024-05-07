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
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['number']) && isset($_POST['telephone']) && isset($_POST['country']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['postal'])) {
        $fname = validate($_POST['fname']);
        $lname = validate($_POST['lname']);
        $number = validate($_POST['number']);
        $telephone = validate($_POST['telephone']);
        $country = validate($_POST['country']);
        $address = validate($_POST['address']);
        $city = validate($_POST['city']);
        $state = validate($_POST['state']);
        $postal = validate($_POST['postal']);

        // Update tbl_employerinfo
        try {
            $connection->beginTransaction();

            $accountID = $_SESSION['AccountID'];
            $stmtCheckUserID = $connection->prepare("UPDATE tbl_employerinfo SET FirstName = :fname, LastName = :lname, Phone = :number WHERE AccountID = :accountID");
            $stmtCheckUserID->bindParam(':fname', $fname, PDO::PARAM_STR);
            $stmtCheckUserID->bindParam(':lname', $lname, PDO::PARAM_STR);
            $stmtCheckUserID->bindParam(':number', $number, PDO::PARAM_STR);
            $stmtCheckUserID->bindParam(':accountID', $accountID, PDO::PARAM_INT);
            $stmtCheckUserID->execute();

            $connection->commit();
        } catch (PDOException $e) {
            $connection->rollBack();
            echo "1"; // Error updating employer info
            exit;
        }

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
        } catch (PDOException $e) {
            $connection->rollBack();
            echo "2"; // Error updating company info
            exit;
        }

        echo "0"; // Success
        exit;
    } else {
        echo "3"; // Required fields are missing
        exit;
    }
} else {
    echo "4"; // Invalid request method
    exit;
}
?>
