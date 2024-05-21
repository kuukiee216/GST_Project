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

        <title>Create Job Ad Page 3</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
    </head>

    <body>
        <!--Navbar Header-->
        <?php include '../PHPFiles/recruiter_header.php'?>
        <!--End Navbar-->

        <div class="container-fluid">
            <div class="container justify-content-center mt-5" style="width: 50%;">

                <div class="progress-card">
                    <div class="progress-status">
                        <a href="../recruiter/create_jobad2.php">
                            <button type="button" class="btn btn-icon btn-round btn-primary">
                                <i class="fa fa-arrow-circle-left"></i>
                            </button>
                        </a>
                        <span class="text-muted fw-bold">75%</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="0"
                            aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title=""
                            data-original-title="100%"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <h2 class="mt-3"><b>Manage Candidate Applications </b><span class="text-muted">(optional)
                            </span>
                        </h2>
                        <div class="row mt-3">
                            <h5><b>Questions for Candidates</b></h5>
                        </div>
                        <p>Include up to 8 easy-to-answer questions in your job ad.
                            When reviewing candidates, you will be able to easily filter
                            candidates who match your preferred answers.
                        </p>

                        <p class="text-muted selected-count">0/8 Questions Selected</p>


                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <i class="fa fa-search"></i>
                            </span>
                            <input type="search" class="form-control" placeholder="Find a Question" id="search-question-text">
                        </div>


                        <form id="questionForm" class="input-group mt-3 mb-3">
                            <input type="text" class="form-control" placeholder="Enter new question text here"
                                id="new-question-text" name="new-question">
                            <button class="btn btn-outline-secondary" type="submit" id="add-question">Add
                                Question</button>
                        </form>

                        <h4 class="mt-3"><b>Recommended questions</b></h4>

                       <form id="questionDatabase">
                       <input type="hidden" id="jobID" name="jobID" value="">
                        <input type="hidden" id="employerID" name="employerID" value="">

                       <div class="container-fluid row">
                            <div class="form-check row" id="question-container">
                            </div>
                        </div>

                        <div>
                            <div>
                                <span class="input-icon-addon">
                                    <i class="fa fa-info-circle"></i>
                                </span>
                                Your question and answers can't be changed after you post your job ad.
                            </div>

                            <div class="form-group mt-5 mb-5">
                                <button id="continueButton" class="btn btn-danger" type="submit">Continue</button>
                            </div>
                        </div>
                       </form>
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

        <!-- jQuery for easy DOM manipulation -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap Bundle includes Popper for dropdowns, popovers, and tooltips -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
        </script>

    <script src="../ajax/Recruiter/QuestionHandler.js"></script>

    <script>
        $(document).ready(function() {
            $('#add-question').click(function(e) {
                e.preventDefault();
                AddQuestion('questionForm');
            });

            $('#continueButton').click(function(e) {
                e.preventDefault();
                AddQuestionDatabases('questionDatabase');
            });

            $('#search-question-text').on('input', function() {
                var searchQuery = $(this).val();
                if (searchQuery) {
                    SearchQuestions(searchQuery);
                } else {
                    GetQuestions();
                }
            });

            GetQuestions();
        });

    </script>
    <script>
    // Function to get the value of a URL parameter by name
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    // Set the value of the jobID and employerID input fields based on the URL parameters
    document.addEventListener("DOMContentLoaded", function () {
        var jobID = getParameterByName('jobID');
        if (jobID !== null) {
            document.getElementById('jobID').value = jobID;
            console.log("jobID ID from URL:", jobID);
        }
    });
</script>

<script>
    // Function to get the value of a URL parameter by name
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    // Set the value of the jobID and employerID input fields based on the URL parameters
    document.addEventListener("DOMContentLoaded", function () {
        var employerID = getParameterByName('employerID');
        if (employerID !== null) {
            document.getElementById('employerID').value = employerID;
        }
        console.log("Employer ID from URL:", employerID);

    });
</script>
       <script>
    $(document).ready(function() {
        // Function to add input box when checkbox is checked
        function addInputBox($checkbox) {
            var questionText = $checkbox.siblings('.form-check-sign').text();
            var newInputHtml = `
                <div class="form-group">
                    <input type="text" class="form-control" id="${questionText}" placeholder="Enter your answer" maxlength="100"> <!-- Set maximum length to 100 characters -->
                </div>
            `;
            $checkbox.parent().append(newInputHtml);
            updateSelectedCount(); // Update the count of selected questions
        }

        // Function to update the count of selected questions
        function updateSelectedCount() {
            var selectedCount = $('.form-check-input:checked').length;
            $('.selected-count').text(selectedCount + '/8 Questions Selected');
        }

        // Event handler for checkbox change
        $(document).on('change', '.form-check-input', function() {
            var selectedCount = $('.form-check-input:checked').length;
            if ($(this).is(':checked')) {
                if (selectedCount <= 8) {
                    addInputBox($(this));
                    // Store checked question in localStorage
                    var questionText = $(this).siblings('.form-check-sign').text();
                    localStorage.setItem(questionText, true);
                } else {
                    swal({
                        icon: 'warning',
                        title: 'Limit Reached',
                        text: 'You can select up to 8 questions only.',
                        confirmButtonText: 'OK'
                    });
                    $(this).prop('checked', false); // Uncheck the checkbox if the limit is reached

                }
            } else {
                $(this).parent().find('.form-group').remove();
                updateSelectedCount(); // Update the count of selected questions
                // Remove checked question from localStorage
                var questionText = $(this).siblings('.form-check-sign').text();
                localStorage.removeItem(questionText);
            }
        });

        // Initial update of the count of selected questions
        updateSelectedCount();
    // Retrieve checked questions from localStorage
    for (var i = 0; i < localStorage.length; i++) {
        var key = localStorage.key(i);
        if (key !== 'jobID' && key !== 'employerID') {
            $('#' + key).prop('checked', true);
            addInputBox($('#' + key));
        }
    }

});
</script>


    </body>

    </html>