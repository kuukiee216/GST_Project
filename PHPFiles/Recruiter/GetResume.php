<?php

require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit();
}

if (!isset($_POST['applicantID'])) {
    exit('No applicant ID provided');
}

$applicantID = $_POST['applicantID'];

// Prepare SQL query to retrieve resume file path based on ApplicantID
$resumeQuery = "SELECT Location FROM tbl_documents WHERE ApplicantID = :applicantID";
$resumeStatement = $connection->prepare($resumeQuery);
$resumeStatement->bindParam(':applicantID', $applicantID, PDO::PARAM_INT);
$resumeStatement->execute();
$resumePath = $resumeStatement->fetchColumn();

// Check if resume path is found
if ($resumePath) {
    // Serve the resume file
    $filePath = $resumePath; // Adjust this path based on your file structure
    echo json_encode(['filePath' => $filePath]); // Send the file path as JSON response
} else {
    exit('No resume found for the given applicant ID');
}
?>
