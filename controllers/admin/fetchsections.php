<?php
require '../../database/database.php';
$trackId = $_POST["trackid"];

$sql = "SELECT nameof_section FROM tbl_sections WHERE track_id = :track_id";
$result = $conn->prepare($sql);
$result->bindParam(':track_id', $trackId);
$result->execute();
$rowCount = $result->rowCount();

if ($rowCount > 0) {
	while ($row = $result->fetch(PDO::FETCH_OBJ)) {
		?>
		<option><?php echo $row->nameof_section; ?></option>
		<?php
	}
} else {
	?>
	<option>No Section Yet</option>
	<?php
}
$conn = null;
?>