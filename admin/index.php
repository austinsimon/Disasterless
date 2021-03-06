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
	<title>Disasterless - Admin - Prevent</title>
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

		td {
			max-height: 200px !important;
			overflow: scroll;
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
					<li class="nav-item active">
						<a class="nav-link" href="index.php">
							<i class="nc-icon nc-settings-90"></i>
							<p>Prevent</p>
						</a>
					</li>
					<li>
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
					<a class="navbar-brand" href="index.php"> Prevent </a>
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
									<h4 class="card-title">Articles</h4>
									<p class="card-category">List of Published Articles - Click to edit</p>
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
										<tbody id="articles">
										</tbody>
									</table>
									<button id="btnCreateArticle" type="button" class="btn btn-primary" data-toggle="modal" data-target="#articleModal" style="float: right;">
										Create New Article
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Create/Edit Article -->
	<div class="modal fade" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="createModalLabel">Create New Article</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<input type="hidden" id="inputArticleId">
						<div class="form-group">
							<label for="inputArticleTitle">Title</label>
							<input type="text" class="form-control" id="inputArticleTitle" placeholder="Enter Article Title">
						</div>
						<div class="form-group">
							<label for="inputArticleTag">Tag</label>
							<input type="text" class="form-control" id="inputArticleTags" placeholder="Enter Article Tag">
						</div>
						<div class="form-group">
							<label for="inputArticleContent">Content</label>
							<textarea class="form-control" id="inputArticleContent" rows="3"></textarea>
						</div>
						<div class="form-group">
							<label for="inputArticleFile">Header Image (1mb upload limit)</label>
							<input type="file" class="form-control-file" id="inputArticleImage">
						</div>
					</form>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button id="btnSaveArticle" type="button" class="btn btn-primary">Save changes</button>
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
<script src="javascript/main.js"></script>

</html>