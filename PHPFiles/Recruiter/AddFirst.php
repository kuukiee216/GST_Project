<?php
require_once '../Essentials/db_config_local.php';
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

// Check if the necessary POST data is set
if (
    isset($_POST['payType']) &&
    isset($_POST['currency']) &&
    isset($_POST['minPay']) &&
    isset($_POST['maxPay']) &&
    isset($_POST['hideSalary']) &&
    isset($_POST['advertisePrivately'])
) {
    $payType = $_POST['payType'];
    $currency = $_POST['currency'];
    $minPay = $_POST['minPay'];
    $maxPay = $_POST['maxPay'];
    $hideSalary = $_POST['hideSalary'];
    $advertisePrivately = $_POST['advertisePrivately'];

    try {
        $connection->beginTransaction();

        // Retrieve EmployerID based on AccountID
        $accountID = $_SESSION['AccountID'];
        $stmtCheckUserID = $connection->prepare("SELECT EmployerID FROM tbl_employerinfo WHERE AccountID = ?");
        $stmtCheckUserID->bindParam(1, $accountID, PDO::PARAM_INT);
        $stmtCheckUserID->execute();
        $companyId = $stmtCheckUserID->fetch(PDO::FETCH_ASSOC)['EmployerID'];

        // Insert into tbl_companyjob with EmployerID and default Status
        $insertCompanyJobQuery = "INSERT INTO tbl_companyjob (EmployerID, Status)
        VALUES (:employerID, :status)";
        $insertCompanyJobStatement = $connection->prepare($insertCompanyJobQuery);
        $insertCompanyJobStatement->bindValue(':employerID', $companyId, PDO::PARAM_STR);
        $insertCompanyJobStatement->bindValue(':status', 4, PDO::PARAM_INT); // Set status to 0
        $insertCompanyJobStatement->execute();

        // Get the last inserted JobID
        $lastInsertedJobID = $connection->lastInsertId();

        // Insert into tbl_jobsalary with minimum, maximum, and currency
        $insertSalaryQuery = "INSERT INTO tbl_jobsalary (JobID, SalaryTypeID, CurrencyID, Minimum, Maximum)
        VALUES (:jobID, :salaryTypeID, :currencyID, :minimum, :maximum)";
        $insertSalaryStatement = $connection->prepare($insertSalaryQuery);
        $insertSalaryStatement->bindValue(':jobID', $lastInsertedJobID, PDO::PARAM_INT);
        $insertSalaryStatement->bindValue(':salaryTypeID', $payType, PDO::PARAM_INT);
        $insertSalaryStatement->bindValue(':currencyID', $currency, PDO::PARAM_INT);
        $insertSalaryStatement->bindValue(':minimum', $minPay, PDO::PARAM_STR);
        $insertSalaryStatement->bindValue(':maximum', $maxPay, PDO::PARAM_STR);
        $insertSalaryStatement->execute();

        // Retrieve the last inserted SalaryID
        $lastInsertedSalaryID = $connection->lastInsertId();

        // Update tbl_companyjob with the last inserted SalaryID
        $updateCompanyJobQuery = "UPDATE tbl_companyjob SET SalaryID = :salaryID WHERE JobID = :jobID";
        $updateCompanyJobStatement = $connection->prepare($updateCompanyJobQuery);
        $updateCompanyJobStatement->bindValue(':salaryID', $lastInsertedSalaryID, PDO::PARAM_INT);
        $updateCompanyJobStatement->bindValue(':jobID', $lastInsertedJobID, PDO::PARAM_INT);
        $updateCompanyJobStatement->execute();

        // Insert into tbl_jobposting with CompanyPrivacyStatus and SalaryPrivacyStatus
        $insertJobPostingQuery = "INSERT INTO tbl_jobposting (DateTimeStamp, JobID, DateTimeStampSpan, ViewCount, CompanyPrivacyStatus, SalaryPrivacyStatus)
        VALUES (NOW(), :jobID, '', 0, :companyPrivacyStatus, :salaryPrivacyStatus)";
        $insertJobPostingStatement = $connection->prepare($insertJobPostingQuery);
        $insertJobPostingStatement->bindValue(':jobID', $lastInsertedJobID, PDO::PARAM_INT);
        $insertJobPostingStatement->bindValue(':companyPrivacyStatus', $advertisePrivately, PDO::PARAM_INT); // Assuming $advertisePrivately holds the desired value for CompanyPrivacyStatus
        $insertJobPostingStatement->bindValue(':salaryPrivacyStatus', $hideSalary, PDO::PARAM_INT); // Assuming $hideSalary holds the desired value for SalaryPrivacyStatus
        $insertJobPostingStatement->execute();

        $connection->commit();

        echo "0"; // Success
        exit;
    } catch (PDOException $e) {
        $connection->rollBack();
        echo "1"; // Database error
        exit;
    }
} else {
    echo "6"; // POST data missing
    exit;
}
