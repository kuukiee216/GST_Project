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
            $sQryGetProfileDetails = "SELECT
                    ai.LastName,
                    ai.FirstName,
                    ai.MiddleName,
                    ai.Suffix,
                    ai.EmailAddress,
                    ai.ContactNumber,
                    co.CountryName,
                    pro.ProvinceName,
                    ci.CityName,
                    ap.RelocationStatus,
                    ap.ReadyToWorkStatus,
                    ap.SalaryRangeMin,
                    ap.SalaryRangeMax,
                    ap.WorkScheduleID,
                    ws.ScheduleName
                FROM
                    tbl_applicantinfo AS ai
                INNER JOIN
                    tbl_applicantlocation AS al ON al.ApplicantLocationID = ai.ApplicantLocationID
                INNER JOIN
                    tbl_applicantpreference AS ap ON ap.ApplicantID = ai.ApplicantID
                INNER JOIN
                    tbl_workschedule AS ws ON ws.WorkScheduleID = ap.WorkScheduleID
                INNER JOIN
                    tbl_country AS co ON co.CountryID = al.CountryID
                INNER JOIN
                    tbl_province AS pro ON pro.ProvinceID = al.ProvinceID
                INNER JOIN
                    tbl_city AS ci ON ci.CityID = al.CityID
                WHERE
                    ai.ApplicantID = :ApplicantID;";
            $stmtGetProfileDetails = $connection->prepare($sQryGetProfileDetails);
            $stmtGetProfileDetails->bindValue(":ApplicantID", $CredentialID, PDO::PARAM_INT);
            $stmtGetProfileDetails->execute();

            if($stmtGetProfileDetails->rowCount() == 1){
                $rowProfileDetails = $stmtGetProfileDetails->fetch(PDO::FETCH_ASSOC);

                $applicantName = $rowProfileDetails['FirstName'];

                if(strlen($rowProfileDetails['MiddleName']) > 0){
                    $applicantName .= ' ' . substr($rowProfileDetails['MiddleName'], 0, 1) . '. ';

                }

                $applicantName .=  (strlen($rowProfileDetails['Suffix']) > 0) ? $rowProfileDetails['LastName'] . ' ' . $rowProfileDetails['Suffix'] : $rowProfileDetails['LastName'];
                    
                $applicantAddress = $rowProfileDetails['CityName'].', '.$rowProfileDetails['ProvinceName'].', '.$rowProfileDetails['CountryName'];
                
                $preferredSalaryRange = "";

                if(strlen($rowProfileDetails['SalaryRangeMax'])){
                    $preferredSalaryRange = '₱ '.number_format($rowProfileDetails['SalaryRangeMin'], 2).' - '.number_format($rowProfileDetails['SalaryRangeMax'], 2);
                }
                else{
                    $preferredSalaryRange = '₱ '.number_format($rowProfileDetails['SalaryRangeMin'], 2);
                }

                $dataResult = array();

                $dataResult['ApplicantName'] = $applicantName;
                $dataResult['EmailAddress'] = $rowProfileDetails['EmailAddress'];
                $dataResult['ContactNumber'] = $rowProfileDetails['ContactNumber'];
                $dataResult['Address'] = $applicantAddress;
                $dataResult['ReadyToWorkStatus'] = $rowProfileDetails['ReadyToWorkStatus'];
                $dataResult['RelocationStatus'] = $rowProfileDetails['RelocationStatus'];
                $dataResult['PreferredSalaryRange'] = $preferredSalaryRange;
                $dataResult['PreferredWorkSchedule'] = $rowProfileDetails['WorkScheduleID'];
                $dataResult['PreferredWorkScheduleName'] = $rowProfileDetails['ScheduleName'];

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