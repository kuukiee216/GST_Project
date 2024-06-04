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

        $sQryGetResume = "SELECT 
                            doc.Location
                        FROM 
                            tbl_applicantdocuments as doc
                        INNER JOIN
                            tbl_application as app ON app.ApplicantID = doc.ApplicantID
                        WHERE
                            app.ApplicationID = ?";
        $stmtGetResume = $connection->prepare($sQryGetResume);
        $stmtGetResume->bindValue(1, $AID, PDO::PARAM_INT);
        $stmtGetResume->execute();
        
        if($stmtGetResume->rowCount() == 1){
            $rowDocu = $stmtGetResume->fetch(PDO::FETCH_ASSOC); 
            $dataResult['Location'] = $rowDocu['Location'];
            
            $jsonDataResult = json_encode($dataResult);
            echo $jsonDataResult;

        }else{
            echo '2'; //Empty
        }
    
    }catch(PDOException $err){
        echo '3'; // PDO Exception
    }
}

?>