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

    <title>Pay and Post</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>

<body>
    <!--Navbar Header-->
    <?php include('../PHPFiles/recruiter_header.php')?>
    <!--End Navbar-->

    <div class="container-fluid">
        <div class="container justify-content-center mt-5" style="width: 50%;">
            <a href="../recruiter/create_jobad4.php">
                <button type="button" class="btn btn-icon btn-round btn-primary">
                    <i class="fa fa-arrow-circle-left"></i>
                </button>
            </a>

            <h2 class="mt-4"><b>Pay Post</b></h2>
            <h3 class="mt-3">Business Address</h3>
            <h5 class="text-muted mt-2">To protect candidates and seek from fraud, we verify the business address of
                all
                first time hirers .
                Don't worry, we only need to do this one.</h5>

            <h5 class="mt-3">Country</h5>
            <input type="tel" class="form-control" placeholder="" readonly>

            <h5 class="mt-3">Address Line</h5>
            <input type="tel" class="form-control" placeholder="" readonly>
            <h5 class="mt-3">Suburb/Town/City</h5>
            <input type="tel" class="form-control" placeholder="" readonly>
            <h5 class="mt-3">Postal Code</h5>
            <input type="tel" class="form-control" placeholder="" readonly>
            <br>



            <hr>
            <h3 class="mt-5">Apply Promo Code</h3>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <button class="btn btn-secondary btn-border" type="button">Apply</button>
                </div>
            </div>
            <h3 class="mt-5">Order Summary</h3>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Items</th>
                        <th scope="col">Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Basic Ad</td>
                        <td>6250.00</td>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td>750.00</td>
                    </tr>
                    <tr>
                        <td>Discounted (Subscription)</td>
                        <td>500.00</td>
                    </tr>
                    <tr>
                        <td><b>Total (including VAT)<b></td>
                        <td><b>6,500.00</b></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h3 class="mt-5">Pay Method</h3>

            <div class="card container">

                <div class="row cols-3" style="width: 50%;">

                    <div class="col">
                        <img class="card-img-top" src="../assets/img/visa.png" alt="visa">
                    </div>

                    <div class="col">
                        <img class="card-img-top" src="../assets/img/mastercard.png" alt="visa">
                    </div>

                    <div class="col">
                        <img class="card-img-top" src="../assets/img/americanexpress.png" alt="visa">
                    </div>

                </div>

                <div class="card-body">
                    <label for="tel">Card Number</label>
                    <input type="tel" class="form-control" id="tel" placeholder="0000-0000-0000-0000">
                    <div class="row cols-2 mt-3">
                        <div class="col">
                            <label for="EDate">Expire Date</label>
                            <input type="date" class="form-control" id="EDate">
                        </div>
                        <div class="col">
                            <label for="cvc">CVC</label>
                            <input type="tel" class="form-control" id="cvc" placeholder="123">
                        </div>
                    </div>
                    <p class="mt-3"><input type="checkbox" id="check"> Save card details for future payments</p>
                    <p><i class="fas fa-lock"></i> Your payment is secured. Your card details won't be shared with
                        other
                        users on this account.</p>
                </div>

                <div class="form-check row cols-3">

                    <label class="form-radio-label col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                        <span class="form-radio-sign">Pay by online payment (direct bank transfer)</span>
                    </label>

                    <label class="form-radio-label ml-3 col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                        <span class="form-radio-sign">Pay by e-wallet</span>
                    </label>

                    <label class="form-radio-label ml-3 col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                        <span class="form-radio-sign">Pay by invoice</span>
                    </label>
                </div>
                <p>By continuing you agree to use this purchase in accordance with our advertising<a href="#">terms
                        of
                        use.</a></p>
            </div>
            <div class="mb-5">
                <a class="btn btn-danger" type="button" id="alert_demo_3_3">Post My Ad</a>
                <a href="../recruiter/create_jobadPreview.php" class="btn btn-outline-danger">Preview</a>
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