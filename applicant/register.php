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
              </ul>
            </div>
          </form>
          </div>
        </div>
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
                                <h1 class="font-weight-bold text-dark">Sign Up</h1>
                                <div class="card-body">
                                    <div class="row">
                                        <form id="formSignUp">
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
                                                        <button type="button" id="btnTogglePasswordSignUp" class="btn btn-icon btn-default btn-link pl-3" onclick="togglePasswordVisibility('txtPassword', 'btnTogglePasswordSignUp', 'btnTogglePasswordIconSignUp');">
                                                            <i class="fa fa-eye" id="btnTogglePasswordIconSignUp"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-icon">
                                                    <span class="input-icon-addon">
                                                        <i class="fa fa-key"></i>
                                                    </span>
                                                    <input type="password" name="txtConfirmPasswordSignUp" id="txtConfirmPasswordSignUp" class="form-control" placeholder="Confirm Password" maxlength="30">
                                                    <span class="input-icon-addon">
                                                        <button type="button" id="btnToggleConfirmPassword" class="btn btn-icon btn-default btn-link pl-3" onclick="togglePasswordVisibility('txtConfirmPasswordSignUp', 'btnToggleConfirmPassword', 'btnToggleConfirmPasswordIconSignUp');">
                                                            <i class="fa fa-eye" id="btnToggleConfirmPasswordIconSignUp"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="row">
                                        <h6 class="text-muted text-center">By creating an account or signing in, you understand and agree to Japan Jobs <a href="" class="text-primary">Terms and Agreement</a>.</h6>

                                        <button type="button" name="submit" class="btn btn-danger btn-round btn-block mt-4" id="btnRegister" onclick="Signup('formSignUp');" >Register</button>
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
                                        <button class="btn btn-block btn-link" onclick="window.location.href='login.php'">Already on JAPAN JOBS? <span class="text-primary">Sign In</span></button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>

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

		function Signup(formID){

			$('#btnRegister').addClass('is-loading');
			$('#btnRegister').prop('disabled', true);
			disableForm(formID);

			var UserID = $("input[name=txtUserID]").val();
			var Password = $("input[name=txtPassword]").val();
			var CPassword = $("input[name=txtConfirmPasswordSignUp]").val();
            var emailPattern = /^[a-zA-Z0-9._-]+@(gmail|yahoo)\.com$/;

            if (!emailPattern.test(UserID)) {
                swal({
                    title: 'Invalid Email Address!',
                    text: "Please enter a valid email address!",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnRegister').removeClass('is-loading');
                    $('#btnRegister').prop('disabled', false);
                    enableForm(formID);
                });
                return;
            }

            if (Password !== CPassword) {
                swal({
                    title: 'Password Mismatch!',
                    text: "The password and confirm password fields do not match.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnRegister').removeClass('is-loading');
                    $('#btnRegister').prop('disabled', false);
                    enableForm(formID);
                });
                return;
            }

			$.ajax({
				type: "POST",
				dataType: "html",
				data: {
					UserID: UserID,
					Password: Password
				},
				url: "../PHPFiles/signup.php",
				success: function(data){
					alert(data);
                    if(data == "0"){
                        swal({
                            title: 'Success!',
                            text: "You have successfully registered! Please check your email and verify.",
                            icon: 'success',
                            buttons : {
                                confirm: {
                                    text : 'Okay',
                                    className : 'btn btn-success'
                                }
                            }
                        }).then(function(){
                            window.location.href = "thank_you.html";
                        });
                    }
					else if(data == "1"){
						swal({
							title: 'An Error Occurred!',
							text: "Something went wrong while trying to register. Please try again.",
							icon: 'error',
							buttons : {
								confirm: {
									text : 'Okay',
									className : 'btn btn-success'
								}
							}
						}).then(function(){
							$('#btnRegister').removeClass('is-loading');
							$('#btnRegister').prop('disabled', false);
							enableForm(formID);
						});
					}
					else if(data == "2"){
						swal({
							title: 'Empty Email!',
							text: "Please enter your email and try again.",
							icon: 'warning',
							buttons : {
								confirm: {
									text : 'Okay',
									className : 'btn btn-success'
								}
							}
						}).then(function(){
							$('#btnRegister').removeClass('is-loading');
							$('#btnRegister').prop('disabled', false);
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
							$('#btnRegister').removeClass('is-loading');
							$('#btnRegister').prop('disabled', false);
							enableForm(formID);
						});
					}else if(data == "5"){
						swal({
							title: 'Failed to Send Email!',
							text: "Something went wrong while trying to send the confirmation email. Please try again.",
							icon: 'warning',
							buttons : {
								confirm: {
									text : 'Okay',
									className : 'btn btn-success'
								}
							}
						}).then(function(){
							$('#btnRegister').removeClass('is-loading');
							$('#btnRegister').prop('disabled', false);
							enableForm(formID);
						});
					}
					else if(data == "5"){
						swal({
							title: 'Failed to Send Email!',
							text: "Something went wrong while trying to send the confirmation email. Please try again.",
							icon: 'warning',
							buttons : {
								confirm: {
									text : 'Okay',
									className : 'btn btn-success'
								}
							}
						}).then(function(){
							$('#btnRegister').removeClass('is-loading');
							$('#btnRegister').prop('disabled', false);
							enableForm(formID);
						});
					}

					else if(data == "6"){
						swal({
							title: 'Email already Exist!',
							text: "You already have account, please login!",
							icon: 'warning',
							buttons : {
								confirm: {
									text : 'Okay',
									className : 'btn btn-success'
								}
							}
						}).then(function(){
							$('#btnRegister').removeClass('is-loading');
							$('#btnRegister').prop('disabled', false);
							enableForm(formID);
						});
					}
					else{
						swal({
							title: 'An Error Occurred!',
							text: "Something went wrong while trying to register. Please try again.",
							icon: 'error',
							buttons : {
								confirm: {
									text : 'Okay',
									className : 'btn btn-success'
								}
							}
						}).then(function(){
							$('#btnRegister').removeClass('is-loading');
							$('#btnRegister').prop('disabled', false);
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
						$('#btnRegister').removeClass('is-loading');
							$('#btnRegister').prop('disabled', false);
							enableForm(formID);
					});
				}
			});
		}

		$("#txtUserID").keypress(function (event) {
			if (event.keyCode === 13) {
				$('#btnRegister').click();
			}
		});
		$("#txtPassword").keypress(function (event) {
			if (event.keyCode === 13) {
				$('#btnRegister').click();
			}
		});

        $("#txtConfirmPasswordSignUp").keypress(function (event) {
			if (event.keyCode === 13) {
				$('#btnRegister').click();
			}
		});


		if (window.history.replaceState){
			window.history.replaceState(null, null, window.location.href);
		}

		function togglePasswordVisibility(passwordFieldId, toggleButtonId, toggleButtonIconId) {
            var passwordField = document.getElementById(passwordFieldId);
            var toggleButton = document.getElementById(toggleButtonId);
            var toggleButtonIcon = document.getElementById(toggleButtonIconId);

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButtonIcon.classList.remove('fa-eye');
                toggleButtonIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = "password";
                toggleButtonIcon.classList.remove('fa-eye-slash');
                toggleButtonIcon.classList.add('fa-eye');
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
