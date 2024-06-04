<?php

require_once '../../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}


if(isset($_POST['EmployerID'])){

    $EID = $_POST['EmployerID'];
    $dataResult = array();

    try{
        $sQryGetEmployerInfo = "SELECT 
                                    te.EmployerID,
                                    te.FirstName, 
                                    te.MiddleName, 
                                    te.LastName,
                                    te.EmailAddress, 
                                    te.Phone,
                                    acc.Status,
                                    acc.Password
                            FROM
                                tbl_employerinfo as te
                            INNER JOIN
                                tbl_account as acc ON acc.AccountID = te.AccountID
                            WHERE
                                te.EmployerID = ?";
        $stmtGetEmployerInfo = $connection->prepare($sQryGetEmployerInfo);
        $stmtGetEmployerInfo->bindValue(1, $EID, PDO::PARAM_INT);
        $stmtGetEmployerInfo->execute();
            

        if($stmtGetEmployerInfo->rowCount() == 1){

            $row = $stmtGetEmployerInfo->fetch(PDO::FETCH_ASSOC);

            # Join Employer's Name
            $EmployerName = "";

            if($row['MiddleName'] != NULL){
            $EmployerName = $row['LastName'].", ".$row['FirstName']." ".substr($row['MiddleName'], 0, 1).".";
            }
            else{
                $EmployerName = $row['LastName'].", ".$row['FirstName'];
            }    

            $dataResult['EmployerName'] = $EmployerName;
            $dataResult['EmailAddress'] = $row['EmailAddress'];
            $dataResult['Phone'] = $row['Phone'];
            $dataResult['Password'] = $row['Password'];


            

        }else{
            echo '4';
        }
$sQryGetEmployerInfo = "SELECT 
                                    te.EmployerID,
                                    te.FirstName, 
                                    te.MiddleName, 
                                    te.LastName,
                                    te.EmailAddress, 
                                    te.Phone,
                                    acc.Status,
                                    acc.Password
                            FROM
                                tbl_employerinfo as te
                            INNER JOIN
                                tbl_account as acc ON acc.AccountID = te.AccountID
                            WHERE
                                te.EmployerID = ?";
        $stmtGetEmployerInfo = $connection->prepare($sQryGetEmployerInfo);
        $stmtGetEmployerInfo->bindValue(1, $EID, PDO::PARAM_INT);
        $stmtGetEmployerInfo->execute();
            

        if($stmtGetEmployerInfo->rowCount() == 1){

            $row = $stmtGetEmployerInfo->fetch(PDO::FETCH_ASSOC);

            # Join Employer's Name
            $EmployerName = "";

            if($row['MiddleName'] != NULL){
            $EmployerName = $row['LastName'].", ".$row['FirstName']." ".substr($row['MiddleName'], 0, 1).".";
            }
            else{
                $EmployerName = $row['LastName'].", ".$row['FirstName'];
            }    

            $dataResult['EmployerName'] = $EmployerName;
            $dataResult['EmailAddress'] = $row['EmailAddress'];
            $dataResult['Phone'] = $row['Phone'];
            $dataResult['Password'] = $row['Password'];


            

        }else{
            echo '4';
        }

        $sQryGetCompanyInfo = "SELECT 
                                ci.CompanyName,
                                cou.CountryName,
                                pro.ProvinceName,
                                city.CityName
                            FROM
                                tbl_companyinfo as ci
                            INNER JOIN
                                tbl_employerinfo as ei ON ei.CompanyID = ci.CompanyID
                            INNER JOIN
                                tbl_country as cou ON cou.CountryID = ci.country
                            INNER JOIN
                                tbl_province as pro ON pro.ProvinceID = ci.state
                            INNER JOIN
                                tbl_city as city ON city.CityID = ci.city
                            WHERE
                                ei.EmployerID = ?";
        $stmtGetCompanyInfo = $connection->prepare($sQryGetCompanyInfo);
        $stmtGetCompanyInfo->bindValue(1, $EID, PDO::PARAM_INT);
        $stmtGetCompanyInfo->execute();
            
        if($stmtGetCompanyInfo->rowCount() == 1){

            $row = $stmtGetCompanyInfo->fetch(PDO::FETCH_ASSOC);

            $dataResult['CompanyName'] = $row['CompanyName'];
            $dataResult['CompanyCountry'] = $row['CountryName'];
            $dataResult['CompanyState'] = $row['ProvinceName'];
            $dataResult['CompanyCity'] = $row['CityName'];
            

        }else{
            echo '4';
        }
        
        echo json_encode($dataResult);
    }catch(PDOException $err){
        echo $err;
    }


}else{
    echo '3';
}

?>