<!-- Sessions -->
<?php
    // SESSION_START();

    // if($_SESSION['Token'] == NULL){
    //   header("Location: applicant_profile.php");
    // }
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
   <link href="/assets/css/atlantis.css" rel="stylesheet">
   <link href="/CSS/almost_done.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Almost Done</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/jj_logo.png">
  </head>

  <body>
    <!-- Japan job posting icon href-->
    <nav class="navbar navbar-expand-sm">
      <div class="container-fluid">
        <a class="navbar-brand font-RR text-white" href="/FILES-Applicant Side/Landing_Page.html">
        <img src="/assets/img/jj_logo.png" alt="logo" style="width:80px;"> Japan Jobs</a>
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
        <input type="tel" class="form-control" id="phone" name="phone" required><br>
        <div for="country">Country:</div><br>
        <div class="dropdown">
          <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"name="country" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"name="country" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Country
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">test</a>
            <a class="dropdown-item" href="#">test test</a>
            <a class="dropdown-item" href="#">test test test</a>
          </div>
        </div>

        <div class="container">
          <button class="btn btn-danger mt-4" type="submit" onclick="AccountSubmit('formAccountDetails');"> Create Account </button>
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
    <script>
      function AccountSubmit(formID){

        /* - email
          - fname
          - lname
          - phone*/

        var UserEmail = $("input[name=email]").val();
        var UserFname = $("input[name=fname]").val();
        var UserLname = $("input[name=lname]").val();
        var UserPhone = $("input[name=phone]").val();
        var UserCountry = "test";

        
        $.ajax({
          type: "POST",
          dataType: "html",
          data: {
            UserEmail: UserEmail,
            UserFname: UserFname,
            UserLname: UserLname,
            UserPhone: UserPhone,
            UserCountry: UserCountry 
          },
          url: "../PHPFiles/applicant_info_save.php",
          success: function(data){
            alert("test : " + data);
            if(data == "0"){
              // $('#btnLogin').removeClass('is-loading');
              // $('#btnLogin').prop('disabled', false);
              // enableForm(formID);
              location.href = "applicant_profile.php";
            }
            else if(data == "1"){
              swal({
                title: 'An Error Occurred!',
                text: "Something went wrong while trying to login. Please try again.",
                icon: 'error',
                buttons : {
                  confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                  }
                }
              }).then(function(){
                $('#btnLogin').removeClass('is-loading');
                $('#btnLogin').prop('disabled', false);
                enableForm(formID);
              });
            }
            else if(data == "2"){
              swal({
                title: 'Email Missing!',
                text: "Please Enter Email",
                icon: 'warning',
                buttons : {
                  confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                  }
                }
              }).then(function(){
                $('#btnLogin').removeClass('is-loading');
                $('#btnLogin').prop('disabled', false);
                enableForm(formID);
              });
            }
            else if(data == "3"){
              swal({
                title: 'First Name Missing!',
                text: "Please Enter your First Name.",
                icon: 'warning',
                buttons : {
                  confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                  }
                }
              }).then(function(){
                $('#btnLogin').removeClass('is-loading');
                $('#btnLogin').prop('disabled', false);
                enableForm(formID);
              });
            }else if(data == "4"){
              swal({
                title: 'Last Name Missing!',
                text: "Please Enter your Last Name",
                icon: 'error',
                buttons : {
                  confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                  }
                }
              }).then(function(){
                $('#btnLogin').removeClass('is-loading');
                $('#btnLogin').prop('disabled', false);
                enableForm(formID);
              });
            }
            else if(data == "5"){
              swal({
                title: 'Phone Number Missing!',
                text: "Please Enter your Phone Number",
                icon: 'error',
                buttons : {
                  confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                  }
                }
              }).then(function(){
                $('#btnLogin').removeClass('is-loading');
                $('#btnLogin').prop('disabled', false);
                enableForm(formID);
              });
            }
            else if(data == "6"){
              swal({
                title: 'What Country is this?',
                text: "What Country is this?",
                icon: 'error',
                buttons : {
                  confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                  }
                }
              }).then(function(){
                $('#btnLogin').removeClass('is-loading');
                $('#btnLogin').prop('disabled', false);
                enableForm(formID);
              });
            }
            else if(data == "7"){
              swal({
                title: 'PDO Exception',
                text: "PDO Exception",
                icon: 'error',
                buttons : {
                  confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                  }
                }
              }).then(function(){
                $('#btnLogin').removeClass('is-loading');
                $('#btnLogin').prop('disabled', false);
                enableForm(formID);
              });
            }
            else{
              swal({
                title: 'An Error Occurred!',
                text: "Something went wrong while trying to login. Please try again.",
                icon: 'error',
                buttons : {
                  confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                  }
                }
              }).then(function(){
                $('#btnLogin').removeClass('is-loading');
                $('#btnLogin').prop('disabled', false);
                enableForm(formID);
              });
            }
          },
          error: function(xhr, status, error){
            swal({
              title: 'Failed to Connect to Server!',
              text: "Something went wrong while trying to connect to the server. Please",
              icon: 'error',
              buttons : {
                confirm: {
                  text : 'Okay',
                  className : 'btn btn-success'
                }
              }
            }).then(function(){
              $('#btnLogin').removeClass('is-loading');
                $('#btnLogin').prop('disabled', false);
                enableForm(formID);
            });
          }
        }); 
      }

      function disableForm(formID){
			var form = document.getElementById(formID);
			var elements = form.elements;
			for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {
				if(elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT'){
					elements[elementCounter].disabled = true;
				}
				else{
					continue;
				}
			}
		}
		function enableForm(formID){
			var form = document.getElementById(formID);
			var elements = form.elements;
			for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {

				if(elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT'){
					elements[elementCounter].disabled = false;
				}
				else{
					continue;
				}
			}
		}

    </script>

  </body>
</html>
