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
            $sQryGetApplicantResumes = "SELECT 
                    ApplicantDocumentID,
                    Location,
                    DateTimeStamp
                FROM
                    tbl_applicantdocuments
                WHERE
                    ApplicantID = :ApplicantID;";
            $stmtGetApplicantResumes = $connection->prepare($sQryGetApplicantResumes);
            $stmtGetApplicantResumes->bindValue(":ApplicantID", $CredentialID, PDO::PARAM_INT);
            $stmtGetApplicantResumes->execute();

            if($stmtGetApplicantResumes->rowCount() > 0){ ?>
                <option value="0" selected disabled>Select Your Resume</option>
            <?PHP
                while($rowApplicantResumes= $stmtGetApplicantResumes->fetch(PDO::FETCH_ASSOC)){ 
                
                    $locationURL = $rowApplicantResumes['Location'];
                    $documentName = basename($locationURL);
                    $dateTimeStamp = strtotime($rowApplicantResumes['DateTimeStamp']);
                    $resumeDate = date('M d, Y', $dateTimeStamp);
                    ?>
                    <option value="<?PHP ECHO $ApplicantDocumentID; ?>"><?PHP ECHO $documentName; ?> (<?PHP ECHO $resumeDate; ?>)</option>
            <?PHP    
                }
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