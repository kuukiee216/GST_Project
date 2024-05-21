<?php
require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

try {
    $countryID = $_POST['countryID'];

    $sql = "SELECT ProvinceID, ProvinceName FROM tbl_province WHERE CountryID = :countryID";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':countryID', $countryID, PDO::PARAM_INT);
    $stmt->execute();

    $provinces = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($provinces);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
