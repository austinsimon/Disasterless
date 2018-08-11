<?php
include_once "../includes/db-connect.php";
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
		<link rel="manifest" href="manifest.json">
		<link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
		<meta name="theme-color" content="#ffffff">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Disasterless - Admin - Overview</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
		<!-- CSS Files -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
	</head>

	<body>
		<div class="wrapper">
			<div class="sidebar" data-image="" data-color="blue">

				<div class="sidebar-wrapper">
					<div class="logo">
						<a href="#" class="simple-text">
                        Disasterless
                    </a>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a class="nav-link" href="index.html">
								<i class="nc-icon nc-layers-3"></i>
								<p>Overview qweqwe</p>
							</a>
						</li>
						<li>
							<a class="nav-link" href="prevent.html">
								<i class="nc-icon nc-settings-90"></i>
								<p>Prevent</p>
							</a>
						</li>
						<li>
							<a class="nav-link" href="prepare.html">
								<i class="nc-icon nc-globe-2"></i>
								<p>Prepare</p>
							</a>
						</li>
						<li>
							<a class="nav-link" href="recover.html">
								<i class="nc-icon nc-refresh-02"></i>
								<p>Recover</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<!-- Navbar -->
				<nav class="navbar navbar-expand-lg " color-on-scroll="500">
					<div class=" container-fluid  ">
						<a class="navbar-brand" href="index.html"> Overview </a>
						<button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-bar burger-lines"></span>
							<span class="navbar-toggler-bar burger-lines"></span>
							<span class="navbar-toggler-bar burger-lines"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end" id="navigation">
							<ul class="nav navbar-nav mr-auto">
							</ul>
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="#">
										<span class="no-icon">User ID</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#logout">
										<span class="no-icon">Log out</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<!-- End Navbar -->
				<div class="content">
					<div class="container-fluid">
						<button class="btn btn-large btn-primary">Create Article</button>
						<div class="row">
							<div class="col-md-12">
								<div class="card card-plain table-plain-bg">
									<div class="card-header ">
										<h4 class="card-title">Recent Articles</h4>
									</div>
									<div class="card-body table-full-width table-responsive">
										<table class="table table-hover">
											<thead>
												<th>ID</th>
												<th>Article Title</th>
												<th>Cover Photo</th>
												<th>Tag</th>
												<th>Content</th>
											</thead>
											<tbody>
												<tr>
													<td>10</td>
													<td>What to do when your town is in a projected path</td>
													<td>
														<a href="path-to-image.img">flood.img</a>
													</td>
													<td>Hurricane</td>
													<td>Lorem ipsum dolor sit...</td>
												</tr>
												<tr>
													<td>9</td>
													<td>What to do when your town is in a projected path</td>
													<td>
														<a href="path-to-image.img">flood.img</a>
													</td>
													<td>Hurricane</td>
													<td>Lorem ipsum dolor sit...</td>
												</tr>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
	<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/plugins/bootstrap-switch.js"></script>
	<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>

	</html>