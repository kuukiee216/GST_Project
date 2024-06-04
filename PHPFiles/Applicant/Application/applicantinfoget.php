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

        $CredentialID = $_SESSION['CredentialID'];

        try{
            $sQryGetApplicantInformation = "SELECT 
                    ai.LastName,
                    ai.FirstName,
                    ai.MiddleName,
                    ai.Suffix,
                    ai.EmailAddress,
                    ai.ContactNumber,
                    ai.StreetAddress,
                    co.CountryName,
                    pro.ProvinceName,
                    ci.CityName
                FROM
                    tbl_applicantinfo AS ai
                INNER JOIN
                    tbl_applicantlocation AS al ON al.ApplicantLocationID = ai.ApplicantLocationID
                INNER JOIN
                    tbl_country AS co ON co.CountryID = al.CountryID
                INNER JOIN
                    tbl_province AS pro ON pro.ProvinceID = al.ProvinceID
                INNER JOIN
                    tbl_city AS ci ON ci.CityID = al.CityID
                WHERE
                    ai.ApplicantID = :ApplicantID;";
            $stmtGetApplicantInformation = $connection->prepare($sQryGetApplicantInformation);
            $stmtGetApplicantInformation->bindValue(":ApplicantID", $CredentialID, PDO::PARAM_INT);
            $stmtGetApplicantInformation->execute();

            if($stmtGetApplicantInformation->rowCount() == 1){
                $rowApplicantInformation = $stmtGetApplicantInformation->fetch(PDO::FETCH_ASSOC);

                $dataResult = array();

                $fullName = $rowApplicantInformation['LastName'].', '.$rowApplicantInformation['FirstName'];

                if(strlen($rowApplicantInformation['MiddleName']) > 0){
                    $fullName .= ' '.$rowApplicantInformation['MiddleName'];
                }

                if(strlen($rowApplicantInformation['Suffix']) > 0){
                    $fullName .= ' '.$rowApplicantInformation['Suffix'];
                }

                $dataResult['FullName'] = $fullName;
                $dataResult['EmailAddress'] = $rowApplicantInformation['EmailAddress'];
                $dataResult['ContactNumber'] = $rowApplicantInformation['ContactNumber'];
                
                $completeAddress = "";

                if(strlen($rowApplicantInformation['StreetAddress']) > 0){
                    $completeAddress = $rowApplicantInformation['StreetAddress'].' ';
                }

                $completeAddress .= $rowApplicantInformation['CityName'].', '.$rowApplicantInformation['ProvinceName'].', '.$rowApplicantInformation['CountryName'];

                $dataResult['CompleteAddress'] = $completeAddress;

                $jsonResult = json_encode($dataResult);

                ECHO $jsonResult;
            }
            else{
                ECHO "3";
            }
        }
        catch(PDOException $e){
            ECHO "2";
        }
    }
    else{
        ECHO "1";
    }
?>