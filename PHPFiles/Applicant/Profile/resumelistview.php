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
        isset($_POST['ApplicantDocumentID'])){

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y/m/d H:i:s");

        $ApplicantDocumentID = $_POST['ApplicantDocumentID'];

        try{
            $sQryGetResume = "SELECT
                    Location
                FROM
                    tbl_applicantdocuments
                WHERE
                    ApplicantDocumentID = :ApplicantDocumentID;";
            $stmtGetResume = $connection->prepare($sQryGetResume);
            $stmtGetResume->bindValue(":ApplicantDocumentID", $ApplicantDocumentID, PDO::PARAM_INT);
            $stmtGetResume->execute();

            if($stmtGetResume->rowCount() > 0){
                $rowResume = $stmtGetResume->fetch(PDO::FETCH_ASSOC); 
                
                $dataResult = array();

                $dataResult['ResumeURL'] = $rowResume['Location'];

                $jsonResult = json_encode($dataResult);
                ECHO $jsonResult;
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