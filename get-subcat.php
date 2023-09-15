<?php 
include 'phpFiles/includes/connect.php';
$category = $_POST["category"];
$result = mysqli_query($con, "SELECT * FROM sub WHERE category = '$category'");
?>
<!--<option value="">Sub-Category</option>-->
<?php
while ($row = mysqli_fetch_array($result)) {
    $sub = $row['sub']; 
?>
<option value="<?php echo $sub;?>"><?php echo $sub;?></option>
<?php
}
?>