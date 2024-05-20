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

      <style>
        .error {
          color: red;
        }
      </style>

    <title>Create Resume</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/jj_logo.png">
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
                    <a href="/applicant/Landing_Page.html" class="logo">
                      <img src="../assets/img/JapanJobs.png" alt="navbar brand">
                    </a>
                </li>
                 <li class="nav-item">
                   <a class="nav-link text-white" href="/applicant/Landing_Page.html">Home</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link text-white" href="/applicant/profile.php">Pofile</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link text-white" href="/applicant/about_us.html">About Us</a>
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

    <div class="container justify-content mt-5" style="width: 75%">
      <div class="row">

        <div class="col">
          <h2>Create a Resume</h2>
        </div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col">
          <a href="/FILES-Applicant Side/profile.html">Return to Profile</a>
        </div>

      </div>
      <hr>

      <h4>Personal Information</h4>
      <div class="row">
        <div class="col">
          <p>Name</p>
          <p>Phone Number</p>
          <p>Email</p>
          <p>Location</p>
        </div>

          <div class="col" id="content">
            <p id="Pname">Genesis P. Mañale</p>
            <p id="tel">+639084746563</p>
            <p id="email">genesismarvinmanale12@gmail.com</p>
            <p id="loc">Pagsanjan, Laguna</p>
          </div>
        </div>

        <div class="mt-3">
          <button onclick="opensesame()" type="button" data-toggle="modal" class="btn btn-danger">Edit</button>
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
    <hr>

      <h4>Personal Summary</h4>
      <p>Tell us about yourself</p>
      <textarea type="text" class="form-control pb-5" id="summary" placeholder="Your personal summary will appear here."></textarea>
      <div id="outputDiv" class="mt-3 card card-body"></div>
      <button onclick="saveInput()" type="button" class="btn btn-danger mt-3 mb-5" value="submit">Add Summary</button>
      <hr>

      <h4>Work Summary</h4>
      <p>Let the recruiters know your career history. Tip: It is better to use the most recent experience.</p>
      <textarea type="text" class="form-control pb-5" id="role" placeholder="Your personal summary will appear here."></textarea>
      <div id="outputDiv2" class="mt-3 card card-body"></div>
      <button onclick="saveInput()" type="button" class="btn btn-danger mt-3 mb-5" value="submit">Add Role</button>
      <hr>

      <h4>Education</h4>
      <div id="cardContainer">
        <div id="cardTemplate">
          <div class="container card">
            <div class="card-body">
              <div class="row">

                <div class="col" id="content2">
                  <h5 id="course" class="card-title mb-3">Bachelor of Science in Computer Science</h5>
                  <p id="school" class="card-text mb-2">Laguna University</p>
                  <p id="address" class="card-text mb-2">Sta. Cruz, Laguna</p>
                  <p id="year" class="card-text">August 2020 - Present</p>
                </div>

                <div class="col d-flex justify-content-end">
                  <a class="btn" onclick="opensesame2()" data-toggle="modal"><i class="fa fa-edit"></i></a>
                  <a class="btn" onclick="deleteCard(this)"><i class="fa fa-trash"></i></a>

                  <!-- Modal -->
                  <div class="modal fade" id="edit_detail_educ" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <label>Course</label>
                                <input type="text" class="form-control" id="editInput5" placeholder="Course">
                                <label>School</label>
                                <input type="text" class="form-control" id="editInput6" placeholder="school">
                                <label>School Address</label>
                                <input type="text" class="form-control" id="editInput7" placeholder="address">
                                <label>Year Graduated</label>
                                <input type="text" class="form-control" id="editInput8" placeholder="year">
                              </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="saveChanges2()" class="btn btn-danger">Save changes</button>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button id="addButton" onclick="addCard()" class="btn btn-danger mt-3 mb-5">Add Education</button>
      <hr>

      <h4>Skills</h4>
      <label for="skills" class="mb-3">Showcase what kind of skills you attained.</label>

      <input type="text" class="form-control mb-3" id="skills" placeholder="enter skills here">

      <div id="addNewSkill" class="card mb-3">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5>Organizational Skills</h5>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col d-flex align-items-end">
              <a class="btn" onclick="deleteSkill(this)"><i class="fa fa-trash"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Container for cards -->
      <div id="cardContainer2" class="mt-3"></div>

      <button onclick="addSkill()" type="button" class="btn btn-danger mt-3 mb-5" value="button">Add Skills</button>

      <h4>Licenses and Certifications</h4>
      <p>Add your legitimate certifications, licenses, and accreditations here.</p>
      <textarea type="text" class="form-control pb-5" id="about" placeholder="Your licenses and certifications will appear here."></textarea>
      <div id="outputDiv3" class="mt-3 card card-body"></div>
      <button type="button" onclick="saveInput()" class="btn btn-danger mt-3 mb-5" value="submit">Add Certification / License</button>

      <h4>Languages</h4>
      <label for="languages" class="mb-3">Showcase what kind of skills you attained.</label>
      <input type="text" class="form-control mb-3" id="languages" placeholder="enter language here">

      <div id="addNewLang" class="card mb-3">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5>Filipino</h5>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col d-flex align-items-end">
              <a onclick="deleteLang(this)" class="btn"><i class="fa fa-trash"></i></a>
            </div>
          </div>
        </div>
      </div> 

      <!-- Container for cards -->
      <div id="cardContainer3" class="mt-3"></div>
    
      <button onclick="addLang()" type="button" class="btn btn-danger mt-3 mb-5" value="submit">Add Language</button>
      <hr>

      <div class="dropdown mb-5">
        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add more details
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">detail 1</a>
          <a class="dropdown-item" href="#">detail 2</a>
          <a class="dropdown-item" href="#">detail 3</a>
        </div>
      </div>
      <div>
        <button id="resumeSaved" type="submit" class="btn btn-danger mb-5">Create Resume</button>
        <button type="button" class="btn btn-outline-danger mb-5" value="submit">Cancel</button>
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

  <!-- Bootstrap JS (for modal) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
  <script src="../scripts/create_resume_SCRIPTS.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>
</body>
</html>