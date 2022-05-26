<?php
require_once "config.php";
$city_id = $_POST["city_id"];
$result = mysqli_query($conn,"SELECT * FROM areas where city_id = $city_id");
?>
<option value="">Select Area</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
<?php
}
?>