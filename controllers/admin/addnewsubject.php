<?php
session_start();
require "../../database/database.php";

$subjectNo = $_POST["subjcodeno"];
$subjectName = $_POST["subjectname"];
$track = $_POST["trackid"];
$createdBy = $_SESSION["nameofadmin"];

$sql = "INSERT INTO tbl_subjects (subject_codeno, nameof_subject, track_id, created_by)
		VALUES (:subject_codeno, :nameof_subject, :track_id, :created_by)";

$query = $conn->prepare($sql);
$query->bindParam(':subject_codeno', $subjectNo);
$query->bindParam(':nameof_subject', $subjectName);
$query->bindParam(':track_id', $track);
$query->bindParam(':created_by', $createdBy);

if ($query->execute()) {
	echo "Success!";
} else {
	echo "Failed!";
}

$conn = null;
?>