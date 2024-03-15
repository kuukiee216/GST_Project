<?php
require_once '../PHPFiles/db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($connection) {
    if (isset($_GET['Token'])) {
        session_start();

        $token = $_GET['Token'];

        $tokenParts = explode('_', $token);
        $expirationTime = $tokenParts[1];

        try {
            $stmtCheckToken = $connection->prepare("SELECT * FROM tbl_account WHERE Token = ?");
            $stmtCheckToken->bindValue(1, $token, PDO::PARAM_STR);
            $stmtCheckToken->execute();
            $tokenExists = $stmtCheckToken->fetch(PDO::FETCH_ASSOC);

            if (!$tokenExists) {
                echo "Token not found";
                exit();
            }

            if (time() <= $expirationTime) {
                $stmt = $connection->prepare("UPDATE tbl_account SET Status = 1, Token = NULL WHERE Token = ?");
                $stmt->bindValue(1, $token, PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo "<!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta http-equiv='refresh' content='3;url=../login.php'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>User Already Validated</title>
                    </head>
                    <body>
                        <div>
                            <h1>You're verified, please login</h1>
                            <p>This user has already been validated. You will be redirected to the login page shortly.</p>
                        </div>
                    </body>
                    </html>";
                    exit();
                } else {
                    echo "No records updated";
                }
            } else {
                echo "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <title>Error</title>
                </head>
                <body>
                    <div>
                        <h1>Error</h1>
                        <p>Token expired</p>
                    </div>
                </body>
                </html>";
                exit();
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    } else {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <title>Error</title>
        </head>
        <body>
            <div>
                <h1>Error</h1>
                <p>Token not provided</p>
            </div>
        </body>
        </html>";
        exit();
    }
} else {
    echo "Failed to connect to the database";
}
