<?php
require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

try {
    $sql = "SELECT CountryID, CountryName FROM tbl_country";
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($countries);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
