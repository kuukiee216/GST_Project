<?php
require_once '../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

$promoCodeApplied = false;
$discountAmount = 0;
$adTypePrice = 0;
$seasonalPrice = 0;
$Type = 0;
$seasonalType = 0;
$taxRate = 0;
$discount = 0;

// Define prices for different ad types
$adTypePrice = $_GET['AdType'];
$seasonalPrice = $_GET['Seasonal'];
$Type = $_GET['adTypeID'];
$seasonalType = $_GET['seasonalID'];
$jobID = $_GET['jobID'];
$employerID = $_GET['employerID'];

// Fetch the ad type price from the database
$stmt = $connection->prepare("SELECT AdType FROM tbl_adtype WHERE AdTypeID = :adTypeID");
$stmt->bindParam(':adTypeID', $Type);
$stmt->execute();
$adTypeResult = $stmt->fetch(PDO::FETCH_ASSOC);
if ($adTypeResult) {
    $adType = $adTypeResult['AdType'];
}

// Fetch the tax rate from the database
$stmt = $connection->query("SELECT VatPercent FROM tbl_vat");
$vatResult = $stmt->fetch(PDO::FETCH_ASSOC);
if ($vatResult) {
    $taxRate = $vatResult['VatPercent'] / 100;
}

// Fetch discount from tbl_subscription based on $Type and $seasonalType
$stmt = $connection->prepare("SELECT Discount FROM tbl_subscription WHERE AdTypeID = :adTypeID AND SeasonalID = :seasonalID");
$stmt->bindParam(':adTypeID', $Type);
$stmt->bindParam(':seasonalID', $seasonalType);
$stmt->execute();
$subscriptionResult = $stmt->fetch(PDO::FETCH_ASSOC);
if ($subscriptionResult) {
    $discount = $subscriptionResult['Discount'] / 100;
}

$basePrice = $adTypePrice ?? 0;
$tax = $basePrice * $taxRate;
$discountedPrice = $basePrice * $discount;

$total = $basePrice + $seasonalPrice + $tax - $discountedPrice;
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/css/atlantis.css">
    <link href="../CSS-RECRUITER/register_account.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis.min.css">

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

    <title>Pay and Post</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>

<body>
    <!--Navbar Header-->
    <?php include '../PHPFiles/recruiter_header.php'?>
    <!--End Navbar-->

    <div class="container-fluid">
        <div class="container justify-content-center mt-5" style="width: 50%;">
            <a href="../recruiter/create_jobad4.php">
                <button type="button" class="btn btn-icon btn-round btn-primary">
                    <i class="fa fa-arrow-circle-left"></i>
                </button>
            </a>

            <h2 class="mt-4"><b>Pay Post</b></h2>

            <hr>
            <h3 class="mt-5"><b>Apply Promo Code</b></h3>
            <form id="promoCodeForm">
            <div class="input-group">
                <input type="search" class="form-control" name="promoCode" id="promoCode" placeholder="Enter promo code">
                <div class="input-group-prepend">
                    <button class="btn btn-secondary btn-border" type="button" id="applyButton">Apply</button>
                </div>
            </div>
            <input type="text" class="form-control" name="promo-code-container" id="promo-code-container" readonly>
        </form>


            
            <br>
            <h3 class="mt-5"><b>Order Summary</b></h3>
            <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Items</th>
            <th scope="col">Cost</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>Ad Type</td>
        <td id="base-price">+$<?php echo number_format($basePrice, 2); ?></td>
    </tr>
    <tr>
        <td>VAT</td>
        <td id="tax">+<?php echo number_format($tax, 2); ?></td>
    </tr>
    <tr>
        <td>Seasonal</td>
        <td id="seasonal-price">+$<?php echo number_format($seasonalPrice, 2); ?></td>
    </tr>
    <tr>
        <td>Discounted (Ad Type)</td>
        <td id="discounted-price">-$<?php echo number_format($discountedPrice, 2); ?></td>
    </tr>
    <?php if ($discountAmount > 0): ?>
    <tr id="promo-discount">
        <td>Discount (Promo Code)</td>
        <td id="discount-value">-$<?php echo number_format($discountAmount, 2); ?></td>
    </tr>
    <?php endif; ?>
    <tr>
        <td><b>Total (including VAT)<b></td>
        <td id="total-price"><b>$<?php echo number_format($total, 2); ?></b></td>
    </tr>

   
    </tbody>

