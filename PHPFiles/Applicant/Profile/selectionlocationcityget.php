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
        isset($_POST['ProvinceID'])){

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y/m/d H:i:s");

        $ProvinceID = $_POST['ProvinceID'];

        try{
            $sQryGetLocationCity = "SELECT
                    ci.CityID,
                    ci.CityName
                FROM
                    tbl_city AS ci
                WHERE
                    ci.CityID NOT IN (
                        SELECT
                            CityID
                        FROM
                            tbl_applicantpreferredlocation
                        WHERE
                            PreferenceID = (SELECT PreferenceID FROM tbl_applicantpreference WHERE ApplicantID = :ApplicantID))
                    AND ProvinceID = :ProvinceID;";
            $stmtGetLocationCity = $connection->prepare($sQryGetLocationCity);
            $stmtGetLocationCity->bindValue(':ApplicantID', $CredentialID, PDO::PARAM_INT);
            $stmtGetLocationCity->bindValue(':ProvinceID', $ProvinceID, PDO::PARAM_INT);
            $stmtGetLocationCity->execute();

            if($stmtGetLocationCity->rowCount() > 0){ ?>
                <option value="0" selected disabled>Select a City</option>
            <?PHP
                while($rowLocationCity = $stmtGetLocationCity->fetch(PDO::FETCH_ASSOC)){ ?>

                    <option value="<?PHP ECHO $rowLocationCity['CityID']; ?>"><?PHP ECHO $rowLocationCity['CityName']; ?></option>

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