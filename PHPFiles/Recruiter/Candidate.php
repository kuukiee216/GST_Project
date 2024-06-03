<?php
require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit();
}

session_start();
if (!isset($_SESSION['AccountID'])) {
    exit('Session AccountID not set');
}

$accountID = $_SESSION['AccountID'];

$employerIDQuery = "SELECT EmployerID FROM tbl_employerinfo WHERE AccountID = :accountID";
$employerIDStatement = $connection->prepare($employerIDQuery);
$employerIDStatement->bindParam(':accountID', $accountID);
if (!$employerIDStatement->execute()) {
    exit('Error executing employerID query: ' . $employerIDStatement->errorInfo()[2]);
}

$employerIDResult = $employerIDStatement->fetch(PDO::FETCH_ASSOC);
if (!$employerIDResult) {
    exit('No employer found for the current session');
}

$employerID = $employerIDResult['EmployerID'];

$jobPostingIDQuery = "SELECT JobID FROM tbl_companyjob WHERE EmployerID = :employerID";
$jobPostingIDStatement = $connection->prepare($jobPostingIDQuery);
$jobPostingIDStatement->bindParam(':employerID', $employerID);
if (!$jobPostingIDStatement->execute()) {
    exit('Error executing jobPostingID query: ' . $jobPostingIDStatement->errorInfo()[2]);
}

$jobIDs = $jobPostingIDStatement->fetchAll(PDO::FETCH_COLUMN);
$jobPostingIDs = [];

foreach ($jobIDs as $jobID) {
    $jobPostingIDQuery = "SELECT JobPostingID FROM tbl_jobposting WHERE JobID = :jobID";
    $jobPostingIDStatement = $connection->prepare($jobPostingIDQuery);
    $jobPostingIDStatement->bindParam(':jobID', $jobID);
    if (!$jobPostingIDStatement->execute()) {
        exit('Error executing jobPostingID query: ' . $jobPostingIDStatement->errorInfo()[2]);
    }
    $jobPostingIDs[] = $jobPostingIDStatement->fetchColumn();
}

$applications = [];
foreach ($jobPostingIDs as $jobPostingID) {
    $applicationQuery = "SELECT * FROM tbl_application WHERE JobPostingID = :jobPostingID";
    $applicationStatement = $connection->prepare($applicationQuery);
    $applicationStatement->bindParam(':jobPostingID', $jobPostingID);
    if (!$applicationStatement->execute()) {
        exit('Error executing application query: ' . $applicationStatement->errorInfo()[2]);
    }
    $applications = array_merge($applications, $applicationStatement->fetchAll(PDO::FETCH_ASSOC));
}

$distinctApplications = [];
foreach ($applications as $application) {
    $applicantID = $application['ApplicantID'];
    if (!isset($distinctApplications[$applicantID])) {
        $distinctApplications[$applicantID] = [];
    }
    $distinctApplications[$applicantID][] = $application;
}

$finalApplications = [];
foreach ($distinctApplications as $applicantID => $apps) {
    usort($apps, function($a, $b) {
        return strtotime($b['DateTimeStamp']) - strtotime($a['DateTimeStamp']);
    });

    $applicantQuery = "SELECT a.ApplicantID, a.FirstName, a.LastName, app.Status 
    FROM tbl_applicantinfo a 
    INNER JOIN tbl_application app ON app.ApplicantID = a.ApplicantID 
    WHERE a.ApplicantID = :applicantID 
    ORDER BY app.DateTimeStamp DESC";
    $applicantStatement = $connection->prepare($applicantQuery);
    $applicantStatement->bindParam(':applicantID', $applicantID);
    if (!$applicantStatement->execute()) {
        exit('Error executing applicant query: ' . $applicantStatement->errorInfo()[2]);
    }
    $applicantDetails = $applicantStatement->fetch(PDO::FETCH_ASSOC);

    $applicationData = [
        'ApplicantID' => $applicantDetails['ApplicantID'], // Include ApplicantID here
        'ApplicantName' => $applicantDetails['FirstName'] . ' ' . $applicantDetails['LastName'],
        'Status' => $applicantDetails['Status'],
        'MostRecentDate' => $apps[0]['DateTimeStamp'],
        'SecondMostRecentDate' => isset($apps[1]) ? $apps[1]['DateTimeStamp'] : 'N/A',
        'ApplicationID' => $apps[0]['ApplicationID'],
    ];

    $finalApplications[] = $applicationData;
}

header('Content-Type: application/json');
echo json_encode($finalApplications);
?>
