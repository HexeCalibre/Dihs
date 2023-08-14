<?php
session_start();
require "../../database/database.php";

$trackId = $_POST["trackid"];
$gradeLevel = $_POST["gradelevel"];
$sectionName = $_POST["nameofsection"];
$createdBy = $_SESSION["nameofadmin"];

$sql = "INSERT INTO tbl_sections (track_id, grade_level, nameof_section, created_by)
		VALUES (:track_id, :grade_level, :nameof_section, :created_by)";
$query = $conn->prepare($sql);
$query->bindParam(':track_id', $trackId);
$query->bindParam(':grade_level', $gradeLevel);
$query->bindParam(':nameof_section', $sectionName);
$query->bindParam(':created_by', $createdBy);

if ($query->execute()) {
	echo "Success!";
} else {
	echo "Failed!";
}

$conn = null;
?>