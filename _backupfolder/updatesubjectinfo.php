<?php
require "../../database/database.php";

$subjectNo = $_POST["e-subjcodeno"];
$subjectName = $_POST["e-subjectname"];
$track = $_POST["e-trackid"];
$id = $_POST["id"];

$sql = "UPDATE tbl_subjects
		SET subject_codeno = :subject_codeno, nameof_subject = :nameof_subject, track_id = :track_id
		WHERE id = :id";

$query = $conn->prepare($sql);
$query->bindParam(':subject_codeno', $subjectNo);
$query->bindParam(':nameof_subject', $subjectName);
$query->bindParam(':track_id', $track);
$query->bindParam(':id', $id);

if ($query->execute()) {
	echo "Success!";
} else {
	echo "Failed!";
}

$conn = null;
?>