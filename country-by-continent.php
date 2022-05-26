<?php
require_once "config.php";
$continent_id = $_POST["continent_id"];
$result = mysqli_query($conn,"SELECT * FROM countries where continent_id = $continent_id");
?>
<option value="">Select Country</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
<?php
}
?>