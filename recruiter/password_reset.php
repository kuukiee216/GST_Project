<?php
session_start();

if (!isset($_SESSION['AccountID'])) {
    header('Location: login.php');
    exit;
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
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
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


    <div class="content">
        <div class="page-inner" id="main-board">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center align-items-center">
                    <div class="col-md-5 py-5 px-3">
                        <div class="card p-4">
                            <div class="card-body">
                                <div class="row">
                                    <form id="changePassForm">
                                        <h1 class="font-weight-bold text-dark px-2">Password Reset</h1>
                                        <div class="form-group">
                                            <div for="pass" class="form-label">New Password:</div>
                                            <input type="password" class="form-control" id="pass" name="pass">
                                        </div>

                                        <div class="form-group">
                                            <div for="rpass" class="form-label">Re-enter Password:</div>
                                            <input type="password" class="form-control" id="rpass" name="rpass">



                                    </form>

                                    <div class="d-flex justify-content-end">
                                        <a href="password_verification.php"><button type="submit"
                                                class="btn btn-outline-danger mt-3 mr-1">Back</button></a>
                                        <button type="submit" class="btn btn-danger mt-3 mr-2" id="btnChangePass"
                                            onclick="ChangePass('changePassForm');">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--bottom navbar-->
    <?php include('../PHPFiles/recruiter_footer.php')?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 1: Bootstrap scripts -->
    <script src="../assets/js/atlantis.js"></script>
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
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
    <!-- <script src="../JAVASCRIPT/SCRIPTS.js"></script> -->

    <!-- Atlantis JS -->
    <script src="../assets/js/atlantis.min.js"></script>

    <script>
    function ChangePass(formID) {
        var pass = $('input[name=pass]').val();
        var rpass = $('input[name=rpass]').val();
        $('#btnChangePass').addClass('is-loading');
        $('#btnChangePass').prop('disabled', true);
        disableForm(formID);

        $.ajax({
            type: "Post",
            dataType: "html",
            data: {
                pass: pass,
                rpass: rpass
            },
            url: "../PHPFiles/changePass.php",
            success: function(data) {
                if (data == "0") {
                    swal({
                        title: 'Success!',
                        text: "Password Updated Sucessfully!",
                        icon: 'success',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnChangePass').removeClass('is-loading');
                        $('#btnChangePass').prop('disabled', false);
                        enableForm(formID);

                        location.href = './dashboard_myaccount.php';
                    });

                } else if (data == "1") {
                    swal({
                        title: 'An Error Occurred!',
                        text: "Error Updating Password.",
                        icon: 'error',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnChangePass').removeClass('is-loading');
                        $('#btnChangePass').prop('disabled', false);
                        enableForm(formID);
                    });
                } else if (data == "2") {
                    swal({
                        title: 'Empty Password!',
                        text: "Please enter a password and try again.",
                        icon: 'warning',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnChangePass').removeClass('is-loading');
                        $('#btnChangePass').prop('disabled', false);
                        enableForm(formID);
                    });
                } else if (data == "3") {
                    swal({
                        title: 'Empty Confirmation Password!',
                        text: "Your confirmation password is empty!",
                        icon: 'warning',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnChangePass').removeClass('is-loading');
                        $('#btnChangePass').prop('disabled', false);
                        enableForm(formID);
                    });
                } else if (data == "4") {
                    swal({
                        title: 'Password not match!',
                        text: "Confirmation password and Password isn`t matched!",
                        icon: 'warning',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnChangePass').removeClass('is-loading');
                        $('#btnChangePass').prop('disabled', false);
                        enableForm(formID);
                    });
                } else if (data == "5") {
                    swal({
                        title: 'Cannot Process the change email request!',
                        text: "Please check your email",
                        icon: 'error',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnChangePass').removeClass('is-loading');
                        $('#btnChangePass').prop('disabled', false);
                        enableForm(formID);
                    });
                } else if (data == "6") {
                    swal({
                        title: 'Invalid Format!',
                        text: "Please only type valid format!",
                        icon: 'error',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnChangePass').removeClass('is-loading');
                        $('#btnChangePass').prop('disabled', false);
                        enableForm(formID);
                    });
                } else {
                    swal({
                        title: 'An Error Occurred!',
                        text: "Something went wrong. Please try again",
                        icon: 'error',
                        buttons: {
                            confirm: {
                                text: 'Okay',
                                className: 'btn btn-success'
                            }
                        }
                    }).then(function() {
                        $('#btnChangePass').removeClass('is-loading');
                        $('#btnChangePass').prop('disabled', false);
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
                    $('#btnChangePass').removeClass('is-loading');
                    $('#btnChangePass').prop('disabled', false);
                    enableForm(formID);
                });
            }
        });
    }


    $("#pass").keypress(function(event) {
        if (event.keyCode === 13) {
            $('#btnChangePass').click();
        }
    });

    $("#rpass").keypress(function(event) {
        if (event.keyCode === 13) {
            $('#btnChangePass').click();
        }
    });
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    function disableForm(formID) {
        var form = document.getElementById(formID);
        var elements = form.elements;
        for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {
            if (elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT') {
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

            if (elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT') {
                elements[elementCounter].disabled = false;
            } else {
                continue;
            }
        }
    }
    </script>
</body>

</html>