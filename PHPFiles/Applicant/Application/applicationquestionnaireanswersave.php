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
    // isset($_POST['ApplicationID']) && isset($_POST['QuestionIDs']) && isset($_POST['Answers'])){

        $CredentialID = 1;
        $ApplicationID = $_POST['ApplicationID'];
        $QuestionID = $_POST['QuestionIDs'];
        $Answer = $_POST['Answers'];

        if(str_contains($QuestionID, '|')){
            $QuestionIDs = explode('|', substr($QuestionID, 0, strlen($QuestionID)-1));
            $Answers = explode('|', substr($Answer, 0, strlen($Answer)-1));

            try{
                $connection->beginTransaction();

                for($counter = 0; $counter < count($QuestionIDs); $counter++){

                    $sQryCheckAnswerExistence = "SELECT AnswerID FROM tbl_questionnaireanswer WHERE QuestionnaireID = ? AND ApplicationID = ?";
                    $stmtCheckAnswerExistence = $connection->prepare($sQryCheckAnswerExistence);
                    $stmtCheckAnswerExistence->bindValue(1, $QuestionIDs[$counter], PDO::PARAM_INT);
                    $stmtCheckAnswerExistence->bindValue(2, $ApplicationID, PDO::PARAM_INT);
                    $stmtCheckAnswerExistence->execute();

                    if($stmtCheckAnswerExistence->rowCount() == 1){
                        $rowAnswerID = $stmtCheckAnswerExistence->fetch(PDO::FETCH_ASSOC);

                        $sQryUpdateAnswer = "UPDATE tbl_questionnaireanswer SET Answer = ? WHERE AnswerID = ? AND QuestionnaireID = ? AND ApplicationID = ?;";
                        $stmtUpdateAnswer = $connection->prepare($sQryUpdateAnswer);
                        $stmtUpdateAnswer->bindValue(1, $Answers[$counter], PDO::PARAM_STR);
                        $stmtUpdateAnswer->bindValue(2, $rowAnswerID['AnswerID'], PDO::PARAM_INT);
                        $stmtUpdateAnswer->bindValue(3, $QuestionIDs[$counter], PDO::PARAM_INT);
                        $stmtUpdateAnswer->bindValue(4, $ApplicationID, PDO::PARAM_INT);
                        $stmtUpdateAnswer->execute();
                    }
                    else{
                        $sQrySaveAnswer = "INSERT INTO tbl_questionnaireanswer(QuestionnaireID,ApplicationID,Answer) VALUES(?,?,?);";
                        $stmtSaveAnswer = $connection->prepare($sQrySaveAnswer);
                        $stmtSaveAnswer->bindValue(1, $QuestionIDs[$counter], PDO::PARAM_INT);
                        $stmtSaveAnswer->bindValue(2, $ApplicationID, PDO::PARAM_INT);
                        $stmtSaveAnswer->bindValue(3, $Answers[$counter], PDO::PARAM_STR);
                        $stmtSaveAnswer->execute();
                    }
                }

                $connection->commit();
                ECHO "0";
                die();
            }
            catch(PDOException $er){
                $connection->rollBack();
                ECHO "2";
            }
            
        }
        else if(strlen($QuestionID) > 0){
            try{
                $connection->beginTransaction();

                $sQryCheckAnswerExistence = "SELECT AnswerID FROM tbl_questionnaireanswer WHERE QuestionnaireID = ? AND ApplicationID = ?";
                $stmtCheckAnswerExistence = $connection->prepare($sQryCheckAnswerExistence);
                $stmtCheckAnswerExistence->bindValue(1, $QuestionID, PDO::PARAM_INT);
                $stmtCheckAnswerExistence->bindValue(2, $ApplicationID, PDO::PARAM_INT);
                $stmtCheckAnswerExistence->execute();

                if($stmtCheckAnswerExistence->rowCount() == 1){
                    $rowAnswerID = $stmtCheckAnswerExistence->fetch(PDO::FETCH_ASSOC);

                    $sQryUpdateAnswer = "UPDATE tbl_questionnaireanswer SET Answer = ? WHERE QuestionnaireID = ? AND ApplicationID = ?;";
                    $stmtUpdateAnswer = $connection->prepare($sQryUpdateAnswer);
                    $stmtUpdateAnswer->bindValue(1, $Answer, PDO::PARAM_STR);
                    $stmtUpdateAnswer->bindValue(2, $QuestionID, PDO::PARAM_INT);
                    $stmtUpdateAnswer->bindValue(3, $ApplicationID, PDO::PARAM_INT);
                    $stmtUpdateAnswer->execute();

                    $connection->commit();
                    ECHO "0";
                    die();
                }
                else{
                    $sQrySaveAnswer = "INSERT INTO tbl_questionnaireanswer(QuestionnaireID,ApplicationID,Answer) VALUES(?,?,?);";
                    $stmtSaveAnswer = $connection->prepare($sQrySaveAnswer);
                    $stmtSaveAnswer->bindValue(1, $QuestionID, PDO::PARAM_INT);
                    $stmtSaveAnswer->bindValue(2, $ApplicationID, PDO::PARAM_INT);
                    $stmtSaveAnswer->bindValue(3, $Answer, PDO::PARAM_STR);
                    $stmtSaveAnswer->execute();

                    $connection->commit();
                    ECHO "0";
                    die();
                }
            }
            catch(PDOException $er){
                $connection->rollBack();
                ECHO "2";
            }
        }   
    // }
    // else{
    //     ECHO "1";
    // }
?>