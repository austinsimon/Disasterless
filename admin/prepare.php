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
	<title>Disasterless - Admin - Prepare</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
	<link rel="stylesheet" href="assets/css/main.css">
	<style>
		.map {
			width: 100%;
			height: 400px;
			background-color: grey;
		}
		
		.nav-mobile-menu {
			display: none !important;
		}
		
		.timeline-Header {
			display: none !important;
		}
		
		#twitter-widget-0 {
			padding-left: 15px !important;
			padding-right: 15px !important;
		}
	</style>
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
					<li>
						<a class="nav-link" href="index.php">
							<i class="nc-icon nc-settings-90"></i>
							<p>Prevent</p>
						</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="prepare.php">
							<i class="nc-icon nc-globe-2"></i>
							<p>Prepare</p>
						</a>
					</li>
					<li>
						<a class="nav-link" href="recover.php">
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
					<a class="navbar-brand" href="#"> Prepare </a>
					<button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-bar burger-lines"></span>
						<span class="navbar-toggler-bar burger-lines"></span>
						<span class="navbar-toggler-bar burger-lines"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="navigation">
						<ul class="nav navbar-nav mr-auto">
						</ul>
						<ul class="navbar-nav ml-auto">

						</ul>
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-plain table-plain-bg">
								<div class="card-header ">
									<h4 class="card-title">Shelters Near You</h4>
									<p class="card-category">Mark Where the Shelters are in a Local Area</p>
									<div id="sheltersMap" class="map"></div>
								</div>
								<div class="card-body">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card card-plain table-plain-bg">
								<div class="card-header ">
									<h4 class="card-title">Supplies Stock</h4>
									<p class="card-category">Mark where certain supplies is still in stock</p>
								</div>
								<div class="card-body">
									<div id="suppliesMap" class="map"></div>
									<button id="resetSupplies">Reset</button>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card card-plain table-plain-bg">
								<div class="card-header ">
									<h4 class="card-title">Evacuation Route</h4>
									<p class="card-category">show the best evacuation route based on traffic</p>
								</div>
								<div class="card-body">
									<div id="routesMap" class="map"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card card-plain table-plain-bg">
								<div class="card-header ">
									<h4 class="card-title">Disaster Updates</h4>
									<p class="card-category">Twitter Feed of Updates on Disasters</p>
								</div>
								<a class="twitter-timeline" href="https://twitter.com/NWS?ref_src=twsrc%5Etfw">Tweets by NWS</a>
								<!-- <div class="card-body table-full-width table-responsive"> -->
								<!-- <table class="table table-hover">
										<thead>
											<th>Name</th>
											<th>Tweet</th>
										</thead>
										<tbody id="rss-feed">
										</tbody>
									</table> -->
								<!-- </div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
	<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/plugins/bootstrap-switch.js"></script>
	<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
	<!-- <script src="javascript/rss.js"></script> -->
	<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
	<script src="javascript/prepare.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvk_axFbqqgSxvDlBlL-tnjITbvllJ4QM&callback=initMap"></script>
</body>

</html>