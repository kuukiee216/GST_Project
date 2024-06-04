<?PHP
    // Path to db_config_local.php file relative
    $localConfigPath = 'Essentials/db_config_local.php';

    // Require the db_config_local.php file
    require_once $localConfigPath;
    $clsConnect = new dbConnection();
    $connection = $clsConnect->dbConnect();

    REQUIRE_ONCE('SMTP.php');
    $clsMail = new SMTPMailConnection();
    
    SESSION_START();
    ERROR_REPORTING(0);

    function generateRandomString(){
        $characters = 'aAbBc1CdDeEfFgG2hHiIj3JkKl4LmMnN5oOpP6qQrRs7StTu8UvVwW9xXyY0zZ';
        $charactersLength = strlen($characters);
        $randomString = "";

        for($counter = 0; $counter <= 5; $counter++){
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    if(isset($_SESSION['AccountID']) && isset($_SESSION['Access']) && isset($_SESSION['CredentialID']) && isset($_POST['CurrentPassword'])){
        $sQryGetAccountEmail = "";

        $AccountID = $_SESSION['AccountID'];
        $Access = $_SESSION['Access'];
        $CredentialID = $_SESSION['CredentialID'];
        $CurrentPassword = base64_decode($_POST['CurrentPassword']);

        if($Access == '0'){
            
        }
        else if($Access == '1'){
            $sQryGetAccountEmail = "SELECT ei.EmailAddress, acc.Password FROM tbl_employerinfo AS ei
                INNER JOIN tbl_account AS acc ON(acc.AccountID = ei.AccountID) WHERE ei.EmployerID = ? ;";
        }
        else if($Access == '2'){
            $sQryGetAccountEmail = "SELECT ai.EmailAddress, acc.Password FROM tbl_applicantID AS ai
                INNER JOIN tbl_account AS acc ON(acc.AccountID = ai.AccountID) WHERE ai.ApplicantID = ? ;";
        }

        $stmtGetAccountEmail = $connection->prepare($sQryGetAccountEmail);
        $stmtGetAccountEmail->bindValue(1, $CredentialID, PDO::PARAM_INT);
        $stmtGetAccountEmail->execute();

        if($stmtGetAccountEmail->rowCount() == 1){
            $rowAccountDetails= $stmtGetAccountEmail->fetch(PDO::FETCH_ASSOC);
            $EmailAddress = $rowAccountDetails['EmailAddress'];
            $CurrentPassword = $rowAccountDetails['Password'];
            $enteredCurrentPassword = $_POST['CurrentPassword'];

            if($Access == '0'){
                $EmailAddress = "bscs4b.group5@bscs4b-prs.online";
            }

            if(password_verify($enteredCurrentPassword,$CurrentPassword)){
                $OTP = generateRandomString();
                $_SESSION['ChangePassOTP'] = $OTP;

                date_default_timezone_set('Asia/Manila');
                $_SESSION['ChangePassOTPExpiration'] = time();
                try{
                    
                    $message = "Hi " . $EmailAddress . ", <br><br>
                            We received your request for a single-use code to use with your LU-PRS Account. <br><br>
                            Your single-use code is: <B> " . $OTP . "</B><br><br>
                            If you did not request this code, you can safely ignore this email. Someone else might have typed your email address by mistake.<br><br>
                            Thanks,<br>
                            The LU-PRS account team";
                    $sub = "Change Password Verification";

                    if($clsMail->sendMail($EmailAddress, $sub, $message)){
                        ECHO 0;
                    }
                    else{
                        ECHO 2;
                    }
                }
                catch(Exception $err){
                    ECHO 2;
                }
            }
            else{
                ECHO 4;
            }
        }
        else{
            ECHO 3;
        }
    }
    else{
        ECHO "1";
    }
?>