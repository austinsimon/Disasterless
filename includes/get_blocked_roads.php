<?php
include_once "db-connect.php";

if ($stmt = $mysqli->prepare("CALL SdBlockedRoad")) {
	$stmt->execute();
	$stmt->bind_result($id, $lat, $lng);
	
	$result = [];
	
	while ($stmt->fetch()) {
	array_push($result, ["id" => $id,
							"lat" => $lat,
							"lng" => $lng]);
	}
	
	echo json_encode($result);
} else {
	echo json_encode("Error 5");
}