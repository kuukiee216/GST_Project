<?PHP 
    // Path to db_config_local.php file relative
    $localConfigPath = '../../Essentials/db_config_local.php';

    // Require the db_config_local.php file
    require_once $localConfigPath;
    $clsConnect = new dbConnection();
    $connection = $clsConnect->dbConnect();

    SESSION_START();
    ERROR_REPORTING(0);

    // if(isset($_SESSION['AccountID']) && isset($_SESSION['Access']) && isset($_SESSION['Access']) == '2' && isset($_SESSION['CredentialID']) && 
    //    isset($_POST['ApplicationID'])){

        $AccountID = 1; //$_SESSION['AccountID'];
        $CredentialID = 1; //$_SESSION['CredentialID'];
        $ApplicationID = $_POST['ApplicationID'];

        try{
            date_default_timezone_set('Asia/Manila');
            $currentDateTime = date("Y/m/d H:i:s");

            $connection->beginTransaction();

            $sQrySubmitApplication = "UPDATE tbl_application SET Status = ? WHERE ApplicationID = ?;";
            $stmtSubmitApplication = $connection->prepare($sQrySubmitApplication);
            $stmtSubmitApplication->bindValue(1, 0, PDO::PARAM_INT);
            $stmtSubmitApplication->bindValue(2, $ApplicationID, PDO::PARAM_INT);
            $stmtSubmitApplication->execute();

            $sQryInsertLog = "INSERT INTO tbl_systemlog(DateTimeStamp,Action,Target,AccountID) VALUES(?,?,?,?);";
            $stmtInsertLog = $connection->prepare($sQryInsertLog);
            $stmtInsertLog->bindValue(1, $currentDateTime, PDO::PARAM_STR);
            $stmtInsertLog->bindValue(2, 'Submitted Application', PDO::PARAM_STR);
            $stmtInsertLog->bindValue(3, 'Application (Application ID: '.$ApplicationID.')', PDO::PARAM_STR);
            $stmtInsertLog->bindValue(4, $AccountID, PDO::PARAM_INT);
            $stmtInsertLog->execute();

            $connection->commit();
            ECHO "0";
        }
        catch(PDOException $e){
            $connection->rollBack();
            ECHO "2";
        }
    // }
    // else{
    //     ECHO "1";
    // }
?>