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
                            qr.Question,
                            qi.Answer
                        FROM 
                            tbl_questionnaireinput AS qi
                        INNER JOIN
                            tbl_jobquestionnaire AS jq ON jq.JobQuestionnaireID = qi.JobQuestionnaireID 
                        INNER JOIN
                            tbl_questionnaire AS qr ON qr.QuestionnaireID = jq.QuestionnaireID
                        INNER JOIN
                            tbl_jobposting AS jp ON jp.JobID = jq.JobID
                        INNER JOIN
                            tbl_application AS app ON app.JobPostingID = jp.JobPostingID
                        WHERE
                            app.ApplicationID = ?";
        $stmtGetQA = $connection->prepare($sQryGetQA);
        $stmtGetQA->bindValue(1, $AID, PDO::PARAM_INT);
        $stmtGetQA->execute();
        
        if($stmtGetQA->rowCount() > 0){
            while($rowQA = $stmtGetQA->fetch(PDO::FETCH_ASSOC)){
                $rowData = array();

                $rowData['Question'] = $rowQA['Question'];
                $rowData['Answer'] = $rowQA['Answer'];

                $dataResult[] = $rowData;
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