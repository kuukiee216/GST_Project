<?php

require_once '../../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'Employer';
$Action = 'Add Company';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit();
}

if(isset($_POST['CompanyName']) && isset($_POST['CompanyEmail']) && isset($_POST['CompanyNumber']) && 
isset($_POST['CompanyNumber']) && isset($_POST['LocationCountry']) && isset($_POST['LocationState']) && 
isset($_POST['LocationCity'])){

    // $CompanyName = $_POST['CompanyName'];
    // $CompanyEmail = $_POST['CompanyEmail'];
    // $CompanyContact = $_POST['CompanyContact'];
    // $LocationCountry = $_POST['LocationCountry'];
    // $LocationState = $_POST['LocationState'];
    // $LocationCity = $_POST['LocationCity']; 

    // $Password = generateRandomString();

    $CompanyName = $_POST['CompanyName'];
    $CompanyEmail = $_POST['CompanyEmail'];
    $CompanyNumber = $_POST['CompanyNumber'];
    $CompanySite = $_POST['CompanySite'];
    $LocationCountry = $_POST['LocationCountry'];
    $LocationState = $_POST['LocationState'];
    $LocationCity = $_POST['LocationCity'];

    if($CompanyName == '' || $CompanyEmail == '' || $CompanyNumber == '' || $CompanySite == '' || 
    ($LocationCountry == NULL || $LocationState == NULL || $LocationCity == NULL)){
        echo '5';
        exit();
    }
    

    $connection->beginTransaction();
    try{

        $sQryFindEmailExist = "SELECT EmailAddress FROM tbl_companyinfo WHERE EmailAddress = ?";
        $stmtFindEmailExist = $connection->prepare($sQryFindEmailExist);
        $stmtFindEmailExist->bindValue(1, $CompanyEmail, PDO::PARAM_STR);
        $stmtFindEmailExist->execute();

        if($stmtFindEmailExist->rowCount() > 0){
            echo '4';
            exit();
        }
        
        // INSERT into tbl_companyinfo
        $sQryAddEmployerAccount = "INSERT INTO tbl_companyinfo(CompanyName, EmailAddress, ContactNumber1, country, state, city)
                                    VALUES (?, ?, ?, ?, ?, ?)";
        $stmtAddEmployerAccount = $connection->prepare($sQryAddEmployerAccount);
        $stmtAddEmployerAccount->bindValue(1, $CompanyName, PDO::PARAM_STR);
        $stmtAddEmployerAccount->bindValue(2, $CompanyEmail, PDO::PARAM_STR);
        $stmtAddEmployerAccount->bindValue(3, $CompanyNumber, PDO::PARAM_STR);
        $stmtAddEmployerAccount->bindValue(4, $LocationCountry, PDO::PARAM_INT);
        $stmtAddEmployerAccount->bindValue(5, $LocationState, PDO::PARAM_INT);
        $stmtAddEmployerAccount->bindValue(6, $LocationCity, PDO::PARAM_INT);
        $stmtAddEmployerAccount->execute();
        $connection->commit();

        echo '1';
    }catch(PDOException $err){
        echo $err;
    }

}else{
    echo '3';
}

?>