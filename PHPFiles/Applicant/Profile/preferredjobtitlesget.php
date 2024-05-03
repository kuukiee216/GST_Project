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
            $sQryGetPreferredJobTitles = "SELECT
                    apjt.PreferredJobTitleID,
                    jt.JobTitleName
                FROM
                    tbl_applicantpreference AS ap
                INNER JOIN
                    tbl_applicantpreferredjobtitle AS apjt ON apjt.PreferenceID = ap.PreferenceID
                INNER JOIN
                    tbl_jobtitle AS jt ON jt.JobTitleID = apjt.JobTitleID
                WHERE
                    ap.ApplicantID = :ApplicantID;";
            $stmtGetPreferredJobTitles = $connection->prepare($sQryGetPreferredJobTitles);
            $stmtGetPreferredJobTitles->bindValue(":ApplicantID", $CredentialID, PDO::PARAM_INT);
            $stmtGetPreferredJobTitles->execute();

            if($stmtGetPreferredJobTitles->rowCount() > 0){
                while($rowJobTitle = $stmtGetPreferredJobTitles->fetch(PDO::FETCH_ASSOC)){ ?>
                    <button class="btn btn-light btn-border btn-round shadow mx-2 my-2" id="btnRemovePreferredJobTitle<?PHP ECHO $rowJobTitle['PreferredJobTitleID']; ?>" onclick="removePreferredJobTitles(this.id);"><?PHP ECHO $rowJobTitle['JobTitleName']; ?> <i class="fas fa-times text-danger ml-3"></i></button>
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