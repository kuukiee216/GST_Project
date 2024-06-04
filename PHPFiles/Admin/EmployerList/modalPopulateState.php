<?php

require_once '../../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit();
}

if(isset($_POST['CountryID'])){

    try{

        $dataResult = array();
        $sQryGetProvinces = "SELECT 
                                *
                            FROM
                                tbl_province
                            WHERE
                                CountryID = ?";
        $stmtGetProvinces = $connection->prepare($sQryGetProvinces);
        $stmtGetProvinces->bindValue(1, $_POST['CountryID'], PDO::PARAM_INT);
        $stmtGetProvinces->execute();

        if($stmtGetProvinces->rowCount() > 0) {
            while($row = $stmtGetProvinces->fetch(PDO::FETCH_ASSOC)) {
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
    echo json_encode(['error' => 'No POST set']);
}

?>