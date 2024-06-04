<?php
$localConfigPath = '../../Essentials/db_config_local.php';

// Check if the file exists before including
if (file_exists($localConfigPath)) {

    try {
        // Establish a database connection
        $db = new dbConnection();
        $conn = $db->dbConnect();

        if ($conn) {
            // Define your SQL query to retrieve data from both tables
            $sql = "SELECT e.EmployerID, c.CompanyName, e.FirstName, e.LastName, c.EmailAddress AS CompanyEmail, e.Email AS EmployeeEmail, e.Status AS EmpStatus, e.RegistrationDate AS EmpRegDate
                    FROM tbl_employerinfo e
                    INNER JOIN tbl_companyinfo c ON e.CompanyID = c.CompanyID";

            // Prepare and execute the SQL query
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Check if there are rows returned
            if ($stmt->rowCount() > 0) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Output the HTML table structure
                echo '<div class="row">
                            <div class="col-sm-12">
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="basic-datatables_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Company Name</th>
                                            <th>Representative\'s Name</th>
                                            <th>Company Email</th>
                                            <th>Employee Email</th>
                                            <th>Employee Status</th>
                                            <th>Employee Registration Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                $rowCount = 0;
                foreach ($rows as $row) {
                    $rowCount++;
                    $rowClass = ($rowCount % 2 == 0) ? 'even' : 'odd';
                    echo '<tr role="row" class="' . $rowClass . '">
                            <td>' . $row['EmployerID'] . '</td>
                            <td>' . $row['CompanyName'] . '</td>
                            <td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>
                            <td>' . $row['CompanyEmail'] . '</td>
                            <td>' . $row['EmployeeEmail'] . '</td>
                            <td>' . $row['EmpStatus'] . '</td>
                            <td>' . $row['EmpRegDate'] . '</td>
                            <td>
                                <button class="btn-secondary"><i class="far fa-eye"></i></button>
                                <button class="btn-danger"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>';
                }

                // Close the table structure
                echo '</tbody></table></div></div>';
            } else {
                echo "No data found";
            }
        } else {
            // Connection error
            echo "Error: Unable to connect to the database.";
        }
    } catch (PDOException $e) {
        // PDO exception
        echo "Error: " . $e->getMessage();
    }
} else {
    // Configuration file not found
    echo "Error: Configuration file not found.";
}
?>
