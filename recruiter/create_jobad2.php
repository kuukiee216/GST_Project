<?php
session_start();

if (!(isset($_GET['jobID']) && isset($_GET['employerID']))) {
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.tiny.cloud/1/pim866f1vew0kcippaf4iky7els0yt814fxepefptu1w5bq5/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

    <link rel="stylesheet" href="../assets/css/atlantis.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="../CSS-RECRUITER/dashboard_recruiter.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <title>Create Job Ad Page 2</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>

<body>
    <!--Navbar Header-->
    <?php include '../PHPFiles/recruiter_header.php'?>
    <!--End Navbar-->

    <div class="container-fluid">
        <div class="container flex justify-content-center mt-5" style="width: 50%;">
            <div class="progress-card">
                <div class="progress-status">
                <a href="../recruiter/create_jobad.php<?php echo isset($_GET['jobID']) ? '?jobID=' . $_GET['jobID'] : ''; ?>">
                        <button type="button" class="btn btn-icon btn-round btn-primary">
                            <i class="fa fa-arrow-circle-left"></i>
                        </button>
                    </a>
                    <span class="text-muted fw-bold">50%</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="0"
                        aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="75%"></div>
                </div>
            </div>

            <form id="urlForm" enctype="multipart/form-data">
            <input type="hidden" id="jobID" name="jobID" value="">
            <input type="hidden" id="employerID" name="employerID" value="">

                <div class="row">
                    <div class="col">
                        <h2>Write about your Job</h2>
                        <br>
                        <h5>Showcase your Brand</h5>
                        <div class="text-muted mb-3">Create your first brand by uploading your
                            company
                            logo.
                            Cover images can be added from the success page after payment.
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="logo" name="logo"
                                    onchange="previewImage();" accept="image/*">
                            </div>
                        </div>
                        <div class="card text-white" style="width: 50%;">
                            <img id="imagePreview" class="card-img" src="../assets/img/icon.png" alt="Card image">

                        </div>
                    </div>

                    <h5>Job Description</h5>
                    <div class="text-muted mb-3">Enter your job details.</div>

                    <div class="form-group">
                        <textarea id="description" name="description"></textarea>

                    </div>
                </div>

                <div class="row">
                    <h5 class="mt-3">Video <span class="text-muted">(optional)
                        </span>
                    </h5>
                    <div class="form-group">
                        <label for="videoUpload" class="text-muted">Add a video to your ad. The video will appear at the
                            bottom of
                            your
                            ad.</label>
                        <div class="text-muted">e.g. myVideoAd.mp4</div>
                        <div class="mt-2 mb-2">
                            <input type="file" class="form-control-file" id="videoUpload" name="videoUpload" accept="video/*">
                            <video id="videoPreview" controls
                                style="max-width: 100%; height: auto; display: none; margin-top: 10px;"></video>
                        </div>

                        <h4 class="mt-5">Candidate Search Result</h4>
                        <p>Write a compelling statement about your role to entice more candidates.</p>
                        <textarea id="search" name="search"></textarea>
                        </textarea>

                        <div class="form-group mt-3 mb-5">
                        <button class="btn btn-danger" id="btnAddSecond" type="button">Continue</button>
                        </div>
                    </div>
                </div>
            </form>
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

    <script src="../ajax/SecondPostingProcedure.js"></script>

    <script>
    // Function to get the value of a URL parameter by name
    function getParameterByName(name) {
    var url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function validateJobAndEmployerID() {
    var jobID = getParameterByName('jobID');
    var employerID = getParameterByName('employerID');
    return jobID !== null && employerID !== null;
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
    function previewImage() {
        var file = document.getElementById("logo").files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById("imagePreview").src = e.target.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    tinymce.init({
        selector: '#mytextarea',
        menubar: false, // Disables the menu bar
        toolbar: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent'
    });

    document.getElementById('videoUpload').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var videoPreview = document.getElementById('videoPreview');

        if (file) {
            videoPreview.src = URL.createObjectURL(file);
            videoPreview.style.display = 'block'; // Show the video element
            videoPreview.onload = function() {
                URL.revokeObjectURL(videoPreview.src); // Free up memory (revoke the object URL)
            };
        }
    });

    </script>

    <style>
    .btn.active,
    .btn.active i {
        color: #fff;
        /* White text */
        background-color: #007bff;
        /* Blue background */
        border-color: #007bff;
    }
    </style>

    <script>
    $(document).ready(function() {
        $('#btnAddSecond').click(function() {
            AddSecond('urlForm');
        });
    });
    </script>

<script>
// Function to store form data in localStorage
function storeFormDataToLocalStorage() {
    // Store video
    var videoFile = document.getElementById('videoUpload').files[0];
    if (videoFile) {
        var videoDataURL = URL.createObjectURL(videoFile);
        localStorage.setItem('videoDataURL', videoDataURL);
    }

    // Store image
    var logoFile = document.getElementById('logo').files[0];
    if (logoFile) {
        var logoDataURL = URL.createObjectURL(logoFile);
        localStorage.setItem('logoDataURL', logoDataURL);
    }

    // Store description
    var description = document.getElementById('description').value;
    localStorage.setItem('description', description);

    // Store search
    var search = document.getElementById('search').value;
    localStorage.setItem('search', search);
}

// Function to retrieve form data from localStorage and populate form fields
function retrieveFormDataFromLocalStorage() {
    // Retrieve video
    var videoDataURL = localStorage.getItem('videoDataURL');
    if (videoDataURL) {
        document.getElementById('videoPreview').src = videoDataURL;
        document.getElementById('videoPreview').style.display = 'block';
    }

    // Retrieve image
    var logoDataURL = localStorage.getItem('logoDataURL');
    if (logoDataURL) {
        document.getElementById('imagePreview').src = logoDataURL;
    }

    // Retrieve description
    var description = localStorage.getItem('description');
    if (description) {
        document.getElementById('description').value = description;
    }

    // Retrieve search
    var search = localStorage.getItem('search');
    if (search) {
        document.getElementById('search').value = search;
    }
}

// Store form data to localStorage when the Continue button is clicked
document.getElementById('btnAddSecond').addEventListener('click', function() {
    storeFormDataToLocalStorage();
});

// Retrieve form data from localStorage when the document is loaded
document.addEventListener("DOMContentLoaded", function() {
    retrieveFormDataFromLocalStorage();
});
</script>


</body>

</html>




