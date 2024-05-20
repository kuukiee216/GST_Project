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
            $sQryGetWorkSchedules = "SELECT
                    ws.WorkScheduleID,
                    ws.ScheduleName
                FROM
                    tbl_workschedule AS ws
                WHERE
                    ws.WorkScheduleID NOT IN (
                        SELECT
                          WorkScheduleID
                        FROM
                          tbl_applicantpreference
                        WHERE
                          PreferenceID = (SELECT PreferenceID FROM tbl_applicantpreference WHERE ApplicantID = ?));";
            $stmtGetWorkSchedules = $connection->prepare($sQryGetWorkSchedules);
            $stmtGetWorkSchedules->bindValue(1, $CredentialID, PDO::PARAM_INT);
            $stmtGetWorkSchedules->execute();

            if($stmtGetWorkSchedules->rowCount() > 0){ ?>
                <option value="0" selected disabled>Select a Work Schedule</option>
            <?PHP
                while($rowWorkSchedule = $stmtGetWorkSchedules->fetch(PDO::FETCH_ASSOC)){ ?>

                    <option value="<?PHP ECHO $rowWorkSchedule['WorkScheduleID']; ?>"><?PHP ECHO $rowWorkSchedule['ScheduleName']; ?></option>

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