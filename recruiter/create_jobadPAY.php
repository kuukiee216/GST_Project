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

    <title>Pay and Post</title>
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
                        <a class="dropdown-item" href="dashboard_myaccount.php">My Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="dashboard_billing.php">My Billing</a>
                        <div class="dropdown-divider"></div>
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

    <div class="container flex justify-content-center mt-5" style="width: 80%;">
        <a href="/recruiter/create_jobad4.php">
            <button type="button" class="btn btn-icon btn-round btn-primary">
              <i class="fa fa-arrow-circle-left"></i>
            </button>
          </a>

          <h4 class="mt-4">Pay Post</h4>
          <h3 class="mt-5">Business Address</h3>
          <p class="text-muted mt-3">To protect candidates and seek from fraud, we verify the business address of all first time hirers . 
            Don’t worry, we only need to do this one.</p>

        <h5 class="mt-5">Country</h5>
        <div>Philippines</div>

        <h5 class="mt-3">Address Line</h5>
        <textarea class="form-control" id="comment" rows="5">
        </textarea>

        <h5 class="mt-3">Suburb/Town/City</h5>
        <textarea class="form-control" id="comment" rows="5">
        </textarea>

        <h5 class="mt-3">Postal Code</h5>
        <textarea class="form-control" id="comment" rows="5">
        </textarea>
        <hr>

        <h5 class="mt-5">Pay upfront and get a discount on ads</h5>
        <p class="mb-5">Choose an Ad budget and use your balance to post ad jobs</p>

        <div class="row justify-content-center align-items-center mb-1">
          <div class="col-md-3 pl-md-0">
            <div class="card card-pricing">
              <div class="card-header">
                <h4 class="card-title">Occasional</h4>
                <span class="sub-title">2-3 ads over 6 months</span>
                <div class="card-price">
                  <span class="price">$17,920</span>
                  <span class="text">/mo</span>
                </div>
              </div>
              <div class="card-body">
                <ul class="specification-list">
                  <li>
                    <span class="name-specification">4% off Basic ads</span>
                  </li>
                  <li>
                    <span class="name-specification">4% off Branded ads</span>
                  </li>
                  <li>
                    <span class="name-specification">Post any ad type</span>
                  </li>
                  <li>
                    <span class="name-specification">Discount apply for 6 months, even after your balance is used up</span>
                  </li>
                </ul>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary btn-block"><b>Select</b></button>
              </div>
            </div>
          </div>
          <div class="col-md-3 pl-md-0 pr-md-0">
            <div class="card card-pricing card-pricing-focus card-primary">
              <div class="card-header">
                <h4 class="card-title">Regular</h4>
                <span class="sub-title">2-3 ads over 6 months</span>
                <div class="card-price">
                  <span class="price">$28,000</span>
                  <span class="text">/mo</span>
                </div>
              </div>
              <div class="card-body">
                <ul class="specification-list">
                  <li>
                    <span class="name-specification">10% off Basic ads</span>
                  </li>
                  <li>
                    <span class="name-specification">10% off Branded ads</span>
                  </li>
                  <li>
                    <span class="name-specification">3% off Premium ads</span>
                  </li>
                  <li>
                    <span class="name-specification">Post any ad type</span>
                  </li>
                  <li>
                    <span class="name-specification">Discount apply for 12 months, even after your balance is used up</span>
                  </li>
                </ul>
              </div>
              <div class="card-footer">
                <button class="btn btn-light btn-block"><b>Select</b></button>
              </div>
            </div>
          </div>
          <div class="col-md-3 pr-md-0">
            <div class="card card-pricing">
              <div class="card-header">
                <h4 class="card-title">Frequent</h4>
                <span class="sub-title">2-3 ads over 6 months</span>
                <div class="card-price">
                  <span class="price">$52,640</span>
                  <span class="text">/mo</span>
                </div>
              </div>
              <div class="card-body">
                <ul class="specification-list">
                  <li>
                    <span class="name-specification">20% off Basic ads</span>
                  </li>
                  <li>
                    <span class="name-specification">20% off Branded ads</span>
                  </li>
                  <li>
                    <span class="name-specification">10% off Premium ads</span>
                  </li>
                  <li>
                    <span class="name-specification">Post any ad type</span>
                  </li>
                  <li>
                    <span class="name-specification">Discount apply for 12 months, even after your balance is used up</span>
                  </li>
                </ul>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary btn-block"><b>Get Started</b></button>
              </div>
            </div>
          </div>
        </div>

        <hr>
        <h4 class="mt-5">Apply Promo Code</h4>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            <div class="input-group-prepend">
                <button class="btn btn-secondary btn-border" type="button">Button</button>
            </div>
        </div>
        <h4 class="mt-5">Order Summary</h4>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Items</th>
                    <th scope="col">Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Basic Ad</td>
                    <td>6250.00</td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td>750.00</td>
                </tr>
                <tr>
                    <td>Total (including VAT)</td>
                    <td>7,000.00</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <h4 class="mt-5">Pay Method</h4>

        <div class="card container">

            <div class="row cols-3" style="width: 30%;">

                <div class="col">
                    <img class="card-img-top" src="../assets/img/visa.png" alt="visa">
                </div>
                
                <div class="col">
                    <img class="card-img-top" src="../assets/img/mastercard.png" alt="visa">
                </div>
                
                <div class="col">
                    <img class="card-img-top" src="../assets/img/americanexpress.png" alt="visa">
                </div>
                
            </div>

            <div class="card-body">
                <label for="tel">Card Number</label>
                <input type="tel" class="form-control" id="tel" placeholder="0000-0000-0000-0000">
                <div class="row cols-2 mt-3">
                    <div class="col">
                    <label for="EDate">Expire Date</label>
                    <input type="date" class="form-control" id="EDate">
                    </div>
                    <div class="col">
                        <label for="cvc">CVC</label>
                        <input type="tel" class="form-control" id="cvc" placeholder="123">
                    </div>
                </div>
                <p class="mt-3"><input type="checkbox" id="check"> Save card details for future payments</p>
                <p><i class="fas fa-lock"></i> Your payment is secured. Your card details won’t be shared with other users on this account.</p>
            </div>

            <div class="form-check row cols-3">

                <label class="form-radio-label col">
                    <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                    <span class="form-radio-sign">Pay by online payment (direct bank transfer)</span>
                </label>

                <label class="form-radio-label ml-3 col">
                    <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                    <span class="form-radio-sign">Pay by e-wallet</span>
                </label>

                <label class="form-radio-label ml-3 col">
                    <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                    <span class="form-radio-sign">Pay by invoice</span>
                </label>
              </div>
            <p>By continuing you agree to use this purchase in accordance with our advertising <a href="#">terms of use.</a></p>
        </div>
          <div class="mb-5">
            <a class="btn btn-danger" type="button" id="alert_demo_3_3">post my Ad</a>
            <a href="/GST_Project/recruiter/create_jobadPreview.php" class="btn btn-outline-danger">Preview</a>
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