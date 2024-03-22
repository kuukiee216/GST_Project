<?php
require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();

if (isset($_SESSION['AccountID'])) {
    $AccountID = $_SESSION['AccountID'];

    try {
        $sQryApplicantInfo = "SELECT EmailAddress FROM tbl_account as acc Inner Join tbl_applicantinfo as app on acc.AccountID = app.AccountID WHERE acc.AccountID = :AccountID";
        $stmtApplicantInfo = $connection->prepare($sQryApplicantInfo);
        $stmtApplicantInfo->bindParam(":AccountID", $AccountID, PDO::PARAM_INT);
        $stmtApplicantInfo->execute();

        $result = $stmtApplicantInfo->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $email = $result['EmailAddress'];
            echo $email;
        } else {
            echo "Email not found";
        }

    } catch (PDOException $err) {
        echo "Error fetching email";
    }

} else {
    echo "AccountID not set";
}
