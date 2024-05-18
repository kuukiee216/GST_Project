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

if (isset($_POST['selectedQuestions']) && isset($_POST['JobID']) && isset($_POST['EmployerID'])) {
    $selectedQuestions = $_POST['selectedQuestions'];
    $jobID = validate($_POST['JobID']);
    $employerID = validate($_POST['EmployerID']);

    try {
        $connection->beginTransaction();

        foreach ($selectedQuestions as $question) {
            $questionnaireID = $question['QuestionnaireID'];
            $answer = $question['answer'];
            $requirementStatus = $question['RequirementStatus'];

            $stmt = $connection->prepare("INSERT INTO tbl_jobquestionnaire (QuestionnaireID, JobID, RequirementStatus) VALUES (?, ?, ?)");
            $stmt->execute([$questionnaireID, $jobID, $requirementStatus]);

            $stmt = $connection->prepare("INSERT INTO tbl_questionnaireexpectedanswer (QuestionnaireID, JobID, EmployerID, answer) VALUES (?, ?, ?, ?)");
            $stmt->execute([$questionnaireID, $jobID, $employerID, $answer]);
        }

        $connection->commit();
        echo json_encode(array("status" => "0", "jobID" => $jobID, "employerID" => $employerID));
        exit;
    } catch (PDOException $e) {
        $connection->rollBack();
        echo "1"; 
        exit;
    }
} else {
    echo "2";
    exit;
}
?>
