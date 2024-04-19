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
    <link href="../CSS-RECRUITER/dashboard_recruiter.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Create Job Ad: Preview</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/jj_logo.png">
  </head>
  <body>
       <!-- Japan job posting icon href-->
       <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
          <form class="">
            <a class="navbar-brand font-RR text-white" href="/recruiter/dashboard_recruiter.php">
              <img src="../assets/img/jj_logo.png" alt="logo" style="width:80px;"> Japan jobs</a>
                </form>
  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
                <ul class="navbar nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link text-white" href="/recruiter/dashboard_recruiter.php">Home</a>
                  </li>
  
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Job Ads</a>
                  </li>
                </ul>
  
                <form class="d-flex">
                  <div class="dropdown">
                    <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="avatar">
                        <img src="../assets/img/icon.png" alt="..." class="avatar-img rounded-circle">
                      </div>
                      gen.test
                  </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="/recruiter/dashboard_myaccount.php">My Account</a>
                      <a class="dropdown-item" href="/recruiter/dashboard_billing.php">My Billing</a>
                      <a class="dropdown-item" href="#">Logout</a>
                    </div>
                  </div>
                </form>
            </div>
        </div>
      </nav>

      <div class="container flex justify-content-center mt-5" style="width: 70%;">
        <a href="/recruiter/create_jobadPAY.php">
          <button type="button" class="btn btn-icon btn-round btn-primary">
            <i class="fa fa-arrow-circle-left"></i>
          </button>
        </a>
      </div>
      

      <div class="card container flex justify-content-center mt-5" style="width: 70%;">
        <div class="card-body">
            <h4> Preview</h4>
            <small>This is a preview of what a job ad will look like to candidates.</small>
            <div class="card bg-primary container-fluid d-flex justify-content-center mt-5">
               <div class="card d-flex justify-content-center m-5 p-5">
                    <div class="card-body">
                        <img src="/assets/img/cs_logo.png" alt="...">
                        <h4>Software Engineer</h4>
                        <p>Global Solution Tecchnology OPC.</p>
                        <p><i class="fas fa-map-marker-alt"></i> Malate, Manila</p>
                        <p><i class="fas fa-money-bill"></i> Full-Time</p>
                        <p class="text-muted">Posted Just Now</p>
                        <a href="#" class="btn btn-danger">Quick Apply</a>
                        <a href="#" class="btn btn-outline-danger">Save</a>

                        <div class="mt-4 flex justify-content">Software development is the process of designing, creating, testing, and maintaining 
                            computer programs and applications. It involves coding, debugging, and deploying software to 
                            fulfill specific user needs or business requirements. Software developers use various programming 
                            languages, frameworks, and tools to build solutions ranging from mobile apps and web applications 
                            to enterprise software and operating systems.
                        </div>

                        <h6 class="mt-5">Employer Questions</h6>
                        <p>Your application will include the following questions:</p>
                        <ul>
                            <li>
                                What do you consider to be your greatest strength, and how does it contribute to your work?
                            </li>

                            <li>
                                Describe a time when you faced failure or setbacks at work and how you overcame them.
                            </li>
                        </ul>

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