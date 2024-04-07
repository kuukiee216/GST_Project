<?php
  SESSION_START();

  date_default_timezone_set('Asia/Manila');
  $currentDateTime = time();

  if(isset($_SESSION['AccountID']) && $_SESSION['Role'] == 1 && $currentDateTime < $_SESSION['expire']){
      header ("Location: ../admin/admin_dashboard_main.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
   rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="/assets/css/atlantis.css" rel="stylesheet">
   <link href="/CSS-admin/test.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>ADMIN</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/jj_logo.png">
  </head>
  <body>

    <!-- Japan job posting icon href-->
    
    <nav class="navbar navbar-expand-sm">
      <div class="container-fluid">
        <a class="navbar-brand font-RR text-white">
        <img src=" ../assets/img/JapanJobs.png" alt="logo" style="width:80px;"> Japan Jobs</a>
      </div>
    </nav>
        
        <div class="container-fluid">
            <form id="formLogin" class="mx-auto">
                <h1 class="text-center">Sign In</h1>
        
                <div class="container flex mb-3 mt-5">  
                        <label for="InputEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="txtUserID" id="txtUserID" aria-describedby="emailhelp">
                </div>

                <div class="container flex mb-3">
                    <label for="InputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control mb-3" name="txtPassword" id="txtPassword">
                    <a href="#" class="text-end">Forgot Password?</a>
                    <button type="button" class="btn btn-danger mt-4" onclick="Login('formLogin');">LOGIN</button> 
                </div>
            </form>
        </div>

    <!--bottom navbar-->
    <footer class="p-2 navbar">
      
      <ul class="nav m-3">
          <div>© 2024 JAPAN JOBS.All rights reserved</div>
        </ul>
      </div>
    </footer>

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

    <!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>


    <script>
	function Login(formID){

		alert('worked');

		// $('#btnLogin').addClass('is-loading');
		// $('#btnLogin').prop('disabled', true);
		// disableForm(formID);

		var UserID = $("input[name=txtUserID]").val();
		var Password = $("input[name=txtPassword]").val();

		console.log(UserID, Password);

		$.ajax({
			type: "POST",
			dataType: "html",
			data: {
				UserID: UserID,
				Password: Password
			},
			url: "../PHPFiles/loginvalidation.php",
			success: function(data){
				if(data == "0"){
						$('#btnLogin').removeClass('is-loading');
						$('#btnLogin').prop('disabled', false);
						enableForm(formID);

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
						title: 'Empty Username!',
						text: "Please enter your username and try again.",
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
						title: 'Empty Password!',
						text: "Please enter your password and try again.",
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
				else if(data == "4"){
					location.href = 'applicant_profile.php';
				}
				else if(data == "5"){
					location.href = '../admin/admin_dashboard_main.php';
				}
				else if(data == "6"){
					swal({
						title: 'Invalid Roles!',
						text: "No role Existing",
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
						title: 'Email not found!',
						text: "Incorrect Email.",
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
				else if(data == "8"){
					swal({
						title: 'Cannot Process the login request!',
						text: "Please check your credentials",
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
				else if(data == "9"){
					swal({
						title: 'Incorrect Credentiials!',
						text: "Password didn`t match",
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
						text: "Something went wrong while trying to login.",
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