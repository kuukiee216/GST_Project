<!-- Sessions -->
<?php
    // SESSION_START();
  
    if (isset($_GET['Token'])) 
      $token_value = $_GET['Token'];
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
   rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900" media="all">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="../assets/css/atlantis.css" rel="stylesheet">
   <link href="/CSS/almost_done.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Almost Done</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
  </head>

  <body>
    <!-- Japan job posting icon href-->
    <nav class="navbar navbar-expand-sm">
      <div class="container-fluid">
        <a class="navbar-brand font-RR text-white" href="../applicant/Landing_Page.html">
        <img src="../assets/img/jj_logo.png" alt="logo" style="width:80px;"> Japan Jobs</a>
      </div>
    </nav>

    <form class="mx-auto was-validated" name="formAccountDetails" id="formAccoutnDetails">
        <div class="container flex justify-content-center">
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
          <input type="tel" class="form-control" id="phone" name="phone" required><br>
        <div for="country">Country:</div><br>

        <div class="dropdown">
          <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"name="country" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Country
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdownMenu">
          </div>
        </div>

        <div class="container">
          <button class="btn btn-danger mt-4" id="btnSubmit" type="button"> Create Account </button>
        </div>
    
      </div>
    </form>

    <!--bottom navbar-->
    <footer class="p-2 navbar">

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

    <!-- php functions -->
    <script src="../src/RegistrationHandler.js"></script>
    
    <script>
      $(document).ready(function(){ 
        getCountries();
        
        <?php
            echo "
            var token_value = '$token_value';
            readyFillUpForm(token_value);
            ";
        ?>

      });

      $('#btnSubmit').click(function(){
        
          AccountSubmit('formAccountDetails');
      });
    </script>

  </body>
</html>