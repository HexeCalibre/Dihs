<?php
//in this php file, will include also the update query that updates the value of column nameof_section from tbl_students
session_start();
require "../../database/database.php";
$nameof_section = $_SESSION["sectionname-add"];

$updateVal = $_POST["updateval"];
if ($updateVal == "one") {
	$id = $_POST["id"];
	$trackId = $_SESSION["trackid-add"];

	$sql = "UPDATE tbl_students SET track_id = :track_id, nameof_section = :nameof_section WHERE id = :id";
	$query = $conn->prepare($sql);
	$query->bindParam(':track_id', $trackId);
	$query->bindParam(':nameof_section', $nameof_section);
	$query->bindParam(':id', $id);

	if ($query->execute()) {
		echo "Success!";
	} else {
		echo "Failed!";
	}
} else if ($updateVal == "all") {
	if (isset($_POST["updateval"])) {
		$trackId = $_SESSION["trackid-add"];

		$sql = "UPDATE tbl_students SET track_id = :track_id, nameof_section = :nameof_section
				WHERE track_id IS NULL AND nameof_section IS NULL";
		$query = $conn->prepare($sql);
		$query->bindParam(':track_id', $trackId);
		$query->bindParam(':nameof_section', $nameof_section);

		if ($query->execute()) {
			echo "Success!";
		} else {
			echo "Failed!";
		}
	}
}
$conn = null;
?>