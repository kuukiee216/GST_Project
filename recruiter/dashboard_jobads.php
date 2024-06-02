<?php
SESSION_START();

if (isset($_SESSION['AccountID'])) {

} else {
    header("Location: ../PHPFiles/Recruiter/logout.php");

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


    <title>Japan Jobs Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">




    <style>
    body,
    html {
        height: 100%;
    }

    .content {
        min-height: calc(100vh - 56px - 70px);
        /* Adjust 56px for header and 70px for footer height */
    }

    footer.footer {
        position: relative;
        bottom: 0;
        width: 100%;
        height: 70px;
        /* Footer height */
    }
    </style>
</head>

<body>
    <!--Navbar Header-->
    <?php include '../PHPFiles/recruiter_header.php'?>
    <!--End Navbar-->

    <div class="pb-3">
        <img src="../assets/img/bg_recruiter.png" style="width:100%">
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="container d-flex justify-content-center min-vh-100">
                <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                    <li class="nav-item submenu">
                        <a class="nav-link active show" id="pills-open-tab-nobd" data-toggle="pill"
                            href="#pills-open-nobd" role="tab" aria-controls="pills-open-nobd"
                            aria-selected="false">Open</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link" id="pills-expired-tab-nobd" data-toggle="pill" href="#pills-expired-nobd"
                            role="tab" aria-controls="pills-expried-nobd" aria-selected="false">Expired</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link" id="pills-draft-tab-nobd" data-toggle="pill" href="#pills-draft-nobd"
                            role="tab" aria-controls="pills-draft-nobd" aria-selected="false">Draft</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link" id="pills-candidates-tab-nobd" data-toggle="pill"
                            href="#pills-candidates-nobd" role="tab" aria-controls="pills-candidates-nobd"
                            aria-selected="false">Your Candidates</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                <div class="tab-pane fade active show" id="pills-open-nobd" role="tabpanel"
                    aria-labelledby="pills-open-tab-nobd">
                    <div id="openJobContainer" class="container" style="width: 80%;"></div>
                </div>
                <div class="tab-pane fade" id="pills-expired-nobd" role="tabpanel"
                    aria-labelledby="pills-expired-tab-nobd">
                    <div id="expiredJobContainer" class="container" style="width: 80%;"></div>
                </div>
                <div class="tab-pane fade" id="pills-draft-nobd" role="tabpanel" aria-labelledby="pills-draft-tab-nobd">
                    <div id="draftJobContainer" class="container" style="width: 80%;"></div>
                </div>
                <div class="tab-pane fade" id="pills-candidates-nobd" role="tabpanel"
                    aria-labelledby="pills-candidates-tab-nobd">
                    <div id="candidate" class="container" style="width: 80%;"></div>


                </div>
            </div>
        </div>
    </div>


    <!--bottom navbar-->
    <?php include '../PHPFiles/recruiter_footer.php'?>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    function test() {
        var variablename = $('#Div-filter').attr('class'); //variable name (id or class)

        if (variablename == 'dropdown d-flex justify-content-center gap-3') { //variablename = class
            $('#Div-filter').addClass('d-none d-sm-none');
        } else {
            $('#Div-filter').removeClass('d-none d-sm-none');
        }
    }
    </script>

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

    <script src="../ajax/Recruiter/GetJobStatus.js"></script>

    <script>
    $(document).ready(function() {
        GetJobTitles().then(function() {
            displayJobTitles();
        });

        GetExpiredJobTitles().then(function() {
            displayExpiredJobTitles();
        });

        GetDraftJobTitles().then(function() {
            displayDraftJobTitles();
        });

        GetCandidate().then(function() {
            displayCandidate();
        });
    });
    </script>
</body>

</html>