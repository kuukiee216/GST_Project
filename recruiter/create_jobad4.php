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

    <title>Create Job Ad Page 4</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>

<body>
    <!--Navbar Header-->
    <?php include('../PHPFiles/recruiter_header.php')?>
    <!--End Navbar-->

    <div class="container-fluid">
        <div class="container justify-content-center mt-5" style="width: 50%;">

            <div class="progress-card">
                <div class="progress-status">
                    <a href="../recruiter/create_jobad3.php">
                        <button type="button" class="btn btn-icon btn-round btn-primary">
                            <i class="fa fa-arrow-circle-left"></i>
                        </button>
                    </a>
                    <span class="text-muted fw-bold">100%</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="0"
                        aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="100%"></div>
                </div>
            </div>

            <div class="container">
                <h4 class="mt-3"><b>Manage Candidate Applications </b><span class="text-muted">(optional)
                    </span>
                </h4>
                <div class="row mt-3">
                    <h5><b>Questions for Candidates</b></h5>
                </div>
                <p>Include up to 8 easy-to-answer questions in your job ad.
                    When reviewing candidates, you will be able to easily filter
                    candidates who match your preferred answers.
                </p>

                <p class="text-muted">1/8 Questions Selected</p>

                <div class="input-icon">
                    <span class="input-icon-addon">
                        <i class="fa fa-search"></i>
                    </span>
                    <input type="tel" class="form-control" placeholder="Find a Question">
                </div>

                <h4 class="mt-3"><b>Recommended questions</b></h4>
                <div class="card">
                    <div class="card-body">
                        <div class="form-check row">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                <h5 class="form-check-sign">What is your expected salary?
                                    I will accept this range:</h5>
                            </label>
                        </div>

                        <div class="form-group">
                            <div class="row row-col-3">

                                <div class="col">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-border dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Minimum</button>
                                        <div class="dropdown-menu" x-placement="bottom-start"
                                            style="position: absolute; transform: translate3d(70px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#">test</a>
                                            <a class="dropdown-item" href="#">test2</a>
                                            <a class="dropdown-item" href="#">test3</a>
                                            <a class="dropdown-item" href="#">test4</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col text-center m-2">
                                    To
                                </div>

                                <div class="col">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-border dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Maximum</button>
                                        <div class="dropdown-menu" x-placement="bottom-start"
                                            style="position: absolute; transform: translate3d(70px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#">test</a>
                                            <a class="dropdown-item" href="#">test2</a>
                                            <a class="dropdown-item" href="#">test3</a>
                                            <a class="dropdown-item" href="#">test4</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container-fluid row">
                    <div class="form-check row" id="question-container">

                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <h5 class="form-check-sign">Which of the programming languanges are you experienced
                                in?</h5>
                        </label>

                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <h5 class="form-check-sign">Which of the following Relational Database Management
                                System
                                (RDBMS)
                                are you experienced with?</h5>
                        </label>

                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <h5 class="form-check-sign">Which of the following front-end development libraries and
                                frameworks are you proficient in?</h5>
                        </label>

                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <h5 class="form-check-sign">Have you worked in a role which requires a sound understanding
                                of the software development lifecycle?</h5>
                        </label>

                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <h5 class="form-check-sign">Do you have experience working within a scrum agile team?</h5>
                        </label>

                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <h5 class="form-check-sign">Do you have experience with Test Driven Development (TDD)?</h5>
                        </label>

                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <h5 class="form-check-sign">Which of the following languages are you fluent in?</h5>
                        </label>


                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter new question text here"
                                id="new-question-text">
                            <button class="btn btn-outline-secondary" type="button" id="add-question">Add
                                Question</button>
                        </div>

                    </div>
                </div>

                <div>
                    <div>
                        <span class="input-icon-addon">
                            <i class="fa fa-info-circle"></i>
                        </span>
                        Your question and answers can't be changed after you post your job ad.
                    </div>

                    <h4 class="mt-5">Internal Job Reference <span class="text-muted">(optional)
                        </span>
                    </h4>
                    <input type="tel" class="form-control" placeholder="">
                </div>
                <div class="form-group mt-5 mb-5">
                    <a href="../recruiter/create_jobadPAY.php" class="btn btn-danger" type="button">Continue</a>
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


    <!-- jQuery for easy DOM manipulation -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap Bundle includes Popper for dropdowns, popovers, and tooltips -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#add-question').click(function() {
            var questionText = $('#new-question-text').val(); // Get the text from the input field
            if (questionText.trim() !== '') { // Check if the input is not just whitespace
                var newQuestionHtml = `
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="">
                    <h5 class="form-check-sign">${questionText}</h5>
                </label>
            `;
                $('#question-container').prepend(newQuestionHtml);
                $('#new-question-text').val(''); // Clear the input field after adding the question
            } else {
                alert('Please enter a question text.'); // Alert if input field is empty
            }
        });
    });
    </script>





</body>

</html>