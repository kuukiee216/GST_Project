<?php
require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

try {
    $provinceID = $_POST['provinceID'];

    $sql = "SELECT CityID, CityName FROM tbl_city WHERE ProvinceID = :provinceID";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':provinceID', $provinceID, PDO::PARAM_INT);
    $stmt->execute();

    $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($cities);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
