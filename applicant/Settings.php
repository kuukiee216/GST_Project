<?php
session_start();

if (!(isset($_SESSION['AccountID']) && isset($_SESSION['UserID']) && $_SESSION['Token'] == null)) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900" media="all">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="../assets/css/atlantis.css" rel="stylesheet">
    <link href="../CSS/setting.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Japan Jobs Dashboard Page</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>
<body>
     <!-- Japan job posting icon href-->
     <nav class="navbar navbar-expand-sm">
      <div class="container-fluid">
        <form class="">
          <a class="navbar-brand font-RR text-white" href="/FILES-Applicant Side/Landing_Page.html">
            <img src="../assets/img/jj_logo.png" alt="logo" style="width:80px;"> Japan jobs</a>
          </form>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link text-white" href="/FILES-Applicant Side/Landing_Page.html">Home</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link text-white" href="/FILES-Applicant Side/profile.html">Pofile</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link text-white" href="/FILES-Applicant Side/about_us.html">About Us</a>
                      </li>
                    </ul>

                    <form class="d-flex">
                        <div class="dropdown">
                          <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar">
                              <img src="../assets/img/icon.png" alt="..." class="avatar-img rounded-circle">
                            </div>
                            gen.test
                          </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="/FILES-Applicant Side/Settings.html">Settings</a>
                          <a class="dropdown-item" href="/FILES-Applicant Side/Saved_jobs.html">Saved Jobs</a>
                          <a class="dropdown-item" href="/FILES-Applicant Side/recommended_jobs.html">recommended Jobs</a>
                          <a class="dropdown-item" href="#">Logout</a>
                        </div>
                      </div>
                    </form>

                    <form class="d-flex">
                      <div>
                        <a class="text-white nav-link" href="/FILES-Recruiter Side/dashboard_recruiter.html">Recruiter Site</a>
                      </div>
                  </form>

                </div>
          </div>
      </div>
    </nav>



      <div class="container-fluid" style="width: 80%;">

        <h1>Settings</h1>
            <hr>
                <div>
                    <label for="Cemail">Email</label>
                    <p id="displayEmail"></p>
                </div>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
            Change Email
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <form id="changeEmailForm">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalChangeEmail">Change Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['UserID']; ?>">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnChangeEmail">Save email</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <hr>

            <label for="password">password</label>
            <p id="displayPassword"></p>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter1">
              Change Password
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <form id="changePassForm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalChangePassword">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                    <div class="">
                      <label for="pass">Password</label>
                    <input type="password" class="form-control" id="password" name="pass" placeholder="password">

                      <label for="rpass">Re-Enter Password</label>
                    <input type="password" class="form-control" id="rpass" name="rpass" placeholder="Re-enter password">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" id="btnChangePass">Save password</button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
                <hr>

        <div>
            <label for="Dacc">Delete Account</label>
              <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter2">
                Delete Account
              </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter2" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalDeleteAccount">Delete Account?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary">Yes, Delete my Account</button>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
        </div>
      </div>

          <!--bottom navbar-->
    <footer class="p-2 navbar text-primary">
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

          <a class="nav-link disabled text-dark">© 2024 JAPAN JOBS.All rights reserved</a>
        </ul>
    </footer>

        <!-- Option 1: Bootstrap scripts -->
        <script src="../assets/js/atlantis.js"></script>
        <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Vendor JS Files -->
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="../assets/vendor/aos/aos.js"></script>
        <script src="../assets/vendor/php-email-form/validate.js"></script>

        <!--   Core JS Files   -->
        <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>

        <!-- jQuery UI -->
        <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

        <!-- jQuery Scrollbar -->
        <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


        <!-- Chart JS -->
        <script src="../assets/js/plugin/chart.js/chart.min.js"></script>

        <!-- jQuery Sparkline -->
        <script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

        <!-- Chart Circle -->
        <script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

        <!-- Datatables -->
        <script src="../assets/js/plugin/datatables/datatables.min.js"></script>

        <!-- Bootstrap Notify -->
        <script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

        <!-- jQuery Vector Maps -->
        <script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
        <script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

        <!-- Sweet Alert -->
        <script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

        <!-- Atlantis JS -->
        <script src="../assets/js/atlantis.min.js"></script>

        <!-- Applicant Settings -->
        <script src="../ajax/SettingHandler.js"></script>
        <script src="../ajax/SettingPassHandler.js"></script>
        <script src="../ajax/SettingsGetEmail.js"></script>

        <script>
          $(document).ready(function() {
            $('#btnChangeEmail').click(function() {
              ChangeEmail('changeEmailForm');
            });

            $('#btnChangePass').click(function() {
              ChangePass('changePassForm');
            })
            GetEmail();
          });
        </script>
  </body>
</html>