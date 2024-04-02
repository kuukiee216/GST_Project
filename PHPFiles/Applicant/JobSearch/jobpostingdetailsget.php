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
    //    isset($_POST['JobID'])){

        $JobID = $_POST['JobID'];

        try{
            $sQryGetJobPostingDetails = "SELECT
                    cj.JobTitle,
                    ci.CompanyName,
                    l.City,
                    l.Province,
                    l.Country,
                    l.ZipCode,
                    jc.Classification,
                    c.Symbol,
                    js.Minimum,
                    js.Maximum,
                    jp.CompanyPrivacyStatus,
                    jp.SalaryPrivacyStatus,
                    cj.Summary,
                    GROUP_CONCAT(DISTINCT jq.Qualification SEPARATOR '|') AS Qualifications,
                    GROUP_CONCAT(DISTINCT jr.Requirement SEPARATOR '|') AS Requirements,
                    GROUP_CONCAT(DISTINCT q.Question SEPARATOR '|') AS Questionnaires
                FROM
                    tbl_companyjob AS cj
                INNER JOIN
                    tbl_employerinfo AS ei ON ei.EmployerID = cj.EmployerID
                INNER JOIN
                    tbl_companyinfo AS ci ON ci.CompanyID = ei.EmployerID
                INNER JOIN
                    tbl_location AS l ON l.LocationID = cj.LocationID
                INNER JOIN
                    tbl_jobclassification AS jc ON jc.ClassificationID = cj.ClassificationID
                INNER JOIN 
                    tbl_jobsalary AS js ON js.JobID = cj.JobID
                INNER JOIN
                    tbl_currency AS c ON c.CurrencyID = js.CurrencyID
                INNER JOIN
                    tbl_jobposting AS jp ON jp.JobID = cj.JobID
                INNER JOIN
                    tbl_jobqualifications AS jq ON jq.JobID = cj.JobID
                INNER JOIN
                    tbl_jobrequirements AS jr ON jr.JobID = cj.JobID
                LEFT JOIN
                    tbl_jobquestionnaire AS jquestion ON jquestion.JobID = cj.JobID
                LEFT JOIN
                    tbl_questionnaire AS q ON q.QuestionnaireID = jquestion.QuestionnaireID
                WHERE
                    cj.Status = '0' AND jquestion.RequirementStatus = '0' AND cj.JobID = ?
                GROUP BY
                    cj.JobTitle, ci.CompanyName, l.City, l.Province, l.Country, l.ZipCode,
                    jc.Classification, c.Symbol, js.Minimum, js.Maximum, jp.CompanyPrivacyStatus,
                    jp.SalaryPrivacyStatus, cj.Summary;";
            $stmtGetJobPostingDetails = $connection->prepare($sQryGetJobPostingDetails);
            $stmtGetJobPostingDetails->bindValue(1, $JobID, PDO::PARAM_INT);
            $stmtGetJobPostingDetails->execute();

            if($stmtGetJobPostingDetails->rowCount() == 1){
                $rowJobPostDetails = $stmtGetJobPostingDetails->fetch(PDO::FETCH_ASSOC);

                $dataResult = array();
                    
                $jobLocation = $rowJobPostDetails['City'].', '.$rowJobPostDetails['Province'].', '.$rowJobPostDetails['Country'].' '.$rowJobPostDetails['ZipCode'];
                $jobSalary = "";

                if(strlen($rowJobPostDetails['Maximum'])){
                    $jobSalary = '₱ '.number_format($rowJobPostDetails['Minimum'], 2).' - '.number_format($rowJobPostDetails['Maximum'], 2);
                }
                else{   
                    $jobSalary = '₱ '.number_format($rowJobPostDetails['Minimum'], 2);
                }

                $dataResult['JobTitle'] = $rowJobPostDetails['JobTitle'];
                $dataResult['CompanyName'] = ($rowJobPostDetails['CompanyPrivacyStatus'] == '0') ? $rowJobPostDetails['CompanyName'] : '';
                $dataResult['Location'] = $jobLocation;
                $dataResult['Salary'] = ($rowJobPostDetails['SalaryPrivacyStatus'] == '0') ? $jobSalary : '';
                $dataResult['Classification'] = $rowJobPostDetails['Classification'];
                $dataResult['Summary'] = $rowJobPostDetails['Summary'];
                
                $QualificationList = "";
                foreach(explode('|', $rowJobPostDetails['Qualifications']) as $qualification){
                    $QualificationList .= '<li>'.$qualification.'</li>';
                }
                $dataResult['Qualifications'] = $QualificationList;

               
                $RequirementList = "";
                foreach(explode('|', $rowJobPostDetails['Requirements']) as $requirement){
                    $RequirementList .= '<li>'.$requirement.'</li>';
                }
                $dataResult['Requirements'] = $RequirementList;

                $QuestionnairesList = "";
                foreach(explode('|', $rowJobPostDetails['Questionnaires']) as $question){
                    $QuestionnairesList .= '<li>'.$question.'</li>';
                }
                $dataResult['Questionnaires'] = $QuestionnairesList;

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
    // }
    // else{
    //     ECHO "1";
    // }
?>