<?php
require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if (isset($_POST['adTypeID'])) {
    $adTypeID = $_POST['adTypeID'];

    $sql = "SELECT Price FROM tbl_adtype WHERE AdTypeID = :adTypeID";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':adTypeID', $adTypeID, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(['error' => 'Ad Type not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
