<?php
include_once "db-connect.php";
var_dump($_POST);
if (isset($_POST["content"], $_POST["assistance_type"], $_POST["phone_number"])) {
	if ($stmt = $mysqli->prepare("CALL SsAssistance (?, ?, ?)")) {
		$stmt->bind_param("sss", $_POST["content"], $_POST["assistance_type"], $_POST["phone_number"]);
		$stmt->execute();
		
		echo true;
	} else {
		echo "Invalid MYSQLI statment";
	}
} else {
	echo "Missing POST variables";
}