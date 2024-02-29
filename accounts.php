<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Japan Jobs - Sign In</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/japanLogo.png" type="image/x-icon"/>

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/main.css" rel="stylesheet">

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<style>
		#main-board{
			background-color: rgb(240, 240, 240);
			background-attachment: fixed;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
        <div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="green2">
				
				<a href="accounts.php" class="logo">
					<img src="assets/img/LogoBanner.png" alt="navbar brand" class="navbar-brand">
				</a>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="green2">			
			</nav>
			<!-- End Navbar -->
		</div>

        <div class="main-panel w-100">
			<div class="content">
				<div class="page-inner" id="main-board">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center align-items-center">
                            <div class="col-md-4 py-4 px-2">
                                <div class="card p-5">
                                    <h1 class="font-weight-bold text-dark">Sign In</h1>

                                    <div class="card-body">
                                        <div class="row">
                                            <form id="formLogin">
                                                <div class="form-group">
                                                    <div class="input-icon">
                                                        <span class="input-icon-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                        <input type="email" id="txtUserID" class="form-control" placeholder="Email Address" maxlength="9">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-icon">
                                                        <span class="input-icon-addon">
                                                            <i class="fa fa-key"></i>
                                                        </span>
                                                        <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Password" maxlength="30">
                                                        <span class="input-icon-addon">
                                                            <button type="button" id="btnTogglePassword" class="btn btn-icon btn-default btn-link pl-3" onclick="togglePasswordVisibility();">
                                                                <i class="fa fa-eye " id="btnTogglePasswordIcon"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 d-flex justify-content-end">
                                                <a href="forgotpassword.php">Forgot Password?</a>
                                            </div>

                                            <button type="button" class="btn btn-danger btn-round btn-block mt-4" id="btnLogin" onclick="">Sign In</button>
                                        </div>

                                        <div class="row mt-3 mb-2 d-flex justify-content-center align-items-center">
                                            <h3>OR</h3>
                                        </div>

                                        <div class="row">
                                            <button type="button" class="btn btn-default btn-round btn-border btn-block d-flex align-items-center justify-content-start" id="" onclick="">
                                                <i class="fab fa-google fa-lg mr-auto"></i> 
                                                <span class="flex-grow-1">Connect with Google</span>
                                            </button>
                                            <button type="button" class="btn btn-default btn-round btn-border btn-block d-flex align-items-center justify-content-start" id="" onclick="">
                                                <i class="fab fa-facebook fa-lg mr-auto"></i> 
                                                <span class="flex-grow-1">Connect with Facebook</span>
                                            </button>
                                            <button type="button" class="btn btn-default btn-round btn-border btn-block d-flex align-items-center justify-content-start" id="" onclick="">
                                                <i class="fab fa-apple fa-lg mr-auto"></i> 
                                                <span class="flex-grow-1">Connect with Apple</span>
                                            </button>
                                            <a class="btn btn-link btn-block">Don't have an account? <span class="text-primary">Sign Up</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>

			<footer class="footer">
                <div class="container-fluid">
                    <!--
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Help
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    -->
                    <div class="copyright mr-auto">
                        2024 JAPAN JOBS. All rights reserved.
                    </div>				
                </div>
            </footer>
		</div>
	</div>

	<!-- Preloader -->
	<div id="preloader">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>

	<!-- Vendor JS Files -->
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>

	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>

	<script>
		/*
			* Preloader
		*/
		const preloader = document.querySelector('#preloader');
		if (preloader) {
			window.addEventListener('load', () => {
			preloader.remove();
			});
		}

		function Login(formID){

			$('#btnLogin').addClass('is-loading');
			$('#btnLogin').prop('disabled', true);
			disableForm(formID);

			var UserID = $("input[name=txtUserID]").val();
			var Password = $("input[name=txtPassword]").val();

			$.ajax({
				type: "POST",
				dataType: "html",
				data: {
					UserID: UserID,
					Password: Password
				},
				url: "PHPFiles/loginvalidation.php",
				success: function(data){
                    if(data == "0"){
                        $('#btnLogin').removeClass('is-loading');
                        $('#btnLogin').prop('disabled', false);
                        enableForm(formID);

                        location.href = "admin/Dashboard.php";
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
					else if(data == "5"){
						swal({
							title: 'Incorrect Credentiials!',
							text: "Incorrect Password or Username.",
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

		$("#txtUserID").keypress(function (event) {
			if (event.keyCode === 13) {
				$('#btnLogin').click();
			}
		});
		$("#txtPassword").keypress(function (event) {
			if (event.keyCode === 13) {
				$('#btnLogin').click();
			}
		});

		if (window.history.replaceState){
			window.history.replaceState(null, null, window.location.href);
		}

		function togglePasswordVisibility() {
			var passwordField = document.getElementsByName("txtPassword");

			if (passwordField[0].type === "password") {
				passwordField[0].type = "text";
				$('#btnTogglePasswordIcon').removeClass('fas fa-eye').addClass('fas fa-eye-slash');
			} 
			else {
				passwordField[0].type = "password";
				$('#btnTogglePasswordIcon').removeClass('fas fa-eye-slash').addClass('fas fa-eye');
			}
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