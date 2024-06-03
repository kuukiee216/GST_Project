<?php
require_once '../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

$Type = $_GET['adTypeID'] ?? 0;
$seasonalType = $_GET['seasonalID'] ?? 0;
$jobID = $_GET['jobID'] ?? 0;
$employerID = $_GET['employerID'] ?? 0;
$adTypePrice = $_GET['AdType'] ?? 0;
$seasonalPrice = $_GET['Seasonal'] ?? 0;
// Fetch job details along with company name, summary, and description from the database
$stmt = $connection->prepare("
    SELECT 
        cj.JobTitle, 
        cj.LogoUrl, 
        cj.VideoURL, 
        cj.Summary, 
        cj.Description, 
        ci.CompanyName 
    FROM tbl_companyjob cj
    JOIN tbl_employerinfo ei ON cj.EmployerID = ei.EmployerID
    JOIN tbl_companyinfo ci ON ei.CompanyID = ci.CompanyID
    WHERE cj.JobID = :jobID AND cj.EmployerID = :employerID
");
$stmt->bindParam(':jobID', $jobID, PDO::PARAM_INT);
$stmt->bindParam(':employerID', $employerID, PDO::PARAM_INT);
$stmt->execute();
$jobResult = $stmt->fetch(PDO::FETCH_ASSOC);

$jobTitle = $jobResult['JobTitle'] ?? 'Job Title Not Found'; 
$logoUrl = isset($jobResult['LogoUrl']) ? str_replace('../../', '../', $jobResult['LogoUrl']) : ''; 
$videoUrl = isset($jobResult['VideoURL']) ? str_replace('../../', '../', $jobResult['VideoURL']) : '';
$companyName = $jobResult['CompanyName'] ?? 'Company Name Not Found';
$summary = $jobResult['Summary'] ?? '';
$description = $jobResult['Description'] ?? '';

// Fetch job questions from the database
$stmt = $connection->prepare("
    SELECT q.Question 
    FROM tbl_jobquestionnaire jq
    JOIN tbl_questionnaire q ON jq.QuestionnaireID = q.QuestionnaireID
    WHERE jq.JobID = :jobID
");
$stmt->bindParam(':jobID', $jobID, PDO::PARAM_INT);
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/css/atlantis.css">
    <link href="../CSS-RECRUITER/dashboard_recruiter.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Road+Rage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <title>Create Job Ad: Preview</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/jj_logo.png">
</head>

<body>
    <!-- Japan job posting icon href-->
    <?php include '../PHPFiles/recruiter_header.php'?>

    <div class="card container flex justify-content-center mt-5" style="width: 70%;">
        <div class="card-body">
            <h4> Preview</h4>
            <small>This is a preview of what a job ad will look like to candidates.</small>
            <div class="card bg-primary container-fluid d-flex justify-content-center mt-5">
                <div class="card d-flex justify-content-center m-5 p-5">
                    <div class="card-body">
                    <?php if (!empty($logoUrl)) : ?>
                        <img src="<?php echo $logoUrl; ?>" alt="Logo" height="80" width="80">
                        <?php endif; ?>
                        <h4><?php echo $jobTitle; ?></h4>
                        <p><?php echo $companyName; ?></p>
                        <p><i class="fas fa-map-marker-alt"></i> Malate, Manila</p>
                        <p><i class="fas fa-money-bill"></i> Full-Time</p>
                        <p class="text-muted">Posted Just Now</p>
                        <a href="#" class="btn btn-danger">Quick Apply</a>
                        <a href="#" class="btn btn-outline-danger">Save</a>

                        <div class="mt-4 flex justify-content">
                            <p><?php echo nl2br(htmlspecialchars($description)); ?></p>

                            <p><?php echo nl2br(htmlspecialchars($summary)); ?></p>
                        </div>

                        <h6 class="mt-5">Employer Questions</h6>
                        <p>Your application will include the following questions:</p>
                        <ul>
                            <?php foreach ($questions as $question) : ?>
                            <li><?php echo htmlspecialchars($question['Question']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                            <!-- Display video if available -->
                            <?php if (!empty($videoUrl)) : ?>
                                <video controls width="600" height="400">
                                    <source src="<?php echo $videoUrl; ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>

                                                    <?php endif; ?>
                    </div>
                </div>
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


</body>

</html>