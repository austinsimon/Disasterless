<?php
include_once "db-connect.php";

if (isset($_POST["radius"], $_POST["lat"], $_POST["lng"])) {
	if ($stmt = $mysqli->prepare("CALL SsOutage (?, ?, ?, 1)")) {
		$lat = doubleval($_POST["lat"]);
		$lng = doubleval($_POST["lng"]);
		$radius = doubleval($_POST["radius"]);
		
		$stmt->bind_param("ddd", $lat, $lng, $radius);
		$stmt->execute();
		
		echo true;
	} else {
		echo "Invalid MYSQLI statment";
	}
} else {
	echo "Missing POST variables";
}