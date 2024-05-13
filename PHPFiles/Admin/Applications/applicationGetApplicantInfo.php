<?php
require_once '../../../PHPFiles/Essentials/db_config_local.php';
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
                                    ci.CityName,
                                    pr.ProvinceName,
                                    co.CountryName
                                FROM
                                    tbl_application as app
                                LEFT JOIN
                                    tbl_applicantinfo as ai ON ai.ApplicantID = app.ApplicantID
                                LEFT JOIN
                                    tbl_city as ci ON ci.CityID = ai.CityID
                                LEFT JOIN
                                    tbl_province as pr ON pr.ProvinceID = ai.ProvinceID
                                LEFT JOIN
                                    tbl_country as co ON co.CountryID = ai.CountryID    
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
            $dataResultArray['Location'] = $rowApplicantInfo['CityName'] . ", " . $rowApplicantInfo['ProvinceName'] . " " . $rowApplicantInfo['CountryName'];
            $dataResultArray['Phone'] = $rowApplicantInfo['Phone'];

            $jsonDataResult = json_encode($dataResultArray);
            echo $jsonDataResult;

        }else{
            echo '1';
        }


    }catch(PDOException $err){
        echo $err;
    }

}else{
    echo '3';
}


?>