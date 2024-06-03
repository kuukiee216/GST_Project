<?php

require_once '../../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'Employer';
$Action = 'Add Employer';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit();
}

if(isset($_POST['RepCompany']) && isset($_POST['RepFName']) && isset($_POST['RepMName']) && isset($_POST['RepLName']) && isset($_POST['RepEmail']) && isset($_POST['RepContact'])){

    // $CompanyName = $_POST['CompanyName'];
    // $CompanyEmail = $_POST['CompanyEmail'];
    // $CompanyContact = $_POST['CompanyContact'];
    // $LocationCountry = $_POST['LocationCountry'];
    // $LocationState = $_POST['LocationState'];
    // $LocationCity = $_POST['LocationCity']; 

    // $Password = generateRandomString();
    $Password = '$2y$10$Hy3P0BRbOI7dsC6qcttuduYRwp36Z0kulxHTUAHeIY.dUnlkPVRyy';
    $hashed_password = password_hash($Password, PASSWORD_BCRYPT);

    $RepFName = $_POST['RepFName'];
    $RepMName = $_POST['RepMName'];
    $RepLName = $_POST['RepLName'];
    $RepEmail = $_POST['RepEmail'];
    $RepContact = $_POST['RepContact'];
    $RepCompany = $_POST['RepCompany'];

    if($RepFName == '' || $RepLName == '' || $RepEmail == '' || $RepContact == '' || $RepCompany == ''){
        echo '5';
        exit();
    }
    

    $connection->beginTransaction();
    try{

        $sQryFindEmailExist = "SELECT UserID FROM tbl_account WHERE UserID = ?";
        $stmtFindEmailExist = $connection->prepare($sQryFindEmailExist);
        $stmtFindEmailExist->bindValue(1, $RepEmail, PDO::PARAM_STR);
        $stmtFindEmailExist->execute();

        if($stmtFindEmailExist->rowCount() > 0){
            echo '4';
            exit();
        }
        
        // INSERT into tbl_account
        $sQryAddEmployerAccount = "INSERT INTO tbl_account(Role, UserID, Password, Status, RegistrationDate)
                                    VALUES (2, ?, ?, 1, ?)";
        $stmtAddEmployerAccount = $connection->prepare($sQryAddEmployerAccount);
        $stmtAddEmployerAccount->bindValue(1, $RepEmail, PDO::PARAM_STR);
        $stmtAddEmployerAccount->bindValue(2, $hashed_password, PDO::PARAM_STR);
        $stmtAddEmployerAccount->bindValue(3, date('Y-m-d'), PDO::PARAM_STR);
        $stmtAddEmployerAccount->execute();

        // INSERT into tbl_companyinfo
        $sQryAddCompany = "INSERT INTO tbl_employerinfo (AccountID, LastName, FirstName, MiddleName, EmailAddress, Phone, CompanyID)
                            VALUES ((SELECT AccountID FROM tbl_account ORDER BY AccountID DESC LIMIT 1),
                                    ?, ?, ?, ?, ?, ?)";
        $stmtAddCompany = $connection->prepare($sQryAddCompany);
        $stmtAddCompany->bindValue(1, $RepLName, PDO::PARAM_STR);
        $stmtAddCompany->bindValue(2, $RepFName, PDO::PARAM_STR);
        $stmtAddCompany->bindValue(3, $RepMName, PDO::PARAM_STR);
        $stmtAddCompany->bindValue(4, $RepEmail, PDO::PARAM_STR);
        $stmtAddCompany->bindValue(5, $RepContact, PDO::PARAM_STR);
        $stmtAddCompany->bindValue(6, $RepCompany, PDO::PARAM_INT);
        $stmtAddCompany->execute();

        $connection->commit();
    }catch(PDOException $err){
        echo $err;
    }

}else{
    echo '3';
}

function generateRandomString($length = 6) {  // For Password
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charLength - 1)];
    }
    return $randomString;
}

?>