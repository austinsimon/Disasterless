<?php
include_once "db-connect.php";

if ($stmt = $mysqli->prepare("CALL SxOutageAll")) {
	$stmt->execute();
	
	return true;
} else {
	echo json_encode("Error 5");
}