<!-- Sessions -->
<?php
    SESSION_START();

    if(isset($_SESSION['AccountID']) && $_SESSION['Role'] == 0){
		if($_SESSION['Token'] != NULL){
			// $Token = $_SESSION['Token'];
			// header("Location: almost_done.php?Token=$Token");
		}
		else
     		header("Location: applicant_profile.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Japan Jobs - Sign In</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/japanLogo.png" type="image/x-icon"/>

	<!-- Vendor CSS Files -->
	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="../assets/vendor/aos/aos.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="../assets/css/main.css" rel="stylesheet">
	<link href="/applicant/applicant.css" rel="stylesheet">
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

	<style>
		#main-board{
			background-color: rgb(240, 240, 240);
			background-attachment: fixed;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
</head>
<body>
	<div class="wrapper">

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
                      <p class="text-muted">Genesis.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
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
													<input type="email" id="txtUserID" name="txtUserID" class="form-control" placeholder="Email Address">
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
											<a href="forgot_password.php">Forgot Password?</a>
										</div>

										<button type="button" class="btn btn-danger btn-round btn-block mt-4" id="btnLogin" onclick="Login('formLogin');">Sign In</button>
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
										<button class="btn btn-block btn-link" onclick="window.location.href='register.php'">Don't have an account? <span class="text-primary">Sign Up</span></button>
									</div>
								</div>
							</div>
                            </div>
                        </div>
                    </div>
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
						location.href = './admin/Dashoard.php';
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
