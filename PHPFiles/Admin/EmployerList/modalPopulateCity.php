<?php

require_once '../../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit();
}

if(isset($_POST['ProvinceID'])){

    try{

        $dataResult = array();
        $sQryGetCities = "SELECT 
                                *
                            FROM
                                tbl_city
                            WHERE
                                ProvinceID = ?";
        $stmtGetCities = $connection->prepare($sQryGetCities);
        $stmtGetCities->bindValue(1, $_POST['ProvinceID'], PDO::PARAM_INT);
        $stmtGetCities->execute();

        if($stmtGetCities->rowCount() > 0) {
            while($row = $stmtGetCities->fetch(PDO::FETCH_ASSOC)) {
                $dataResult[] = $row; // Collect each row into the array
            }
            echo json_encode($dataResult);
        } else {
            echo json_encode([]); // Return an empty array if no results
        }

    } catch(PDOException $err) {
        echo json_encode(['error' => 'Database error']); // Return a JSON error message
    }

}else{

}
?>