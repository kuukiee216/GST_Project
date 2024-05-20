<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'Locations';
$Action = 'Add';

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['Country']) && isset($_POST['Province']) && isset($_POST['City'])){

    try{

        $CountryID = 0;
        $ProvinceID = 0;
        $CityID = 0;

        $connection->beginTransaction();

        $Country = $_POST['Country'];
        $Province = $_POST['Province'];
        $City = $_POST['City'];
        //Check if they exist already
        $CountryID = isCountryExist($Country, $connection);

        if($CountryID == 0){

            //Country Add
            $sQryAddCountry = "INSERT INTO tbl_country(CountryName) VALUES (?)";
            $stmtAddCountry = $connection->prepare($sQryAddCountry);
            $stmtAddCountry->bindValue(1, $Country, PDO::PARAM_STR);
            $stmtAddCountry->execute();

            //Get the Added/Existing Country's ID   
            $sQryGetCountry = "SELECT 
                                    CountryID 
                                FROM 
                                    tbl_country 
                                ORDER BY 
                                    CountryID DESC 
                                LIMIT 1; ";
            $stmtGetCountry = $connection->prepare($sQryGetCountry);
            $stmtGetCountry->execute();
            if($stmtGetCountry->rowCount() > 0){
                $rowCountry = $stmtGetCountry->fetch(PDO::FETCH_ASSOC);
                $CountryID = $rowCountry['CountryID'];
            }

        }
        $ProvinceID = isProvinceExist($Province, $CountryID, $connection);
        if($ProvinceID == 0){
            //Province Add
            $sQryAddProvince = "INSERT INTO tbl_province(ProvinceName, CountryID) VALUES (?,?)";
            $stmtAddProvince = $connection->prepare($sQryAddProvince);
            $stmtAddProvince->bindValue(1, $Province, PDO::PARAM_STR);
            $stmtAddProvince->bindValue(2, $CountryID, PDO::PARAM_INT);
            $stmtAddProvince->execute();

            //Get the Added/Existing Province's ID   
            $sQryGetProvince = "SELECT 
                                    ProvinceID 
                                FROM 
                                    tbl_province 
                                ORDER BY 
                                    ProvinceID DESC 
                                LIMIT 1; ";
            $stmtGetProvince = $connection->prepare($sQryGetProvince);
            $stmtGetProvince->execute();
            if($stmtGetProvince->rowCount() > 0){
                $rowProvince = $stmtGetProvince->fetch(PDO::FETCH_ASSOC);
                $ProvinceID = $rowProvince['ProvinceID'];
            }
        }
        $CityID = isCityExist($City, $ProvinceID, $connection);
        if($CityID == 0){
            //City Add
            $sQryAddCity = "INSERT INTO tbl_city(CityName, ProvinceID) VALUES (?,?)";
            $stmtAddCity = $connection->prepare($sQryAddCity);
            $stmtAddCity->bindValue(1, $City, PDO::PARAM_STR);
            $stmtAddCity->bindValue(2, $ProvinceID, PDO::PARAM_INT);
            $stmtAddCity->execute();

            $connection->commit();
            echo '1';


        }else{
            echo '2';
        }


    }catch(PDOException $err){
        $connection->rollBack();
        echo $err;
    }


}

function isCountryExist($CountryName, $connection){

    $sQryFindCountry = "SELECT
                            CountryID
                        FROM
                            tbl_country
                        WHERE 
                            CountryName = ?";
    $stmtFindCountry = $connection->prepare($sQryFindCountry);
    $stmtFindCountry->bindValue(1, $CountryName, PDO::PARAM_STR);
    $stmtFindCountry->execute();

    if($stmtFindCountry->rowCount() > 0){
        $rowCountry = $stmtFindCountry->fetch(PDO::FETCH_ASSOC);
        return $rowCountry['CountryID'];
    }else {
        return 0;
    }
}

function isProvinceExist($ProvinceName, $CountryID, $connection){
    $sQryFindProvince = "SELECT
                                ProvinceID
                            FROM
                                tbl_province
                            WHERE 
                                ProvinceName = ? AND CountryID = ?";
    $stmtFindProvince = $connection->prepare($sQryFindProvince);
    $stmtFindProvince->bindValue(1, $ProvinceName, PDO::PARAM_STR);
    $stmtFindProvince->bindValue(2, $CountryID, PDO::PARAM_INT);
    $stmtFindProvince->execute();

    if($stmtFindProvince->rowCount() > 0){
        $rowProvince = $stmtFindProvince->fetch(PDO::FETCH_ASSOC);
        return $rowProvince['ProvinceID'];
    }else {
        return 0;
    }
}

function isCityExist($CityName, $ProvinceID, $connection){
    $sQryFindCity = "SELECT
                            CityID
                        FROM
                            tbl_city
                        WHERE 
                            CityName = ? AND ProvinceID = ?";
    $stmtFindCity = $connection->prepare($sQryFindCity);
    $stmtFindCity->bindValue(1, $CityName, PDO::PARAM_STR);
    $stmtFindCity->bindValue(2, $ProvinceID, PDO::PARAM_INT);
    $stmtFindCity->execute();

    if($stmtFindCity->rowCount() > 0){
        $rowCity = $stmtFindCity->fetch(PDO::FETCH_ASSOC);
        return $rowCity['CityID'];
    }else {
        return 0;
    }
}
?>