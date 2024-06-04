<!-- Sessions -->
<?php
  SESSION_START();

  if(isset($_SESSION['AccountID']) && isset($_SESSION['Access']) && $_SESSION['Access'] == '0' && isset($_SESSION['CredentialID'])){

?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- CSS Files -->
      <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="../assets/css/atlantis.min.css">

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

      <style>
        #tblProfileSummary td{
          padding: 5px 0 5px 0;
        }
        /* The switch - the box around the slider */
        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }
        /* Hide default HTML checkbox */
        .switch input {
          opacity: 0;
          width: 0;
          height: 0;
        }
        /* The slider */
        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }
        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }
        input:checked + .slider {
          background-color: #35cd3a;
        }
        input:focus + .slider {
          box-shadow: 0 0 1px #35cd3a;
        }
        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }
        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }
        .slider.round:before {
          border-radius: 50%;
        }
      </style>

      <title>Japan Jobs - My Profile</title>
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

      <div class="container mt-4">
        <h2 class="font-weight-bold text-dark">My Profile</h2>
      </div>

      <div class="container mt-3">
        <div class="card bg-dark text-white full-height">
          <img class="card-img" src="../assets/img/profile_header.png" alt="Card image" style="min-height: 280px;">
          <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <div class="col-md-10">
              <h1 class="text-white font-weight-bold" style="font-size: 38px;" id="lblName">-</h1>

              <div class="row">

                <div class="col-md-9">
                  <table id="tblProfileSummary">
                    <tr>
                      <td class="text-center"><i class="fas fa-envelope fa-lg mr-2"></i></td>
                      <td id="lblEmailAddress">-</td>
                    </tr>
                    <tr>
                      <td class="text-center"><i class="fas fa-mobile-alt fa-lg mr-2"></i></td>
                      <td id="lblContactNumber">-</td>
                    </tr>
                    <tr>
                      <td class="text-center"><i class="fas fa-map-marker-alt fa-lg mr-2"></i></td>
                      <td id="lblAddress">-</td>
                    </tr>
                  </table>
                </div>

                <div class="col-md-3 d-flex justify-content-end align-items-end">
                  <button class="btn btn-link text-white" data-toggle="modal" data-target="#modalEditProfile"><i class="fas fa-edit fa-lg mr-2"></i> Edit Profile</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-5">
        <h2 class="font-weight-bold text-dark">Resume</h2>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">My Uploaded Resume</h45>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table text-center">
                    <thead>
                      <th>Date</th>
                      <th>File Name</th>
                      <th>Action</th>
                    </thead>
                    <tbody id="listResumes">
                      <tr>
                        <td colspan="3">No Uploaded/Saved Resume.</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="row d-flex justify-content-end px-3 mt-3">
                  <a href="CreateResume.php"><button class="btn btn-round btn-danger mr-2"><i class="fas fa-pen-alt fa-lg mr-2"></i> Create a Resume</button></a>
                  <button class="btn btn-round btn-border btn-danger" id="btnUploadResumeModel" onclick="openUploadResume();"><i class="fas fa-file-upload fa-lg mr-2"></i> Upload a Resume</button>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-5">
        <h2 class="font-weight-bold text-dark">Preferences</h2>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <!--Job Title-->
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Job Title</h45>
              </div>
              <div class="card-body">

                <div id="listJobTitles">
                  <h5><i>No Preferred Job Titles.</i></h5>
                </div>
                
                <div class="row d-flex justify-content-end px-3">
                  <button class="btn btn-round btn-danger" onclick="openJobTitles();" id="btnEditPreferredJobTitle"><i class="fas fa-plus fa-lg mr-2"></i> Add</button>
                </div>
                
              </div>
            </div>

            <!--Work Schedule-->
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Work Schedule</h45>
              </div>
              <div class="card-body">

                <h4>Your preferred Work Schedule: <span class="font-weight-bold" id="lblWorkSchedule">-</span></h4>

                <div class="row d-flex justify-content-end px-3">
                  <button class="btn btn-round btn-danger" data-toggle="modal" data-target="#modalPreferredWorkSchedule"><i class="fas fa-edit fa-lg mr-2"></i> Edit</button>
                </div>
                
              </div>
            </div>

            <!--Location-->
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Location</h5>
              </div>
              <div class="card-body">

                <div id="listLocations">
                  <h5><i>No Preferred Locations.</i></h5>
                </div>

                <div class="row d-flex justify-content-end px-3">
                  <button class="btn btn-round btn-danger" onclick="openLocation();" id="btnEditPreferredLocations"><i class="fas fa-plus fa-lg mr-2"></i> Add</button>
                </div>
                
              </div>
            </div>

            <!--Salary Range-->
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Salary Range</h45>
              </div>
              <div class="card-body">

                <h4>Your selecteed salary range: <span class="font-weight-bold" id="lblSalaryRange">-</span></h4>
                
                <div class="row d-flex justify-content-end px-3">
                  <button class="btn btn-round btn-danger" data-toggle="modal" data-target="#modalPreferredSalaryRange" id="btnEditSalaryRange"><i class="fas fa-edit fa-lg mr-2"></i> Edit</button>
                </div>
                
              </div>
            </div>

            <!--Relocation-->
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Relocation</h45>
              </div>
              <div class="card-body">
                <h4>You can relocate: <span class="font-weight-bold text-muted" id="lblRelocation">-</span></h4>

                <div class="row d-flex justify-content-end px-3">
                  <button class="btn btn-round btn-danger" onclick="openRelocation();" id="btnEditRelocation"><i class="fas fa-edit fa-lg mr-2"></i> Edit</button>
                </div>
                
              </div>
            </div>

            <!--Ready To Work-->
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Ready to Work</h45>
              </div>
              <div class="card-body">
                <h4>You are ready to work: <span class="font-weight-bold text-muted" id="lblReadyToWorkStatus">-</span></h4>

                <div class="row d-flex justify-content-end px-3">
                  <button class="btn btn-round btn-danger" onclick="openReadyToWork();" id="btnEditReadyToWork"><i class="fas fa-edit fa-lg mr-2"></i> Edit</button>
                </div>
                
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalEditProfile" tabindex="-1" role="dialog" aria-labelledby="modalEditProfile" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Edit Profile</h3>
            </div>
            <div class="modal-body">

              <div class="form-group form-group-default">
                <h5>Last Name <span class="font-weight-bold text-danger">*</span></h5>
                <input id="Name" type="text" class="form-control" placeholder="Enter your Last Name" required>
              </div>

              <div class="form-group form-group-default">
                <h5>First Name <span class="font-weight-bold text-danger">*</span></h5>
                <input id="Name" type="text" class="form-control" placeholder="Enter your First Name" required>
              </div>

              <div class="form-group form-group-default">
                <h5>Middle Name</h5>
                <input id="Name" type="text" class="form-control" placeholder="Enter your Middle Name">
              </div>

              <div class="form-group form-group-default">
                <h5>Suffix</h5>
                <input id="Name" type="text" class="form-control" placeholder="Enter your Suffix">
              </div>

              <div class="form-group form-group-default">
                <h5>Email Address</h5>
                <input id="Name" type="email" class="form-control" placeholder="Enter your Email Address">
              </div>

              <div class="form-group form-group-default">
                <h5>Contact Number</h5>
                <input id="Name" type="text" class="form-control" placeholder="Enter your Contact Number">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalUploadResume" tabindex="-1" role="dialog" aria-labelledby="modalUploadResume" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Upload a Resume</h3>
            </div>
            <div class="modal-body">
              <div class="form-group form-group-default">
                <h5>Select Your Resume <span class="font-weight-bold text-danger">*</span></h5>
                <input type="file" class="form-control" accept=".pdf" id="fdResumeUpload">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCloseUploadResume">Close</button>
              <button type="button" class="btn btn-primary" onclick="uploadResume();" id="btnUploadResume">Upload</button>
            </div>  
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalPreferredJobTitle" tabindex="-1" role="dialog" aria-labelledby="modalPreferredJobTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Preferred Job Titles</h3>
            </div>
            <div class="modal-body">

              <div class="form-group form-group-default">
                <h5>Job Title <span class="font-weight-bold text-danger">*</span></h5>
                <select id="cbJobTitles" class="form-control">
                  <option value="0" selected disabled>Select a Job Title</option>
                </select>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCloseJobTitle">Close</button>
              <button type="button" class="btn btn-success" onclick="savePreferredJobTitles();" id="btnAddJobTitle">Add Job Title</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalPreferredWorkSchedule" tabindex="-1" role="dialog" aria-labelledby="modalPreferredWorkSchedule" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Work Schedule</h3>
            </div>
            <div class="modal-body">
              <div class="form-group form-group-default">
                <h5>Work Schedules <span class="font-weight-bold text-danger">*</span></h5>
                <select id="cbWorkSchedule" class="form-control">
                  <option value="0" selected disabled>Select a Work Schedule</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCloseWorkSchedule">Close</button>
              <button type="button" class="btn btn-primary" onclick="" id="btnSaveWorkSchedule">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalPreferredLocation" tabindex="-1" role="dialog" aria-labelledby="modalPreferredLocation" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group form-group-default">
                <h5>Country <span class="font-weight-bold text-danger">*</span></h5>
                <select class="form-control" id="cbCountryOption" onchange="fillLocationProvinceOptions();">
                  <option value="0" selected disabled>Select a Country</option>
                </select>
              </div>

              <div class="form-group form-group-default">
                <h5>Province <span class="font-weight-bold text-danger">*</span></h5>
                <select class="form-control" id="cbProvinceOption" onchange="fillLocationCityOptions();" disabled>
                  <option value="0" selected disabled>Select a Province</option>
                </select>
              </div>

              <div class="form-group form-group-default">
                <h5>City / Municipality <span class="font-weight-bold text-danger">*</span></h5>
                <select class="form-control" id="cbCityOption" disabled>
                  <option value="0" selected disabled>Select a City/Municipality</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="btnClosePreferredLocation">Close</button>
              <button type="button" class="btn btn-success" onclick="savePreferredLocation();" id="btnSavePreferredLocation">Add Preferred Location</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalPreferredSalaryRange" tabindex="-1" role="dialog" aria-labelledby="modalPreferredSalaryRange" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Salary Range</h3>
            </div>
            <div class="modal-body">
              <div class="form-group form-group-default">
                <h5>Minimum Salary</h5>
                <input id="txtMinimumSalaryRange" type="number" class="form-control" value="0" min="0" step="1000">
              </div>

              <div class="form-group form-group-default">
                <h5>Maximum Salary</h5>
                <input id="txtMaximumSalaryRange" type="number" class="form-control" value="1000" min="1000" step="1000">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCloseSalaryRange">Close</button>
              <button type="button" class="btn btn-primary" onclick="savePreferredSalaryRange();" id="btnSaveSalaryRange">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalPreferredRelocation" tabindex="-1" role="dialog" aria-labelledby="modalPreferredRelocation" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Relocation</h3>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="row d-flex align-items-center px-3 py-3">
                    <h5 class="mr-3">Able to Relocate?</h5>
                    <button class="btn btn-light" id="btnRelocationNo" onclick="RelocationNo();">NO</button>
                    <button class="btn btn-light" id="btnRelocationYes" onclick="RelocationYes();">YES</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCloseRelocation">Close</button>
              <button type="button" class="btn btn-primary" onclick="saveRelocation();" id="btnSaveRelocation">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalPreferredReadyToWork" tabindex="-1" role="dialog" aria-labelledby="modalPreferredReadyToWork" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Ready To Work</h3>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="row d-flex align-items-center px-3 py-3">
                    <h5 class="mr-3">Ready to Work anytime?</h5>
                    <button class="btn btn-light" id="btnReadyToWorkNo" onclick="ReadyToWorkNo();">NO</button>
                    <button class="btn btn-light" id="btnReadyToWorkYes" onclick="ReadyToWorkYes();">YES</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCloseReadyToWork">Close</button>
              <button type="button" class="btn btn-primary" onclick="saveReadyToWork();" id="btnSaveReadyToWork">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!--bottom navbar-->
      <footer class="p-2 navbar">

          <ul class="nav">
            <li class="nav-item">
              <a class="form-label nav-link text-white" href="#">Privacy</a>
            </li>

            <li class="nav-item">
              <a class="form-label nav-link text-white" href="#">Terms & Condition</a>
            </li>

            <li class="nav-item">
              <a class="form-label nav-link text-white" href="#">Protect yourself online</a>
            </li>

            <li class="nav-item">
              <a class="form-label nav-link text-white" href="#">Contact</a>
            </li>
            
            <a class="nav-link disabled text-dark">© 2024 JAPAN JOBS.All rights reserved</a>
          </ul>

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

      <!-- php Data Retrieve Scripts -->
      <script src="../src/Applicant/ApplicantHandler.js"></script>

      <script>
        $(document).ready(function(){ 
          fillJobTitleOptions();
          fillWorkScheduleOptions();
          fillLocationCountryOptions();
          fillProfileData();
          fillResumeList();
          fillPreferredJobTitles();
          fillPreferredLocations();
        });
      </script>
    </body>
  </html>
<?PHP
  }
  else{
    header("Location: ../logout.php");
  }
?>