<?php
include_once "db-connect.php";

if ($stmt = $mysqli->prepare("CALL SdAssistance")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id, $content, $assistanceType, $phoneNumber, $dateCreated);
	
	$result = [];
	
	while ($stmt->fetch()) {
	array_push($result, ["id" => $id,
							"content" => $content,
							"assistanceType" => $assistanceType,
							"phoneNumber" => $phoneNumber,
							"dateCreated" => $dateCreated]);
	}
	
	echo json_encode($result);
} else {
	echo json_encode("Error 5");
}