<?php 
include 'phpFiles/includes/connect.php';
$country = $_POST["country"];
$result = mysqli_query($con, "SELECT * FROM country WHERE nicename = '$country'");
?>
<!--<option value="">Sub-Category</option>-->
<?php
while ($row = mysqli_fetch_array($result)) {
    $phonecode = $row['phonecode']; 
?>
 <input type="text" name="phone" class="input" value="<?php echo "+". $phonecode;?>" required>
<?php
}
?>