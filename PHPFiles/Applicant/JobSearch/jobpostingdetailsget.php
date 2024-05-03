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

        $CredentialID = $_SESSION['CredentialID'];
        $JobPostingID = $_POST['JobPostingID'];

        try{
            $connection->beginTransaction();

            date_default_timezone_set('Asia/Manila');
            $currentDateTime = date("Y/m/d H:i:s");
            $currentDate = date("Y/m/d");

            $sQryCheckExistingView = "SELECT COUNT(ViewID) AS ViewCount FROM tbl_jobpostingviews WHERE ApplicantID = ? AND JobPostingID = ? AND DateTimeStamp LIKE ?";
            $stmtCheckExistingView = $connection->prepare($sQryCheckExistingView);
            $stmtCheckExistingView->bindValue(1, $CredentialID, PDO::PARAM_INT);
            $stmtCheckExistingView->bindValue(2, $JobPostingID, PDO::PARAM_INT);
            $stmtCheckExistingView->bindValue(3, "%$currentDate%", PDO::PARAM_STR);
            $stmtCheckExistingView->execute();

            $rowJobPostViewCount = $stmtCheckExistingView->fetch(PDO::FETCH_ASSOC);

            if($rowJobPostViewCount['ViewCount'] == 0){
                $sQryAddJobPostingView = "INSERT INTO tbl_jobpostingviews(DateTimeStamp,JobPostingID,ApplicantID) VALUES(?,?,?);";
                $stmtAddJobPostingView = $connection->prepare($sQryAddJobPostingView);
                $stmtAddJobPostingView->bindValue(1, $currentDateTime, PDO::PARAM_STR);
                $stmtAddJobPostingView->bindValue(2, $JobPostingID, PDO::PARAM_INT);
                $stmtAddJobPostingView->bindValue(3, $CredentialID, PDO::PARAM_INT);
                $stmtAddJobPostingView->execute();
            }

            $sQryGetJobPostingDetails = "SELECT
                    cj.JobTitle,
                    ci.CompanyName,
                    city.CityName,
                    pro.ProvinceName,
                    co.CountryName,
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
                    tbl_companyjoblocation AS cjl ON cjl.JobID = cj.JobID
                INNER JOIN
                    tbl_country AS co ON co.CountryID = cjl.CountryID
                INNER JOIN
                    tbl_province AS pro ON pro.ProvinceID = cjl.ProvinceID
                INNER JOIN
                    tbl_city AS city ON city.CityID = cjl.CityID
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
                    cj.JobTitle, ci.CompanyName, city.CityName, pro.ProvinceName, co.CountryName,
                    class.Classification, c.Symbol, js.Minimum, js.Maximum, jp.CompanyPrivacyStatus,
                    jp.SalaryPrivacyStatus, cj.Summary;";
            $stmtGetJobPostingDetails = $connection->prepare($sQryGetJobPostingDetails);
            $stmtGetJobPostingDetails->bindValue(1, $JobPostingID, PDO::PARAM_INT);
            $stmtGetJobPostingDetails->execute();

            if($stmtGetJobPostingDetails->rowCount() == 1){
                $rowJobPostDetails = $stmtGetJobPostingDetails->fetch(PDO::FETCH_ASSOC);

                $dataResult = array();
                    
                $jobLocation = $rowJobPostDetails['CityName'].', '.$rowJobPostDetails['ProvinceName'].', '.$rowJobPostDetails['CountryName'];
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
                
                $connection->commit();
                ECHO $jsonResult;
            }
            else{
                ECHO "3";
            }
        }
        catch(PDOException $e){
            $connection->rollBack();
            ECHO "2";
        }
    }
    else{
        ECHO "1";
    }
?>