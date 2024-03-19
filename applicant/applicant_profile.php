<?php

if (!(isset($_SESSION['AccountID']) && $_SESSION['Token'] == null)) {
    header('Location: almost_done.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/css/atlantis.css">
    <link href="/CSS/applicant.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Japan Jobs Dashboard Page</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/jj_logo.png">
</head>
<body>
     <!-- Japan job posting icon href-->
     <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
          <form class="">
            <a class="navbar-brand font-RR text-white" href="/FILES-Applicant Side/Landing_Page.html">
              <img src="/assets/img/japanLogo.png" alt="logo" style="width:80px;"> Japan jobs</a>
            </form>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="nav-link text-white" href="/FILES-Applicant Side/Landing_Page.html">Home</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link text-white" href="/FILES-Applicant Side/profile.html">Pofile</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link text-white" href="/FILES-Applicant Side/about_us.html">About Us</a>
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
                          <a class="dropdown-item" href="/FILES-Applicant Side/Settings.html">Settings</a>
                          <a class="dropdown-item" href="/FILES-Applicant Side/Saved_jobs.html">Saved Jobs</a>
                          <a class="dropdown-item" href="/FILES-Applicant Side/recommended_jobs.html">recommended Jobs</a>
                          <a class="dropdown-item" href="#">Logout</a>
                        </div>
                      </div>
                    </form>

                    <form class="d-flex">
                      <div>
                        <a class="text-white nav-link" href="/FILES-Recruiter Side/dashboard_recruiter.html">Recruiter Site</a>
                      </div>
                    </form>

                  </div>
            </div>
        </div>
      </nav>

      <div class="button-padding d-flex justify-content-center">
        <div class="button-padding d-flex justify-content-center gap-3">

          <div class="form-group">
            <div class="input-icon">
              <span class="input-icon-addon">
                <i class="fa fa-search"></i>
              </span>
              <input type="text" class="form-control" placeholder="Job Title">
            </div>
          </div>

            <div class="form-group">
              <div class="input-icon">
                <span class="input-icon-addon">
                  <i class="fa fa-suitcase"></i>
              </span>
              <input type="text" class="form-control ps-5" placeholder="Classification" />
            </div>
          </div>

          <div class="form-group">
            <div class="input-icon">
            <span class="input-icon-addon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
            </svg>
            </span>
            <input type="text" class="form-control ps-5" placeholder="Location" />
          </div>
        </div>

          <button class="btn btn-danger" type="button">Search</button>

          <button onclick="test();" id="test" class="btn btn-danger" type="button">
            <i class="fa fa-filter"></i>
          </button>

        </div>
      </div>

      <div id="Div-filter" class="dropdown d-flex justify-content-center gap-3">
        <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Date posted
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>

        <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Experience Level
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">test</a>
          <a class="dropdown-item" href="#">test test</a>
          <a class="dropdown-item" href="#">test</a>
        </div>

        <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Minimum Salary
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">test</a>
          <a class="dropdown-item" href="#">test test </a>
          <a class="dropdown-item" href="#">test</a>
        </div>

        <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Remote
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">test</a>
          <a class="dropdown-item" href="#">test test</a>
          <a class="dropdown-item" href="#">test</a>
        </div>
      </div>

      <div class="row pt-5">
        <div class="col card-left">
          <div class="card" style="width: 25rem;">
              <div class="card-body">
                  <h8 class="card-title">Software Engineer</h8>

                  <div class="container mt-4">
                        <p>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                          </svg>
                          <span class="mr-2"><i class="bi bi-geo-alt-fill"></i></span>Osaka, Japan
                        </p>
                  </div>

                  <div class="container mt-4">
                        <p>
                          <span class="mr-2"><i class="fa fa-clone"></i></span>Information and Communication Technology
                        </p>
                  </div>

                  <div class="container mt-4">
                        <p>
                          <span><i class="fa fa-database"></i></span>60,000 Yen-100,000 Yen
                        </p>
                  </div>

                  <div class="container mt-4">
                        <p>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                          </svg>
                          <i class="bi bi-clock-fill"></i>Full Time</p>
                  </div>

                  <div>
                      <ul>
                          <li>
                              <p>Description 1</p>
                          </li>

                          <li>
                              <p>Description 2</p>
                          </li>

                          <li>
                              <p>Description 3</p>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>

      <div class="col pt-3 pb-5">
          <div class="card" style="width: 25rem;">
              <div class="card-body">
                  <h8 class="card-title">Software Engineer</h8>

                  <div class="container mt-4">
                    <p>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                      </svg>
                      <span class="mr-2"><i class="bi bi-geo-alt-fill"></i></span>Osaka, Japan
                    </p>
                  </div>

                  <div class="container mt-4">
                    <p>
                      <span class="mr-2"><i class="fa fa-clone"></i></span>Information and Communication Technology
                    </p>
                  </div>

                  <div class="container mt-4">
                    <p>
                      <span><i class="fa fa-database"></i></span>60,000 Yen-100,000 Yen
                    </p>
                  </div>

                  <div class="container mt-4">
                    <p>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                      </svg>
                      <i class="bi bi-clock-fill"></i>Full Time</p>
                  </div>

                  <div>
                      <ul>
                          <li>
                              <p>Description 1</p>
                          </li>

                          <li>
                              <p>Description 2</p>
                          </li>

                          <li>
                              <p>Description 3</p>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
        </div>
      </div>

      <div class="col card-right">
          <div class="card" style="width: 35rem;">
              <div class="card-body">
                  <h5 class="card-title">Software Engineer</h5>
                  <div class="container mt-4">
                    <p>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                      </svg>
                      <span class="mr-2"><i class="bi bi-geo-alt-fill"></i></span>Osaka, Japan
                    </p>
                  </div>
                  <a href="/FILES-Applicant Side/Applying_1st.html" class="btn btn-danger">Apply Now</a>
                  <hr>
                  <h6>Job Summary</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium tempore accusamus iste dicta sit. Eveniet sed cupiditate aut earum eaque aliquam ullam, iusto adipisci pariatur, ipsam facilis. Autem, dolor natus.</p>
                  <h7>Qualifications</h7>
                  <ul>
                      <li>
                        <a>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum voluptatum ut consectetur provident rem ab illo eum error, officiis quam ullam dolorem perferendis veniam quod nesciunt doloremque voluptatem esse dolorum?</a>
                      </li>
                      <li>
                          <a>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum voluptatum ut consectetur provident rem ab illo eum error, officiis quam ullam dolorem perferendis veniam quod nesciunt doloremque voluptatem esse dolorum?</a>
                      </li>
                      <li>
                          <a>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum voluptatum ut consectetur provident rem ab illo eum error, officiis quam ullam dolorem perferendis veniam quod nesciunt doloremque voluptatem esse dolorum?</a>
                      </li>
                  </ul>
                  <button class="btn btn-danger">Report Job</button>
              </div>
          </div>
        </div>
      </div>
    <!--bottom navbar-->
    <footer class="p-2 navbar text-primary">
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
    <!-- Option 1: Bootstrap scripts -->
    <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
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
