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

    <title>Edite Profile</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>
<body>
    <!-- Navbar Header -->
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
                      <p class="text-muted">Genesis.com</p><a href="profile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
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
          <li>
            <form class="d-flex">
              <div>
                <a class="text-white nav-link" href="/FILES-Recruiter Side/dashboard_recruiter.html">Recruiter Site</a>
              </div>
            </form>
          </li>
        </ul>
      </div>
      </nav>
      <!-- End Navbar -->

    <div class="container-fluid flex justify-content-center" style="width: 50%;">
      <button class="btn btn-danger mt-3 mb-3">
        <i class="fa fa-arrow-left"></i>
      </button>

      <h2>Contact Information</h2>

      <form id="changeContact">

        <div class="form-group mb-5">
          <label for="Fname">First Name</label>
          <input type="text" class="form-control" id="Fname" name="Fname" aria-describedby="">
        </div>

        <div class="form-group mb-5">
          <label for="Lname">Last Name</label>
          <input type="text" class="form-control" id="Lname" name="Lname" aria-describedby="">
        </div>

        <div class="form-group mb-5">
          <label for="Pnum">Phone Number</label>
          <div class="input-group">
            <input type="tel" class="form-control" id="Pnum" name="Pnum" aria-label="Text input with dropdown button">
            <div class="input-group-append">
              <button class="btn btn-outline-dark btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+63</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
        </div>

        <h2>Email</h2>
        <p id="displayEmail"></p>
        <a class="nav-link mb-5" href="Settings.php">Edit Email in Settings</a>
        <hr>

        <h2>Home Location</h2>
        <Label for="country">Country</Label>
        <input type="text" class="form-control mb-5" name="country" id="country" aria-label="text input">

        <Label for="street">Street Address</Label>
        <input type="text" class="form-control mb-5" id="street" name="street" aria-label="text input">

        <div class="form-group ">
            <Label for="city">City</Label>
            <input type="text" class=" form-control mb-5" id="city" name="city" aria-label="text input">

            <Label for="state">State</Label>
            <input type="text" class=" form-control mb-5" id="state" name="state" aria-label="text input">
        </div>

        <label for="Pcode">Postal Code</label>
        <input type="text" class="form-control mb-5" id="postal" name="postal" aria-label="text input">

        <div>
          <button type="submit" class="btn btn-danger mb-5" value="submit" id="btnEditProfle">Save</button>
          <button type="button" class="btn btn-outline-danger mb-5" value="submit">Cancel</button>
        </div>

      </form>
    </div>

    <!--bottom navbar-->
    <footer class="footer text-white" style="background-color:mediumseagreen">
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

<<<<<<< HEAD
    <script src="../ajax/ContactInfo.js"></script>
    <script src="../ajax/SettingsGetEmail.js"></script>
    <script src="../ajax/ContactUpdate.js"></script>
    <!-- Add jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Sweet Alert -->
    <script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <script>
          $(document).ready(function() {
            $('#btnEditProfle').click(function() {
              UpdateContactInfo('changeContact');
            });
            GetContactInfo();
            GetEmail();
          });
        </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

=======
          <!-- Option 1: Bootstrap scripts -->
          <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
          <!-- Option 1: Bootstrap scripts -->
          <script src="../.../assets/js/atlantis.js"></script>
          <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
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
>>>>>>> 376d52ce9fcb9390935abfb4f61dce55a4be79b7
</body>
</html>
