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
    </style>
</head>

<body>
    <!--Navbar Header-->
    <?php include '../PHPFiles/recruiter_header.php'?>
    <!--End Navbar-->

    <img src="../assets/img/bg_recruiter.png" style="width:100%;">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-4 text-center">
                    <img src="../assets/img/image8.png" alt="star" style="height: 60px;" class="m-3">
                </div>
                <div class="col-12 col-md-4">
                    <div class="pt-3">
                        <h4 class="fw-bold">Hi <span id="fullName"></span>,</h4>
                        <p>You're in the right place to find your next hire. Get started by creating your job ad. </p>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center pt-3">
                    <a href="../recruiter/create_jobad.php" class="btn btn-danger" id="createJobAdBtn">Create a Job
                        Ad</a>
                </div>
            </div>
        </div>

        <hr>

        <h3 class="text-center pt-4 pb-4"><b>Connecting Talent with Opportunity: Your Gateway to Success</b></h3>

        <div class="container text-center" style="background-color: #cfe3ff;">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4 pt-5 pb-5">
                    <img src="../assets/img/rocket.png" alt="rocket" style="height: 80px;">
                </div>
                <div class="col-md-8 mt-4 mb-4">
                    <h4><b>Enhance Your Recruitment Efforts with Tailored Candidate Suggestions.</b></h4>
                    <h4 class="pt-2"><b>Once you post a job ad, we'll promptly pair you with pertinent candidates
                            sourced
                            from our extensive database.</b></h4>
                </div>
            </div>
        </div>

        <div class="row justify-content-center m-5">
            <div class="card col-md-4">
                <img class="card-img-top mx-auto d-block" src="../assets/img/image1.png" alt="Card image cap"
                    style="width: 30%;">
                <div class=" card-body text-center">
                    <h5 class="card-title fw-bold">Create a Job Ad</h5>
                    <p class="card-text text-center">Posting your job ad is made quick and easy with our step-by-step
                        guide.
                    </p>
                </div>
            </div>

            <div class="card col-md-4">
                <img class="card-img-top mx-auto d-block" src="../assets/img/image2.png" alt="Card image cap"
                    style="width: 30%;">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Choose your Ad type</h5>
                    <p class="card-text text-center">We offer three distinct ad types tailored to meet your specific
                        requirements.</p>
                </div>
            </div>

            <div class="card col col-md-4">
                <img class="card-img-top mx-auto d-block" src="../assets/img/image3.png" alt="Card image cap"
                    style="width: 30%;">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Manage your candidates</h5>
                    <p class="card-text text-center">We streamline the process for you to pinpoint the most qualified
                        candidates applying for your position.</p>
                </div>
            </div>
        </div>


        <div id="jobContainer" class="container" style="width: 80%;"></div>

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

    document.getElementById('createJobAdBtn').addEventListener('click', function() {
        var jobAdKey = 'jobAd_' + new Date().getTime();
        localStorage.setItem(jobAdKey, JSON.stringify({
            title: '',
            description: ''
        }));
    });
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

    <script src="../ajax/Recruiter/GetJobPosting.js"></script>

    <script>
    $(document).ready(function() {
        GetInfo();
        
    });
    </script>
</body>

</html>