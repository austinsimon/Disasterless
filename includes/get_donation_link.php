<?php
include_once "db-connect.php";

if ($stmt = $mysqli->prepare("CALL SlDonationLink")) {
	$stmt->execute();
	$stmt->bind_result($link);
	$stmt->fetch();
	
	echo $link;
} else {
	echo json_encode("Error 5");
}