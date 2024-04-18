<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>

    <!-- CSS Files -->
	  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	  <link rel="stylesheet" href="../assets/css/atlantis.min.css">
    <link href="../CSS-RECRUITER/register_account.css" rel="stylesheet">

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


    <title>Japan Jobs Dashboard</title>
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
                        <a class="nav-link text-white" href="/recruiter/dashboard_recruiter.php">Home</a>
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

      <div>
        <img src="../assets/img/bg_recruiter.png" style="width:100%">

        <div class="d-flex">
            <div class="m-5">
                <img src="../assets/img/image8.png" alt="star" style="height: 60px;">
            </div>
            <div class="flex-1 ml-3 pt-5">
                <p class="fw-bold">Hi Gen</p>
                <p>You're in the right place to find your next hire. Get started by creating your job ad. </p>
            </div>
            <div class="float-right pt-5">
                <a href="../recruiter/create_jobad.php"><button class="btn btn-danger">Create a Job Ad</button></a>
            </div>
      </div>
      </div>
      <hr>

      <h4 class="text-center pb-5">Connecting Talent with Opportunity: Your Gateway to Success</h4>

      <div class="container d-flex justify-content-center bg-primary">
        <div class="m-5">
            <img src="../assets/img/rocket.png" alt="rocket" style="height: 80px;">
        </div>
            <div class="flex-1 ml-3 pt-5">
                <p>Enhance Your Recruitment Efforts with Tailored Candidate Suggestions.</p>
                <p>Once you post a job ad, we'll promptly pair you with pertinent candidates sourced from our extensive database.</p>
            </div>
              <div class="row row-cols-2 text-start">
            </div>
      </div>

    <div class="row row-cols-3 m-5 w-70">
        <div class="card col">
            <img class="card-img-top" src="../assets/img/image1.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title fw-bold">Create a Job Ad</h5>
                <p class="card-text text-center">Posting your job ad is made quick and easy with our step-by-step guide.</p>
            </div>
        </div>

        <div class="card col">
            <img class="card-img-top" src="../assets/img/image2.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title fw-bold">Choose your Ad type</h5>
                <p class="card-text text-center">We offer three distinct ad types tailored to meet your specific requirements.</p>
            </div>
        </div>

        <div class="card col">
            <img class="card-img-top" src="../assets/img/image3.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title fw-bold">Manage your candidates</h5>
                <p class="card-text text-center">We streamline the process for you to pinpoint the most qualified candidates applying for your position.</p>
            </div>
        </div>
    </div>


  <div class="container" style="width: 80%;">
      <h2 class="pt-3">Recent Hot Jobs</h2>
    <div class="card">
      <div class="card-body">
        <div class="row row-cols-6 text-start">
  
          <div class="col">Status</div>
          <div class="col">Job </div>
          <div class="col">candidates</div>
          <div class="col">Talent Search</div>
          <div class="col">Performance</div>
          <div class="col">Job Actions</div>
  
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row row-cols-6 text-start">
  
          <div class="col"><span class="badge badge-warning">Pending</span></div>
          <div class="col">
            <div class="row">
              <div style="text-decoration: underline;">Software Engineer</div>
              <div class="text-muted">Metro Manila</div>
            </div>
          </div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row row-cols-6 text-start">
  
          <div class="col"><span class="badge badge-warning">Pending</span></div>
          <div class="col">
            <div class="row">
              <div style="text-decoration: underline;">Software Engineer</div>
              <div class="text-muted">Metro Manila</div>
            </div>
          </div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row row-cols-6 text-start">
  
          <div class="col"><span class="badge badge-warning">Pending</span></div>
          <div class="col">
            <div class="row">
              <div style="text-decoration: underline;">Software Engineer</div>
              <div class="text-muted">Metro Manila</div>
            </div>
          </div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row row-cols-6 text-start">
  
          <div class="col"><span class="badge badge-warning">Pending</span></div>
          <div class="col">
            <div class="row">
              <div style="text-decoration: underline;">Software Engineer</div>
              <div class="text-muted">Metro Manila</div>
            </div>
          </div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row row-cols-6 text-start">
  
          <div class="col"><span class="badge badge-warning">Pending</span></div>
          <div class="col">
            <div class="row">
              <div style="text-decoration: underline;">Software Engineer</div>
              <div class="text-muted">Metro Manila</div>
            </div>
          </div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
          <div class="col fw-bold">-</div>
        </div>
      </div>
    </div>
  </div>
    
    <div class="container d-flex justify-content-center">
      <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
        <li class="nav-item submenu">
          <a class="nav-link active show" id="pills-open-tab-nobd" data-toggle="pill" href="#pills-open-nobd" role="tab" aria-controls="pills-open-nobd" aria-selected="false">Open</a>
        </li>
        <li class="nav-item submenu">
          <a class="nav-link" id="pills-expired-tab-nobd" data-toggle="pill" href="#pills-expired-nobd" role="tab" aria-controls="pills-expried-nobd" aria-selected="false">Expired</a>
        </li>
        <li class="nav-item submenu">
          <a class="nav-link" id="pills-draft-tab-nobd" data-toggle="pill" href="#pills-draft-nobd" role="tab" aria-controls="pills-draft-nobd" aria-selected="false">Draft</a>
        </li>
        <li class="nav-item submenu">
          <a class="nav-link" id="pills-candidates-tab-nobd" data-toggle="pill" href="#pills-candidates-nobd" role="tab" aria-controls="pills-candidates-nobd" aria-selected="false">Your Candidates</a>
        </li>
      </ul>
    </div>

      <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
        <div class="tab-pane fade active show" id="pills-open-nobd" role="tabpanel" aria-labelledby="pills-open-tab-nobd">
          <div class="container" style="width: 80%;">
            <h2 class="pt-3">Open</h2>
          <div class="card">
            <div class="card-body">
              <div class="row row-cols-6 text-start">
        
                <div class="col">Status</div>
                <div class="col">Job </div>
                <div class="col">candidates</div>
                <div class="col">Talent Search</div>
                <div class="col">Performance</div>
                <div class="col">Job Actions</div>
        
              </div>
            </div>
          </div>
      
            <div class="card">
              <div class="card-body">
                <div class="row row-cols-6 text-start">
          
                  <div class="col"><span class="badge badge-warning">Pending</span></div>
                    <div class="col">
                      <div class="row">
                        <div style="text-decoration: underline;">Software Engineer</div>
                        <div class="text-muted">Metro Manila</div>
                      </div>
                    </div>
                      <div class="col fw-bold">-</div>
                      <div class="col fw-bold">-</div>
                      <div class="col fw-bold">-</div>
                      <div class="col fw-bold">-</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        <div class="tab-pane fade" id="pills-expired-nobd" role="tabpanel" aria-labelledby="pills-expired-tab-nobd">
          <div class="container" style="width: 80%;">
            <h2 class="pt-3">Expired</h2>
            <div class="card">
            <div class="card-body">
              <div class="row row-cols-6 text-start">

                <div class="col">Status</div>
                <div class="col">Job </div>
                <div class="col">candidates</div>
                <div class="col">Talent Search</div>
                <div class="col">Performance</div>
                <div class="col">Job Actions</div>
        
              </div>
            </div>
          </div>
      
            <div class="card">
              <div class="card-body">
                <div class="row row-cols-6 text-start">
          
                  <div class="col"><span class="badge badge-danger">Expired</span></div>
                    <div class="col">
                      <div class="row">
                        <div style="text-decoration: underline;">Software Engineer</div>
                        <div class="text-muted">Metro Manila</div>
                      </div>
                    </div>
                      <div class="col fw-bold">-</div>
                      <div class="col fw-bold">-</div>
                      <div class="col fw-bold">-</div>
                      <div class="col fw-bold">-</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        <div class="tab-pane fade" id="pills-draft-nobd" role="tabpanel" aria-labelledby="pills-draft-tab-nobd">
          <div class="container" style="width: 80%;">
            <h2 class="pt-3">Draft</h2>
            <div class="card">
            <div class="card-body">
              <div class="row row-cols-6 text-start">
        
                <div class="col">Status</div>
                <div class="col">Job </div>
                <div class="col">candidates</div>
                <div class="col">Talent Search</div>
                <div class="col">Performance</div>
                <div class="col">Job Actions</div>
        
              </div>
            </div>
          </div>
      
            <div class="card">
              <div class="card-body">
                <div class="row row-cols-6 text-start">
          
                  <div class="col"><span class="badge badge-primary">Draft</span></div>
                    <div class="col">
                      <div class="row">
                        <div style="text-decoration: underline;">Software Engineer</div>
                        <div class="text-muted">Metro Manila</div>
                      </div>
                    </div>
                      <div class="col fw-bold">-</div>
                      <div class="col fw-bold">-</div>
                      <div class="col fw-bold">-</div>
                      <div class="col fw-bold">-</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        <div class="tab-pane fade" id="pills-candidates-nobd" role="tabpanel" aria-labelledby="pills-candidates-tab-nobd">
          <div class="container" style="width: 80%;">
            <h2 class="pt-3">Your Candidates</h2>
          <div class="card">
          <div class="card-body">
              <div class="row row-cols-5 text-start">
        
                <div class="col">Name</div>
                <div class="col">Status</div>
                <div class="col">Most Recent Role</div>
                <div class="col">Most Recent Application</div>
                <div class="col">Previous Application</div>
                
              </div>
            </div>
          </div>
      
            <div class="card">
              <div class="card-body">
                <div class="row row-cols-5 text-start">
                  <div class="col fw-bold" style="text-decoration: underline;">Genesis P. Manale</div>
                  <div class="col"><span class="badge badge-success">Hired</span></div>
                  <div class="col fw-bold">-</div>
                  <div class="col fw-bold">-</div>
                  <div class="col fw-bold">-</div>
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