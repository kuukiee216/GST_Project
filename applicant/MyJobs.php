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
          <div class="row">
            <div class="col-md-12" id="listAppliedJobs">
              <h3 class="text-muted"><i>Currently, you have no submitted application.</i></h3>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="pills-RecommendedJobs-content" role="tabpanel" aria-labelledby="pills-RecommendedJobs-content">
          <h3 class="text-muted"><i>No Recommended Jobs Found.</i></h3>
        </div>

      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="modalViewApplication" tabindex="-1" role="dialog" aria-labelledby="modalViewApplication" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title">Application Details</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <h2 id="lblJobTitle" class="font-weight-bold">-</h2>
                <h5 id="lblCompanyName">-</h5>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                      <h5><span class="mr-2 text-danger"><i class="fas fa-map-marker-alt fa-lg"></i></span><span id="lblJobLocation">-</span></h5>
                      <h5><span class="mr-2 text-danger"><i class="fas fa-clone fa-lg"></i></span><span id="lblClassification">-</span</h5>
                  </div>
          
                  <div class="col-md-6">
                    <h5><span class="mr-2 text-danger"><i class="fas fa-clock fa-lg"></i></span>Full-Time</h5>
                    <h5><span class="mr-2 text-danger"><i class="fas fa-database fa-lg"></i></span><span id="lblJobSalary">-</span></h5>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <hr>
                <h4>Submitted Documents</h4>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group form-group-default">
                  <h5 class="font-weight-bold">Resume</h5>
                  <h4 id="lblResumeLocation">Parungao_Ron Henrick_Cadang_Resume.pdf</h4>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group form-group-default">
                  <h5 class="font-weight-bold">Cover Letter</h5>
                  <h4 id="lblCoverLetter">Parungao_Ron Henrick_Cadang_Cover Letter.pdf</h4>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <hr>
                <h4>Questions and Answers</h4>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12"id="divQuestionsAnswers">
                <div class="form-group form-group-default">
                  <h5 class="font-weight-bold">1. This is a question?</h5>
                  <h4><b>Your Answer:</b> Yes, this is an answer.</h4>
                </div>

                <div class="form-group form-group-default">
                  <h5 class="font-weight-bold">2. This is another question?</h5>
                  <h4><b>Your Answer:</b> Yes, this is another answer.</h4>
                </div>
              </div>
            </div>

          </div>
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