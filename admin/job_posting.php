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

    <title>Job Posting</title>
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
										</div>btn
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="settings_system_logs.php">System Logs</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Change Admin Preferences</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href=" ../PHPFiles/Applicant/logout.php">Logout</a>
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

		<!-- Modal -->
		<div class="modal fade" id="modalViewJobPosting" tabindex="-1" role="dialog" aria-labelledby="modalViewJobPosting" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title">Job Posting</h3>
								<button type="button" class="close d-none d-sm-none" data-dismiss="modal" aria-label="Close" id="btnCloseJobPostView">
									<span aria-hidden="true">&times;</span>
								</button>
								<button type="button" class="close" onclick="closeJobPostView();">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<h3  id="lbMainClassification">Put Description Here <span class="text-danger font-weight-bold">*</span></h3>
								<br />
								<h3 id="lbMainClassification">Put Description Here <span class="text-danger font-weight-bold">*</span></h3>
								<br />
								<h3 id="lbMainClassification">Put Description Here <span class="text-danger font-weight-bold">*</span></h3>
							</div>
						</div>
					</div>
				</div>

        <div class="main-panel">
			<div class="content">
                <div class="card mt-5 bg-success-gradient">
                    <div class="card-body">
                        <h1 class="text-dark">JOB POSTING</h1>
                    </div>
                </div>

                <div class="row px-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="btnShowActive" onclick="changeTableActive('Active');" data-toggle="pill" href="#pills-1-nobd" role="tab" aria-controls="pills-1-nobd" aria-selected="true">Active</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="btnShowInactive" onclick="changeTableActive('Inactive');" data-toggle="pill" href="#pills-2-nobd" role="tab" aria-controls="pills-2-nobd" aria-selected="false">Inactive</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="btnShowRequest" onclick="changeTableActive('Request');" data-toggle="pill" href="#pills-3-nobd" role="tab" aria-controls="pills-3-nobd" aria-selected="false">Request</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="btnShowExpired" onclick="changeTableActive('Expired');" data-toggle="pill" href="#pills-4-nobd" role="tab" aria-controls="pills-4-nobd" aria-selected="false">Expired</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-1-nobd" role="tabpanel" aria-labelledby="pills-1-tab-nobd">
                                        <div class="table-responsive">
                                            <table id="tblActiveJobPosting" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Job Title</th>
                                                        <th>Requested by</th>
                                                        <th>Status</th>
                                                        <th>Date Posted</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="pills-2-nobd" role="tabpanel" aria-labelledby="pills-2-tab-nobd">
                                        <div class="table-responsive">
                                            <table id="tblInactiveJobPosting" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Job Title</th>
                                                        <th>Requested by</th>
                                                        <th>Status</th>
                                                        <th>Date Posted</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="pills-3-nobd" role="tabpanel" aria-labelledby="pills-3-tab-nobd">
                                        <div class="table-responsive">
                                            <table id="tblRequestJobPosting" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Job Title</th>
                                                        <th>Requested by</th>
                                                        <th>Status</th>
                                                        <th>Date Posted</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="pills-4-nobd" role="tabpanel" aria-labelledby="pills-4-tab-nobd">
                                        <div class="table-responsive">
                                            <table id="tblExpiredJobPosting" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Job Title</th>
                                                        <th>Requested by</th>
                                                        <th>Status</th>
                                                        <th>Date Posted</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer bg-danger text-white fixed-bottom">
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

    <!-- PHP -->
    <script src="../ajax/AdminJobListHandler.js"></script>

    <!-- Events -->
    <script>
		
		var activeTable = 1;

        $(document).ready(function() {

            fillJobPostList(activeTable);

            $('#tblActiveJobPosting').DataTable();
            $('#tblInactiveJobPosting').DataTable();
            $('#tblRequestJobPosting').DataTable();
            $('#tblExpiredJobPosting').DataTable();
        });


		function changeTableActive(status){
			switch(status){
				case 'Active':
					activeTable = 1;
					break;
				case 'Inactive':
					activeTable = 2;
					break;
				case 'Request':
					activeTable = 3;
					break;
				case 'Expired':
					activeTable = 4;
					break;
			}

			fillJobPostList(activeTable);

		}

    </script>
</body>
</html>