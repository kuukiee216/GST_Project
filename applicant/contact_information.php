<?php
session_start();

if (!(isset($_SESSION['AccountID']) && isset($_SESSION['UserID']) && $_SESSION['Token'] == null)) {
    header('Location: login.php');
    exit;
}
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
    <link href="../CSS/contact_information.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Edite Profile</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>
<body>
     <!-- Japan job posting icon href-->
     <nav class="navbar navbar-expand-sm">
      <div class="container-fluid">
        <form class="">
          <a class="navbar-brand font-RR text-white" href="/FILES-Applicant Side/Landing_Page.html">
            <img src="../assets/img/jj_logo.png" alt="logo" style="width:80px;"> Japan Jobs</a>
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
    </nav>

    <div class="container-fluid flex justify-content-center" style="width: 70%;">
    <a href="profile.php" class="btn btn-danger mt-3 mb-3">
    <i class="fa fa-arrow-left"></i>
</a>


      <h2>Contact Information</h2>

      <form>

        <div class="form-group mb-5">
          <label for="Fname">First Name</label>
          <input type="text" class="form-control" id="Fname" name="Fname" aria-describedby="">
        </div>

        <div class="form-group mb-5">
          <label for="Lname">Last Name</label>
          <input type="text" class="form-control" id="Lname" name="Lname" aria-describedby="">
        </div>

        <div class="form-group mb-5">
          <label for="Pnum">Phone Number</label>
          <div class="input-group">
            <input type="tel" class="form-control" id="Pnum" name="Pnum" aria-label="Text input with dropdown button">
            <div class="input-group-append">
              <button class="btn btn-outline-dark btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+63</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
        </div>

        <h2>Email</h2>
        <label for="email">genesismarvinmanale12@gmail.com</label>
        <a class="nav-link mb-5" href="Settings.php">Edit Email in Settings</a>
        <hr>

        <h2>Home Location</h2>
        <Label for="country">Country</Label>
        <input type="text" class="form-control mb-5" name="country" id="country" aria-label="text input">

        <Label for="street">Street Address</Label>
        <input type="text" class="form-control mb-5" id="street" name="street" aria-label="text input">

        <div class="form-group ">
            <Label for="city">City</Label>
            <input type="text" class=" form-control mb-5" id="city" name="city" aria-label="text input">

            <Label for="state">State</Label>
            <input type="text" class=" form-control mb-5" id="state" name="state" aria-label="text input">
        </div>

        <label for="Pcode">Postal Code</label>
        <input type="text" class="form-control mb-5" id="postal" name="postal" aria-label="text input">

        <div>
          <button type="button" class="btn btn-danger mb-5" value="submit">Save</button>
          <button type="button" class="btn btn-outline-danger mb-5" value="submit">Cancel</button>
        </div>

      </form>
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

    <script src="../ajax/ContactInfo.js"></script>
    <!-- Add jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script>
          $(document).ready(function() {
            GetContactInfo();
          });
          console.log("hey");
        </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
