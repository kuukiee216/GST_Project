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

        $CredentialID = $_SESSION['CredentialID'];

        try{
            $sQryGetPreferredLocations = "SELECT
                apl.PreferredLocationID,
                co.CountryName,
                pro.ProvinceName,
                ci.CityName
            FROM
                tbl_applicantpreference AS ap
            INNER JOIN
                tbl_applicantpreferredlocation AS apl ON apl.PreferenceID = ap.PreferenceID
            INNER JOIN
                tbl_country AS co ON co.CountryID = apl.CountryID
            INNER JOIN
                tbl_province AS pro ON pro.ProvinceID = apl.ProvinceID
            INNER JOIN
                tbl_city AS ci ON ci.CityID = apl.CityID
            WHERE
                ap.ApplicantID = :ApplicantID;";
            $stmtGetPreferredLocations = $connection->prepare($sQryGetPreferredLocations);
            $stmtGetPreferredLocations->bindValue(":ApplicantID", $CredentialID, PDO::PARAM_INT);
            $stmtGetPreferredLocations->execute();

            if($stmtGetPreferredLocations->rowCount() > 0){
                while($rowLocations = $stmtGetPreferredLocations->fetch(PDO::FETCH_ASSOC)){ 
                    
                    $location = $rowLocations['CityName'].', '.$rowLocations['ProvinceName'].', '.$rowLocations['CountryName'];
                ?>
                    <button class="btn btn-light btn-border btn-round shadow mx-2 my-2" id="btnRemovePreferredLocation<?PHP ECHO $rowLocations['PreferredLocationID']; ?>" onclick="removePreferredLocations(this.id);"><?PHP ECHO $location; ?> <i class="fas fa-times text-danger ml-3"></i></button>
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