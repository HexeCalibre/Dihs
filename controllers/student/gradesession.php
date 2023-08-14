<?php
session_start();
if (isset($_POST["idparam"])) {
	$_SESSION["schoolyear"] = $_POST["schoolyear"];
	$_SESSION["semester"] = $_POST["semester"];
	echo "Success!";
} else {
	echo "Error!";
	exit();
}
?>