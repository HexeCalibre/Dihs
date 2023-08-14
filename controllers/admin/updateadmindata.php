<?php
require "../../database/database.php";

$firstName = $_POST["e-fname"];
$lastName = $_POST["e-lname"];
$position = $_POST["e-position"];
$email = $_POST["e-email"];
$contactNum = $_POST["e-contactnum"];
$username = $_POST["e-username"];
$password = $_POST["e-pass"];
$accountStatus = $_POST["e-accstatus"];
$id = $_POST["id"];

$sql = "UPDATE tbl_adminusers SET admin_fname = :admin_fname, admin_lname = :admin_lname, position = :position,
								  email = :email, contact_num = :contact_num, username = :username,
								  password = :password, account_status = :account_status
								  WHERE id = :id";

$query = $conn->prepare($sql);
$query->bindParam(':admin_fname', $firstName);
$query->bindParam(':admin_lname', $lastName);
$query->bindParam(':position', $position);
$query->bindParam(':email', $email);
$query->bindParam(':contact_num', $contactNum);
$query->bindParam(':username', $username);
$query->bindParam(':password', $password);
$query->bindParam(':account_status', $accountStatus);
$query->bindParam(':id', $id);

if ($query->execute()) {
	echo "Success!";
} else {
	echo "Failed!";
}

$conn = null;
?>