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

    <title>Create Job Ad</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>

<body>
    <!--Navbar Header-->
    <?php include('../PHPFiles/recruiter_header.php')?>
    <!--End Navbar-->

    <div class="container-fluid">
        <div class="container flex justify-content-center mt-5" style="width: 50%;">
            <div class="progress-card">
                <div class="progress-status">
                    <a href="../recruiter/dashboard_recruiter.php">
                        <button type="button" class="btn btn-icon btn-round btn-primary">
                            <i class="fa fa-arrow-circle-left"></i>
                        </button>
                    </a>
                    <span class="text-muted fw-bold">25%</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="0"
                        aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="25%"></div>
                </div>
            </div>

            <form>
                <h2><b>Classify Your Role</b></h2>
                <br>
                <h3>Role Information</h3>
                <h4>Location</h4>
                <input type="tel" class="form-control"
                    placeholder="Enter a Subsurb, City, or Region. (e.g. Tokyo, Japan)">
                <br>

                <h2>Pay Details</h2>
                <h4>Pay Type</h4>
                <div class="form-check row cols-4" aria-required="true">
                    <label class="form-radio-label col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                        <span class="form-radio-sign">Hourly Rate</span>
                    </label>

                    <label class="form-radio-label col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                        <span class="form-radio-sign">Monthly Salary</span>
                    </label>

                    <label class="form-radio-label col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                        <span class="form-radio-sign">Annual Salary</span>
                    </label>

                    <label class="form-radio-label col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                        <span class="form-radio-sign">Annual Plus Commission</span>
                    </label>
                </div>

                <div class="form-group row">
                    <h4>Pay Range</h4>
                    <div class="row">
                        <div class="col">
                            <label for="exampleCurrency">Currency:</label>
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-border dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select
                                    Currency</button>
                                <div class="dropdown-menu" x-placement="bottom-start"
                                    style="position: absolute; transform: translate3d(70px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="#">test</a>
                                    <a class="dropdown-item" href="#">test2</a>
                                    <a class="dropdown-item" href="#">test3</a>
                                    <a class="dropdown-item" href="#">test4</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="exampleCurrency">From:</label>
                            <input type="text" class="form-control" id="exampleFamilyName" placeholder="Minimum pay">
                        </div>
                        <div class="col">
                            <label for="exampleCurrency">To:</label>
                            <input type="text" class="form-control" id="exampleFamilyName" placeholder="Maximum pay">
                        </div>
                    </div>

                </div>

                <div class="form-check row">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        <h5 class="form-check-sign">Hide Salary on your Ad.</h5>

                    </label>
                    <h4 class="mt-2"><b>Advertise Privately</b></h4>
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        <h5 class="form-check-sign">Hide company Name, reviews, and branding on job ads.</h5>
                    </label>
                </div>

                <div class="form-group mt-3 mb-5">
                    <a href="../recruiter/create_jobad2.php" class="btn btn-danger" type="button">Continue</a>
                </div>

            </form>
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






</body>

</html>