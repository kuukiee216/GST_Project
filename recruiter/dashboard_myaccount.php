<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/css/atlantis.css">
    <link href="../CSS-RECRUITER/register_account.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

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

    <title>Dashboard My Account</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>
<body>
          <!--Navbar Header-->
          <nav class="navbar navbar-header navbar-expand-lg" style="background-color:#187498">
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
                        <a class="nav-link text-white" href="dashboard_recruiter.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="#">Japan Ads</a>
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
                            <p class="text-muted">Genesis.com</p><a href="/applicant/profile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">My Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">My Billing</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                      </li>
                    </div><div class="scroll-element scroll-x"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div><div class="scroll-element scroll-y"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div></div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!--End Navbar-->

      <div class="container pt-5">
        <h2 class="pb-4">Account Details</h2>
        <div class="card">
            <div class="card-body">
              <div class="row row-cols-3 text-start">
        
                <div class="col">
                    <img src="../assets/img/image4.png" style="height: 60px;">
                </div>
                <div class="col">
                    <h3 class="pb-5">Personal Detail</h3>
                  <div class="row">
                    <div>Genesis Manale</div>
                    <div class="text-muted" style="text-decoration: underline;">genesismarvinmanale12@gmail.com</div>
                  </div>
                </div>
                <div class="col">
                    <a class="text-primary float-right" style="text-decoration: underline;" type="button" data-toggle="modal" data-target="#exampleModalCenter">Edit</a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalChangeEmail">Change Email</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>

                            <div class="modal-body">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" placeholder="email">
                            </div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save email</button>
                            </div>
                        </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="row row-cols-3 text-start">
        
                <div class="col">
                    <img src="../assets/img/image5.png" style="height: 60px;">
                </div>
                <div class="col">
                    <h3 class="pb-5">Company Details</h3>
                  <div class="row">
                    <div class="fw-bold">Company Name</div>
                    <div class="pb-3">Global Solution OPC</div>
                    <div class="pb-5">To change your company name please visit the <u type="button" class="text-primary" href="#"> Help Center</u></div>
                    <hr>
                    <div class="fw-bold pb-3">Primary Contact</div>
                    <div>Genesis Manale</div>
                    <div class="text-primary" style="text-decoration: underline;">genesismarvinmanale12@gmail.com</div>
                    <div>Phone:</div>
                    <div class="pb-5">+639084746563</div>
                    <hr>
                    <div class="fw-bold">Company Address</div>
                    <div class="pb-5">Philippines</div>
                  </div>
                </div>
                <div class="row">
                    <a class="text-primary" style="text-decoration: underline;" type="button" data-toggle="modal" data-target="#exampleModalCenter2">Edit</a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter2" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalChangeEmail">Primary Contact</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>

                            <div class="modal-body">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" placeholder="email">
                            <label>Phone</label>
                            <input type="tel" class="form-control" id="number" placeholder="number">
                            <label>Company address</label>
                            <input type="text" class="form-control" id="address" placeholder="address">
                            </div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="row row-cols-3 text-start">
        
                <div class="col">
                    <img src="../assets/img/image6.png" style="height: 60px;">
                </div>
                <div class="col">
                    <h3 class="pb-5">Account Settings</h3>
                  <div class="row">
                    <div>Email:</div>
                    <div class="text-muted" style="text-decoration: underline;">genesismarvinmanale12@gmail.com</div>
                    <div>Password:</div>
                    <div class="text-muted" style="text-decoration: underline;">testtest12341234</div>
                  </div>
                </div>
                <div class="row">
                    <a class="text-danger float-right" style="text-decoration: underline;" type="button" data-toggle="modal" data-target="#exampleModalCenter3">Edit</a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter3" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalChangeEmail">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>

                            <div class="modal-body">
                            <label>Change Password</label>
                            <input type="password" class="form-control" id="pass" placeholder="password">
                            </div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save Password</button>
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
    <footer class="footer text-white" style="background-color:#187498">
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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
      function test(){
        var variablename = $('#Div-filter').attr('class'); //variable name (id or class)
      
        if(variablename == 'dropdown d-flex justify-content-center gap-3'){ //variablename = class
          $('#Div-filter').addClass('d-none d-sm-none');
        }else {
          $('#Div-filter').removeClass('d-none d-sm-none');
        }
      }
      </script>


    <!-- Option 1: Bootstrap scripts -->
    <script src="../.../assets/js/atlantis.js"></script>
    <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

      
</body>
</html>