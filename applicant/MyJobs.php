<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>

    <!-- CSS Files -->
	  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	  <link rel="stylesheet" href="../assets/css/atlantis.min.css">
      <link href="../CSS/applicant.css" rel="stylesheet">

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: {"families":["Lato:300,400,700,900"]},
        custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
        active: function() {
          sessionStorage.fonts = true;
        }
      });
    </script>

    <title>Japan Jobs - My Jobs</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>
<body>
    <!--Navbar Header-->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="green2">
      <div class="container-fluid">
        <div class="collapse" id="search-nav">
          <div>
          <form class="navbar-left navbar-form">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar nav me-auto mb-2 mb-lg-0">
              <li>
                  <a href="JobSearch.php" class="logo">
                    <img src="../assets/img/JapanJobs.png" alt="navbar brand">
                  </a>
              </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="JobSearch.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="MyProfile.php">Pofile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="AboutUs.php">About Us</a>
                </li>
              </ul>
            </div>
          </form>
          </div>
        </div>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-justify">
          <li class="nav-item dropdown hidden-caret">
            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
              <div class="avatar-sm">
                <img src="../assets/img/icon.png" alt="..." class="avatar-img rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-user animated fadeIn">
              <div class="scroll-wrapper dropdown-user-scroll scrollbar-outer" style="position: relative;"><div class="dropdown-user-scroll scrollbar-outer scroll-content" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 0px;">
                <li>
                  <div class="user-box">
                    <div class="avatar-lg"><img src="../assets/img/icon.png" alt="image profile" class="avatar-img rounded"></div>
                    <div class="u-text">
                      <h4>Genesis Marvin Manale</h4>
                      <p class="text-muted">genesismarvinmanale@gmail.com</p><a href="/applicant/profile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="MyJobs.php">My Jobs</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../logout.php">Logout</a>
                </li>
              </div><div class="scroll-element scroll-x"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div><div class="scroll-element scroll-y"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div></div>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <!--End Navbar-->

    <div class="container flex justify-content-center">
      <h2 class="mt-5">My Jobs</h2>
      <ul class="nav nav-pills nav-secondary nav-pills-no-bd mb-4" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-SavedJobs" data-toggle="pill" href="#pills-SavedJobs-content" role="tab" aria-controls="pills-SavedJobs-content" aria-selected="true">
            <i class="fa fa-bookmark mr-2"></i> 
            Saved
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-AppliedJobs" data-toggle="pill" href="#pills-AppliedJobs-content" role="tab" aria-controls="pills-AppliedJobs-content" aria-selected="false">
            <i class="fa fa-envelope mr-2"></i> 
            Applied
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-RecommendedJobs" data-toggle="pill" href="#pills-RecommendedJobs-content" role="tab" aria-controls="pills-RecommendedJobs-content" aria-selected="false">
            <i class="fa fa-lightbulb mr-2"></i> 
            Recommended
          </a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">

        <div class="tab-pane fade show active" id="pills-SavedJobs-content" role="tabpanel" aria-labelledby="pills-SavedJobs-content">
          <div class="row">
            <div class="col-md-12" id="listSavedJobs">
              <h3 class="text-muted"><i>Currently, you have not saved nor bookmarked a job posting yet.</i></h3>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="pills-AppliedJobs-content" role="tabpanel" aria-labelledby="pills-AppliedJobs-content">
          <h3 class="text-muted"><i>Currently, you have no pending application.</i></h3>
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-6">
                    <h2>Software Engineer</h2>
                    <h5>Global Solutions Technology INC. <span class="text-muted"><i>(Applied 2 hours ago)</i></span></h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="btn-group dropright">
                        <button type="button" class="btn btn-light btn-round m-3 btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-v fa-lg"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                            <button class="dropdown-item btn btn-light" href="#"><i class="fas fa-trash mr-2 fa-lg"></i> Remove</a>
                            <button class="dropdown-item btn btn-light" href="#"><i class="fa fa-flag mr-2 fa-lg"></i> Report Job</a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <h5><span class="mr-2 text-danger"><i class="fas fa-map-marker-alt fa-lg"></i></span>Bay, Laguna, Philippines 4033</h5>
                        <h5><span class="mr-2 text-danger"><i class="fas fa-clone fa-lg"></i></span>Information and Communications Technology</h5>
                    </div>
            
                    <div class="col-md-5">
                        <h5><span class="mr-2 text-danger"><i class="fas fa-clock fa-lg"></i></span>Full-Time</h5>
                        <h5><span class="mr-2 text-danger"><i class="fas fa-database fa-lg"></i></span>P 15,000.00 - 20,000.00</h5>
                    </div>

                    <div class="col-md-2 d-flex justify-content-end align-items-center">
                        <button href="#" class="btn btn-danger">Cancel Application</button>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="pills-RecommendedJobs-content" role="tabpanel" aria-labelledby="pills-RecommendedJobs-content">
          <h3 class="text-muted"><i>No Recommended Jobs Found.</i></h3>
        </div>

      </div>
    </div>

    <!--bottom navbar-->
    <footer class="footer fixed-bottom text-white" style="background-color:mediumseagreen">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link">
                            Privacy
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            Terms & Condition
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            Protect yourself online
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="ml-auto">
                © 2024 JAPAN JOBS.All rights reserved by Japan Jobs
            </div>				
        </div>
    </footer>

    <!-- Option 1: Bootstrap scripts -->
    <script src="../.../assets/js/atlantis.js"></script>
    <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

    <script src="../src/Applicant/JobSearchHandler.js"></script>

    <script>
        $(document).ready(function(){
            fillSavedJobPosting();
            fillAppliedJobPosting();
            fillRecommendedJobPosting();
        });
    </script>

</body>
</html>