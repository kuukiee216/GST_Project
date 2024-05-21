<?php
require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}
if(isset($_POST['ApplicationID'])){

    $AID = $_POST['ApplicationID'];
    $dataResult = array();
    try{

        $sQryGetQA = "SELECT 
                            COUNT(qr.Question) AS QuestionCount,
                            COUNT(qi.Answer) AS AnswerCount
                        FROM 
                            tbl_questionnaireinput AS qi
                        LEFT JOIN
                            tbl_jobquestionnaire AS jq ON jq.JobQuestionnaireID = qi.JobQuestionnaireID 
                        LEFT JOIN
                            tbl_questionnaire AS qr ON qr.QuestionnaireID = jq.QuestionnaireID
                        LEFT JOIN
                            tbl_jobposting AS jp ON jp.JobID = jq.JobID
                        LEFT JOIN
                            tbl_application AS app ON app.JobPostingID = jp.JobPostingID
                        WHERE
                            app.ApplicationID = ?";
        $stmtGetQA = $connection->prepare($sQryGetQA);
        $stmtGetQA->bindValue(1, $AID, PDO::PARAM_INT);
        $stmtGetQA->execute();
        
        if($stmtGetQA->rowCount() > 0){
            while($rowQA = $stmtGetQA->fetch(PDO::FETCH_ASSOC)){

                $dataResult['QuestionCount'] = $rowQA['QuestionCount'];
                $dataResult['AnswerCount'] = $rowQA['AnswerCount'];

            }

            $jsonDataResult = json_encode($dataResult);
            echo $jsonDataResult;

        }else{
            echo '2'; //Empty
        }
    
    }catch(PDOException $err){
        echo '3'; // PDO Exception
    }
}

?>