</table>



<form action="create_checkout_session.php" method="POST">
    <input type="hidden" name="totalAmount" id="totalAmount" value="<?php echo $total; ?>">
    <input type="hidden" name="jobID" id="jobID" value="<?php echo $jobID; ?>">
    <input type="hidden" name="employerID" id="employerID" value="<?php echo $employerID; ?>">
    <input type="hidden" name="adType" id="adType" value="<?php echo $adType; ?>">
    <div class="mb-5">
        <button class="btn btn-danger" type="submit" id="alert_demo_3_3">Proceed to Payment</button>
        <a href="../recruiter/create_jobadPreview.php?jobID=<?php echo $jobID; ?>&employerID=<?php echo $employerID; ?>&AdType=<?php echo $adTypePrice; ?>&Seasonal=<?php echo $seasonalPrice; ?>&adTypeID=<?php echo $Type; ?>&seasonalID=<?php echo $seasonalType; ?>" class="btn btn-outline-danger">Preview</a>

    </div>
</form>

        </div>
    </div>
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
    <script>
    function test() {
        var variablename = $('#Div-filter').attr('class'); //variable name (id or class)

        if (variablename == 'dropdown d-flex justify-content-center gap-3') { //variablename = class
            $('#Div-filter').addClass('d-none d-sm-none');
        } else {
            $('#Div-filter').removeClass('d-none d-sm-none');
        }
    }
    </script>


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




<script>
  $(document).ready(function() {
    $('#applyButton').click(function(event) {
        event.preventDefault(); // Prevent default form submission behavior
        var searchQuery = $('#promoCode').val();
        if (searchQuery) {
            SearchPromo(searchQuery);
        }
    });
});

function SearchPromo(searchQuery) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/SearchPromo.php",
        data: { searchQuery: searchQuery },
        success: function(data) {
            if (data.error) {
                console.log(data.error);
                $('#promo-code-container').val(data.error); // Display error message
                return;
            }
            var discount = data[0]?.Discount || 0; // Ensure discount is 0 if not found
            if (discount > 0) {
                var promo = data[0];
                $('#promo-code-container').val(`${promo.PromoCode} has a discounted price of ${promo.Discount}`);
                applyDiscount(discount);
            } else {
                $('#promo-code-container').val("No valid promo code found.");
                removeDiscount();
            }
        },
        error: function(xhr, status, error) {
            console.log("Error fetching data: " + error);
        }
    });
}

function applyDiscount(discountAmount) {
    discountAmount = parseFloat(discountAmount) || 0; // Ensure discountAmount is a number

    // Find the row for the promo discount, if it exists
    var discountRow = $("tr#promo-discount");
    if (discountRow.length === 0) {
        // If the row doesn't exist, create it
        discountRow = $('<tr id="promo-discount"><td>Discount (Promo Code)</td><td id="discount-value"></td></tr>');
        $("table tbody").append(discountRow);
    }
    // Update the discount value
    $("#discount-value").text('-$' + discountAmount.toFixed(2));
    calculateTotal(discountAmount);

    // Update the total price
    var total = calculateTotal(discountAmount);
    $("td#total-price").text('$' + total.toFixed(2));
}

function removeDiscount() {
    // Remove the promo discount row if it exists
    $("tr#promo-discount").remove();
    // Recalculate the total without the promo discount
    var total = calculateTotal(0);
    $("td#total-price").text('$' + total.toFixed(2));
}

function calculateTotal(promoDiscount) {
    var basePrice = parseFloat($("td#base-price").text().replace('$', '')) || 0;
    var tax = parseFloat($("td#tax").text().replace('+$', '')) || 0;
    var seasonalPrice = parseFloat($("td#seasonal-price").text().replace('+$', '')) || 0;
    var adTypeDiscount = parseFloat($("td#discounted-price").text().replace('-$', '')) || 0;

    var total = basePrice + seasonalPrice + tax - adTypeDiscount - promoDiscount;
    return total;
}

    </script>
</body>

</html>