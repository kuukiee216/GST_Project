<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis.min.css">
    <link href="/CSS/applicant.css" rel="stylesheet">

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

    <title>Japan Jobs - Application Form</title>
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
    
    <div class="container-fluid flex justify-content-center pt-5" style="width: 80%;">
      <div class="progress-card">
        <div class="progress-status">
            <button class="btn btn-danger btn-link fw-bold">Cancel</button>
        </div>
        <div class="progress" style="height: 6px;">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="33%"></div>
        </div>
      </div>
    </div>
      
    <div class="row d-flex justify-content-center">
      <div class="col-md-10">
        <div class="row">

          <div class="col-md-6">
            <div class="tab-content mb-3" id="pills-tabContent">

              <div class="tab-pane fade show active" id="Form1" role="tabpanel" aria-labelledby="btnForm1">

                <div class="card">
                  <div class="card-header">
                  <h2>Select a resume for the recruiter</h2>
                  </div>
                  <div class="card-body">

                    <div class="form-check row">
                      <label class="form-radio-label col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                        <span class="form-radio-sign">Select from your existing resume</span>
                      </label>
                    </div>
                    <div class="dropdown">
                      <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Resume List
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">test</a>
                        <a class="dropdown-item" href="#">test</a>
                        <a class="dropdown-item" href="#">test</a>
                      </div>
                    </div>

                    <div class="form-check row">
                      <label class="form-radio-label col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                        <span class="form-radio-sign">Upload a Resume</span>
                        <div class="form-group">
                          <input type="file" class="form-control-file" id="upload_Resume">
                        </div>
                      </label>
                    </div>

                    <div class="form-check row">
                      <label class="form-radio-label col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                        <span class="form-radio-sign">Apply without a Resume</span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    <h2>Select a cover letter for the recruiter</h2>
                  </div>
                  <div class="card-body">
                    <div class="form-check row">
                      <label class="form-radio-label col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                        <span class="form-radio-sign">Upload a cover letter</span>
                        <div class="form-group">
                          <input type="file" class="form-control-file" id="upload_CoverLetter">
                        </div>
                      </label>
                    </div>

                    <div class="form-check row">
                      <label class="form-radio-label col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                        <span class="form-radio-sign">Write a cover letter</span>
                      </label>
                    </div>
                    <p class="card-subtitle text-muted mb-3">
                      Introduce yourself briefly. 
                      Explain why you're a good fit for this role by highlighting your relevant skills, 
                      qualifications, and experience.</p>
                    <textarea type="text" class="form-control pb-5" id="summary" placeholder="text here"></textarea>

                    <div class="form-check row">
                      <label class="form-radio-label col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                        <span class="form-radio-sign">Apply without a cover letter</span>
                      </label>
                    </div>
                  </div>
                </div>

              </div>

              <div class="tab-pane fade" id="Form2" role="tabpanel" aria-labelledby="btnForm2">

                <div class="card">
                  <div class="card-header">
                    <h2>Recruiter's Question</h2>
                  </div>
                  <div class="card-body">
                    <div class="form-check row">
                      <label class="form-radio-label col">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                        <span class="form-radio-sign">Questions(Optional)</span>
                      </label>
                    </div>
                    <div class="dropdown">
                      <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Dropdown button
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">test</a>
                          <a class="dropdown-item" href="#">test</a>
                          <a class="dropdown-item" href="#">test</a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <div class="tab-pane fade" id="Form3" role="tabpanel" aria-labelledby="btnForm3">
                <div class="card">
                  <div class="card-header">
                    <h2>You are applying for...</h2>
                    <hr>
                    <h2 class="font-weight-bold">Contact Information</h2>
                  </div>
                  <div class="card-body">

                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h2>You are applying for...</h2>
                <hr>
                <h2 class="font-weight-bold">Software Engineer</h2>
                <h5 class="font-weight-bold" id="lblCompanyName">Global Solutions Technology INC.</h5>
                <div class="row mt-4">
                  <div class="col-md-12 pl-4">
                    <h5><span class="mr-2 text-danger"><i class="fas fa-map-marker-alt fa-lg"></i></span><span id="lblLocation">Bay, Laguna, Philippines 4033</span></h5>
                    <h5><span class="mr-2 text-danger"><i class="fas fa-clone fa-lg"></i></span><span id="lblClassification">Information and Communications Technology</span> <i><span id="lblSubClassification"></span></i></h5>
                    <h5 id="lblEmploymentType"><span class="mr-2 text-danger"><i class="fas fa-clock fa-lg"></i></span>Full Time</h5>
                    <h5><span class="mr-2 text-danger"><i class="fas fa-database fa-lg"></i></span><span id="lblJobSalary">P 16,000.00 - 20,000.00</span></h5>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h4 class="font-weight-bold">Job Summary</h4>
                    <p class="card-text" id="lblJobSummary">N/A</p>
                  </div>
                </div>
    
                <br>
    
                <div class="row">
                  <div class="col-md-12">
                    <h4 class="font-weight-bold">Qualifications</h4>
                    <ul id="listQualifications">
                      <li>N/A</li>
                    </ul>
                  </div>
                </div>
    
                <div class="row">
                  <div class="col-md-12">
                    <h4 class="font-weight-bold">Education & Experiences</h4>
                    <ul id="listEducationExperiences">
                      <li>N/A</li>
                    </ul>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <h4 class="font-weight-bold">Employer's Questions</h4>
                    <ul id="listQuestionnaires">
                      <li>N/A</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12 d-flex justify-content-center mb-5">
        <button class="btn btn-danger btn-lg mb-5">Continue <i class="fas fa-angle-right ml-2 fa-lg"></i></button>
      </div>
    </div>

    <!--bottom navbar-->
    <footer class="footer text-white mt-auto fixed-bottom" style="background-color:mediumseagreen">
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Core JS Files -->
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

    <script>
      
    </script>

  </body>
</html>