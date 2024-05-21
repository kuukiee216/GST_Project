<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="../CSS-RECRUITER/register_account.css" rel="stylesheet">

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['../assets/css/fonts.min.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <title>Create Job Ad Page 4</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>

<body>
    <!--Navbar Header-->
    <?php include '../PHPFiles/recruiter_header.php'?>
    <!--End Navbar-->

    <div class="container-fluid">
        <div class="container flex justify-content-center mt-5" style="width: 50%;">
            <div class="progress-card">
                <div class="progress-status">
                    <a href="../recruiter/create_jobad3.php">
                        <button type="button" class="btn btn-icon btn-round btn-primary">
                            <i class="fa fa-arrow-circle-left"></i>
                        </button>
                    </a>
                    <span class="text-muted fw-bold">100%</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="0"
                        aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="50%"></div>
                </div>
            </div>
        </div>

        <h2 class="container d-flex justify-content-center"><b>Select an Ad Type</b></h2>
        <form id="basicPlan">
            <div class="row justify-content-center align-items-center mb-5">
                <div class="col-md-3 pl-md-0 pr-md-0">
                    <div class="card-pricing2 card-primary" id="basicCard">
                        <div class="pricing-header">
                            <h3 class="fw-bold">Basic</h3>
                            <span class="sub-title">Including VAT</span>
                        </div>
                        <div class="price-value">
                            <div class="value">
                                <span class="currency">$</span>
                                <span class="amount">124.<span>20</span></span>
                                <span class="month">/month</span>
                            </div>
                        </div>
                        <ul class="pricing-content">
                            <li>30 days listing</li>
                            <li>Good visibility to candidates</li>
                            <li>Get candidates fast</li>
                            <li>Credit to access our talent candidates</li>
                            <li>Include your company logo</li>
                        </ul>
                        <button class="btn btn-primary btn-border btn-lg w-75 fw-bold mb-3 btn-select" type="button" name="adType" value="2" data-value="2">Select</button>


                    </div>
                </div>
                <div class="col-md-3 pr-md-0">
                    <div class="card-pricing2 card-secondary" id="premiumCard">
                        <div class="pricing-header">
                            <h3 class="fw-bold">Premium</h3>
                            <span class="sub-title">Including VAT</span>
                        </div>
                        <div class="price-value">
                            <div class="value">
                                <span class="currency">$</span>
                                <span class="amount">180.<span>98</span></span>
                                <span class="month">/month</span>
                            </div>
                        </div>
                        <ul class="pricing-content">
                            <li>30 days listing</li>
                            <li>Good visibility to candidates</li>
                            <li>Get candidates fast</li>
                            <li>Credit to access our talent candidates</li>
                            <li>Include your company logo</li>
                        </ul>
                        <div class="row justify-content-center">
                            <button class="btn btn-link" type="button" id="seeMoreBtn">
                                See More <i class="fas fa-chevron-down"></i>
                            </button>

                        </div>
                        <div id="additionalDetails" class="collapse">
                            <ul class="additional-list pricing-content">
                                <li>Access to analytics and reporting</li>
                                <li>Add company image to promote your brand</li>
                                <li>Include 3 key selling points to attract candidates</li>
                                <li>Priority listing in search</li>
                            </ul>
                        </div>
                        <button class="btn btn-secondary btn-border btn-lg w-75 fw-bold mb-3 btn-select" type="button" name="adType" value="1" data-value="1">Select</button>

                    </div>
                </div>
            </div>
            </form>
            <br>
            <br>
            <form id="seasonalPlan">
            <h2 class="container d-flex justify-content-center"><b>Seasonal Ad Type</b></h2>
            <div class="container-fluid" style="width: 50%;">
                <div class="row">
                    <div class="col">
                        <p class="mt-3">Pay upfront and get a discount on ads</p>
                        <p class="mb-5">Choose an Ad budget and use your balance to post ad jobs</p>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center mb-1">
                    <div class="col-md-4 pl-md-0">
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
                                        <span class="name-specification">Discount apply for 6 months, even after
                                            your
                                            balance is
                                            used up</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                            <button class="btn btn-primary btn-block btn-selected" type="button" name="adType" value="1" data-value="1"><b>Select</b></button>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pl-md-0 pr-md-0">
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
                                        <span class="name-specification">Discount apply for 12 months, even after
                                            your
                                            balance
                                            is used up</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                            <button class="btn btn-light btn-block btn-selected" type="button" name="adType" value="3" data-value="3"><b>Select</b></button>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pr-md-0">
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
                                        <span class="name-specification">Discount apply for 12 months, even after
                                            your
                                            balance
                                            is used up</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                            <button class="btn btn-primary btn-block btn-selected" type="button" name="adType" value="2" data-value="2"><b>Select</b></button>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class=" card container-fluid justify-content-center">
                        <div class="card-body">
                            Ad prices may vary based on a number of factors including the supply of and demand for,
                            candidates for the role being advertised. Prices may change in response to these factors
                            changing.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="container justify-content-center form-group mt-3 mb-5">
                    <button id="continueButton" class="btn btn-danger" type="submit">Continue</button>
                    </div>
                </div>
            </div>
    </div>
            </form>
    

    </div>

    <!--bottom navbar-->
    <?php include '../PHPFiles/recruiter_footer.php'?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- <script>
    function test() {
        var variablename = $('#Div-filter').attr('class'); //variable name (id or class)

        if (variablename == 'dropdown d-flex justify-content-center gap-3') { //variablename = class
            $('#Div-filter').addClass('d-none d-sm-none');
        } else {
            $('#Div-filter').removeClass('d-none d-sm-none');
        }
    }
    </script> -->

    <!-- Option 1: Bootstrap scripts -->
    <script src="../.../assets/js/atlantis.js"></script>
    <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    <script src="../ajax/Recruiter/GetAdValue.js"></script>

<script>
    $(document).ready(function() {
        $('#continueButton').click(function(e) {
            e.preventDefault();
            console.log("click");
            AddAdType('basicPlan');
            AddSeasonalType('seasonalPlan');
        });

        
    });

</script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to handle selection logic
        function handleSelection(buttons, selectedClass) {
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove 'selected' class from all buttons
                    buttons.forEach(btn => {
                        btn.classList.remove(selectedClass);
                    });
                    // Add 'selected' class to the clicked button
                    this.classList.add(selectedClass);
                    
                    // Console log the selected value
                    console.log('Selected value:', this.getAttribute('data-value'));
                });
            });
        }

        // Handle selection for btn-select class
        const selectButtons = document.querySelectorAll('.btn-select');
        handleSelection(selectButtons, 'selected');

        // Handle selection for btn-selected class
        const selectedButtons = document.querySelectorAll('.btn-selected');
        handleSelection(selectedButtons, 'selected');

        // Handle selection for card-pricing2 class
        const cards = document.querySelectorAll('.card-pricing2');
        cards.forEach(card => {
            card.addEventListener('click', function() {
                // Remove 'selected' class from all other cards
                cards.forEach(c => c.classList.remove('selected'));

                // Add 'selected' class to this card
                this.classList.add('selected');
            });
        });

        // Handle the "See More" button functionality
        const seeMoreBtn = document.getElementById("seeMoreBtn");
        const additionalDetails = document.getElementById("additionalDetails");

        seeMoreBtn.addEventListener("click", function() {
            const isShown = additionalDetails.classList.contains("show");
            additionalDetails.classList.toggle("show");
            if (isShown) {
                this.innerHTML = 'See More <i class="fas fa-chevron-down"></i>';
            } else {
                this.innerHTML = 'See Less <i class="fas fa-chevron-up"></i>';
            }
        });
    });
