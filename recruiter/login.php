<?php
SESSION_START();

if (isset($_SESSION['AccountID']) && $_SESSION['Role'] == 2) {
    header("Location: dashboard_myaccount.php");
	exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../CSS-RECRUITER/register_account.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis.min.css">
    <link href="../CSS-RECRUITER/register_account.css" rel="stylesheet">

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['../assets/css/fonts.min.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <title>Sign in form</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/jj_logo.png">
</head>

<body>

    <!--Navbar Header-->
    <nav class="navbar navbar-header navbar-expand-lg" style="background-color:#187498">
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
                                    <a class="nav-link text-white" href="/recruiter/dashboard_recruiter.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Japan Ads</a>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-justify">
                <li class="nav-item dropdown hidden-caret">
                </li>
            </ul>
        </div>
    </nav>
    <!--End Navbar-->

    <form id="formLogin">
        <div class="card container flex justify-content-center mt-5 mb-5" style="width: 50%;">
            <h1 class="text-center">Sign In</h1>
            <div class="mb-3 mt-5">
                <label for="txtUserID" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="txtUserID" name="txtUserID" aria-describedby="emailhelp">
            </div>

            <div class="mb-3">
                <label for="txtPassword" class="form-label">Password</label>
                <input type="password" class="form-control mb-3" name="txtPassword" id="txtPassword">
                <button type="submit" class="btn btn-danger mt-4" id="btnLogin" onclick="Login('formLogin');">Sign
                    in</button>
                <!--    <p>by creating an account bla bla bla Terms and Condition</p> -->
                <hr>
            </div>
    </form>

    </div>

    <!--bottom navbar-->
    <footer class="footer text-white" style="background-color:#187498">
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

    <!-- Option 1: Bootstrap scripts -->
    <script src="../.../assets/js/atlantis.js"></script>
    <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

    function Login(formID) {

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
            success: function(data) {
                alert(data)
                if (data == "0") {
                    $('#btnLogin').removeClass('is-loading');
                    $('#btnLogin').prop('disabled', false);
                    enableForm(formID);

                    location.href = "dashboard_myaccount.php";
                } else if (data == "1") {
                    swal({
                        title: 'An Error Occurred!',
                        text: "Something went wrong while trying to login. Please try again.",
                        icon: 'error',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnLogin').removeClass('is-loading');
                        $('#btnLogin').prop('disabled', false);
                        enableForm(formID);
                    });
                } else if (data == "2") {
                    swal({
                        title: 'Empty Username!',
                        text: "Please enter your username and try again.",
                        icon: 'warning',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnLogin').removeClass('is-loading');
                        $('#btnLogin').prop('disabled', false);
                        enableForm(formID);
                    });
                } else if (data == "3") {
                    swal({
                        title: 'Empty Password!',
                        text: "Please enter your password and try again.",
                        icon: 'warning',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnLogin').removeClass('is-loading');
                        $('#btnLogin').prop('disabled', false);
                        enableForm(formID);
                    });
                } else if (data == "4") {
                    location.href = 'edit_profile.php';
                } else if (data == "5") {
                    location.href = '../admin/admin_dashboard_main.php';
                } else if (data == "6") {
                    swal({
                        title: 'Invalid Roles!',
                        text: "No role Existing",
                        icon: 'error',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnLogin').removeClass('is-loading');
                        $('#btnLogin').prop('disabled', false);
                        enableForm(formID);
                    });
                } else if (data == "7") {
                    swal({
                        title: 'Email not found!',
                        text: "Incorrect Email.",
                        icon: 'error',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnLogin').removeClass('is-loading');
                        $('#btnLogin').prop('disabled', false);
                        enableForm(formID);
                    });
                } else if (data == "8") {
                    swal({
                        title: 'Cannot Process the login request!',
                        text: "Please check your credentials",
                        icon: 'error',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnLogin').removeClass('is-loading');
                        $('#btnLogin').prop('disabled', false);
                        enableForm(formID);
                    });
                } else if (data == "9") {
                    swal({
                        title: 'Incorrect Credentiials!',
                        text: "Password didn`t match",
                        icon: 'error',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnLogin').removeClass('is-loading');
                        $('#btnLogin').prop('disabled', false);
                        enableForm(formID);
                    });
                } else {
                    swal({
                        title: 'An Error Occurred!',
                        text: "Something went wrong while trying to login.",
                        icon: 'error',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnLogin').removeClass('is-loading');
                        $('#btnLogin').prop('disabled', false);
                        enableForm(formID);
                    });
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: 'Failed to Connect to Server!',
                    text: "Something went wrong while trying to connect to the server. Please",
                    icon: 'error',
                    buttons: {
                        confirm: {
                            text: 'Okay',
                            className: 'btn btn-success'
                        }
                    }
                }).then(function() {
                    $('#btnLogin').removeClass('is-loading');
                    $('#btnLogin').prop('disabled', false);
                    enableForm(formID);
                });
            }
        });
    }

    $("#txtUserID").keypress(function(event) {
        if (event.keyCode === 13) {
            $('#btnLogin').click();
        }
    });
    $("#txtPassword").keypress(function(event) {
        if (event.keyCode === 13) {
            $('#btnLogin').click();
        }
    });

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    function disableForm(formID) {
        var form = document.getElementById(formID);
        var elements = form.elements;
        for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {
            if (elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName ==
                'SELECT') {
                elements[elementCounter].disabled = true;
            } else {
                continue;
            }
        }
    }

    function enableForm(formID) {
        var form = document.getElementById(formID);
        var elements = form.elements;
        for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {

            if (elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName ==
                'SELECT') {
                elements[elementCounter].disabled = false;
            } else {
                continue;
            }
        }
    }
    </script>
</body>

</html>