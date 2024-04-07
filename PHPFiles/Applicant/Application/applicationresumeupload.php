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
    // isset($_POST['ApplicationID'])  && isset($_FILES['ResumeDocument'])){

        $AccountID = 1; //$_SESSION['AccountID'];
        $CredentialID = 1; //$_SESSION['CredentialID'];
        $ApplicationID = $_POST['ApplicationID'];
        $ResumeDocument = $_FILES['ResumeDocument'];

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
                $fileName = $rowApplicantName['LastName'].'_'.$rowApplicantName['FirstName'].'_'.$rowApplicantName['MiddleName'].'_Resume';
                
                if($rowApplicantName['DocumentCount'] == 0){
                    $fileName .= '.pdf';
                }
                else{
                    $fileName .= '('.(intval($rowApplicantName['DocumentCount'])+1).').pdf';
                }

                $targetFile = $targetDirectory.basename($ResumeDocument["name"]);

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
                    if(move_uploaded_file($ResumeDocument["tmp_name"], $targetDirectory.$fileName)){
                        $fileLocation = $targetDirectory.$rowApplicantName['LastName'].'_'.$rowApplicantName['FirstName'].'_'.$rowApplicantName['MiddleName'].'_Resume';

                        if($rowApplicantName['DocumentCount'] == 0){
                            $fileLocation .= '.pdf';
                        }
                        else{
                            $fileLocation .= '('.(intval($rowApplicantName['DocumentCount'])+1).').pdf';
                        }

                        $connection->beginTransaction();

                        $sQryUploadDocument = "INSERT INTO tbl_applicantdocuments(ApplicantID,Location,DateTimeStamp) VALUES(?,?,?);";
                        $stmtUploadDocument = $connection->prepare($sQryUploadDocument);
                        $stmtUploadDocument->bindValue(1, $CredentialID, PDO::PARAM_INT);
                        $stmtUploadDocument->bindValue(2, $fileLocation, PDO::PARAM_STR);
                        $stmtUploadDocument->bindValue(3, $currentDateTime, PDO::PARAM_STR);
                        $stmtUploadDocument->execute();

                        $createdDocumentID = $connection->lastInsertId();

                        $sQryUpdateApplicationResume = "UPDATE tbl_application SET ApplicantDocumentID = ? WHERE ApplicationID = ?";
                        $stmtUpdateApplicationResume = $connection->prepare($sQryUpdateApplicationResume);
                        $stmtUpdateApplicationResume->bindValue(1, $createdDocumentID, PDO::PARAM_INT);
                        $stmtUpdateApplicationResume->bindValue(2, $ApplicationID, PDO::PARAM_INT);
                        $stmtUpdateApplicationResume->execute();

                        $sQryInsertLog = "INSERT INTO tbl_systemlog(DateTimeStamp,Action,Target,AccountID) VALUES(?,?,?,?);";
                        $stmtInsertLog = $connection->prepare($sQryInsertLog);
                        $stmtInsertLog->bindValue(1, $currentDateTime, PDO::PARAM_STR);
                        $stmtInsertLog->bindValue(2, 'Update Resume', PDO::PARAM_STR);
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
    // }
    // else{
    //     ECHO "1";
    // }
?>