</script>



    <style>
    /* Add this CSS to your existing styles */
    :root {
        --btn-primary-color: #007bff !important;
        --btn-secondary-color: #6861CE !important;
        --btn-selected-primary-color: #007bff !important;
        --btn-selected-secondary-color: #6861CE !important;
    }

    .btn-select {
        transition: background-color 0.3s !important;
    }

    .btn-selected {
    transition: background-color 0.3s, color 0.3s, border-color 0.3s !important;
}

.btn-selected:hover {
    background-color: var(--btn-selected-primary-color) !important;
    color: white !important;
    border-color: var(--btn-selected-primary-color) !important;
}

/* Selected state */
.btn-selected.selected {
    background-color: var(--btn-selected-primary-color) !important;
    color: white !important;
    border-color: var(--btn-selected-primary-color) !important;
}

/* Adjust hover and selected states for secondary buttons if needed */
.btn-selected-secondary:hover {
    background-color: var(--btn-selected-secondary-color) !important;
    color: white !important;
    border-color: var(--btn-selected-secondary-color) !important;
}

.btn-selected-secondary.selected {
    background-color: var(--btn-selected-secondary-color) !important;
    color: white !important;
    border-color: var(--btn-selected-secondary-color) !important;
}

    .btn-select:hover {
        background-color: var(--btn-primary-color) !important;
        color: white !important;
        border-color: #007bff !important;
    }

    .btn-select.selected {
        background-color: var(--btn-primary-color) !important;
        color: white !important;
        border-color: #007bff !important;
    }

    .btn-secondary:hover {
        background-color: var(--btn-secondary-color) !important;
        color: white !important;
        border-color: #6861CE !important;
    }

    .btn-secondary.selected {
        background-color: var(--btn-secondary-color) !important;
        color: white !important;
        border-color: #6861CE !important;
    }

    /* Add this CSS to your existing styles */
    .card-pricing2:hover {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1) !important;
        /* Example shadow effect */
        transform: translateY(-10px) !important;
        /* Example of lifting the card on hover */
    }

    .card-pricing2.selected {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3) !important;
        /* Example shadow effect for selected card */
        transform: translateY(0) !important;
        /* Reset transform for selected card */
    }

    .additional-list {
        list-style: none;
        padding: 0;
    }

    .additional-list li {
        display: none !important;
        /* Initially hide additional list items */
    }

    .collapse.show .additional-list li {
        display: block !important;
        /* Show additional list items when the collapse is shown */
    }

    .additional-list.pricing-content {

        padding-top: 10px;
        /* Adjust this value as necessary */
        margin-bottom: 20px;
        /* Adjust if you also want to lessen the space below the list */
    }

    #additionalDetails {
        display: none;
        /* Hide by default */
    }

    #additionalDetails.show {
        display: block;
        /* Show when class 'show' is added */
    }




    /* Add this CSS to your existing styles */
    /* .btn-select {
    transition: background-color 0.3s, color 0.3s, border-color 0.3s;
    }

    .btn-select:hover {
    background-color: #6c757d;
    color: white;
    border-color: #6c757d;
    }

    .btn-select.selected {
    background-color: #6c757d !important;
    color: white !important;
    border-color: #6c757d !important;
    } */
    </style>

</body>

</html>