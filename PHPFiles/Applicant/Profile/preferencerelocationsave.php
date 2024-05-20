<?PHP 
    // Path to db_config_local.php file relative
    $localConfigPath = '../../Essentials/db_config_local.php';

    // Require the db_config_local.php file
    require_once $localConfigPath;
    $clsConnect = new dbConnection();
    $connection = $clsConnect->dbConnect();

    SESSION_START();
    ERROR_REPORTING(0);

    if(isset($_SESSION['AccountID']) && isset($_SESSION['Access']) && $_SESSION['Access'] == '0' && isset($_SESSION['CredentialID']) && 
        isset($_POST['FlagResult'])){

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y/m/d H:i:s");

        $AccountID = $_SESSION['AccountID'];
        $CredentialID = $_SESSION['CredentialID'];
        $flagResult = $_POST['FlagResult'];

        try{
            $connection->beginTransaction();

            $sQryUpdatePreferredRelocation = "UPDATE tbl_applicantpreference SET RelocationStatus = ? WHERE ApplicantID = ?;";
            $stmtUpdatePreferredRelocation = $connection->prepare($sQryUpdatePreferredRelocation);
            $stmtUpdatePreferredRelocation->bindValue(1, $flagResult, PDO::PARAM_INT);
            $stmtUpdatePreferredRelocation->bindValue(2, $CredentialID, PDO::PARAM_STR);
            $stmtUpdatePreferredRelocation->execute();

            $sQryInsertLog = "INSERT INTO tbl_systemlog(DateTimeStamp,Action,Target,AccountID) VALUES(?,?,?,?);";
            $stmtInsertLog = $connection->prepare($sQryInsertLog);
            $stmtInsertLog->bindValue(1, $currentDateTime, PDO::PARAM_STR);
            $stmtInsertLog->bindValue(2, 'Update', PDO::PARAM_STR);
            $stmtInsertLog->bindValue(3, 'Personal Preference (Relocation)', PDO::PARAM_STR);
            $stmtInsertLog->bindValue(4, $AccountID, PDO::PARAM_INT);
            $stmtInsertLog->execute();

            $connection->commit();
            ECHO 0;
        }
        catch(PDOException $e){
            $connection->rollBack();
            ECHO 2;
        }
    }
    else{
        ECHO 1;
    }
?>