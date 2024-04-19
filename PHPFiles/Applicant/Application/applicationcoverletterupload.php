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
        isset($_POST['ApplicationID'])  && isset($_FILES['CoverLetterDocument'])){

        $AccountID = $_SESSION['AccountID'];
        $CredentialID = $_SESSION['CredentialID'];
        $ApplicationID = $_POST['ApplicationID'];
        $CoverLetterDocument = $_FILES['CoverLettereDocument'];

        try{
            date_default_timezone_set('Asia/Manila');
            $currentDateTime = date("Y/m/d H:i:s");

            $sQryGetApplicantName = "SELECT 
                    LastName, 
                    FirstName,
                    MiddleName,
                    (SELECT COUNT(ApplicantDocumentID) FROM tbl_applicantdocuments WHERE ApplicantID = :ApplicantID) AS DocumentCount
                FROM
                    tbl_applicantinfo
                WHERE
                    ApplicantID = :ApplicantID;";
            $stmtGetApplicantName = $connection->prepare($sQryGetApplicantName);
            $stmtGetApplicantName->bindValue(":ApplicantID", $CredentialID, PDO::PARAM_INT);
            $stmtGetApplicantName->execute();

            if($stmtGetApplicantName->rowCount() == 1){

                $rowApplicantName = $stmtGetApplicantName->fetch(PDO::FETCH_ASSOC);

                $targetDirectory = "C:/xampp/htdocs/GST_PROJECT/Documents/";
                //$targetDirectory = "../../Documents/"; // Directory where files will be uploaded
                //$targetDirectory = "/home/bscs4b-prs/htdocs/bscs4b-prs.online/GradeFiles/";
                $fileName = $rowApplicantName['LastName'].'_'.$rowApplicantName['FirstName'].'_'.$rowApplicantName['MiddleName'].'_CoverLetter';
                
                if($rowApplicantName['DocumentCount'] == 0){
                    $fileName .= '.pdf';
                }
                else{
                    $fileName .= '('.(intval($rowApplicantName['DocumentCount'])+1).').pdf';
                }

                $targetFile = $targetDirectory.basename($CoverLetterDocument["name"]);

                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                $uploadStatus = 0;

                // Check if file already exists
                if(file_exists($targetFile)){
                    if(unlink($targetFile)){
                        // do nothing
                    }
                    else{
                        $uploadStatus = 2;
                    }
                }

                // Allow certain file formats
                if($fileType != "pdf"){
                    $uploadStatus = 3;
                }

                if($uploadStatus == 0){
                    if(move_uploaded_file($CoverLetterDocument["tmp_name"], $targetDirectory.$fileName)){
                        $fileLocation = $targetDirectory.$rowApplicantName['LastName'].'_'.$rowApplicantName['FirstName'].'_'.$rowApplicantName['MiddleName'].'_CoverLetter';

                        if($rowApplicantName['DocumentCount'] == 0){
                            $fileLocation .= '.pdf';
                        }
                        else{
                            $fileLocation .= '('.(intval($rowApplicantName['DocumentCount'])+1).').pdf';
                        }

                        $connection->beginTransaction();

                        $sQryAddCoverLetterDocument = "INSERT INTO tbl_applicantdocuments(ApplicantID,Location,CoverLetter) VALUES(?,?,?);";
                        $stmtAddCoverLetterDocument = $connection->prepare($sQryAddCoverLetterDocument);
                        $stmtAddCoverLetterDocument->bindValue(1, $CredentialID, PDO::PARAM_INT);
                        $stmtAddCoverLetterDocument->bindValue(2, $fileLocation, PDO::PARAM_STR);
                        $stmtAddCoverLetterDocument->bindValue(3, $currentDateTime, PDO::PARAM_STR);
                        $stmtAddCoverLetterDocument->execute();

                        $createdCoverLetterID = $connection->lastInsertId();

                        $sQryUpdateApplicationCoverLetter = "UPDATE tbl_application SET CoverLetterID = ? WHERE ApplicationID = ?";
                        $stmtUpdateApplicationCoverLetter = $connection->prepare($sQryUpdateApplicationCoverLetter);
                        $stmtUpdateApplicationCoverLetter->bindValue(1, $createdCoverLetterID, PDO::PARAM_INT);
                        $stmtUpdateApplicationCoverLetter->bindValue(2, $ApplicationID, PDO::PARAM_INT);
                        $stmtUpdateApplicationCoverLetter->execute();

                        $sQryInsertLog = "INSERT INTO tbl_systemlog(DateTimeStamp,Action,Target,AccountID) VALUES(?,?,?,?);";
                        $stmtInsertLog = $connection->prepare($sQryInsertLog);
                        $stmtInsertLog->bindValue(1, $currentDateTime, PDO::PARAM_STR);
                        $stmtInsertLog->bindValue(2, 'Update Cover Letter', PDO::PARAM_STR);
                        $stmtInsertLog->bindValue(3, 'Application (Application ID: '.$ApplicationID.')', PDO::PARAM_STR);
                        $stmtInsertLog->bindValue(4, $AccountID, PDO::PARAM_INT);
                        $stmtInsertLog->execute();

                        $connection->commit();
                        ECHO "0";
                    }
                    else{
                        unlink($targetFile);
                        ECHO "2";
                        die();
                    }
                }
                else if($uploadStatus == 3){
                    unlink($targetFile);
                    ECHO "3";
                }
                else{
                    unlink($targetFile);
                    ECHO "3";
                }
            }
            else{
                ECHO "2";
            }
        }
        catch(PDOException $e){
            unlink($targetFile);
            $connection->rollBack();
            ECHO "2";
        }
    }
    else{
        ECHO "1";
    }
?>