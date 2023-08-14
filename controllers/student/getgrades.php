<?php
session_start();
require '../../database/database.php';
$studentIdNo = $_SESSION["studentid_no"];

if (isset($_SESSION["schoolyear"]) && isset($_SESSION["semester"])) {
	$schoolyear = $_SESSION["schoolyear"];
	$semester = $_SESSION["semester"];  

	$sql = "SELECT DISTINCT tbl_studentgrades.id, tbl_studentgrades.subject_codeno,
	tbl_subjects.nameof_subject, tbl_studentgrades.school_year,
	tbl_studentgrades.school_semester,tbl_studentgrades.midterm_grade,tbl_studentgrades.final_term_grade, tbl_studentgrades.grade
	FROM tbl_studentgrades
	LEFT JOIN tbl_subjects ON tbl_studentgrades.subject_codeno = tbl_subjects.subject_codeno
	WHERE tbl_studentgrades.studentid_no = :studentid_no AND tbl_studentgrades.school_year = :schoolyear
	AND tbl_studentgrades.school_semester = :semester GROUP BY tbl_studentgrades.id
	ORDER BY tbl_studentgrades.id DESC";
	$result = $conn->prepare($sql);
	$result->bindParam(':studentid_no', $studentIdNo);
	$result->bindParam(':schoolyear', $schoolyear);
	$result->bindParam(':semester', $semester);
} else {
	$sql = "SELECT tbl_studentgrades.id, tbl_studentgrades.subject_codeno,
	tbl_subjects.nameof_subject, tbl_studentgrades.school_year,
	tbl_studentgrades.school_semester,tbl_studentgrades.midterm_grade,tbl_studentgrades.final_term_grade, tbl_studentgrades.grade
	FROM tbl_studentgrades
	LEFT JOIN tbl_subjects ON tbl_studentgrades.subject_codeno = tbl_subjects.subject_codeno
	WHERE tbl_studentgrades.studentid_no = :studentid_no GROUP BY tbl_studentgrades.id
	ORDER BY tbl_studentgrades.id DESC";
	$result = $conn->prepare($sql);
	$result->bindParam(':studentid_no', $studentIdNo);
}
$result->execute();
$data = array();

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
	$id = $row->id;
	$data[] = array(
		"subject_codeno" => $row->subject_codeno,
		"nameof_subject" => $row->nameof_subject,
		"school_year" => $row->school_year,
		"school_semester" => $row->school_semester,
		"midterm_grade" => $row->midterm_grade,
		"final_term_grade" => $row->final_term_grade,
		"grade" => $row->grade
	);
}
echo json_encode($data);
$conn = null;
?>