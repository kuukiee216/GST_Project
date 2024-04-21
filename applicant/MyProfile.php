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

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
      rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link rel="stylesheet" href="../assets/css/atlantis.css">
      <link href="../CSS/profile.css" rel="stylesheet" >
      <link href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

      <title>Profile</title>
      <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
  </head>
  <body>
      <!-- php Scripts -->
    

      <!-- Japan job posting icon href-->
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

      <div class="container-fluid d-flex justify-contnent-center card text-white mt-5">
        <img class="card-img" src="../assets/img/text_bg.png" alt="card image" style="width:max-content">
        <div class="card-img-overlay m-5">
          <h2 name = "applicantName" id = "applicantName">Genesis P Mañale</h2>
          <div class="card-body" style="text-decoration: underline;">

              <div id="pf-email"><i class="fa fa-envelope"></i> <span>email</span></div>
              <div id="pf-phone"><i class="fa fa-phone mt-3"></i><span> phone</span></div>
              <div id="pf-country"><i class="fa fa-map-marker mt-3"></i><span> country</span></div>
              <div><i class="fa fa-eye mt-3"></i> Visible by Recruiters</div>

              <!-- Button trigger modal -->
              <div class="text-end">
                <a class="float-right text-white" style="text-decoration: underline;" type="button" data-toggle="modal" data-target="#exampleModalCenter">Edit Profile</a>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <label>Name</label>
                      <input type="text" class="form-control" id="name" placeholder="name">

                      <label>Email</label>
                      <input type="text" class="form-control" id="email" placeholder="email">

                      <label>Tel. no</label>
                      <input type="tel" class="form-control" id="tel" placeholder="tel">

                      <label>Location</label>
                      <input type="text" class="form-control" id="loc" placeholder="location">

                      <label>Visibility</label>
                      <div class="form-check row">
                        <label class="form-radio-label col">
                          <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                          <span class="form-radio-sign">Visible Test</span>
                        </label>

                        <label class="form-radio-label col">
                          <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                          <span class="form-radio-sign">Visible Test</span>
                        </label>

                        <label class="form-radio-label col">
                          <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                          <span class="form-radio-sign">Visible Test</span>
                        </label>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </div>

      <div class="container flex justify-content-center" style="width: 80%;">
        <h2>Resume</h2>
        <div class="row row-cols-2">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div>Create your resume using JAPAN JOBS' form.</div>

                <!-- Button trigger modal -->
                <a href="../applicant/create_resume.html" class="btn btn-danger mt-1">Create Resume</a>

              </div>
            </div>
          </div>


          <div class="col">
            <div class="card">
              <div class="card-body">
                <div>Upload your own resume here.</div>
                <div class="form-group">
                  <form id="applicantResume">
                    <input id="resumeUploader" type="file" name="resumeUpload" class="form-control" accept=".pdf, .docx, .png, .jpg, .jpeg" required>
                    <button type="button" id="submitResume" name="submitResume" >Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      
      <div class="container d-flex justify-content-center">
        <div class="container row-col-6">
          <h2>Preferences</h2>

          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="row cols-2">
                  <div class="col">
                    <h2>Job title</h2>
                    <p>Not Specified</p>
                  </div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col">
                    <!-- Button trigger modal -->
                    <a type="button" data-toggle="modal" data-target="#1"><i class="fa fa-plus-circle"></i></a>

                    <!-- Modal -->
                    <div class="modal fade" id="1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Job Title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <label>Job Title</label>
                              <input type="text" class="form-control" id="job" placeholder="job title">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="row cols-2">
                  <div class="col">
                    <h2>Work Schedule</h2>
                    <p>Not Specified</p>
                  </div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col">
                    <!-- Button trigger modal -->
                    <a type="button" data-toggle="modal" data-target="#2"><i class="fa fa-plus-circle"></i></a>

                    <!-- Modal -->
                    <div class="modal fade" id="2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Work Schedule</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <label>Work Schedule</label>
                              <input type="text" class="form-control" id="work" placeholder="work schedule">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="row cols-2">
                  <div class="col">
                    <h2>Locations</h2>
                    <p>Not Specified</p>
                  </div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col">
                    <!-- Button trigger modal -->
                    <a type="button" data-toggle="modal" data-target="#3"><i class="fa fa-plus-circle"></i></a>

                    <!-- Modal -->
                    <div class="modal fade" id="3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Locations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <label>Locations</label>
                              <input type="text" class="form-control" id="loc" placeholder="locations">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="row cols-2">
                  <div class="col">
                    <h2>Salary Expectations</h2>
                    <p>Not Specified</p>
                  </div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col">
                    <!-- Button trigger modal -->
                    <a type="button" data-toggle="modal" data-target="#4"><i class="fa fa-plus-circle"></i></a>

                    <!-- Modal -->
                    <div class="modal fade" id="4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Salary Expectations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <label>Salary Expectations</label>
                              <input type="text" class="form-control" id="salary" placeholder="salary exxpectations">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="row cols-2">
                  <div class="col">
                    <h2>Relocation</h2>
                    <p>Not Specified</p>
                  </div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col">
                    <!-- Button trigger modal -->
                    <a type="button" data-toggle="modal" data-target="#5"><i class="fa fa-plus-circle"></i></a>

                    <!-- Modal -->
                    <div class="modal fade" id="5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Relocation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <label>Relocation</label>
                              <input type="text" class="form-control" id="reloc" placeholder="relocation">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="row cols-2">
                  <div class="col">
                    <h2>Ready to Work</h2>
                    <p>Not Specified</p>
                  </div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col">
                    <!-- Button trigger modal -->
                    <a type="button" data-toggle="modal" data-target="#6"><i class="fa fa-plus-circle"></i></a>

                    <!-- Modal -->
                    <div class="modal fade" id="6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Ready to Work</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <label>Ready to Work</label>
                              <input type="text" class="form-control" id="read" placeholder="ready to work">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
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
    <script src="../src/ApplicantHandler.js"></script>

    <script>
      $('#resumeUploader').change(function(event) {
        verifyUploadResume();
      });

      $('#submitResume').click(function(event) {
        uploadResume();
      });

        $(document).ready(function(){ 
          fillProfileInfo();

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