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
       isset($_POST['JobPostingID'])){

        $JobPostingID = $_POST['JobPostingID'];

        try{
            $sQryGetJobPostingDetails = "SELECT
                    cj.JobTitle,
                    ci.CompanyName,
                    co.CountryName,
                    pro.ProvinceName,
                    city.CityName,
                    class.Classification,
                    GROUP_CONCAT(DISTINCT subclass.Classification) AS SubClassification,
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
                    tbl_jobposting AS jp
                INNER JOIN
                    tbl_companyjob AS cj ON cj.JobID = jp.JobID
                INNER JOIN
                    tbl_employerinfo AS ei ON ei.EmployerID = cj.EmployerID
                INNER JOIN
                    tbl_companyinfo AS ci ON ci.CompanyID = ei.EmployerID
                INNER JOIN
                    tbl_joblocation AS jl ON jp.JobPostingID = jp.JobPostingID
                INNER JOIN
                    tbl_country AS co ON co.CountryID = jl.CountryID
                INNER JOIN
                    tbl_province AS pro ON pro.ProvinceID = jl.ProvinceID
                INNER JOIN
                    tbl_city AS city ON city.CityID = jl.CityID
                INNER JOIN
                    tbl_classification AS class ON class.ClassificationID = cj.ClassificationID
                INNER JOIN
                    tbl_jobclassification AS jc ON jc.JobID = cj.JobID 
                INNER JOIN
                    tbl_subclassification AS subclass ON subclass.ClassificationID = jc.SubClassificationID
                INNER JOIN
                    tbl_jobsalary AS js ON js.JobID = cj.JobID
                INNER JOIN
                    tbl_currency AS c ON c.CurrencyID = js.CurrencyID
                INNER JOIN
                    tbl_jobqualifications AS jq ON jq.JobID = cj.JobID
                INNER JOIN
                    tbl_jobrequirements AS jr ON jr.JobID = cj.JobID
                LEFT JOIN
                    tbl_jobquestionnaire AS jquestion ON jquestion.JobID = cj.JobID
                LEFT JOIN
                    tbl_questionnaire AS q ON q.QuestionnaireID = jquestion.QuestionnaireID
                WHERE
                    cj.Status = '0' AND jquestion.RequirementStatus = '0' AND jp.JobPostingID = ?
                GROUP BY
                    cj.JobID;";
            $stmtGetJobPostingDetails = $connection->prepare($sQryGetJobPostingDetails);
            $stmtGetJobPostingDetails->bindValue(1, $JobPostingID, PDO::PARAM_INT);
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
                $dataResult['SubClassification'] = '('.$rowJobPostDetails['SubClassification'].')';
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
    }
    else{
        ECHO "1";
    }
?>