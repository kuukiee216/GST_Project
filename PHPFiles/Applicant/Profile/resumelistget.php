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
            $sQryGetResumeList = "SELECT
                    ApplicantDocumentID,
                    Location,
                    DateTimeStamp
                FROM
                    tbl_applicantdocuments
                WHERE
                    ApplicantID = :ApplicantID;";
            $stmtGetResumeList = $connection->prepare($sQryGetResumeList);
            $stmtGetResumeList->bindValue(":ApplicantID", $CredentialID, PDO::PARAM_INT);
            $stmtGetResumeList->execute();

            if($stmtGetResumeList->rowCount() > 0){
                while($rowResume = $stmtGetResumeList->fetch(PDO::FETCH_ASSOC)){ 
                    
                    $dateTimeStamp = strtotime($rowResume['DateTimeStamp']);

                    // Format the timestamp as desired
                    $formattedDateTimeStamp = date("F d, Y", $dateTimeStamp);
                    ?>

                    <tr>
                        <td><?PHP ECHO $formattedDateTimeStamp; ?></td>
                        <td><?PHP ECHO basename($rowResume['Location']); ?></td>
                        <td><button class="btn btn-link btn-danger mr-2" id="btnRemoveResume<?PHP ECHO $rowResume['ApplicantDocumentID']; ?>" onclick="removeApplicantResume(this.id);">Remove</button><button class="btn btn-link btn-primary" id="btnViewResume<?PHP ECHO $rowResume['ApplicantDocumentID']; ?>" onclick="viewApplicantResume(this.id);">View</button></td>
                    </tr>
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