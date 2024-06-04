<?php
require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}
if(isset($_POST['ApplicationID'])){

    $AID = $_POST['ApplicationID'];
    $dataResult = array();
    try{

        $sQryGetCoverLetter = "SELECT 
                            *
                        FROM 
                            tbl_applicationcoverletter as cl
                        INNER JOIN
                            tbl_application as app ON app.ApplicationID = cl.ApplicationID
                        WHERE
                            app.ApplicationID = ?";
        $stmtGetCoverLetter = $connection->prepare($sQryGetCoverLetter);
        $stmtGetCoverLetter->bindValue(1, $AID, PDO::PARAM_INT);
        $stmtGetCoverLetter->execute();
        
        if($stmtGetCoverLetter->rowCount() == 1){
            $rowLetter = $stmtGetCoverLetter->fetch(PDO::FETCH_ASSOC); 
            
            $dataResult['Location'] = $rowLetter['Location'];
            $dataResult['CoverLetter'] = $rowLetter['CoverLetter'];
            
            $jsonDataResult = json_encode($dataResult);
            echo $jsonDataResult;

        }else{
            echo '2'; //Empty
        }
    
    }catch(PDOException $err){
        echo $err; // PDO Exception
    }
}

?>