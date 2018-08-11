<?php
include_once "db-connect.php";

if ($stmt = $mysqli->prepare("CALL SdOutage")) {
	$stmt->execute();
	$stmt->bind_result($id, $lat, $lng, $radius, $disasterId);
	
	$result = [];
	
	while ($stmt->fetch()) {
	array_push($result, ["id" => $id,
							"lat" => $lat,
							"lng" => $lng,
							"radius" => $radius,
							"disasterId" => $disasterId]);
	}
	
	echo json_encode($result);
} else {
	echo json_encode("Error 5");
}