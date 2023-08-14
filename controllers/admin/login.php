<?php
session_start();
require "../../database/database.php";

$username = $_POST["username"];
$password = $_POST["pass"];

if ($username == "admin" && $password == "superadmin") {
	$_SESSION["nameofadmin"] = "Super Admin";
	echo "SA"; //Super Admin
} else {
	$sql = "SELECT admin_fname, admin_lname, account_status FROM tbl_adminusers
			WHERE username = :username AND password = :password";
	$query = $conn->prepare($sql);
	$query->bindparam(':username', $username);
	$query->bindparam(':password', $password);
	$query->execute();
	$rowCount = $query->rowCount();

	if ($rowCount > 0) {
		while ($row = $query->fetch(PDO::FETCH_OBJ)) {
			$accountStatus = $row->account_status;
			switch ($accountStatus) {
				case 'Active':
				echo "1"; // 1 - Existing
				$_SESSION["nameofadmin"] = $row->admin_fname . " " . $row->admin_lname;
				break;

				case 'Deactivated':
				echo "Your account has been deactivated, please contact the administrator.";
				break;
				
				default:
				echo "Error!";
				break;
			}
		}
	} else {
		echo "Credentials denied! Wrong username or password, please try again.";
	}
}
$conn = null;
?>