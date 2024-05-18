<?php

require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $question = $_POST['question'];

    if (empty($question)) {
        echo "2";
        exit();
    }

    try {
        $sQryInsertQuestion = "INSERT INTO tbl_questionnaire (Question) VALUES (:question)";
        $stmtInsertQuestion = $connection->prepare($sQryInsertQuestion);
        $stmtInsertQuestion->bindParam(':question', $question, PDO::PARAM_STR);

        if ($stmtInsertQuestion->execute()) {
            echo "0";
        } else {
            echo "1";
        }
    } catch (PDOException $err) {
        echo "1";
    }
} else {
    echo "1";
}
