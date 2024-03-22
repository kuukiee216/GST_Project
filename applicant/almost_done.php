<!doctype html>
<html lang="en">
  <head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis.min.css">
    <link href="/applicant/applicant.css" rel="stylesheet">

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

    <title>Almost Done</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/jj_logo.png">
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
              </ul>
            </div>
          </form>
          </div>
        </div>
        </div>
    </nav>
    <!-- End Navbar -->
        
        <div class="container flex justify-content-center">
            <form class="mx-auto was-validated">
              <h2 class="mb-3">Your Details</h2>
                <div for="email">Email Address:</div><br>
                    <div class="mb-3">
                      <input type="email" class="form-control" id="email" name="email" value="" required><br>
                      <div class="invalid-feedback">Please fill out this field.</div>

                <div for="fname">First Name</div>
                <input type="text" class="form-control" id="fname" placeholder="firstname" name="fname" required>
                <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="mb-3">
            <div for="lname">Last Name</div>
                <input type="text" class="form-control" id="lname" placeholder="lastname" name="lname" required>
                  <div class="invalid-feedback">Please fill out this field.</div>  
        </div>

        <div for="phone">Phone Number:</div><br>
        <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]+" value="+63" required><br>
        <div for="country">Country:</div><br>
        <div class="dropdown">
          <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Country
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">test</a>
            <a class="dropdown-item" href="#">test test</a>
            <a class="dropdown-item" href="#">test test test</a>
          </div>
        </div>
  
        <div class="container">
          <button class="btn btn-danger mt-4" type="submit">Create Account</button>
        </div>

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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
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
  </body>
</html>