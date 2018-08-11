<?php
include_once "db-connect.php";

if ($stmt = $mysqli->prepare("CALL SdSupplies (?)")) {
	$dId = 1;
	$stmt->bind_param("i", $dId);
	$stmt->execute();
	$stmt->bind_result($id, $supplyName, $supplyAmount, $lat, $lng, $disasterId, $address);
	
	$result = [];
	
	while ($stmt->fetch()) {
	array_push($result, ["id" => $id,
							"name" => $supplyName,
							"amount" => $supplyAmount,
						 	"position" => [
								"lat" => $lat,
								"lng" => $lng
							],
							"disasterId" => $disasterId,
							"address" => $address]);
	}
	
	echo json_encode($result);
} else {
	echo json_encode("Error 5");
}