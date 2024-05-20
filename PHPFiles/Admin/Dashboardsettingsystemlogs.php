<?php
$localConfigPath = '../Essentials/db_config_local.php';
// Check if the file exists before including
if (file_exists($localConfigPath)) {
    try {
        // Establish a database connection
        include($localConfigPath);
        $db = new dbConnection();
        $conn = $db->dbConnect();

        if ($conn) {
            $sql = "SELECT LogID, DateTimeStamp, Action, Area, AccountID FROM tbl_systemlog";

            // Prepare and execute the SQL query
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Check if there are rows returned
            if ($stmt->rowCount() > 0) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($rows);
            } else {
                echo json_encode(['status' => '3']); // No data found
            }
        } else {
            echo json_encode(['status' => '2']); // Connection error
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => '1']); // PDO exception
    }
} else {
    echo json_encode(['status' => '2']); // Configuration file not found
}
?>
