<?php
require_once '../../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['ApplicationID'])){

    $dataResultArray = array();
    $AppID = $_POST['ApplicationID'];

    try{
        $sQryGetApplicantInfo = "SELECT
                                    ai.FirstName,
                                    ai.LastName,
                                    ai.MiddleName,
                                    ai.EmailAddress,
                                    ai.Phone,
                                    loc.City,
                                    loc.Country
                                FROM
                                    tbl_application as app
                                LEFT JOIN
                                    tbl_applicantinfo as ai ON ai.ApplicantID = app.ApplicantID
                                LEFT JOIN
                                    tbl_location as loc ON loc.LocationID = ai.LocationID
                                WHERE 
                                    app.ApplicationID = ?";

        $stmtGetApplicantInfo = $connection->prepare($sQryGetApplicantInfo);
        $stmtGetApplicantInfo->bindValue(1, $AppID, PDO::PARAM_INT);
        $stmtGetApplicantInfo->execute();


        if($stmtGetApplicantInfo->rowCount() == 1){
            $rowApplicantInfo = $stmtGetApplicantInfo->fetch(PDO::FETCH_ASSOC);

            $ApplicantName = '';

            if(strlen($rowApplicantInfo['MiddleName']) > 0){
                $ApplicantName = $rowApplicantInfo['LastName'].", ".$rowApplicantInfo['FirstName']." ".substr($rowApplicantInfo['MiddleName'], 0, 1).".";
            }
            else{
                $ApplicantName = $rowApplicantInfo['LastName'].", ".$rowApplicantInfo['FirstName'];
            }   

            $dataResultArray['ApplicantName'] = $ApplicantName;
            $dataResultArray['EmailAddress'] = $rowApplicantInfo['EmailAddress'];
            $dataResultArray['Location'] = $rowApplicantInfo['City']. ', '. $rowApplicantInfo['Country'];
            $dataResultArray['Phone'] = $rowApplicantInfo['Phone'];

            $jsonDataResult = json_encode($dataResultArray);
            echo $jsonDataResult;

        }else{
            echo '1';
        }


    }catch(PDOException $err){
        echo '2';
    }

}else{
    echo '3';
}


?>