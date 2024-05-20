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

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y/m/d H:i:s");

        $ApplicationID = $_POST['ApplicationID'];

        try{
            $sQryGetAppliedJobPostings = "SELECT DISTINCT
                    a.ApplicationID,
                    a.DateTimeStamp,
                    a.Status,
                    jp.JobPostingID,
                    cj.JobTitle,
                    ci.CompanyName,
                    class.Classification,
                    l.City,
                    l.Province,
                    l.Country,
                    l.ZipCode,
                    c.Symbol,
                    js.Minimum,
                    js.Maximum,
                    jp.CompanyPrivacyStatus,
                    jp.SalaryPrivacyStatus,
                    ad.Location AS ResumeLocation,
                    acl.Location AS CoverLetterLocation,
                    acl.CoverLetter,
                    GROUP_CONCAT(DISTINCT q.QuestionnaireID SEPARATOR '|') AS QuestionnaireIDs,
                    GROUP_CONCAT(DISTINCT q.Question SEPARATOR '|') AS Questionnaires,
                    GROUP_CONCAT(DISTINCT qa.QuestionnaireID SEPARATOR '|')AS QAnswerIDs,
                    GROUP_CONCAT(DISTINCT qa.Answer SEPARATOR '|')AS QAnswers
                FROM
                    tbl_application AS a
                INNER JOIN
                    tbl_jobposting AS jp ON jp.JobPostingID = a.JobPostingID
                INNER JOIN
                    tbl_companyjob AS cj ON cj.JobID = jp.JobID
                INNER JOIN
                    tbl_employerinfo AS ei ON ei.EmployerID = cj.EmployerID
                INNER JOIN
                    tbl_companyinfo AS ci ON ci.CompanyID = ei.EmployerID
                INNER JOIN
                    tbl_classification AS class ON class.ClassificationID = cj.ClassificationID
                INNER JOIN
                    tbl_location AS l ON l.LocationID = cj.LocationID
                INNER JOIN 
                    tbl_jobsalary AS js ON js.JobID = cj.JobID
                INNER JOIN
                    tbl_currency AS c ON c.CurrencyID = js.CurrencyID
                LEFT JOIN
                    tbl_applicantdocuments AS ad ON ad.ApplicantDocumentID = a.ApplicantDocumentID
                LEFT JOIN
                    tbl_applicationcoverletter AS acl ON acl.CoverLetterID = a.CoverLetterID
                INNER JOIN
                    tbl_jobquestionnaire AS jq ON jq.JobID = jp.JobID
                INNER JOIN 
                    tbl_questionnaire AS q ON q.QuestionnaireID = jq.QuestionnaireID
                INNER JOIN
                    tbl_questionnaireanswer AS qa ON qa.ApplicationID = a.ApplicationID
                WHERE
                    a.ApplicationID = :ApplicationID AND a.Status = '0';";
            $stmtGetAppliedJobPostings = $connection->prepare($sQryGetAppliedJobPostings);
            $stmtGetAppliedJobPostings->bindValue(":ApplicationID", $ApplicationID, PDO::PARAM_INT);
            $stmtGetAppliedJobPostings->execute();

            if($stmtGetAppliedJobPostings->rowCount() == 1){
                $rowAppliedJobPost = $stmtGetAppliedJobPostings->fetch(PDO::FETCH_ASSOC);
        
                $jobLocation = $rowAppliedJobPost['City'].', '.$rowAppliedJobPost['Province'].', '.$rowAppliedJobPost['Country'].' '.$rowAppliedJobPost['ZipCode'];
                $jobSalary = "";

                if(strlen($rowAppliedJobPost['Maximum'])){
                    $jobSalary = '₱ '.number_format($rowAppliedJobPost['Minimum'], 2).' - '.number_format($rowAppliedJobPost['Maximum'], 2);
                }
                else{
                    $jobSalary = '₱ '.number_format($rowAppliedJobPost['Minimum'], 2);
                }

                $dataResult = array();

                $dataResult['JobTitle'] = $rowAppliedJobPost['JobTitle'];
                $dataResult['CompanyName'] = ($rowAppliedJobPost['CompanyPrivacyStatus'] == '0') ? $rowAppliedJobPost['CompanyName'].'('.getDateTimeDifference($rowAppliedJobPost['DateTimeStamp'], $currentDateTime).')' : '';
                $dataResult['JobLocation'] = $jobLocation;
                $dataResult['Classification'] = $rowAppliedJobPost['Classification'];
                $dataResult['JobSalary'] = ($rowAppliedJobPost['SalaryPrivacyStatus'] == '0') ? $jobSalary : '';
                $dataResult['ResumeLocation'] = (strlen($rowAppliedJobPost['ResumeLocation']) > 0) ? basename($rowAppliedJobPost['ResumeLocation']) : '';
                $dataResult['CoverLetterLocation'] = (strlen($rowAppliedJobPost['CoverLetterLocation']) > 0) ? basename($rowAppliedJobPost['CoverLetterLocation']) : '';
                $dataResult['CoverLetter'] = (strlen($rowAppliedJobPost['CoverLetter']) > 0) ? basename($rowAppliedJobPost['CoverLetter']) : '';
                
                $QAs = "";

                if (str_contains($rowAppliedJobPost['QuestionnaireIDs'], '|')) {
                    $QuestionID = explode('|', $rowAppliedJobPost['QuestionnaireIDs']);
                    $Question = explode('|', $rowAppliedJobPost['Questionnaires']);

                    if (str_contains($rowAppliedJobPost['QAnswerIDs'], '|')) {
                        $AnswerQuestionID = explode('|', $rowAppliedJobPost['QAnswerIDs']);
                        $Answer = explode('|', $rowAppliedJobPost['QAnswers']);

                        for ($counter = 0; $counter < count($QuestionID); $counter++) {
                            $QAs .= '<div class="form-group form-group-default">
                                        <h5 class="font-weight-bold">' . ($counter + 1) . '. ' . $Question[$counter] . '</h5>
                                        <h4><b>Your Answer:</b> ' . (($AnswerQuestionID[$counter] == $QuestionID[$counter]) ? $Answer[$counter] : 'No Answer.') . '</h4>
                                    </div>';
                        }
                    } else {
                        $AnswerQuestionID = $rowAppliedJobPost['QAnswerIDs'];
                        $Answer = $rowAppliedJobPost['QAnswers'];
                        for ($counter = 0; $counter < count($QuestionID); $counter++) {
                            $QAs .= '<div class="form-group form-group-default">
                                        <h5 class="font-weight-bold">' . ($counter + 1) . '. ' . $Question[$counter] . '</h5>
                                        <h4><b>Your Answer:</b> ' . (($AnswerQuestionID == $QuestionID[$counter]) ? $Answer : 'No Answer.') . '</h4>
                                    </div>';
                        }
                    }
                } else if (strlen($rowAppliedJobPost['Questionnaires']) > 0) {
                    $QuestionID = $rowAppliedJobPost['QuestionnaireIDs'];
                    $Question = $rowAppliedJobPost['Questionnaires'];
                    $AnswerQuestionID = $rowAppliedJobPost['QAnswerIDs'];
                    $Answer = $rowAppliedJobPost['QAnswers'];

                    $QAs = '<div class="form-group form-group-default">
                                <h5 class="font-weight-bold">1. ' . $Question . '</h5>
                                <h4><b>Your Answer:</b> ' . (($AnswerQuestionID == $QuestionID) ? $Answer : 'No Answer.') . '</h4>
                            </div>';
                } else {
                    $QAs = "Job Posting has no employer questionnaires.";
                }

                $dataResult['QAs'] = $QAs;

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


    function getDateTimeDifference($appliedDateTime, $currentDateTime) {
        $interval = date_diff(date_create($appliedDateTime), date_create($currentDateTime));

        $result = "Applied ";
        
        if($interval->y > 0){
            $result .= $interval->y;
            $result .= ($interval->y > 1) ? ' years ago' : ' year ago';

            return $result;
        }
        else if($interval->m > 0){
            $result .= $interval->m;
            $result .= ($interval->m > 1) ? ' months ago' : ' month ago';

            return $result;
        }
        else if($interval->d >= 7){
            $weeks = floor($interval->d / 7);
            $result .=  $weeks;
            $result .= ($weeks > 1) ? ' weeks ago' : ' week ago';

            return $result;
        }
        else if($interval->d > 0){
            $result .= $interval->d;
            $result .= ($interval->d > 1) ? ' days ago' : ' day ago';

            return $result;
        }
        else{
            $hours = $interval->h + $interval->i / 60 + $interval->s / 3600;
            $result .= round($hours, 2);
            $result .= (round($hours, 2) > 1) ? ' hours ago' : ' hour ago';

            return $result;
        }
    }
?>