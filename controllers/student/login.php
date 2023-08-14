<?php
session_start();
require "../../database/database.php";

$studentIdNo = $_POST["studentidno"];
$password = $_POST["pass"];

$sql = "SELECT CONCAT(student_fname, ' ', IFNULL(student_middlename, ''), ' ', student_lname) AS `student_fullname`,
		studentid_no, nameof_section
		FROM tbl_students
		WHERE studentid_no = :studentid_no AND password = :password";
$query = $conn->prepare($sql);
$query->bindparam(':studentid_no', $studentIdNo);
$query->bindparam(':password', $password);
$query->execute();
$rowCount = $query->rowCount();

if ($rowCount > 0) {
	while ($row = $query->fetch(PDO::FETCH_OBJ)) {
		$_SESSION["studentname"] = $row->student_fullname;
		$_SESSION["studentid_no"] = $row->studentid_no;
		$_SESSION["nameofsection"] = $row->nameof_section;
		echo "1";
	}
} else {
	echo "Credentials denied! Wrong username or password, please try again.";
}
$conn = null;
?>