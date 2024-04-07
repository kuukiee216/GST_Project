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
    // isset($_POST['JobPostingID'])){

        $CredentialID = 1;
        $JobPostingID = $_POST['JobPostingID'];

        try{
            $sQryGetJobQuestionnaire = "SELECT
                    jq.QuestionnaireID, 
                    q.Question,
                    jq.RequirementStatus
                FROM 
                    tbl_jobposting AS jp
                INNER JOIN
                    tbl_jobquestionnaire AS jq ON jq.JobID = jp.JobID
                INNER JOIN
                    tbl_questionnaire AS q ON q.QuestionnaireID = jq.QuestionnaireID
                WHERE
                    jp.JobPostingID = ?";
            $stmtGetJobQuestionnaire = $connection->prepare($sQryGetJobQuestionnaire);
            $stmtGetJobQuestionnaire->bindValue(1, $JobPostingID, PDO::PARAM_INT);
            $stmtGetJobQuestionnaire->execute();

            if($stmtGetJobQuestionnaire->rowCount() > 0){ 
                $questionCount = 1; ?>
                <h4 class="mb-3"><b>Instruction:</b> Kindly answer the question that has '<span class="text-danger font-weight-bold">*</span>'. It indicates that the employer requires applicant to answer it.</h4>
            <?PHP
                while($rowJobQuestionnaire = $stmtGetJobQuestionnaire->fetch(PDO::FETCH_ASSOC)){ ?>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-group-default">
                          <h5 class="mb-3 lblQuestionnaire"><b><?PHP ECHO $questionCount; ?>.</b> <?PHP ECHO $rowJobQuestionnaire['Question']; ?> <span class="text-danger font-weight-bold"><?PHP ECHO ($rowJobQuestionnaire['RequirementStatus'] == 1) ? '*' : ''; ?></span></h5>
                          <textarea name="txtAnswer" id="txtAnswer<?PHP ECHO $rowJobQuestionnaire['QuestionnaireID']; ?>" type="text" class="form-control" placeholder="Enter your answer here..." row="5" maxlength="200"></textarea>
                        </div>
                      </div>
                    </div>
            <?PHP
                    $questionCount+=1;
                }
            }
        }
        catch(PDOException $e){
            ECHO "2";
        }
    // }
    // else{
    //     ECHO "1";
    // }
?>