<?PHP 
    // Path to db_config_local.php file relative
    $localConfigPath = '../../Essentials/db_config_local.php';

    // Require the db_config_local.php file
    require_once $localConfigPath;
    $clsConnect = new dbConnection();
    $connection = $clsConnect->dbConnect();

    SESSION_START();
    ERROR_REPORTING(0);

    if(isset($_SESSION['AccountID']) && isset($_SESSION['Access']) && $_SESSION['Access'] == '0' && isset($_SESSION['CredentialID'])){

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y/m/d H:i:s");

        $CredentialID = $_SESSION['CredentialID'];

        try{
            $sQryGetJobTitles = "SELECT
                    j.JobTitleID,
                    j.JobTitleName
                FROM
                    tbl_jobtitle j
                WHERE
                    j.JobTitleID NOT IN (
                        SELECT
                        JobTitleID
                        FROM
                        tbl_applicantpreferredjobtitle
                        WHERE
                        PreferenceID = (SELECT PreferenceID FROM tbl_applicantpreference WHERE ApplicantID = ?));";
            $stmtGetJobTitles = $connection->prepare($sQryGetJobTitles);
            $stmtGetJobTitles->bindValue(1, $CredentialID, PDO::PARAM_INT);
            $stmtGetJobTitles->execute();

            if($stmtGetJobTitles->rowCount() > 0){ ?>
                <option value="0" selected disabled>Select a Job Title</option>
            <?PHP
                while($rowJobTitle = $stmtGetJobTitles->fetch(PDO::FETCH_ASSOC)){ ?>

                    <option value="<?PHP ECHO $rowJobTitle['JobTitleID']; ?>"><?PHP ECHO $rowJobTitle['JobTitleName']; ?></option>

            <?PHP                    
                }
            }
            else{
                ECHO 3;
            }
        }
        catch(PDOException $e){
            ECHO 2;
        }
    }
    else{
        ECHO 1;
    }
?>