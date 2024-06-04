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

    <title>Japan Jobs Home Page</title>
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

    <main>

      <div class="card bg-dark text-white mt--5" style="z-index: -1;">
        <img class="card-img" src="../assets/img/header_bg.png" alt="Card image">
      </div>

      <!--Search Group-->
      <div class="container-fluid d-flex justify-content-center align-items-center mt--5">
        <div class="row mt--3">
          <div class="col-md-12" id="divHotJobList">
            <div class="row">

              <div class="col-md-3 d-flex justify-content-center align-items-center">
                <div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-search"></i>
                    </span>
                    <input id="txtSearchJobTitle" type="text" class="form-control shadow" placeholder="Job Title">
                  </div>
                </div>
              </div>

              <div class="col-md-3 d-flex justify-content-center align-items-center">
                <button class="btn btn-light dropdown-toggle w-100 text-left text-muted shadow" type="button" id="btnDatePostedDD" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-suitcase mr-3"></i>
                  Date posted
                </button>
                <div class="dropdown-menu" aria-labelledby="btnDatePostedDD">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="">
                      <span class="form-check-sign">Agree with terms and conditions</span>
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="">
                      <span class="form-check-sign">Agree with terms and conditions</span>
                    </label>
                  </div>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a> 
                </div>
                <!--<div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon"> 
                      <i class="fa fa-suitcase"></i>
                    </span>
                     <input id="txtSearchClassification" type="text" class="form-control ps-5 shadow" placeholder="Classification" />
                  </div>
                </div> -->
              </div>

              <div class="col-md-3 d-flex justify-content-center align-items-center">
                <div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fas fa-map-marker-alt"></i>
                    </span>
                    <input id="txtSearchLocation" type="text" class="form-control ps-5 shadow" placeholder="Location" />
                  </div>
                </div>
              </div>

              <div class="col-md-3 d-flex justify-content-center align-items-center">
                <button class="btn btn-danger mr-3 shadow" type="button" onclick="searchJobPosting();" id="btnSearchJobPosting">Search</button>
                <button onclick="triggerFilter();" id="btnSearchFilterJobPosting" class="btn btn-danger shadow" type="button">
                  <i class="fa fa-filter"></i>
                </button>
              </div>
            </div>
          </div>
        </div>  
      </div> 

      <!--Filter-->
      <div id="divFilter" class="container-fluid mt-3 d-none d-sm-none">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-3 d-flex justify-content-center">
                <button class="btn btn-outline-danger dropdown-toggle w-100" type="button" id="btnDatePostedDD" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Date posted
                </button>
                <div class="dropdown-menu" aria-labelledby="btnDatePostedDD">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a> 
                </div>
              </div>

              <div class="col-md-3 d-flex justify-content-center">
                <button class="btn btn-outline-danger dropdown-toggle w-100" type="button" id="btnExperienceDD" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Experience Level
                </button>
                <div class="dropdown-menu" aria-labelledby="btnExperienceDD">
                  <a class="dropdown-item" href="#">test</a>
                  <a class="dropdown-item" href="#">test test</a>
                  <a class="dropdown-item" href="#">test</a>
                </div>
              </div>

              <div class="col-md-3 d-flex justify-content-center">
                <button class="btn btn-outline-danger dropdown-toggle w-100" type="button" id="btnSalaryDD" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Minimum Salary
                </button>
                <div class="dropdown-menu" aria-labelledby="btnSalaryDD">
                  <a class="dropdown-item" href="#">test</a>
                  <a class="dropdown-item" href="#">test test </a>
                  <a class="dropdown-item" href="#">test</a>
                </div>
              </div>

              <div class="col-md-3 d-flex justify-content-center">
                <button class="btn btn-outline-danger dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Remote
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">test</a>
                  <a class="dropdown-item" href="#">test test</a>
                  <a class="dropdown-item" href="#">test</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--JOB POSTING LIST-->
      <div id="divPostingList" class="container mt-3">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-3">Jobs Postings</h2>
            <div class="row" id="divJobPostList">
              <div class="col-md-12">
                <h4><i>No listed job posting found.</i></h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--JOB POSTING DETAILS-->
      <div id="divPost" class=" container d-none d-sm-none">
        <div class="container-fluid d-flex justify-content-center row mt-3">

          <div class="card">

            <div class="card-header">
              <button class="btn btn-link text-dark ml--5" onclick="backToPostingList();"><i class="fas fa-chevron-left mr-2 fa-lg"></i> Back</button>
              <h1 class="font-weight-bold" id="lblJobTitle">-</h1>
              <h5 class="font-weight-bold" id="lblCompanyName">-</h5>
              <div class="row mt-4">
                <div class="col-md-12 pl-4">
                  <h5><span class="mr-2 text-danger"><i class="fas fa-map-marker-alt fa-lg"></i></span><span id="lblLocation">-</span></h5>
                  <h5><span class="mr-2 text-danger"><i class="fas fa-clone fa-lg"></i></span><span id="lblClassification">-</span> <i><span id="lblSubClassification"></span></i></h5>
                  <h5 id="lblEmploymentType"><span class="mr-2 text-danger"><i class="fas fa-clock fa-lg"></i></span>Full Time</h5>
                  <h5><span class="mr-2 text-danger"><i class="fas fa-database fa-lg"></i></span><span id="lblJobSalary">-</span></h5>
                  </div>
              </div>

              <div class="row mt-4">
                <div class="col-md-12">
                  <button class="btn btn-danger mr-3" id="btnFileApplication" onclick="fileApplication();">Apply Now</button>
                  <button class="btn btn-outline-danger mr-3" id="btnBookmarkJobPosting" onclick="BookmarkJobPosting();"><i class="fa fa-bookmark mr-2"></i> Save</button>
                  <button class="btn btn-outline-danger" onclick="ReportJobPosting();"><i class="fa fa-flag mr-2"></i> Report Job</button>
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h4 class="font-weight-bold">Job Summary</h4>
                  <p class="card-text" id="lblJobSummary">-</p>
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-md-12">
                  <h4 class="font-weight-bold">Qualifications</h4>
                  <ul id="listQualifications">
                    
                  </ul>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <h4 class="font-weight-bold">Education & Experiences</h4>
                  <ul id="listEducationExperiences">
                    
                  </ul>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12">
                  <h4 class="font-weight-bold">Employer's Questions</h4>
                  <ul id="listQuestionnaires">
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </main>

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

    <script src="../src/Applicant/JobSearchHandler.js"></script>

    <script>

      $(document).ready(function(){
        
        var hashURL = window.location.hash;
        if(hashURL !== ''){
          var jpID = window.location.hash.replace('#','');
          viewJobPostDetails('btnViewJobPosting'+jpID);
        }
        else{
          fillJobPostingList();
        }
      });

    </script>

  </body>
</html>