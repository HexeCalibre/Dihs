<?php
session_start();
require "../../database/database.php";

if (isset($_POST["delval"])) {
	$id = $_POST["id"];
	$delVal = $_POST["delval"];
	$sectionName = $_SESSION["sectionname-view"];

	switch ($delVal) {
		case 'one':
		$sql = "UPDATE tbl_students SET track_id = NULL, nameof_section = NULL WHERE id = :id";
		$query = $conn->prepare($sql);
		$query->bindParam(':id', $id);

		if ($query->execute()) {
			echo "Success!";
		} else {
			echo "Failed!";
		}
		break;

		case 'all':
		$sql = "UPDATE tbl_students SET track_id = NULL, nameof_section = NULL WHERE nameof_section = :nameof_section";
		$query = $conn->prepare($sql);
		$query->bindParam(':nameof_section', $sectionName);

		if ($query->execute()) {
			echo "Success!";
		} else {
			echo "Failed!";
		}
		break;
		
		default:
		echo "Error!";
		break;
	}
} else {
	echo "Error!";
	exit();
}
$conn = null;
?>