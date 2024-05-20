<?php

require_once '../../PHPFiles/Essentials/db_config_local.php';
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
                                    ct.CityName,
                                    pr.ProvinceName,
                                    co.CountryName,
                                    acc.RegistrationDate
                                FROM 
                                    tbl_applicantinfo as ai
                                LEFT JOIN
                                    tbl_city as ct ON ct.CityID = ai.CityID
                                LEFT JOIN
                                    tbl_province as pr ON pr.ProvinceID = ct.ProvinceID
                                LEFT JOIN
                                    tbl_country as co ON co.CountryID = pr.CountryID        
                                LEFT JOIN
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
            $dataResultArray['ProvinceName'] = $rowApplicantInfo['ProvinceName'];
            $dataResultArray['CountryName'] = $rowApplicantInfo['CountryName'];
            $dataResultArray['CityName'] = $rowApplicantInfo['CityName'];
            $dataResultArray['RegistrationDate'] = $rowApplicantInfo['RegistrationDate'];

            $jsonDataResult = json_encode($dataResultArray);
            echo $jsonDataResult;
        }else{
            echo "here";
        }
        


    }catch(PDOException $err){
        echo $err;
    }
    

}else{
    echo '2';
}


?>