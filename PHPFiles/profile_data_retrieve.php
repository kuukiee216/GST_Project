<?php
require_once 'db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(isset($_SESSION['AccountID'])){
    $dataResult = array();
    $accountid = $_SESSION['AccountID'];

    $sQryGetProfileInfo = "SELECT 
                            ai.FirstName, 
                            ai.MiddleName, 
                            ai.LastName,
                            ai.EmailAddress,
                            ai.Phone,
                            ai.Country
                        FROM 
                            tbl_applicantinfo as ai
                        WHERE 
                            AccountID = ?";
    $stmtGetProfileInfo = $connection->prepare($sQryGetProfileInfo);
    $stmtGetProfileInfo->bindValue(1, $accountid, PDO::PARAM_STR);
    $stmtGetProfileInfo->execute();

    if ($stmtGetProfileInfo->rowCount() == 1) {
        $rowApplicantInfo = $stmtGetProfileInfo->fetch(PDO::FETCH_ASSOC);

        $fullName = "";

        if($rowApplicantInfo['MiddleName'] > 0){
            $fullName = $rowApplicantInfo['FirstName']. " " . $rowApplicantInfo['MiddleName']. " " .$rowApplicantInfo['LastName'];
        }else{
            $fullName = $rowApplicantInfo['FirstName']. " " . $rowApplicantInfo['LastName'];
        }

        $dataResult['FullName'] = $fullName;
        $dataResult['EmailAddress'] = $rowApplicantInfo['EmailAddress'];
        $dataResult['Phone'] = $rowApplicantInfo['Phone'];
        $dataResult['Country'] = $rowApplicantInfo['Country'];
        
        $jsonDataResult = json_encode($dataResult);

        echo $jsonDataResult; 
    } else{
        echo "ewan";

    } 
}else{
    echo "it failed";
}


?>