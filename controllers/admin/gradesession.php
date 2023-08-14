<?php
session_start();
if (isset($_POST["idparam"])) {
	$_SESSION["grades-trackid"] = $_POST["trackid"];
	$_SESSION["grades-sectionname"] = $_POST["sectionname"];
	echo "Success!";
} else {
	echo "Error!";
	exit();
}
?>