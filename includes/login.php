<?php
include_once "db-connect.php";

if (isset($_POST["email"], $_POST["password"])) {
	if ($stmt = $mysqli->prepare("CALL SlUser (?)")) {
		//$hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
		$stmt->bind_param("s", $_POST["email"]);
		$stmt->execute();
		
		if ($stmt->error) {
			echo $stmt->error;
		} else {
			$stmt->bind_result($id, $email, $first, $last, $password, $createTime);
			$stmt->fetch();
			
			if (password_verify($_POST["password"], $password)) {
				$_SESSION["user"] = [
					"id" => $id,
					"email" => $email,
					"firstName" => $first,
					"lastName" => $last,
					"createTime" => $createTime
				];
				
				echo "success";
				//header('Location: ../index.html');
			} else {
				echo "Invalid Password";
			}
		}
		
	} else {
		echo "Error 1";
	}
} else {
	echo "Error 2";
}