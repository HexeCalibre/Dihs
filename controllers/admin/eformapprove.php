<?php
session_start();
require '../../phpmailer/PHPMailerAutoload.php';
require "../../database/database.php";
require '../../controllers/functions/queries.php';

$studentIdNo = "DIHS-" . rand(10000, 90000);
$createdBy = $_SESSION["nameofadmin"];
$id = $_POST["id"];

$validate = "SELECT track, sex, request_trackshift, grade_level, studentid_no, email, last_name, first_name, middle_name
FROM tbl_enrollees WHERE id = :id";
$result = $conn->prepare($validate);
$result->bindParam(':id', $id);
$result->execute();
$row = $result->fetch(PDO::FETCH_OBJ);
$trackId = $row->track;
$sex = $row->sex;
$name = $row->last_name." ".$row->first_name." ".$row->middle_name;
$email = $row->email;
$requestTrackshift = $row->request_trackshift;
$gradeLevel = $row->grade_level;
$studIdNumber = $row->studentid_no; //student id number used for updating if the student is grade 11
$fetchSectionName = fetchSectionName($conn, $trackId, $gradeLevel, $sex); //to fetch section name
if (is_null($fetchSectionName)) {
	echo "ERROR: No section yet is created on this grade level!";
	
	exit();
} else {
	$sectionName = $fetchSectionName[0]->nameof_section;
}

if ($requestTrackshift == "Yes") {
	$trackShift = "Request Approved";
	$status = 1;
	
	$updateQuery = "UPDATE tbl_enrollees SET request_trackshift = :request_trackshift, status = :status WHERE id = :id";
	$query = $conn->prepare($updateQuery);
	$query->bindParam(':request_trackshift', $trackShift);
	$query->bindParam(':status', $status);
	$query->bindParam(':id', $id);
	if ($query->execute()) {
		$sql = "UPDATE tbl_students
		SET track_id = :track_id, grade_level = :grade_level, nameof_section = :nameof_section
		WHERE studentid_no = :studentid_no";
		$query = $conn->prepare($sql);
		$query->bindParam(':track_id', $trackId);
		$query->bindParam(':grade_level', $gradeLevel);
		$query->bindParam(':nameof_section', $sectionName);
		$query->bindParam(':studentid_no', $studIdNumber);
		$query->execute();
		
		echo "Success!";
		
	} else {
		echo "Failed!";
	}
} else if ($requestTrackshift == "No") {
	switch ($gradeLevel) {
		case 'Grade 11':
		$sql = "INSERT INTO tbl_students (tbl_students.studentid_no, tbl_students.track_id, tbl_students.email, tbl_students.grade_level,
		tbl_students.nameof_section, tbl_students.sex, tbl_students.student_fname,
		tbl_students.student_lname, tbl_students.student_middlename,
		tbl_students.created_by)
		SELECT '$studentIdNo', '$trackId', '$email', '$gradeLevel', '$sectionName', '$sex', tbl_enrollees.first_name,
		tbl_enrollees.last_name, tbl_enrollees.middle_name, '$createdBy'
		FROM tbl_enrollees
		WHERE tbl_enrollees.id = :id";
		$query = $conn->prepare($sql);
		$query->bindParam(':id', $id);
		if ($query->execute()) {
			$status = 1;

			$updateQuery = "UPDATE tbl_enrollees
			SET tbl_enrollees.status = :status
			WHERE tbl_enrollees.id = :id";
			$query = $conn->prepare($updateQuery);
			$query->bindParam(':status', $status);
			$query->bindParam(':id', $id);
			$query->execute();
			echo "Success!";
            $mail = new PHPMailer;
			$mail->isSMTP();
			
			$mail = new PHPMailer;
	$mail->isSMTP();

	$mail->Host='smtp.hostinger.ph';
	$mail->Port=587;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure='tls';

	$mail->Username='dihs@dihsportal.online';
	$mail->Password='Emailaccount21';

	$mail->setFrom('dihs@dihsportal.online', 'DIHS');
	$mail->addAddress($email);
	$mail->addReplyTo('dihs@dihsportal.online');
	$table = 'preregistered';
	$mail->isHTML(true);
	$mail->Subject='DIHS Grade 11 Online Enrollment for S.Y. 2020-2021';
			$mail->Body='<h3 class="page_caption">Hello '.$name.'!, your enrollment in Dasma Integrated  Highschool has been approved!</h3><br><div class="sc_form_field sc_form_field_button">
			</div>';
	$mail->send();
			
			
		} else {
			echo "Failed!";
		}
		break; 

		case 'Grade 12':
		$sql = "UPDATE tbl_students, tbl_sections
		SET tbl_students.track_id = :track_id, tbl_students.grade_level = :grade_level,
		tbl_students.nameof_section = :nameof_section
		WHERE tbl_students.studentid_no = :studentid_no";
		$query = $conn->prepare($sql);
		$query->bindParam(':track_id', $trackId);
		$query->bindParam(':grade_level', $gradeLevel);
		$query->bindParam(':nameof_section', $sectionName);
		$query->bindParam(':studentid_no', $studIdNumber);
		if ($query->execute()) {
			$status = 1;

			$updateQuery = "UPDATE tbl_enrollees SET status = :status WHERE id = :id";
			$query = $conn->prepare($updateQuery);
			$query->bindParam(':status', $status);
			$query->bindParam(':id', $id);
			$query->execute();
			
	
            
			echo "Success!";
			
			$mail = new PHPMailer;
	$mail->isSMTP();

	$mail->Host='smtp.hostinger.ph';
	$mail->Port=587;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure='tls';

	$mail->Username='dihs@dihsportal.online';
	$mail->Password='Emailaccount21';

	$mail->setFrom('dihs@dihsportal.online', 'DIHS');
	$mail->addAddress($email);
	$mail->addReplyTo('dihs@dihsportal.online');
	$table = 'preregistered';
	$mail->isHTML(true);
	$mail->Subject='DIHS Grade 12 Online Enrollment for S.Y. 2020-2021';
			$mail->Body='<h3 class="page_caption">Hello '.$name.'!, your enrollment in Dasma Integrated  Highschool has been approved!</h3><br><div class="sc_form_field sc_form_field_button">
			</div>';
	$mail->send();
			
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