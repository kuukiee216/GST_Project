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
    if (isset($_POST['JobID'])) {
        $jobID = validate($_POST['JobID']);

        // Update tbl_companyjob
        try {
            $connection->beginTransaction();

            $stmtUpdateJobStatus = $connection->prepare("UPDATE tbl_companyjob SET Status = 2 WHERE JobID = :jobID");
            $stmtUpdateJobStatus->bindParam(':jobID', $jobID, PDO::PARAM_INT);
            $stmtUpdateJobStatus->execute();

            $connection->commit();

            echo json_encode(['success' => true, 'message' => 'Job status updated successfully']);
            exit;
        } catch (PDOException $e) {
            $connection->rollBack();
            echo json_encode(['success' => false, 'message' => 'Error updating job status: ' . $e->getMessage()]);
            exit;
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'JobID is required']);
        exit;
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}
?>
