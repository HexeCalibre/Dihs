<?php
session_start();
require '../../database/database.php';

if (isset($_POST["id"])) {
	$id = $_POST["id"];

	//query to get the track acronym
	$sql = "SELECT track_acronym FROM tbl_tracks WHERE track_id = :track_id";
	$result = $conn->prepare($sql);
	$result->bindParam(':track_id', $id);
	if ($result->execute()) {
		$rowResult = $result->fetchColumn();
		$_SESSION["track_id"] = $id; //put tracking id on session named track_id
		$_SESSION["track_acronym"] = $rowResult;
		echo "1"; //Success!
	} else {
		echo "Failed!";
	}
}

if (isset($_POST["trackid"])) {
	$trackId = $_POST["trackid"];

	//query to get the track name
	$sql = "SELECT track_id FROM tbl_sections WHERE nameof_section = :nameof_section";
	$result = $conn->prepare($sql);
	$result->bindParam(':nameof_section', $trackId);
	if ($result->execute()) {
		$rowResult = $result->fetchColumn();
		$_SESSION["trackid-add"] = $rowResult; //put track id on session named track_id
		$_SESSION["sectionname-add"] = $trackId;
		echo "add"; //Success!
	} else {
		echo "Failed!";
	}
}

if (isset($_POST["viewid"])) {
	$viewId = $_POST["viewid"];
	$_SESSION["sectionname-view"] = $viewId;
	echo "view"; //Success!
}
$conn = null;
?>