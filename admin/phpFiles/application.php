<?php
ob_start();
include 'check-login-candidate.php';
include 'connect.php';

$company = $_GET['company'];
$candidate = $_GET['candidate'];
$companyId = $_GET['companyId'];

if(!empty($company) && !empty($candidate) && !empty($companyId)) {
    $sql = "INSERT INTO application (company, candidate, companyId) VALUES ('".$company."','".$candidate."','".$companyId."')";
    $query = mysqli_query($con,$sql);       
    if($query) {
        header('location: ../available-jobs-view.php');
        ob_end_flush();
    }
}

else {
    header('location: ../login.php');
    ob_end_flush();
}

?>