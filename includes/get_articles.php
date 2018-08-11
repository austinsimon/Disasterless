<?php
include_once "db-connect.php";

if ($stmt = $mysqli->prepare("CALL SdArticle")) {
	$stmt->execute();
	$stmt->bind_result($id, $title, $content, $tags, $fileName, $timeCreated);
	
	$result = [];
	
	while ($stmt->fetch()) {
	array_push($result, ["id" => $id,
							"title" => $title,
							"content" => $content,
							"tags" => $tags,
							"fileName" => $fileName,
							"timeCreated" => $timeCreated]);
	}
	
	echo json_encode($result);
} else {
	echo json_encode("Error 5");
}