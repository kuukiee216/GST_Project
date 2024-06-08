<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    $phone_number = filter_var($_POST['phone_number'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $additional_info = filter_var($_POST['additional_info'], FILTER_SANITIZE_STRING);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Email parameters
    $to = "japanjobs.global@gmail.com";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // Email content
    $message = "
        <html>
        <head>
            <title>Contact Form Submission</title>
        </head>
        <body>
            <h2>Contact Form Submission</h2>
            <p><strong>First Name:</strong> {$first_name}</p>
            <p><strong>Last Name:</strong> {$last_name}</p>
            <p><strong>Phone Number:</strong> {$phone_number}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Subject:</strong> {$subject}</p>
            <p><strong>Additional Information / Details:</strong> {$additional_info}</p>
        </body>
        </html>
    ";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request method.";
}
?>

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

    <title>Japan Jobs Home Page Account</title>
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
              <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="scroll-wrapper dropdown-user-scroll scrollbar-outer" style="position: relative;"><div class="dropdown-user-scroll scrollbar-outer scroll-content" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 0px;">
                </div><div class="scroll-element scroll-x"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div><div class="scroll-element scroll-y"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div></div>
              </ul>
            </li>
            <li>
              <form class="d-flex">
                <div>
                    <a href="../applicant/SignIn.php"><button class="btn btn-danger" type="button">Register/Login</button></a>
                    
                </div>
              </form>
            </li>
          </ul>
        </div>
        </nav>
        <!-- End Navbar -->

    <div class="container flex justify-content-center mt-5" style="width: 80%;">
        
        <!--Introduction-Group-->
        <div class="row mb-5">
            <div class="title-text-center">
                <h1><b>WHAT IS JAPAN JOBS?</b></h1>
            </div>
        </div>
        
            <div class="row">
                   <div class="" style="width: 100%;">
                    <div class="row card-body">
                        <div class="col">
                            <h3><b>Japan Jobs</b> is the go-to site for Japanese employers looking for 
                            skilled professionals and job seekers looking to start their careers in Japan.</h3>
                        </div>
                        <img class="col-sm-6" src="/assets/img/abouts1.png" alt="sans"/>
                    </div>
                </div>
            </div>

            <div class="row">
                   <div class="mt-5" style="width: 100%;">
                    <div class="row">
                    <img class="col-sm-6" src="/assets/img/abouts2.png" alt="sans"/>
                        <div class="col">
                            <h1><b>For Business</b></h1>
                            <h3>The platform offers businesses a user-friendly recruitment solution 
                            that makes it simple to post job openings and search for qualified candidates.</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                   <div class="mt-5" style="width: 100%;">
                    <div class="row">
                        <div class="col">
                            <h1><b>For Applicants</b></h1>
                            <h3>Job seekers can browse a variety of career options that are suited to their 
                            abilities and preferences, as well as receive personalized job recommendations and materials to help 
                            them refine their job search procedures.</h3>
                        </div>
                        <img class="col-sm-6" src="/assets/img/abouts3.png" alt="sans"/>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="text-start mt-5 mb-5">
                    <h3><b>Japan Jobs</b> is dedicated to matching talent with opportunity, allowing people and 
                    companies to thrive in Japan's evolving economy.</h3>
                </div>
            </div>

            <h1>Contact Us</h1>
            <h3>Having troubles, suggestions, or inquiry about something? You can create a ticket by filling out the form below. 
            We will get back to you as soon as possible we receive it. </h3>

            <div class="row">
                <div class="col card">
                    <form>
                    <div class="form-group">
                        <label for="firstName">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="firstName" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="lastName" required>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">🇵🇭 +63</span>
                            </div>
                            <input type="text" class="form-control" id="phoneNumber">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="additionalInfo">Additional Information / Details <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="additionalInfo" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger mb-3">Send</button>
                    </form>
                </div>
                

            <div class="col">
                <h3>You can also contact us directly in our contact information below.</h3>
                <h3><i class="icon-phone"></i> +63-345-2342-242</h3>
                <h3><i class="flaticon-envelope-1"></i> japanjobs.global@gmail.com</h3>
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

<!--ETO YUNG PARA SA SESSION-->