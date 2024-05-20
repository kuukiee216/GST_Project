<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

try{
    $dataResultArray = array();
    $sQryGetLocations = "SELECT
                            ci.CityName,
                            pr.ProvinceName,
                            co.CountryName
                        FROM
                            tbl_city AS ci
                        INNER JOIN
                            tbl_province AS pr ON pr.ProvinceID = ci.ProvinceID
                        INNER JOIN
                            tbl_country as co ON co.CountryID = pr.CountryID";

    $stmtGetLocations = $connection->prepare($sQryGetLocations);
    $stmtGetLocations->execute();

    if($stmtGetLocations->rowCount() > 0){
        while($rowLocation = $stmtGetLocations->fetch(PDO::FETCH_ASSOC)){
            $rowData = array();
            $rowData['Location'] = "You Added " . $rowLocation['CityName'] . ", " . $rowLocation['ProvinceName'] . " " . $rowLocation['CountryName'] . " to the Location";
            
            $dataResultArray[] = $rowData;
        }
        $jsonDataResult = json_encode($dataResultArray);
        echo $jsonDataResult;

    }else{
        echo '1';
    }


}catch(PDOException $err){
    echo '2';
}



?>