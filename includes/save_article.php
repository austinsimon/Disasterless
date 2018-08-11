<?php
include_once "db-connect.php";

var_dump($_POST);
if (isset($_POST["id"], $_POST["title"], $_POST["content"], $_POST["tags"])) {
	if (isset($_FILES["file"])) {
		$fileName = basename($_FILES["file"]["name"]);
		$directory = "../images/" . $fileName;

		if (move_uploaded_file($_FILES["file"]["tmp_name"], $directory)) {
			if ($stmt = $mysqli->prepare("CALL SsArticle (?, ?, ?, ?, ?)")) {
				$stmt->bind_param("issss", $_POST["id"], $_POST["title"], $_POST["content"], $_POST["tags"], $fileName);
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
			"Error 20000";
		}
	} else {
		if ($stmt = $mysqli->prepare("CALL SsArticle (?, ?, ?, ?, ?)")) {
			$fileName = "";
			$stmt->bind_param("issss", $_POST["id"], $_POST["title"], $_POST["content"], $_POST["tags"], $fileName);
			$stmt->execute();

			if ($stmt->error) {
				echo $stmt->error;
			} else {
				echo "success";
			}
		} else {
			echo "Error 1";
		}
	}
} else {
	echo "Error 2";
}