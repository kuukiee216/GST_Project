<?php

require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['ApplicantID'])){

    $AID = $_POST['ApplicantID'];
    $dataResultArray = array();

    try{
        
        $sQryGetApplicantInfo = "SELECT
                                    ai.FirstName,
                                    ai.MiddleName,
                                    ai.LastName,
                                    ai.EmailAddress,
                                    ai.Phone,
                                    loc.Country,
                                    loc.ZipCode,
                                    loc.Province,
                                    loc.City,
                                    loc.AddressLine2,
                                    loc.StreetAddress,
                                    acc.RegistrationDate
                                FROM 
                                    tbl_applicantinfo as ai
                                INNER JOIN
                                    tbl_location as loc ON loc.LocationID = ai.LocationID
                                INNER JOIn
                                    tbl_account as acc ON acc.AccountID = ai.AccountID
                                WHERE
                                    ai.ApplicantID = ?";

        $stmtGetApplicantInfo = $connection->prepare($sQryGetApplicantInfo);
        $stmtGetApplicantInfo->bindValue(1, $AID, PDO::PARAM_INT);
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
            $dataResultArray['Phone'] = $rowApplicantInfo['Phone'];
            $dataResultArray['Province'] = $rowApplicantInfo['Province'];
            $dataResultArray['Country'] = $rowApplicantInfo['Country'];
            $dataResultArray['ZipCode'] = $rowApplicantInfo['ZipCode'];
            $dataResultArray['City'] = $rowApplicantInfo['City'];
            $dataResultArray['AddressLine2'] = $rowApplicantInfo['AddressLine2'];
            $dataResultArray['StreetAddress'] = $rowApplicantInfo['StreetAddress'];
            $dataResultArray['RegistrationDate'] = $rowApplicantInfo['RegistrationDate'];

            $jsonDataResult = json_encode($dataResultArray);
            echo $jsonDataResult;
        }
        


    }catch(PDOException $err){
        echo $err;
    }
    

}else{
    echo '2';
}


?>