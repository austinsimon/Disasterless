<?php 
include_once "../includes/db-connect.php";
$articleId = $_GET["id"];
$articleTitle = "";
$articleContent = "";
$articleFileName = "";
$articleTimeCreated = "";
$articleTag = "";
$stmt = null;

if ($stmt = $mysqli->prepare("CALL SlArticle(?)")) {
	$stmt->bind_param("i", $articleId);
	$stmt->execute();
	$stmt->bind_result($id, $title, $content, $tag, $fileName, $time);
	$stmt->fetch();
	
	$articleTitle = $title;
	$articleContent = $content;
	$articleTag = $tag;
	$articleFileName = $fileName;
	$articleTimeCreate = $time;
}
?>

	<!DOCTYPE html>
	<!--  This site was created in Webflow. http://www.webflow.com  -->
	<!--  Last Published: Fri Feb 16 2018 20:29:12 GMT+0000 (UTC)  -->
	<html data-wf-page="5a79e1fbb9b0da0001c4ef12" data-wf-site="5a707a25acaa6c0001310679">

	<head>
		<meta charset="utf-8">
		<title>Tip</title>
		<meta content="Tip" property="og:title">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<meta content="Webflow" name="generator">
		<link href="../css/normalize.css" rel="stylesheet" type="text/css">
		<link href="../css/webflow.css" rel="stylesheet" type="text/css">
		<link href="../css/disasterless.webflow.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
		<script type="text/javascript">
			WebFont.load({
				google: {
					families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]
				}
			});
		</script>
		<!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
		<script type="text/javascript">
			! function (o, c) {
				var n = c.documentElement
					, t = " w-mod-";
				n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
			}(window, document);
		</script>
		<link href="../images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
		<link href="../images/disasterless_icon-01.png" rel="apple-touch-icon">
		<style>
			.tip-header {
				background-size: cover;
				background-position: center;
				background-repeat: no-repeat;
			}
			
			.tip-content {
				margin-bottom: 70px;
			}
		</style>
	</head>

	<body>
		<div class="desktop-container w-hidden-medium w-hidden-small w-hidden-tiny w-container">
			<div class="desktop-block">
				<h1 class="desktop-heading-text">Come Back on Your Phone or Tablet!</h1>
				<p class="desktop-desc-text">Disasterless is currently only designed for mobile device use. Resize your browser or visit us on a mobile device.</p>
			</div>
		</div>
		<div class="display-on-tablet w-hidden-main">
			<div class="titlebar prevent-tip w-hidden-main">
				<a href="../prevent/home.html" class="back-arrow w-inline-block"><img src="../images/Back.png" width="25" class="image-5"></a>
				<div class="text-block-4">Prevent</div>
			</div>
			<div class="tip-header" style="background-image: url(../images/<?php echo $articleFileName; ?>);">
				<div class="header-container">
					<div class="tag">
						<?php echo $articleTag; ?>
					</div>
					<div class="title">
						<?php echo $articleTitle; ?>
					</div>
				</div>
			</div>
			<div class="content-block">
				<div class="tip-container">
					<p class="tip-content">
						<?php echo nl2br($articleContent); ?>
					</p>
				</div>
			</div>
			<div class="navigation w-hidden-main">
				<a href="../prevent/home.html" class="prevent-link w-inline-block"><img src="../images/Eye.png" height="55" class="prevent-icon nav-icon"></a>
				<a href="../prepare/home.html" class="prepare-link w-inline-block"><img src="../images/World-grey.png" height="55" class="prepare-icon nav-icon"></a>
				<a href="../recover/home.html" class="recover-link w-inline-block"><img src="../images/Invert-grey.png" height="55" class="recover-icon nav-icon"></a>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
		<script src="../js/webflow.js" type="text/javascript"></script>
		<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
		<style>
			.w-slider-nav {
				font-size: 10px;
			}
			
			.w-slider-dot {
				background-color: #DDDDE6;
				background: #DDDDE6;
				width: 10px;
				height: 10px;
				font-size: 10px;
			}
			
			.w-slider-dot.w-active {
				background-color: #0F8DE8;
				width: 10px;
				height: 10px;
				font-size: 10px;
			}
		</style>
	</body>

	</html>