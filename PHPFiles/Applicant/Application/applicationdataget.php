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
        isset($_POST['ApplicationID'])){

        $CredentialID = $_SESSION['CredentialID'];
        $ApplicationID = $_POST['ApplicationID'];

        try{
            $sQryGetApplicationData = "SELECT 
                    a.ApplicantDocumentID,
                    acl.Location AS CoverLetterFileName,
                    acl.CoverLetter,
                    (SELECT GROUP_CONCAT(QuestionnaireID SEPARATOR '|') FROM tbl_questionnaireanswer WHERE ApplicationID = 1) AS QuestionnaireIDs,
                    (SELECT GROUP_CONCAT(Answer SEPARATOR '|') FROM tbl_questionnaireanswer WHERE ApplicationID = 1) AS Answers
                FROM
                    tbl_application AS a
                LEFT JOIN
                    tbl_applicantdocuments AS ad ON ad.ApplicantDocumentID = a.ApplicantDocumentID
                LEFT JOIN
                    tbl_applicationcoverletter AS acl ON acl.CoverLetterID = a.CoverLetterID
                WHERE
                    a.ApplicationID = ? AND a.Status = '2'";
            $stmtGetApplicationData = $connection->prepare($sQryGetApplicationData);
            $stmtGetApplicationData->bindValue(1, $ApplicationID, PDO::PARAM_INT);
            $stmtGetApplicationData->execute();

            if($stmtGetApplicationData->rowCount() > 0){ 
                $rowApplicationData= $stmtGetApplicationData->fetch(PDO::FETCH_ASSOC);

                $dataResult = array();

                $dataResult['ApplicantDocumentID'] = (strlen($rowApplicationData['ApplicantDocumentID']) > 0) ? $rowApplicationData['ApplicantDocumentID'] : '';
                $dataResult['CoverLetterFileName'] = (strlen($rowApplicationData['CoverLetterFileName']) > 0) ? basename($rowApplicationData['CoverLetterFileName']) : '';
                $dataResult['CoverLetter'] = (strlen($rowApplicationData['CoverLetter']) > 0) ? $rowApplicationData['CoverLetter'] : '';
                $dataResult['QuestionnaireIDs'] = (strlen($rowApplicationData['QuestionnaireIDs']) > 0) ? $rowApplicationData['QuestionnaireIDs'] : '';
                $dataResult['Answers'] = (strlen($rowApplicationData['Answers']) > 0) ? $rowApplicationData['Answers'] : '';
                
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