<?php
require '../../database/database.php';

$arrData = array();
$identifier = $_POST["identifier"];
$id = $_POST["id"];

switch ($identifier) {
	case 'admin':
	$sql = "SELECT admin_fname, admin_lname, position, email, contact_num, username, password, account_status
			FROM tbl_adminusers WHERE id = :id";
	$result = $conn->prepare($sql);
	$result->bindParam(':id', $id);
	$result->execute();
	$data = array();

	while ($row = $result->fetch(PDO::FETCH_OBJ)) {
		$data[] = array(
			"admin_fname" => $row->admin_fname,
			"admin_lname" => $row->admin_lname,
			"position" => $row->position,
			"email" => $row->email,
			"contact_num" => $row->contact_num,
			"username" => $row->username,
			"password" => $row->password,
			"account_status" => $row->account_status
		);
	}
	$arr = array("admin", $data);
	break;

	case 'student':
	$sql = "SELECT grade_level, student_fname, student_lname, student_middlename, password FROM tbl_students WHERE id = :id";
	$result = $conn->prepare($sql);
	$result->bindParam(':id', $id);
	$result->execute();
	$data = array();

	while ($row = $result->fetch(PDO::FETCH_OBJ)) {
		$data[] = array(
			"grade_level" => $row->grade_level,
			"student_fname" => $row->student_fname,
			"student_lname" => $row->student_lname,
			"student_middlename" => $row->student_middlename,
			"password" => $row->password
		);
	}
	$arr = array("student", $data);
	break;

	case 'subject':
	$sql = "SELECT subject_codeno, nameof_subject, track_id FROM tbl_subjects WHERE id = :id";
	$result = $conn->prepare($sql);
	$result->bindParam(':id', $id);
	$result->execute();
	$data = array();

	while ($row = $result->fetch(PDO::FETCH_OBJ)) {
		$data[] = array(
			"subject_codeno" => $row->subject_codeno,
			"nameof_subject" => $row->nameof_subject,
			"track_id" => $row->track_id
		);
	}
	$arr = array("subject", $data);
	break;

	case 'grade':
	$sql = "SELECT subject_codeno, school_year, school_semester, grade_term, midterm_grade, final_term_grade, grade FROM tbl_studentgrades
			WHERE id = :id";
	$result = $conn->prepare($sql);
	$result->bindParam(':id', $id);
	$result->execute();
	$data = array();

	while ($row = $result->fetch(PDO::FETCH_OBJ)) {
		$data[] = array(
			"subject_codeno" => $row->subject_codeno,
			"school_year" => $row->school_year,
			"school_semester" => $row->school_semester,
			"grade_term" => $row->grade_term,
			"midterm_grade" => $row->midterm_grade,
			"final_term_grade" => $row->final_term_grade,
			"grade" => $row->grade
		);
	}
	$arr = array("grade", $data);
	break;

	case 'schedule':
	$sql = "SELECT subject_codeno, schedtime_from, schedtime_to, sched_place FROM tbl_schedules WHERE id = :id";
	$result = $conn->prepare($sql);
	$result->bindParam(':id', $id);
	$result->execute();
	$data = array();

	while ($row = $result->fetch(PDO::FETCH_OBJ)) {
		$data[] = array(
			"subject_codeno" => $row->subject_codeno,
			"schedtime_from" => $row->schedtime_from,
			"schedtime_to" => $row->schedtime_to,
			"sched_place" => $row->sched_place
		);
	}
	$arr = array("schedule", $data);
	break;
	
	default:
	echo "Error!";
	break;
}
$arrData["usertype"] = $arr;
echo json_encode($arrData);
$conn = null;
?>