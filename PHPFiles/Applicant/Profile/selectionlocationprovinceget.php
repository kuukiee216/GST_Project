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
        isset($_POST['CountryID'])){

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y/m/d H:i:s");

        $CredentialID = $_SESSION['CredentialID'];
        $CountryID = $_POST['CountryID'];

        try{
            $sQryGetLocationProvince = "SELECT
                    pro.ProvinceID,
                    pro.ProvinceName
                FROM
                    tbl_province AS pro
                WHERE
                    pro.ProvinceID NOT IN (
                        SELECT
                            ProvinceID
                        FROM
                            tbl_applicantpreferredlocation
                        WHERE
                            PreferenceID = (SELECT PreferenceID FROM tbl_applicantpreference WHERE ApplicantID = :ApplicantID))
                    AND CountryID = :CountryID;";
            $stmtGetLocationProvince = $connection->prepare($sQryGetLocationProvince);
            $stmtGetLocationProvince->bindValue(":ApplicantID", $CredentialID, PDO::PARAM_INT);
            $stmtGetLocationProvince->bindValue(":CountryID", $CountryID, PDO::PARAM_INT);
            $stmtGetLocationProvince->execute();

            if($stmtGetLocationProvince->rowCount() > 0){ ?>
                <option value="0" selected disabled>Select a Province</option>
            <?PHP
                while($rowLocationProvince = $stmtGetLocationProvince->fetch(PDO::FETCH_ASSOC)){ ?>

                    <option value="<?PHP ECHO $rowLocationProvince['ProvinceID']; ?>"><?PHP ECHO $rowLocationProvince['ProvinceName']; ?></option>

            <?PHP                    
                }
            }
            else{
                ECHO 3;
            }
        }
        catch(PDOException $e){
            ECHO 2;
        }
    }
    else{
        ECHO 1;
    }
?>