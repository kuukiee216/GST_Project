<?php
require_once 'db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();


function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['UserEmail']) && isset($_POST['UserFname']) && isset($_POST['UserLname']) && isset($_POST['UserPhone']) && isset($_POST['UserCountry'])) {

        $Email = validate($_POST['UserEmail']);
        $Fname = validate($_POST['UserFname']);
        $Lname = validate($_POST['UserLname']);
        $Phone = validate($_POST['UserPhone']);
        $Country = validate($_POST['UserCountry']);

        if (empty($Email)) {
            echo "2";
            die();
        } else if (empty($Fname)) {
            echo "3";
            die();
        } else if (empty($Lname)) {
            echo "4";
            die();
        } else if (empty($Phone)) {
            echo "5";
            die();
        } else if (empty($Country)) {
            echo "6";
            die();
        } 

    try{
        $connection->beginTransaction();
 
        $sQryApplicantInfo = "UPDATE tbl_applicantinfo SET LastName = :lastname, FirstName = :firstname, Phone = :phone, 
        Country = :country WHERE EmailAddress = :email;";
            $stmtApplicantInfo = $connection->prepare($sQryApplicantInfo);
            $stmtApplicantInfo->bindParam(":lastname", $Lname, PDO::PARAM_STR);
            $stmtApplicantInfo->bindParam(":firstname", $Fname, PDO::PARAM_STR);
            $stmtApplicantInfo->bindParam(":email", $Email, PDO::PARAM_STR);
            $stmtApplicantInfo->bindParam(":phone", $Phone, PDO::PARAM_STR);
            $stmtApplicantInfo->bindParam(":country", $Country, PDO::PARAM_STR);

            $stmtApplicantInfo->execute();

        $sQryUpdateToken = "UPDATE tbl_account SET Token = NULL WHERE UserID = :email;";
                $stmtUpdateToken = $connection->prepare($sQryApplicantInfo);
                $stmtUpdateToken->bindParam(":email", $Email, PDO::PARAM_STR);
        
                $stmtUpdateToken->execute();

        $sQryGetSessionInfo = "SELECT
                    acc.AccountID,
                    acc.Role,
                    acc.Token
                FROM
                    tbl_account as acc
                WHERE
                    UserID = ?";
        $stmtSetSessionInfo = $connection->prepare(GetSessionInfo);
        $stmtSetSessionInfo->bindValue(1, $Email, PDO::PARAM_STR);
        $stmtSetSessionInfo->execute();
        
        if ($stmtSetSessionInfo->rowCount() == 1) {
            $rowAccount = $stmtSetSessionInfo->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['AccountID'] = $rowAccount['AccountID'];
                    $_SESSION['Role'] = $rowAccount['Role'];
                    $_SESSION['Token'] = $rowAccount['Token'];
        }
        echo "0";

        $connection->commit();
        
    }catch (PDOException $err) {
        echo "8";

    }

} else {
    echo "1";
}
?>