<?PHP 
    // Path to db_config_local.php file relative
    $localConfigPath = '../../Essentials/db_config_local.php';

    // Require the db_config_local.php file
    require_once $localConfigPath;
    $clsConnect = new dbConnection();
    $connection = $clsConnect->dbConnect();

    SESSION_START();
    ERROR_REPORTING(0);

    if(isset($_SESSION['AccountID']) && isset($_SESSION['Access']) && $_SESSION['Access'] == '0' && isset($_SESSION['CredentialID'])){

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y/m/d H:i:s");

        try{
            $sQryGetLocationCountry = "SELECT
                    CountryID,
                    CountryName
                FROM
                    tbl_country";
            $stmtGetLocationCountry = $connection->prepare($sQryGetLocationCountry);
            $stmtGetLocationCountry->execute();

            if($stmtGetLocationCountry->rowCount() > 0){ ?>
                <option value="0" selected disabled>Select a Country</option>
            <?PHP
                while($rowLocationCountry = $stmtGetLocationCountry->fetch(PDO::FETCH_ASSOC)){ ?>

                    <option value="<?PHP ECHO $rowLocationCountry['CountryID']; ?>"><?PHP ECHO $rowLocationCountry['CountryName']; ?></option>

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