<?php

require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

try{

    $dataResultArray = array();

    $sQryRetrieveApplicantList = "SELECT
                                    ApplicantID, 
                                    LastName,
                                    FirstName,
                                    MiddleName, 
                                    EmailAddress 
                                FROM
                                    tbl_applicantinfo";
    
    $stmtRetrieveApplicantList = $connection->prepare($sQryRetrieveApplicantList);
    $stmtRetrieveApplicantList->execute();

    if($stmtRetrieveApplicantList->rowCount() > 0){

        while($rowApplicant = $stmtRetrieveApplicantList->fetch(PDO::FETCH_ASSOC)){
            $rowData = array();
            $AID = $rowApplicant['ApplicantID'];

            $ApplicantName = '';
            $Date = '2024/04/05'; // Temporary For Now

            if(strlen($rowApplicant['MiddleName']) > 0){
                $ApplicantName = $rowApplicant['LastName'].", ".$rowApplicant['FirstName']." ".substr($rowApplicant['MiddleName'], 0, 1).".";
            }
            else{
                $ApplicantName = $rowApplicant['LastName'].", ".$rowApplicant['FirstName'];
            }   

            $rowData['ApplicantID'] = $AID;
            $rowData['ApplicantName'] =  $ApplicantName;
            $rowData['Email'] = $rowApplicant['EmailAddress'];
            $rowData['RegistrationDate'] = $Date;
            $rowData['Action'] = '<button class="btn-secondary" id="btnViewApplicant'.$AID.'" onclick="viewApplicant(this.id);" name="btnViewApplicant"><i class="far fa-eye"></i></button>';

            $dataResultArray[] = $rowData;
        }

        $jsonDataResult = json_encode($dataResultArray);
        echo $jsonDataResult;

    }else{
        echo '2';
    }

}catch(PDOException $err){
    echo '3';
}



?>