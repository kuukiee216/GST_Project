<?php
  SESSION_START();

  date_default_timezone_set('Asia/Manila');
  $currentDateTime = time();

  if(!(isset($_SESSION['AccountID']) && $_SESSION['Role'] == 1 && $currentDateTime < $_SESSION['expire'])){
      header ("Location: ../PHPFiles/Applicant/logout.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>

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

    <title>Application 2</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/jj_logo.png">
</head>
<body>
    <div class="wrapper">
        <div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header bg-danger">
				
				<a href="admin_dashboard_main.php" class="logo">
					<img src="../assets/img/JapanJobs.png" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg bg-danger">
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">1</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 1 new notification</div>
								</li>
								<li>
									<div class="scroll-wrapper notif-scroll scrollbar-outer" style="position: relative;"><div class="notif-scroll scrollbar-outer scroll-content" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 0px;">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-danger"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
										</div>
									</div><div class="scroll-element scroll-x"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div><div class="scroll-element scroll-y"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div></div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Quick Actions</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div>
								<div class="scroll-wrapper quick-actions-scroll scrollbar-outer" style="position: relative;"><div class="quick-actions-scroll scrollbar-outer scroll-content" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 0px;">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Report</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
													<span class="text">Create New Database</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Create New Post</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Create New Task</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Completed Tasks</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file"></i>
													<span class="text">Create New Invoice</span>
												</div>
											</a>
										</div>
									</div>
								</div><div class="scroll-element scroll-x"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div><div class="scroll-element scroll-y"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div></div>
							</div>
						</li>
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
												<p class="text-muted">Genesis.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="settings_system_logs.php">System Logs</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Change Admin Preferences</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Logout</a>
									</li>
								</div><div class="scroll-element scroll-x"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div><div class="scroll-element scroll-y"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div></div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</div>
        <!-- End Navbar -->

        <!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/icon.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a>
								<span>
									Genesis
									<span class="user-level">Administrator</span>
								</span>
							</a>
						</div>
					</div>
					<ul class="nav nav-danger">
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Menu</h4>
						</li>
						<li class="nav-item">
							<a href="admin_dashboard_main.php">
								<i class="fas fa-th-list"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="job_posting.php">
								<i class="fas fa-briefcase"></i>
								<p>Job Posting</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="employer_list.php">
								<i class="fas fa-building"></i>
								<p>Employer List</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="applicant_list.php">
								<i class="fas fa-user-friends"></i>
								<p>Applicant List</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="application.php">
								<i class="far fa-file"></i>
								<p>Applications</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-bars"></i>
								<p>Setting</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
									<li>
										<a href="settings_job_classification.php">
											<span class="sub-item">Job Classification Settings</span>
										</a>
									</li>
									<li>
										<a href="settings_job_title.php">
											<span class="sub-item">Job Title Settings</span>
										</a>
									</li>
									<li>
										<a href="settings_locations.php">
											<span class="sub-item">Locations Settings</span>
										</a>
									</li>
									<li>
										<a href="settings_posting_fee.php">
											<span class="sub-item">Posting Fee Settings</span>
										</a>
									</li>
									<li>
										<a href="settings_system_logs.php">
											<span class="sub-item">System Logs Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="mx-3 mt-3">
							<a href="#" class="btn btn-danger btn-block"><span class="btn-label"></span>Logout</a> 
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

        <div class="main-panel">
			<div class="content">
                <div class="card mt-5 bg-success-gradient">
                    <div class="card-body">
                        <h1 class="text-dark">Applications</h1>
                    </div>
                </div>
				
               
                    <div class="container-fluid flex justify-content-center">
                        <h1 class="mt-5">Applicantion Review</h1>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col m-2">
                                        <h4 id="app-jobTitle"><span>Software Engineer</span></h4>
                                        <div id="app-jobLocation"><i class="fas fa-map-marker-alt"></i><span> Osaka, Japan</span></div>
                                        <div id="app-job"><i class="far fa-clone"></i><span>Information and Technology Coommunication</span></div>
                                        <div id="app-companyName"><i class="fas fa-pen-nib"></i> <span>Created by Samsung Technology Corporation</span></div>
                                    </div>

                                    <div class="col m-2">
                                        <div><span>hehe</span></div>
                                        <div id="app-jobSalary"><i class="fas fa-database"></i> <span>60,000 - 80,000 Yen</span></div>
                                        <div id="app-jobTime"><i class="far fa-clock"></i> <span>Full-Time</span></div>
                                    </div>
                                </div>

                                <hr>
                                <div type="button" data-toggle="collapse" data-target="#test" aria-expanded="false" aria-controls="test">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="collapse" id="test">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. <br>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                </div>
                            </div>
                        </div>

                            <h2>Applicant's Information</h2>
                            <div class="card card-body">
                                <div class="row">
                                <div class="col">
                                    <div>Full Name</div>
                                    <div>Email Address</div>
                                    <div>Location</div>
                                    <div>Phone Number</div>
                                </div>

                                <div class="col">
                                    <div id="app-aiName"><span>Genesis</span></div>
                                    <div id="app-aiEmail"><span>genesismarvinmanale12</span></div>
                                    <div id="app-aiLocation"><span>Pagsanjan, Laguna</span></div>
                                    <div id="app-aiPhone"><span>+639084746563</span></div>
                                </div>
                                </div>
                            </div>

                            <h2>Resume</h2>
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 id = "documentName"style="text-decoration: underline;">MANALE_RESUME.pdf</h4>
                                    </div>
                                    <div class="col">
                                        <button id = "btnViewDocument"class="btn btn-secondary">View</button>
                                    </div>
                                </div>
                            </div>

                            <h2>Cover Letter</h2>
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 id="lbCoverLetter">Applicant wrote a cover letter for this application.</h4>
                                    </div>
                                    <div class="col">
                                        <button id="btnViewCoverLetter" class="btn btn-secondary">View</button>
                                    </div>
                                </div>
                            </div>

                            <h2>Employer's Questions</h2>
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4>Applicant answered 5 out of 5 questions.</h4>
                                        <hr>
                                        <div type="button" data-toggle="collapse" data-target="#test2" aria-expanded="false" aria-controls="test2">
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                        <div class="collapse" id="test2">
                                            <ul>
                                                <li>test1</li>
                                                <li>test2</li>
                                                <li>test3</li>
                                                <li>test4</li>
                                                <li>test5</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="-fluid d-flex justify-content-end mb-5">
                                <button id="btnApplicationApprove" onclick="approveApplication()" class="btn btn-success">Approved</button>
                                <button id="btnApplicationReject" onclick="rejectApplication()" class="btn btn-danger">Reject</button>
                            </div>
                    </div>
                        
                <footer class="footer bg-danger text-white">
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
		    </div>
		<!-- End Custom template -->
	    </div>
    </div>

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

	<!-- Scripts -->
	<script src="../ajax/Admin/AdminApplicationListHandler.js"></script>

	<script>

		$(document).ready(function(){
			getApplicationContents();

			$("#btnViewCoverLetter").click(function(){
				alert("btnViewCoverLetter");
			});

			$("#btnViewDocument").click(function(){
				showApplicantResume();
			});

		});

	</script>
</body>
</html>