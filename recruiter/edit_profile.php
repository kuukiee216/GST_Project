<?php
session_start();

if (!(isset($_SESSION['AccountID']) && isset($_SESSION['UserID']) && $_SESSION['Token'] == null)) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0' name='viewport'>
    <link rel="stylesheet" href="../phone-number/build/css/demo.css">
    <link rel="stylesheet" href="../phone-number/build/css/intlTelInput.css">
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

    <title>Edit Profile</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>

<body>
    <!--Navbar Header-->

    <?php include('../PHPFiles/recruiter_header.php')?>

    <div class="container flex justify-content-center" style="width: 50%;">

        <form id="editInfoForms">

            <div class="form-group">
                <h4 class="pb-3 pt-5">Employer Details</h4>
                <div>
                    <i class="fas fa-user fs-4"></i>
                    <h4>Your Details</h4>
                </div>

                <div class="form-group">
                    <label for="email" class="fw-bold">Email</label>
                    <div class="text-muted" style="text-decoration: underline;" id="email"></div>
                </div>

                <div class="form-group">
                    <label for="fname">Given Name</label>
                    <input type="text" class="form-control" name="fname" id="fname" aria-describedby="nameHelp"
                        placeholder="Enter Name" required>
                </div>

                <div class="form-group">
                    <label for="lname">Family Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Family Name" required>

                    <label for="phone" class="pt-3">Phone Number</label>
                    <div class="input-group">
                        <input type="tel" id="phone" name="number" placeholder="Phone Number" value="+" required>
                    </div>
                </div>


                <hr>

                <div class="form-group">
                    <i class="fas fa-building fs-4"></i>
                    <h4 class="pb-3"><b>Business Details</b></h4>
                    <label for="exampleEmail" class="fw-bold">Business Name</label>
                    <div class="text-muted pb-3">For security purpose, please enter the registered business name.
                    </div>
                    <input type="text" class="form-control" name="companyName" aria-describedby="nameHelp"
                        placeholder="Enter Business Name" required>
                    <label for="phone1" class="pt-3">Telephone Number</label>
                    <div class="input-group">
                        <input type="tel" id="phone1" name="telephone" placeholder="Telephone Number" value="+"
                            required>
                    </div>

                    <br><br>
                    <h4><b>Location</b></h4>
                    <div class="text-muted pb-3">Please provide the business adress details below.</div>

                    <div class="pt-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" aria-describedby="nameHelp"
                            placeholder="Enter Country" required>
                    </div>

                    <div class="pt-3">
                        <label for="address">Address Line</label>
                        <input type="text" class="form-control" id="address" name="address" aria-describedby="nameHelp"
                            placeholder="Enter Address Line (e.g. building number, street, etc...)" required>
                    </div>

                    <div class="pt-3">
                        <label for="city">Suburb/Town/City</label>
                        <input type="text" class="form-control" id="city" name="city" aria-describedby="nameHelp"
                            placeholder="Enter Suburb/Town/City" required>
                    </div>

                    <div class="pt-3">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" aria-describedby="nameHelp"
                            placeholder="Enter State" required>
                    </div>

                    <div class="pt-3">
                        <label for="postal">Postal Code</label>
                        <input type="text" class="form-control" id="postal" name="postal" aria-describedby="nameHelp"
                            placeholder="Enter Postal Code" required>
                    </div>

                </div>


                <div class="form-group">
                    <button class="btn btn-danger mt-3 mb-5 d-flex align-items-center"> Update Account</button>
                </div>
        </form>
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

    <script src="../phone-number/build/js/intlTelInput.js"></script>
    <script src="../ajax/SettingHandler.js"></script>
    <script src="../ajax/SettingPassHandler.js"></script>
    <script src="../ajax/Recruiter/ProfileHandler.js"></script>

    <script>
    $(document).ready(function() {
        GetInfo();
    });
    </script>

    <script>
    var input = document.querySelector("#phone");
    var inputs = document.querySelector("#phone1");
    window.intlTelInput(input, {});
    window.intlTelInput(inputs, {});
    </script>
</body>

</html>