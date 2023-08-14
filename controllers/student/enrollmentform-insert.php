<?php
require "../../database/database.php";
require '../../controllers/functions/queries.php';
require '../../phpmailer/PHPMailerAutoload.php';


$enrollmentId = mt_rand(100000000, 999999999);
if ($_POST["shiftanswer"] == "No") {
	$trackCurrent = $_POST["trackcurrent"];

	$trackId = "SELECT track_id FROM tbl_tracks WHERE track_name = :track_name";
	$result = $conn->prepare($trackId);
	$result->bindParam(':track_name', $trackCurrent);
	$result->execute();
	$track = $result->fetchColumn();
} else if ($_POST["shiftanswer"] == "Yes") {  
	$track = $_POST["track"];
}

$studentIdNo = $_POST["studentidno"];
$sql1 = "SELECT student_fname, student_lname, student_middlename FROM tbl_students WHERE studentid_no = :studentid_no";
$result = $conn->prepare($sql1);
$result->bindParam(':studentid_no', $studentIdNo);
$result->execute();

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
	$lastName = $row->student_lname;
	$firstName = $row->student_fname;
	$middleName = $row->student_middlename;
}
$gradeLevel = $_POST["gradelevel"];
$requestTrackShift = $_POST["shiftanswer"];
//$studentIdNov2 = ($requestTrackShift == "No") ? null : $studentIdNo;
$studentIdNov2 = $studentIdNo;

//for uploading grade file
$fileName = null;
if ($_FILES["gradefile"]["name"] != '') {
	$fileName = $_FILES["gradefile"]["name"];
	$pathFile = "../../files/" . $fileName;
	move_uploaded_file($_FILES["gradefile"]["tmp_name"], $pathFile);
}

//Validation for Grade 12 Enrollment
$eFormValidate = gradeTwelveEFormValidation($conn, $studentIdNov2);
if ($eFormValidate > 0) {
	echo "Your enrollment form for this school year has been submitted already.";
	exit();
}

$trackid = $_POST["trackid"];
$studentidno = $_POST["studentidno"];
$email = $_POST["email"];

$errorMessage = "WARNING: It seems like you're still not capable of enrolling for the next Semester. Please contact the school faculty for further inquiries.";

$subcount =0;
$subcount2 =0;


$data = array();
$query = "SELECT * FROM `tbl_subjects` WHERE track_id='$trackid' AND is_active='Yes' ";


$statement = $conn->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$subcount =$statement->rowCount();

foreach($result as $row) 
{
	$data[] = array($row['subject_codeno']);
}

$data2 = array();
$query2 = "SELECT subject_codeno FROM `tbl_studentgrades` WHERE studentid_no='$studentidno' AND grade!='' AND grade>='75'";


$statement2 = $conn->prepare($query2);

$statement2->execute();

$result2 = $statement2->fetchAll();

$subcount2 =$statement2->rowCount();

foreach($result2 as $row2) 
{
	$data2[] = array($row2['subject_codeno']);
}


$diff = array_diff(array_map('serialize', $data), array_map('serialize', $data2));
$multidimensional_diff = array_map('unserialize', $diff);


if (!empty($multidimensional_diff)) {
	echo $errorMessage." "."(Your grades for all your subjects is incomplete)";
}
else {
	$sql = "INSERT INTO tbl_enrollees (enrollment_id, track, last_name, first_name, middle_name,
									   grade_level, email, request_trackshift, studentid_no, attached_file)
			VALUES (:enrollment_id, :track, :last_name, :first_name, :middle_name, :grade_level, :email, :request_trackshift,
					:studentid_no, :attached_file)";
	$query = $conn->prepare($sql);
	$query->bindParam(':enrollment_id', $enrollmentId);
	$query->bindParam(':track', $track);
	$query->bindParam(':last_name', $lastName);
	$query->bindParam(':first_name', $firstName);
	$query->bindParam(':middle_name', $middleName);
	$query->bindParam(':grade_level', $gradeLevel);
	$query->bindParam(':email', $email);
	$query->bindParam(':request_trackshift', $requestTrackShift);
	$query->bindParam(':studentid_no', $studentIdNov2);
	$query->bindParam(':attached_file', $fileName);

	if ($query->execute()) {
		echo "Success!";
	} else {
		echo "Failed!";
	}
}
$conn = null;
?>