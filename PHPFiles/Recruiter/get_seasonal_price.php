<?php
require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if (isset($_POST['seasonalID'])) {
    $seasonalID = $_POST['seasonalID'];

    try {
        $sql = "SELECT Price FROM tbl_seasonal WHERE SeasonalID = :seasonalID";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':seasonalID', $seasonalID, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['error' => 'No price found for the given SeasonalID.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}
?>
