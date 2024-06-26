<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

if (isset($_POST['description']) && isset($_POST['search']) && isset($_POST['jobID']) && isset($_FILES["logo"]) && isset($_FILES["video"])) {
    $targetDir = "../../uploads/";
    $logoTargetFile = $targetDir . basename($_FILES["logo"]["name"]);
    $uploadOk = 1;
    $logoFileType = strtolower(pathinfo($logoTargetFile, PATHINFO_EXTENSION));

    if (file_exists($logoTargetFile)) {
        $uploadOk = 0;
    }

    if ($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" && $logoFileType != "gif") {
        $uploadOk = 0;
    }

    if ($uploadOk != 0 && move_uploaded_file($_FILES["logo"]["tmp_name"], $logoTargetFile)) {
        $logoPath = $logoTargetFile;
    } else {
        exit;
    }

    $videoTargetFile = $targetDir . basename($_FILES["video"]["name"]);
    $videoFileType = strtolower(pathinfo($videoTargetFile, PATHINFO_EXTENSION));

    if (file_exists($videoTargetFile)) {
        $uploadOk = 0;
    }

    if ($videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "mov" && $videoFileType != "wmv") {
        $uploadOk = 0;
    }

    if ($uploadOk != 0 && move_uploaded_file($_FILES["video"]["tmp_name"], $videoTargetFile)) {
        $videoPath = $videoTargetFile;
    } else {
        exit;
    }

    $description = validate($_POST['description']);
    $search = validate($_POST['search']);
    $jobID = validate($_POST['jobID']);
    $employerID = validate($_POST['employerID']);


    try {
        $insertCompanyJobQuery = "UPDATE tbl_companyjob SET LogoUrl = :logo, VideoUrl = :video, Description = :description, Summary = :search WHERE JobID = :jobID";
        $insertCompanyJobStatement = $connection->prepare($insertCompanyJobQuery);
        $insertCompanyJobStatement->bindParam(':logo', $logoPath, PDO::PARAM_STR);
        $insertCompanyJobStatement->bindParam(':video', $videoPath, PDO::PARAM_STR);
        $insertCompanyJobStatement->bindParam(':description', $description, PDO::PARAM_STR);
        $insertCompanyJobStatement->bindParam(':search', $search, PDO::PARAM_STR);
        $insertCompanyJobStatement->bindParam(':jobID', $jobID, PDO::PARAM_INT);
        $insertCompanyJobStatement->execute();
        echo json_encode(array("status" => "0", "jobID" => $jobID, "employerID" => $employerID));
        exit;
    } catch (PDOException $e) {
        echo "1";
        exit;
    }
} else {
    echo "6"; 
    exit;
}
