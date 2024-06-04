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

    <style>
      .error {
        color: red;
      }
    </style>

    <title>Japan Jobs - Create Resume</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
  </head>
  <body>
    <!-- Navbar Header -->
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
                  <a class="nav-link text-white" href="about_us.html">About Us</a>
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
                      <h4>Meow</h4>
                      <p class="text-muted">Genesis.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Saved Jobs</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">recommended Jobs</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Logout</a>
                </li>
              </div><div class="scroll-element scroll-x"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div><div class="scroll-element scroll-y"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div></div>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
   <!-- End Navbar -->

    <div class="container mt-5">

      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6 d-flex justify-content-start align-items-center">
              <h2 class="font-weight-bold">Create a Resume</h2>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
              <a href="MyProfile.php">Return to Profile</a>
            </div>
          </div>
        </div>
      </div>

      <hr>
      
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Personal Information</h5>
            </div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <td>Full Name</td>
                  <td id="lblCResumeName">Ron Henrick C. Parungao</td>
                </tr>
                <tr>
                  <td>Contact Number</td>
                  <td id="lblCResumeContactNumber">+63 915 231 6884</td>
                </tr>
                <tr>
                  <td>Email Address</td>
                  <td id="lblCResumeEmail">ronhenrick.parungao@gmail.com</td>
                </tr>
                <tr>
                  <td>Complete Address</td>
                  <td id="lblCResumeAddress">Camella Baia, Bay, Laguna, Philippines</td>
                </tr>
              </table>

              <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                  <button onclick="opensesame()" type="button" data-toggle="modal" class="btn btn-danger">Edit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Personal Summary</h5>
              <h6>Tell us more about yourself.</h6>
            </div>
            <div class="card-body">
              <textarea type="text" class="form-control pb-5" id="txtPersonalSummary" placeholder="Your personal summary will appear here."></textarea>

              <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                  <button class="btn btn-success mt-3"><i class="fas fa-plus fa-lg mr-2"></i> Add</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Work Summary</h5>
              <h6>Let the recruiters know your career history. Tip: It is better to use the most recent experience.</h6>
            </div>
            <div class="card-body">
              <textarea type="text" class="form-control pb-5" id="summary" placeholder="Your personal summary will appear here."></textarea>

              <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                  <button class="btn btn-success mt-3"><i class="fas fa-plus fa-lg mr-2"></i> Add</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Educational Background</h5>
            </div>
            <div class="card-body">
              <table class="table table-hover text-center">
                <thead>
                  <th>Course / Program</th>
                  <th>School/Universty Name</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th>Action</th>
                </thead>
                <tbody id="listEducation">

                </tbody>
              </table>

              <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                  <button class="btn btn-success" data-toggle="modal" data-target="#modalEducationalAttainment"><i class="fas fa-plus fa-lg mr-2"></i> Add</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Skills</h5>
              <h6>Showcase what kind of skills you attained.</h6>
            </div>
            <div class="card-body">
              <div id="listSkills">

              </div>

              <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                  <button class="btn btn-success mt-3" onclick="addSkill();"><i class="fas fa-plus fa-lg mr-2"></i> Add</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Licenses, Certifications and Awards</h5>
              <h6>Add your legitimate certifications, licenses, and accreditations here.</h6>
            </div>
            <div class="card-body">
              <table class="table table-hover text-center">
                <thead>
                  <th>Title</th>
                  <th>Issuer</th>
                  <th>Issue Date</th>
                  <th>Description</th>
                  <th>Expiration</th>
                  <th>Action</th>
                </thead>
                <tbody id="listCertificate">
                  
                </tbody>
              </table>

              <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                  <button class="btn btn-success" data-toggle="modal" data-target="#modalLicenseCertificationAwards"><i class="fas fa-plus fa-lg mr-2"></i> Add</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Languages</h5>
              <h6>Showcase what languages you attained.</h6>
            </div>
            <div class="card-body">
              <div id="listLanguages">

              </div>

              <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                  <button class="btn btn-success mt-3" onclick="addLanguage();"><i class="fas fa-plus fa-lg mr-2"></i> Add</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-end mb-5 pr-3">
        <a href="MyProfile.php"><button type="button" class="btn btn-outline-danger mr-3">Cancel</button></a>
        <button id="resumeSaved" type="submit" class="btn btn-danger" onclick="generateResumePDF();">Create Resume</button>
      </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form id="validateForm">
              <label>Name</label>
              <input type="text" class="form-control" id="editInput1" name="editInput1" placeholder="name">
              <span id="nameError" class="text-danger"></span><br><br>

              <label>Phone Number</label>
              <input type="tel" class="form-control" id="editInput2" name="editInput2" placeholder="phone number">
              <span id="phoneError" class="text-danger"></span><br><br>

              <label>Email Address</label>
              <input type="email" class="form-control" id="editInput3" name="editInput3" placeholder="email">
              <span id="emailError" class="text-danger"></span><br><br>

              <label>Location</label>
              <input type="text" class="form-control" id="editInput4" name="editInput4" placeholder="location">
              <span id="locationError" class="text-danger"></span><br><br>
            </form>
          </div>
              
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEducationalAttainment" tabindex="-1" role="dialog" aria-labelledby="modalEducationalAttainment" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Add Educational Attainment</h3>
          </div>
          <div class="modal-body">
            <form id="formEducationalBackground">

              <div class="form-group" id="divCourseProgram">
                <label for="txtCourseProgram">Course / Program <span class="font-weight-bold text-danger">*</span></label>
                <input type="text" id="txtCourseProgram" placeholder="Enter Course/Program" class="form-control">
                <small id="errmsgCourseProgram" class="form-text text-danger"></small>
              </div>

              <div class="form-group" id="divSchoolName">
                <label for="txtSchoolName">School Name <span class="font-weight-bold text-danger">*</span></label>
                <input type="text" id="txtSchoolName" placeholder="Enter School Name" class="form-control">
                <small id="errmsgSchoolName" class="form-text text-danger"></small>
              </div>

              <div class="form-group" id="divSchoolAddress">
                <label for="txtSchoolAddress">School Address <span class="font-weight-bold text-danger">*</span></label>
                <input type="text" id="txtSchoolAddress" placeholder="Enter School Address" class="form-control">
                <small id="errmsgSchoolAddress" class="form-text text-danger"></small>
              </div>

              <div class="form-group" id="divEducationStartYear">
                <label for="cbEducationStartYear">Start Year <span class="font-weight-bold text-danger">*</span></label>
                <select id="cbEducationStartYear" class="form-control" onchange="fillEndYear();">
                  <option value="0" disabled selected>Start Year</option>
                </select>
                <small id="errmsgEducationStartYear" class="form-text text-danger"></small>
              </div>

              <div class="form-group" id="divEducationEndYear">
                <label for="cbEducationEndYear">End Year <i>(or expected end)</i> <span class="font-weight-bold text-danger">*</span></label>
                <select id="cbEducationEndYear" class="form-control" disabled>
                  <option value="0" disabled selected>End Year</option>
                  <option value="Present">Present</option>
                </select>
                <small id="errmsgEducationEndYear" class="form-text text-danger"></small>
              </div>

            </form>
          </div>
              
          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="btnCloseEducationalBackground" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="btnSaveEducationalBackground" onclick="saveEducationalBackground('formEducationalBackground');">Add Education</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalLicenseCertificationAwards" tabindex="-1" role="dialog" aria-labelledby="modalLicenseCertificationAwards" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Add License, Certification and Awards</h3>
          </div>
          <div class="modal-body">
            <form id="formCertificate">
              <div class="form-group" id="divCertTitle">
                <label for="txtCertTitle">Title <span class="font-weight-bold text-danger">*</span></label>
                <input type="text" id="txtCertTitle" placeholder="Enter Title" class="form-control">
                <small id="errmsgCertTitle" class="form-text text-danger"></small>
              </div>

              <div class="form-group" id="divCertIssuer">
                <label for="txtCertIssuer">Issuer <span class="font-weight-bold text-danger">*</span></label>
                <input type="text" id="txtCertIssuer" placeholder="Enter Issuer" class="form-control">
                <small id="errmsgCertIssuer" class="form-text text-danger"></small>
              </div>

              <div class="form-group" id="divCertIssueDate">
                <label>Issue Date <span class="font-weight-bold text-danger">*</span></label>
                <div class="row">
                  <div class="col-md-6">
                    <select id="cbCertIssueMonth" class="form-control">
                      <option value="0" disabled selected>Month</option>
                      <option value="1">January</option>
                      <option value="2">February</option>
                      <option value="3">March</option>
                      <option value="4">April</option>
                      <option value="5">May</option>
                      <option value="6">June</option>
                      <option value="7">July</option>
                      <option value="8">August</option>
                      <option value="9">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <select id="cbCertIssueYear" class="form-control">
                      <option value="0" disabled selected>Year</option>
                      <option>2024</option>
                      <option>2023</option>
                      <option>2022</option>
                      <option>2021</option>
                      <option>2020</option>
                      <option>2019</option>
                      <option>2018</option>
                    </select>
                  </div>
                </div>
                <small id="errmsgCertIssueDate" class="form-text text-danger"></small>
              </div>

              <div class="form-group" id="divCertDescription">
                <label for="txtCertDescription">Description</label>
                <textarea id="txtCertDescription" class="form-control" placeholder="Enter Description" rows="3"></textarea>
                <small id="errmsgCertDescription" class="form-text text-danger"></small>
              </div>

              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" id="chbCertExpiration" onchange="toggleExpirationCertificate();">
                  <span class="form-check-sign">No Expiration</span>
                </label>
              </div>

              <div class="form-group"  id="divCertExpirationDate">
                <label>Expiration Date <span class="font-weight-bold text-danger">*</span></label>
                <div class="row">
                  <div class="col-md-6">
                    <select id="cbCertExpirationMonth" class="form-control">
                      <option value = "-" disabled selected>Month</option>
                      <option value="1">January</option>
                      <option value="2">February</option>
                      <option value="3">March</option>
                      <option value="4">April</option>
                      <option value="5">May</option>
                      <option value="6">June</option>
                      <option value="7">July</option>
                      <option value="8">August</option>
                      <option value="9">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <select id="cbCertExpirationYear" class="form-control">
                      <option disabled selected>Year</option>
                      <option>2024</option>
                      <option>2023</option>
                      <option>2022</option>
                      <option>2021</option>
                      <option>2020</option>
                      <option>2019</option>
                      <option>2018</option>
                    </select>
                  </div>
                </div>
                <small id="errmsgCertExpirationDate" class="form-text text-danger"></small>
              </div>

            </form>
          </div>
              
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelCertificate">Cancel</button>
            <button type="button" class="btn btn-primary" id="btnSaveCertificate" onclick="saveCertificate('formCertificate')">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    
    <!--bottom navbar-->
    <footer class="footer text-white" style="background-color:mediumseagreen">
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

    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>

    <script src="../src/Applicant/CreateResumeHandler.js"></script>

    <script>
      $(document).ready(function(){
        fillStartYear();
      });
    </script>

  </body>
</html>