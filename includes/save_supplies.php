<?php
include_once "db-connect.php";

var_dump($_POST);
if (isset($_POST["name"], $_POST["amount"], $_POST["lat"], $_POST["lng"], $_POST["disasterId"], $_POST["address"])) {
	if ($stmt = $mysqli->prepare("CALL SsSupplies (?, ?, ?, ?, ?, ?)")) {
		$lat = doubleval($_POST["lat"]);
		$lng = doubleval($_POST["lng"]);
		$stmt->bind_param("ssddis", $_POST["name"], $_POST["amount"], $lat, $lng, $_POST["disasterId"], $_POST["address"]);
		$stmt->execute();
		
		echo true;
	} else {
		echo "Invalid MYSQLI statment";
	}
} else {
	echo "Missing POST variables";
}