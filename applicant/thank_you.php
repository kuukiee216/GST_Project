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
                $stmt = $connection->prepare("UPDATE tbl_account SET Status = 1 WHERE Token = ?");
                $stmt->bindValue(1, $token, PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo '<!doctype html>
                  <html lang="en">
                    <head>
                      <!-- Required meta tags -->
                      <meta charset="utf-8">
                      <meta name="viewport" content="width=device-width, initial-scale=1">

                     <!-- Bootstrap CSS -->
                     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                     <link href="/CSS/thank_you.css" rel="stylesheet" >
                     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                     <link rel="preconnect" href="https://fonts.googleapis.com">
                     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                     <link href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

                      <title>Thank You</title>
                    </head>

                    <body>

                      <!-- Japan job posting icon href-->

                      <nav class="navbar navbar-expand-sm">
                        <div class="container-fluid">
                          <a class="navbar-brand font-RR text-white" href="#">
                          <img src="../assets/img/japanLogo.png" alt="logo" style="width:80px;"> Japan Jobs</a>
                        </div>
                      </nav>

                          <div class="container-fluid">
                              <form class="mx-auto">
                                  <h1 class="text-center">Thank you for signing up!</h1>
                                  <p>We sent a confirmation link to your email. Kindly check your email to continue your registration.</p>
                          <div class="mb-3">
                                          <button type="submit" class="btn btn-outline-danger mt-4">Back</button>
                          </div>
                              </div>
                          </form>
                        </div>

                      <!--bottom navbar-->
                      <footer class="p-2 navbar text-white">

                        <ul class="nav">
                            <li class="nav-item">
                              <a class="form-label nav-link text-white" href="#">Privacy</a>
                            </li>

                            <li class="nav-item">
                              <a class="form-label nav-link text-white" href="#">Terms & Condition</a>
                            </li>

                            <li class="nav-item">
                              <a class="form-label nav-link text-white" href="#">Protect yourself online</a>
                            </li>

                            <li class="nav-item">
                              <a class="form-label nav-link text-white" href="#">Contact</a>
                            </li>
                            <a class="nav-link disabled text-secondary">© 2024 JAPAN JOBS.All rights reserved</a>
                          </ul>
                        </div>
                      </footer>

                      <!-- Option 1: Bootstrap Bundle with Popper -->
                      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    </body>
                  </html>';
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
