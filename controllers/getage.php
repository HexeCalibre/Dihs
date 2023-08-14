<?php
if (isset($_POST["bdate"])) {
	$birthDate = new DateTime($_POST["bdate"]);
	$dateNow = new DateTime();
	$interval = $dateNow->diff($birthDate);
	echo $interval->y;
} else {
	echo "Error!";
	exit();
}
?>