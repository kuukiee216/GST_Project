<?php
require_once 'db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['Token'])){

    $acc_token = $_POST['Token']; 
    $acc_email = "";

    $sQryGetTokenEmail = "SELECT
                            ac.UserID
                        FROM 
                            tbl_account as ac
                        WHERE
                            Token = ?";

    $stmtGetTokenEmail = $connection->prepare($sQryGetTokenEmail);
    $stmtGetTokenEmail->bindValue(1, $acc_token, PDO::PARAM_STR);
    $stmtGetTokenEmail->execute();

    if($stmtGetTokenEmail->rowCount() == 1){
        $rowAccount = $stmtGetTokenEmail->fetch(PDO::FETCH_ASSOC);

        $acc_email = $rowAccount['UserID'];

        echo $acc_email;
        
    }

} else{

}


?>