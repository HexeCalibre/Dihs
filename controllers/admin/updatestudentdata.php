<?php
require "../../database/database.php";

$gradeLevel = $_POST["e-gradelevel"];
$firstName = $_POST["e-fname"];
$lastName = $_POST["e-lname"];
$middleName = $_POST["e-middlename"];
$password = $_POST["e-pass"];
$id = $_POST["id"];

$sql = "UPDATE tbl_students
		SET grade_level = :grade_level, student_fname = :student_fname, student_lname = :student_lname,
			student_middlename = :student_middlename, password = :password
		WHERE id = :id";

$query = $conn->prepare($sql);
$query->bindParam(':grade_level', $gradeLevel);
$query->bindParam(':student_fname', $firstName);
$query->bindParam(':student_lname', $lastName);
$query->bindParam(':student_middlename', $middleName);
$query->bindParam(':password', $password);
$query->bindParam(':id', $id);

if ($query->execute()) {
	echo "Success!";
} else {
	echo "Failed!";
}

$conn = null;
?>