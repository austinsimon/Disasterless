<?php
include_once "db-connect.php";

if (isset($_POST["link"])) {
	if ($stmt = $mysqli->prepare("CALL SsDonationLink (?)")) {
		$stmt->bind_param("s", $_POST["link"]);
		$stmt->execute();
		
		echo true;
	} else {
		echo "Invalid MYSQLI statment";
	}
} else {
	echo "Missing POST variables";
}