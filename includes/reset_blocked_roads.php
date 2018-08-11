<?php
include_once "db-connect.php";

if ($stmt = $mysqli->prepare("CALL SxBlockedRoadAll")) {
	$stmt->execute();
	
	return true;
} else {
	echo json_encode("Error 5");
}