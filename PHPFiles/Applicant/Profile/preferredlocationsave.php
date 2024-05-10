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
        isset($_POST['CountryID']) && isset($_POST['ProvinceID']) && isset($_POST['CityID'])){

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y/m/d H:i:s");

        $AccountID = $_SESSION['AccountID'];
        $CredentialID = $_SESSION['CredentialID'];
        $CountryID = $_POST['CountryID'];
        $ProvinceID = $_POST['ProvinceID'];
        $CityID = $_POST['CityID'];

        try{
            $connection->beginTransaction();

            $sQrySavePreferredLocations = "INSERT INTO tbl_applicantpreferredlocation(PreferenceID,CountryID,ProvinceID,CityID) VALUES((SELECT PreferenceID FROM tbl_applicantpreference WHERE ApplicantID = :ApplicantID), :CountryID, :ProvinceID, :CityID)";
            $stmtSavePreferredLocations = $connection->prepare($sQrySavePreferredLocations);
            $stmtSavePreferredLocations->bindValue(":ApplicantID", $CredentialID, PDO::PARAM_INT);
            $stmtSavePreferredLocations->bindValue(":CountryID", $CountryID, PDO::PARAM_INT);
            $stmtSavePreferredLocations->bindValue(":ProvinceID", $ProvinceID, PDO::PARAM_INT);
            $stmtSavePreferredLocations->bindValue(":CityID", $CityID, PDO::PARAM_INT);
            $stmtSavePreferredLocations->execute();

            $sQryInsertLog = "INSERT INTO tbl_systemlog(DateTimeStamp,Action,Target,AccountID) VALUES(?,?,?,?);";
            $stmtInsertLog = $connection->prepare($sQryInsertLog);
            $stmtInsertLog->bindValue(1, $currentDateTime, PDO::PARAM_STR);
            $stmtInsertLog->bindValue(2, 'Add', PDO::PARAM_STR);
            $stmtInsertLog->bindValue(3, 'Personal Preference (Location)', PDO::PARAM_STR);
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