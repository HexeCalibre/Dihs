<?php
session_start();
require "../../database/database.php";

$firstName = $_POST["fname"];
$lastName = $_POST["lname"];
$position = $_POST["position"];
$email = $_POST["email"];
$contactNum = $_POST["contactnum"];
$username = $_POST["username"];
$password = $_POST["pass"];
$createdBy = $_SESSION["nameofadmin"];
$accountStatus = "Active";

$sql = "INSERT INTO tbl_adminusers (admin_fname, admin_lname, position, email, contact_num, username, password,
								  created_by, account_status)
		VALUES (:admin_fname, :admin_lname, :position, :email, :contact_num, :username, :password, :created_by,
				:account_status)";

$query = $conn->prepare($sql);
$query->bindParam(':admin_fname', $firstName);
$query->bindParam(':admin_lname', $lastName);
$query->bindParam(':position', $position);
$query->bindParam(':email', $email);
$query->bindParam(':contact_num', $contactNum);
$query->bindParam(':username', $username);
$query->bindParam(':password', $password);
$query->bindParam(':created_by', $createdBy);
$query->bindParam(':account_status', $accountStatus);

if ($query->execute()) {
	echo "Success!";
} else {
	echo "Failed!";
}

$conn = null;
?>