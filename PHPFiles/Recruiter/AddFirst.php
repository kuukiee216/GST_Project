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

if (
    isset($_POST['payType']) &&
    isset($_POST['currency']) &&
    isset($_POST['minPay']) &&
    isset($_POST['maxPay']) &&
    isset($_POST['hideSalary']) &&
    isset($_POST['advertisePrivately'])&&
    isset($_POST['jobTitle'])
) {
    $payType = $_POST['payType'];
    $currency = $_POST['currency'];
    $minPay = $_POST['minPay'];
    $maxPay = $_POST['maxPay'];
    $hideSalary = $_POST['hideSalary'];
    $advertisePrivately = $_POST['advertisePrivately'];
    $jobTitle = $_POST['jobTitle'];

    try {
        $connection->beginTransaction();

        $accountID = $_SESSION['AccountID'];
        $stmtCheckUserID = $connection->prepare("SELECT EmployerID FROM tbl_employerinfo WHERE AccountID = ?");
        $stmtCheckUserID->bindParam(1, $accountID, PDO::PARAM_INT);
        $stmtCheckUserID->execute();
        $companyId = $stmtCheckUserID->fetch(PDO::FETCH_ASSOC)['EmployerID'];

        $selectJobTitleQuery = "SELECT JobTitleName FROM tbl_jobtitle WHERE JobTitleId = :jobTitleId";
        $selectJobTitleStatement = $connection->prepare($selectJobTitleQuery);
        $selectJobTitleStatement->bindValue(':jobTitleId', $jobTitle, PDO::PARAM_INT);
        $selectJobTitleStatement->execute();
        $jobTitleName = $selectJobTitleStatement->fetch(PDO::FETCH_ASSOC)['JobTitleName'];


        $insertCompanyJobQuery = "INSERT INTO tbl_companyjob (EmployerID, JobTitle, Status)
        VALUES (:employerID,:jobTitle, :status)";
        $insertCompanyJobStatement = $connection->prepare($insertCompanyJobQuery);
        $insertCompanyJobStatement->bindValue(':employerID', $companyId, PDO::PARAM_STR);
        $insertCompanyJobStatement->bindValue(':jobTitle', $jobTitleName, PDO::PARAM_STR);
        $insertCompanyJobStatement->bindValue(':status', 4, PDO::PARAM_INT); 
        $insertCompanyJobStatement->execute();

        $lastInsertedJobID = $connection->lastInsertId();

        $insertSalaryQuery = "INSERT INTO tbl_jobsalary (JobID, SalaryTypeID, CurrencyID, Minimum, Maximum)
        VALUES (:jobID, :salaryTypeID, :currencyID, :minimum, :maximum)";
        $insertSalaryStatement = $connection->prepare($insertSalaryQuery);
        $insertSalaryStatement->bindValue(':jobID', $lastInsertedJobID, PDO::PARAM_INT);
        $insertSalaryStatement->bindValue(':salaryTypeID', $payType, PDO::PARAM_INT);
        $insertSalaryStatement->bindValue(':currencyID', $currency, PDO::PARAM_INT);
        $insertSalaryStatement->bindValue(':minimum', $minPay, PDO::PARAM_STR);
        $insertSalaryStatement->bindValue(':maximum', $maxPay, PDO::PARAM_STR);
        $insertSalaryStatement->execute();

        $lastInsertedSalaryID = $connection->lastInsertId();

        $updateCompanyJobQuery = "UPDATE tbl_companyjob SET SalaryID = :salaryID WHERE JobID = :jobID";
        $updateCompanyJobStatement = $connection->prepare($updateCompanyJobQuery);
        $updateCompanyJobStatement->bindValue(':salaryID', $lastInsertedSalaryID, PDO::PARAM_INT);
        $updateCompanyJobStatement->bindValue(':jobID', $lastInsertedJobID, PDO::PARAM_INT);
        $updateCompanyJobStatement->execute();

        $insertJobPostingQuery = "INSERT INTO tbl_jobposting (DateTimeStamp, JobID, DateTimeStampSpan, ViewCount, CompanyPrivacyStatus, SalaryPrivacyStatus)
        VALUES (NOW(), :jobID, '', 0, :companyPrivacyStatus, :salaryPrivacyStatus)";
        $insertJobPostingStatement = $connection->prepare($insertJobPostingQuery);
        $insertJobPostingStatement->bindValue(':jobID', $lastInsertedJobID, PDO::PARAM_INT);
        $insertJobPostingStatement->bindValue(':companyPrivacyStatus', $advertisePrivately, PDO::PARAM_INT);
        $insertJobPostingStatement->bindValue(':salaryPrivacyStatus', $hideSalary, PDO::PARAM_INT);
        $insertJobPostingStatement->execute();

        $connection->commit();

        echo json_encode(array("status" => "0", "jobID" => $lastInsertedJobID));
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
