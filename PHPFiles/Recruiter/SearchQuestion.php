<?php
require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $searchQuery = $_POST['searchQuery'];

    try {
        $sQrySearchQuestion = "SELECT * FROM tbl_questionnaire WHERE Question LIKE :searchQuery";
        $stmtSearchQuestion = $connection->prepare($sQrySearchQuestion);
        $stmtSearchQuestion->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
        $stmtSearchQuestion->execute();
        $results = $stmtSearchQuestion->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($results);
    } catch (PDOException $err) {
        echo json_encode(["error" => $err->getMessage()]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}
?>
