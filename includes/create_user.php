<?php
include_once "db-connect.php";

if (isset($_POST["email"], $_POST["password"], $_POST["first_name"], $_POST["last_name"])) {
	if ($stmt = $mysqli->prepare("CALL SsUser (?, ?, ?, ?)")) {
		$hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
		$stmt->bind_param("ssss", $_POST["email"], $hashedPassword, $_POST["first_name"], $_POST["last_name"]);
		$stmt->execute();
		
		if ($stmt->error) {
			echo $stmt->error;
		} else {
			echo "success";
		}
	} else {
		echo "Error 1";
	}
} else {
	echo "Error 2";
}