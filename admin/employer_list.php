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

    <title>Employer List</title>
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
										<a class="dropdown-item" href="../PHPFiles/Applicant/logout.php">Logout</a>
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
                        <h1 class="text-dark"> EMPLOYER LIST</h1>
                    </div>
                </div>
	<div class="container-fluid flex justify-content-center">
		<a href="#" id="btnAddEmployerCompany" onclick="showAddModal();" class="btn btn-secondary"><i class="fas fa-user-plus"></i> Add <span id="btnName">Employer Account</span> </a>
		<div class="card">
				<div class="card-header">
					<ul class="nav nav-pills nav-secondary nav-pills-no-bd mb-3" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="btnShowActive" onclick="changeTableActive('Employers');" data-toggle="pill" href="#pills-1-nobd" role="tab" aria-controls="pills-1-nobd" aria-selected="true">Employers List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="btnShowInactive" onclick="changeTableActive('Companies');" data-toggle="pill" href="#pills-2-nobd" role="tab" aria-controls="pills-2-nobd" aria-selected="false">Companies List</a>
						</li>
					</ul>
				</div>
			<div class="card-body">
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-1-nobd" role="tabpanel" aria-labelledby="pills-1-tab-nobd">
						<div class="table-responsive">
							<table id="tblEmployers" class="display table table-striped table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Company Name</th>
										<th>Representative's Name</th>
										<th>Email</th>
										<th>Status</th>
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
							<table id="tblCompanies" class="display table table-striped table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Company Name</th>
										<th>Contact Number</th>
										<th>Company Location</th>
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

<!-- Modal for Adding Employer -->
<div class="modal fade" id="addEmployerModal" tabindex="-1" aria-labelledby="addEmployerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployerModalLabel">Add Employer Account</h5>
				<button type="button" class="close d-none d-sm-none" data-dismiss="modal" aria-label="Close" id="btnCloseAddEmployer">
					<span aria-hidden="true">&times;</span>
				</button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeAddEmployer();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-employer-form">
					<div class="row" id="divFormCompanyInfo">
						<div class="col-12">
							<h5>Company Details</h5>
							<div class="form-group" style="background-color: #F7F7F7">
								<label for="txtCompanyName">Company Name</label>
								<input type="text" class="form-control" id="txtCompanyName" required>
								<label for="txtCompanyEmail">Company Email</label>
								<input type="email" class="form-control" id="txtCompanyEmail" required>
								<label for="txtCompanyContact">Company Contact Number</label>
								<input type="tel" class="form-control" id="txtCompanyContact" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
								<label for="txtCompanyWebsite">Company Website Url</label>
								<input type="text" class="form-control" id="txtCompanyWebsite" required>
							</div>
							<div class="col-12">
								<div class="form-group">
										<label for="selectCountry">Country</label>
										<select class="form-control" id="selectCountry">
											<option value=""></option>
										</select>	
									</div>
							</div>

							<div class="col-12">
								<div class="form-group">
										<label for="selectState">State</label>
										<select class="form-control" id="selectState">
											<option value=""></option>
										</select>	
									</div>
							</div>

							<div class="col-12">
								<div class="form-group">
										<label for="selectCity">City</label>
										<select class="form-control" id="selectCity">
											<option value=""></option>
										</select>	
									</div>
							</div>
						</div>
					</div>
					<br />
						<br />
					
					<div class="row row-cols-3" id="divFormEmployerInfo" style="background-color: #F7F7F7">
					<h5 class="mx-auto mt-1">Company Representative Details</h5>
						<div class="col-12">
							<div class="form-group">
									<label for="selectCompany">Company Associated</label>
									<select class="form-control" id="selectCompany">
										<option value=""></option>
									</select>	
								</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="email">First Name</label>
								<input type="email" class="form-control" id="txtEmployerFname" required>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="email">Middle Name</label>
								<input type="email" class="form-control" id="txtEmployerMname" required>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="email">Last Name</label>
								<input type="email" class="form-control" id="txtEmployerLname" required>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="txtEmployerEmail" required>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="email">Contact Number</label>
								<input type="tel" class="form-control" id="txtEmployerContact" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
							</div>
						</div>
					</div>

					<br />

					<button type="button" class="btn btn-primary" id="btnSubmitAddCompany" onclick="submitAddCompany();">Add Company</button>
                    <button type="button" class="btn btn-primary" id="btnSubmitAddEmployer" onclick="submitAddEmployer();">Add Employer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Viewing Employer -->
