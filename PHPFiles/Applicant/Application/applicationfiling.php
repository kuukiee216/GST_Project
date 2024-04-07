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
    //    isset($_POST['JobPostingID'])){

        $AccountID = 1; //$_SESSION['AccountID'];
        $CredentialID = 1; //$_SESSION['CredentialID'];
        $JobPostingID = $_POST['JobPostingID'];

        try{
            $dataResult = array();

            $sQryCheckPreviousApplication = "SELECT MAX(ApplicationID) AS ApplicationID FROM tbl_application WHERE ApplicantID = ? AND JobPostingID = ? AND Status = '2'";
            $stmtCheckPreviousApplication = $connection->prepare($sQryCheckPreviousApplication);
            $stmtCheckPreviousApplication->bindValue(1, $CredentialID, PDO::PARAM_INT);
            $stmtCheckPreviousApplication->bindValue(2, $JobPostingID, PDO::PARAM_INT);
            $stmtCheckPreviousApplication->execute();

            $rowPreviousApplication = $stmtCheckPreviousApplication->fetch(PDO::FETCH_ASSOC);

            if($rowPreviousApplication['ApplicationID'] != null || strlen($rowPreviousApplication['ApplicationID']) > 0){
                
                $dataResult['ApplicationID'] = $rowPreviousApplication['ApplicationID'];
                $jsonResult = json_encode($dataResult);
                ECHO $jsonResult;
                die();
            }
            else{
                date_default_timezone_set('Asia/Manila');
                $currentDateTime = date("Y/m/d H:i:s");

                $connection->beginTransaction();

                $sQryFileApplication = "INSERT INTO tbl_application(ApplicantID,JobPostingID,ApplicantDocumentID,CoverLetterID,DateTimeStamp,Status) VALUES(?,?,?,?,?,?);";
                $stmtFileApplication = $connection->prepare($sQryFileApplication);
                $stmtFileApplication->bindValue(1, $CredentialID, PDO::PARAM_INT);
                $stmtFileApplication->bindValue(2, $JobPostingID, PDO::PARAM_INT);
                $stmtFileApplication->bindValue(3, 0, PDO::PARAM_INT);
                $stmtFileApplication->bindValue(4, 0, PDO::PARAM_INT);
                $stmtFileApplication->bindValue(5, $currentDateTime, PDO::PARAM_STR);
                $stmtFileApplication->bindValue(6, 2, PDO::PARAM_INT);
                $stmtFileApplication->execute();

                $createdApplicationID = $connection->lastInsertId();

                $sQryInsertLog = "INSERT INTO tbl_systemlog(DateTimeStamp,Action,Target,AccountID) VALUES(?,?,?,?);";
                $stmtInsertLog = $connection->prepare($sQryInsertLog);
                $stmtInsertLog->bindValue(1, $currentDateTime, PDO::PARAM_STR);
                $stmtInsertLog->bindValue(2, 'Filed Application', PDO::PARAM_STR);
                $stmtInsertLog->bindValue(3, 'Application (Application ID: '.$createdApplicationID.')', PDO::PARAM_STR);
                $stmtInsertLog->bindValue(4, $AccountID, PDO::PARAM_INT);
                $stmtInsertLog->execute();

                $connection->commit();

                $dataResult['ApplicationID'] = $createdApplicationID;
                $jsonResult = json_encode($dataResult);
                ECHO $jsonResult;
                die();
            }
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