<?php
include_once "db-connect.php";

if (isset($_POST["lat"], $_POST["lng"])) {
	if ($stmt = $mysqli->prepare("CALL SsBlockedRoad (?, ?)")) {
		$lat = doubleval($_POST["lat"]);
		$lng = doubleval($_POST["lng"]);
		
		$stmt->bind_param("dd", $lat, $lng);
		$stmt->execute();
		
		echo true;
	} else {
		echo "Invalid MYSQLI statment";
	}
} else {
	echo "Missing POST variables";
}