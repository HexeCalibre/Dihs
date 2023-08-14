<?php
session_start();
require "../../database/database.php";
require '../../controllers/functions/queries.php';

if (isset($_POST["genid"])) {
	$studentIdNo = "DIHS-" . rand(10000, 90000);
	echo $studentIdNo;
	exit();
}

$studentIdNo = $_POST["studentidno"];
$trackId = $_POST["trackid"];
$gradeLevel = $_POST["gradelevel"];
$fetchSectionName = fetchSectionName($conn, $trackId, $gradeLevel, $_POST["gender"]); //to fetch section name
if (is_null($fetchSectionName)) {
	echo "ERROR: No section yet is created on this grade level!";
	exit();
} else {
	$sectionName = $fetchSectionName[0]->nameof_section;
}
$sex = $_POST["gender"];
$firstName = $_POST["fname"];
$lastName = $_POST["lname"];
$middleName = ($_POST["middlename"] == "") ? null : $_POST["middlename"];
$password = $_POST["pass"];
$createdBy = $_SESSION["nameofadmin"];

$sql = "INSERT INTO tbl_students (studentid_no, track_id, grade_level, nameof_section, sex, student_fname,
								  student_lname, student_middlename, password, created_by)
		VALUES (:studentid_no, :track_id, :grade_level, :nameof_section, :sex, :student_fname, :student_lname,
				:student_middlename, :password, :created_by)";

$query = $conn->prepare($sql);
$query->bindParam(':studentid_no', $studentIdNo);
$query->bindParam(':track_id', $trackId);
$query->bindParam(':grade_level', $gradeLevel);
$query->bindParam(':nameof_section', $sectionName);
$query->bindParam(':sex', $sex);
$query->bindParam(':student_fname', $firstName);
$query->bindParam(':student_lname', $lastName);
$query->bindParam(':student_middlename', $middleName);
$query->bindParam(':password', $password);
$query->bindParam(':created_by', $createdBy);

if ($query->execute()) {
	echo "Success!";
} else {
	echo "Failed!";
}

$conn = null;
?>