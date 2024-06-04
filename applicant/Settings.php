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
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>

      <!-- CSS Files -->
      <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="../assets/css/atlantis.min.css">
      <link href="/CSS/applicant.css" rel="stylesheet">

      <!-- Fonts and icons -->
      <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
      <script>
        WebFont.load({
          google: {"families":["Lato:300,400,700,900"]},
          custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
          active: function() {
            sessionStorage.fonts = true;
          }
        });
      </script>

      <title>Japan Jobs Dashboard Page</title>
      <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
  </head>
  <body>
    <!--Navbar Header-->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="green2">
      <div class="container-fluid">
        <div class="collapse" id="search-nav">
          <div>
            <form class="navbar-left navbar-form">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar nav me-auto mb-2 mb-lg-0">
                <li>
                    <a href="/applicant/Landing_Page.html" class="logo">
                      <img src="../assets/img/JapanJobs.png" alt="navbar brand">
                    </a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="/applicant/Landing_Page.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="/applicant/profile.php">Pofile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="/applicant/about_us.html">About Us</a>
                  </li>
                </ul>
              </div>
            </form>
          </div>
        </div>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-justify">
          <li class="nav-item dropdown hidden-caret">
            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
              <div class="avatar-sm">
                <img src="../assets/img/icon.png" alt="..." class="avatar-img rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-user animated fadeIn">
              <div class="scroll-wrapper dropdown-user-scroll scrollbar-outer" style="position: relative;"><div class="dropdown-user-scroll scrollbar-outer scroll-content" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 0px;">
                <li>
                  <div class="user-box">
                    <div class="avatar-lg"><img src="../assets/img/icon.png" alt="image profile" class="avatar-img rounded"></div>
                    <div class="u-text">
                      <h4>Meow</h4>
                      <p class="text-muted">Genesis.com</p><a href="/applicant/profile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Saved Jobs</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">recommended Jobs</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Logout</a>
                </li>
              </div><div class="scroll-element scroll-x"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div><div class="scroll-element scroll-y"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div></div>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <!--End Navbar-->

    <div class="container d-flex justify-content-center mt-5">
      <div class="col-md-12">

      
        <div class="card">
          <div class="card-header">
            <h2>Settings</h2>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">

                <h4>Password</h4>
                <p id="displayPassword"></p>
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" style="width: 200px;" onclick="changePasswordForm();" id="btnChangePassword">Change Password</button>

                <hr>

                <h4>Delete Account</h4>
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalDeleteAccount" style="width: 200px;" id="btnDeleteAccount">Delete Account</button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="modalChangePassword" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Change Password</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCloseChangePass">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row mx-3">
              <div class="col-md-12">
                <form id="formPassword">
                  <h3 class="font-weight-bold">Password Details</h3>

                  <div class="form-group">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-key"></i>
                      </span>
                      <input type="password" id="txtCurrentPassword" class="form-control" placeholder="Enter your Current Password" maxlength="18">
                      <span class="input-icon-addon">
                        <button type="button" id="btnToggleCurrentPassword" class="btn btn-icon btn-default btn-link pl-3" onclick="toggleCurrentPasswordVisibility();">
                          <i class="fa fa-eye " id="btnToggleCurrentPasswordIcon"></i>
                        </button>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-key"></i>
                      </span>
                      <input type="password" id="txtNewPassword" class="form-control" placeholder="Enter your New Password" maxlength="18">
                      <span class="input-icon-addon">
                        <button type="button" id="btnToggleNewPassword" class="btn btn-icon btn-default btn-link pl-3" onclick="toggleNewPasswordVisibility();">
                          <i class="fa fa-eye " id="btnToggleNewPasswordIcon"></i>
                        </button>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-key"></i>
                      </span>
                      <input type="password" id="txtConfirmNewPassword" class="form-control" placeholder="Enter your New Password" maxlength="18">
                      <span class="input-icon-addon">
                        <button type="button" id="btnToggleConfirmPassword" class="btn btn-icon btn-default btn-link pl-3" onclick="toggleConfirmPasswordVisibility();">
                          <i class="fa fa-eye " id="btnToggleConfirmPasswordIcon"></i>
                        </button>
                      </span>
                    </div>
                  </div>

                  <button type="button" class="btn btn-primary btn-block my-3" id="btnValidatePassword" onclick="ValidateChangePass('formPassword');">Validate Password</button>
                </form>
              </div>
            </div>

            <div class="row mx-3">
              <div class="col-md-12">
                <form id="formOTPValidation" class="d-none d-sm-none">
                  <h3 class="font-weight-bold">Change Password Confirmation</h3>

                  <div class="form-group">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-key"></i>
                      </span>
                      <input type="text" id="txtOTP" class="form-control" placeholder="Enter OTP" minlength="6" maxlength="6" required>
                    </div>
                  </div>

                  <button type="button" class="btn btn-primary btn-block my-3" id="btnVerifyOTP" onclick="ValidateOTP('formOTPValidation');">Verify OTP</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDeleteAccount" tabindex="-1" role="dialog" aria-labelledby="modalDeleteAccount" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title">Delete Account</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4>Are you sure you want to delete your account?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger" onclick="DeleteAccount();">Yes, Delete my Account</button>
          </div>
        </div>
      </div>
    </div>

    <!--bottom navbar-->
    <footer class="footer fixed-bottom text-white" style="background-color:mediumseagreen">
      <div class="container-fluid">
        <nav class="pull-left">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link">
                  Privacy
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link">
                  Terms & Condition
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link">
                  Protect yourself online
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link">
                  Contact
              </a>
            </li>
          </ul>
        </nav>
        <div class="ml-auto">
            © 2024 JAPAN JOBS.All rights reserved by Japan Jobs
        </div>
      </div>
    </footer>

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

    <script src="../src/Applicant/ApplicantHandler.js"></script>

    <script>
      $(document).ready(function() {

      });
    </script>
  </body>
</html>
