<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>


<body>
<div class="container mt-5">
<div class="row">
<div class="card">
<div class="card-header">
<h2 class="text-success">Country State List </h2>
</div>
<div class="card-body">
<form>
<div class="form-group">
<label for="continent">Continent</label>
<select class="form-control" id="continent-dropdown">
<option value="">Select Country</option>
<?php
require_once "config.php";
$result = mysqli_query($conn,"SELECT * FROM continent");
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['Id'];?>"><?php echo $row["name"];?></option>
<?php
}
?>
</select>
</div>


<div class="form-group">
<label for="state">Country</label>
<select class="form-control" id="country-dropdown">
</select>
</div>   




<div class="form-group">
<label for="state">State</label>
<select class="form-control" id="state-dropdown">
</select>
</div>     

                   
<div class="form-group">
<label for="city">City</label>
<select class="form-control" id="city-dropdown">
</select>
</div>


<div class="form-group">
<label for="area">Area</label>
<select class="form-control" id="area-dropdown">
</select>
</div>


</div>
</div>
</div>
</div> 
</div>


<script>
$(document).ready(function() 
{

$('#continent-dropdown').on('change', function() {
var continent_id = this.value;
//alert(continent_id);
$.ajax({
url: "country-by-continent.php",
type: "POST",
data: {
continent_id: continent_id
},
cache: false,
success: function(result){
$("#country-dropdown").html(result);
$('#state-dropdown').html('<option value="">Select Country First</option>'); 
}
});
});  



$('#country-dropdown').on('change', function() {
var country_id = this.value;
$.ajax({
url: "states-by-country.php",
type: "POST",
data: {
country_id: country_id
},
cache: false,
success: function(result){
$("#state-dropdown").html(result);
}
});
});    


$('#state-dropdown').on('change', function()
 {
var state_id = this.value;
$.ajax({
url: "cities-by-state.php",
type: "POST",
data: {
state_id: state_id
},
cache: false,
success: function(result){
$("#city-dropdown").html(result);
}
});
});




$('#city-dropdown').on('change', function()
 {
var city_id = this.value;
$.ajax({
url: "area-by-cities.php",
type: "POST",
data: {
city_id: city_id
},
cache: false,
success: function(result){
$("#area-dropdown").html(result);
}
});
});


});

</script>


</body>
</html>