<div class="modal fade" id="viewEmployerModal" tabindex="-1" aria-labelledby="viewEmployerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewEmployerModalLabel">View Employer Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Company Name:</strong> <span id="view-company-name"></span></p>
                <p><strong>Representative's Name:</strong> <span id="view-rep-name"></span></p>
                <p><strong>Email:</strong> <span id="view-email"></span></p>
                <p><strong>Status:</strong> <span id="view-status"></span></p>
                <p><strong>Registration Date:</strong> <span id="view-reg-date"></span></p>
            </div>
        </div>
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
	
	<script src="../ajax/Admin/AdminEmployerListHandler.js"></script>

	<!-- Add Employer Account -->
	<script>
		var currentList = 1;

		$(document).ready(function() {
			$('#tblCompanies').DataTable();
			$('#tblEmployers').DataTable();

			changeTableActive('Employers');
			fillCurrentList(currentList);

			populateCompanies();
			populateCountry();

			$('#selectCountry').on('change', function() {
                var selectedCountry = $(this).val();
                console.log('Selected country ID:', selectedCountry);
				
				$('#selectState').empty();
				populateState(selectedCountry);
            });

			$('#selectState').on('change', function() {
				console.log('test');
                var selectedProvince = $(this).val();
                console.log('Selected Province ID:', selectedProvince);
				
				$('#selectCity').empty();
				populateCity(selectedProvince);
            });
		});

		function populateCountry(){	
			$.ajax({
					type: "POST",
					dataType: "json", 
					url: "../PHPFiles/Admin/EmployerList/modalPopulateCountry.php",
					success: function(data) {
						console.log(data);
						var $selectCountry = $('#selectCountry');
						$selectCountry.empty();
						if (Array.isArray(data) && data.length > 0) {
							$.each(data, function(index, value) {
								$selectCountry.append('<option value="' + value.CountryID + '">' + value.CountryName + '</option>');
							});
							$selectCountry.val("");
						} else {
							$selectCountry.append('<option value="">No Countries available</option>');
						}
					},
					error: function() {
						alert('Error retrieving data.');
					}
				});
		}

		function populateState(country){
			$.ajax({
				type: "POST",
				dataType: "json", 
				data: {
					CountryID: country
				},
				url: "../PHPFiles/Admin/EmployerList/modalPopulateState.php",
				success: function(data) {
					console.log(data);
					var $selectProvince = $('#selectState');
					$selectProvince.empty();
					$('#selectCity').empty();
					if (Array.isArray(data) && data.length > 0) {
						$.each(data, function(index, value) {
							$selectProvince.append('<option value="' + value.ProvinceID + '">' + value.ProvinceName + '</option>');
						});
						$selectProvince.val("");
					} else {
						$selectProvince.append('<option value="">No Province available</option>');
					}
				},
				error: function() {
					alert('Error retrieving data.');
				}
			});
		}

		function populateCity(province){
			console.log('test');
			$.ajax({
				type: "POST",
				dataType: "json", 
				data: {
					ProvinceID: province
				},
				url: "../PHPFiles/Admin/EmployerList/modalPopulateCity.php",
				success: function(data) {
					console.log(data);
					var $selectCity = $('#selectCity');
					$selectCity.empty(); 
					if (Array.isArray(data) && data.length > 0) {
						$.each(data, function(index, value) {
							$selectCity.append('<option value="' + value.CityID + '">' + value.CityName + '</option>');
						});
					} else {
						$selectProvince.append('<option value="">No City available</option>');
					}
				},
				error: function() {
					alert('Error retrieving data.');
				}
			});
		}

		function populateCompanies(){
			$.ajax({
					type: "POST",
					dataType: "json", 
					url: "../PHPFiles/Admin/EmployerList/modalPopulateCompanies.php",
					success: function(data) {
						var $selectCompany = $('#selectCompany');
						$selectCompany.empty();
						if (Array.isArray(data) && data.length > 0) {
							$.each(data, function(index, value) {
								$selectCompany.append('<option value="' + value.CompanyID + '">' + value.CompanyName + '</option>');
							});
						} else {
							$selectCompany.append('<option value="">No Companies available</option>');
						}
					},
					error: function() {
						alert('Error retrieving data.');
					}
				});
		}

		function changeTableActive(currentTab){
			switch(currentTab){
				case 'Employers':
					currentList = 1;
					changeInterface('Add Employer', 'Employers');
					break;
				case 'Companies':
					currentList = 2;
					changeInterface('Add Company', 'Companies');
					break;
			}

			fillCurrentList(currentList);
		}	


	</script>
</body>
</html>