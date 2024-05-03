<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/css/atlantis.css">
    <link href="../CSS-RECRUITER/register_account.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis.min.css">

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

    <title>Subscription</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>

<body>
    <!--Navbar Header-->
    <?php include('../PHPFiles/recruiter_header.php')?>
    <!--End Navbar-->

    <div class="container-fluid">
        <div class="row">
            <h5 class="mt-5">Pay upfront and get a discount on ads</h5>
            <p class="mb-5">Choose an Ad budget and use your balance to post ad jobs</p>


            <div class="row justify-content-center align-items-center mb-1">
                <div class="col-md-3 pl-md-0">
                    <div class="card card-pricing">
                        <div class="card-header">
                            <h4 class="card-title">Occasional</h4>
                            <span class="sub-title">2-3 ads over 6 months</span>
                            <div class="card-price">
                                <span class="price">$17,920</span>
                                <span class="text">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="specification-list">
                                <li>
                                    <span class="name-specification">4% off Basic ads</span>
                                </li>
                                <li>
                                    <span class="name-specification">4% off Branded ads</span>
                                </li>
                                <li>
                                    <span class="name-specification">Post any ad type</span>
                                </li>
                                <li>
                                    <span class="name-specification">Discount apply for 6 months, even after your
                                        balance is
                                        used up</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-block"><b>Select</b></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pl-md-0 pr-md-0">
                    <div class="card card-pricing card-pricing-focus card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Regular</h4>
                            <span class="sub-title">2-3 ads over 6 months</span>
                            <div class="card-price">
                                <span class="price">$28,000</span>
                                <span class="text">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="specification-list">
                                <li>
                                    <span class="name-specification">10% off Basic ads</span>
                                </li>
                                <li>
                                    <span class="name-specification">10% off Branded ads</span>
                                </li>
                                <li>
                                    <span class="name-specification">3% off Premium ads</span>
                                </li>
                                <li>
                                    <span class="name-specification">Post any ad type</span>
                                </li>
                                <li>
                                    <span class="name-specification">Discount apply for 12 months, even after your
                                        balance
                                        is used up</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-light btn-block"><b>Select</b></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pr-md-0">
                    <div class="card card-pricing">
                        <div class="card-header">
                            <h4 class="card-title">Frequent</h4>
                            <span class="sub-title">2-3 ads over 6 months</span>
                            <div class="card-price">
                                <span class="price">$52,640</span>
                                <span class="text">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="specification-list">
                                <li>
                                    <span class="name-specification">20% off Basic ads</span>
                                </li>
                                <li>
                                    <span class="name-specification">20% off Branded ads</span>
                                </li>
                                <li>
                                    <span class="name-specification">10% off Premium ads</span>
                                </li>
                                <li>
                                    <span class="name-specification">Post any ad type</span>
                                </li>
                                <li>
                                    <span class="name-specification">Discount apply for 12 months, even after your
                                        balance
                                        is used up</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-block"><b>Get Started</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container justify-content-center form-group mt-3 mb-5">
            <a href="../recruiter/dashboard_subspay.php"><button class="btn btn-danger"
                    type="button">Continue</button></a>


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

        <script src="../ajax/Recruiter/ProfileHandler.js"></script>

        <script src="../ajax/Recruiter/ChangePassHandler.js"></script>
</body>

</html>