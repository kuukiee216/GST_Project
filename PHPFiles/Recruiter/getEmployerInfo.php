<?php
require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();

if (isset($_SESSION['AccountID'])) {
    $AccountID = $_SESSION['AccountID'];

    try {
        $sQryApplicantInfo = "SELECT acc.UserID, emp.FirstName, emp.LastName, emp.Phone, cmi.CompanyName, cmi.ContactNumber1, cmi.EmailAddress, cmi.state, cmi.country, cmi.city, cmi.address_line, cmi.postal FROM tbl_account as acc Inner Join tbl_employerinfo as emp on acc.AccountID = emp.AccountID Inner Join tbl_companyinfo as cmi on emp.CompanyID = cmi.CompanyID WHERE acc.AccountID = :AccountID";
        $stmtApplicantInfo = $connection->prepare($sQryApplicantInfo);
        $stmtApplicantInfo->bindParam(":AccountID", $AccountID, PDO::PARAM_INT);
        $stmtApplicantInfo->execute();

        $result = $stmtApplicantInfo->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(["error" => "No data found"]);
        }

    } catch (PDOException $err) {
        echo json_encode(["error" => "Error fetching data"]);
    }

} else {
    echo json_encode(["error" => "AccountID not set"]);
}
