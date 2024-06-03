<?php

require_once '../../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit();
}

try{

    $dataResult = array();
    $sQryGetCountries = "SELECT 
                            *
                        FROM
                            tbl_country";
    $stmtGetCountries = $connection->prepare($sQryGetCountries);
    $stmtGetCountries->execute();

    if($stmtGetCountries->rowCount() > 0) {
        while($row = $stmtGetCountries->fetch(PDO::FETCH_ASSOC)) {
            $dataResult[] = $row; // Collect each row into the array
        }
        echo json_encode($dataResult);
    } else {
        echo json_encode([]); // Return an empty array if no results
    }

} catch(PDOException $err) {
    echo json_encode(['error' => 'Database error']); // Return a JSON error message
}


?>