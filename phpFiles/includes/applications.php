<?php
ob_start();
if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include 'check-login-candidate.php';
include 'connect.php';

include '../classes.php';

$controller = new Controller();
$view = new View();

$company = $controller->userInput($_POST['company']);
$candidate = $controller->userInput($_POST['candidate']);
$companyId = $controller->userInput($_POST['companyId']);
$coverLetter = $controller->userInput($_POST['cover']);

if(!empty($company) && !empty($candidate) && !empty($companyId)) {
    $sql = "INSERT INTO application (company, candidate, companyId, coverLetter) VALUES ('".$company."','".$candidate."','".$companyId."','".$coverLetter."')";
    $query = mysqli_query($con,$sql);       
    if($query) {
        $_SESSION['appStat'] = "Job Application Successful";
        $_SESSION['appStatClass'] = "alert-success";
        header('location: ../../candidates-available-jobs-view.php#cover');
        ob_end_flush();
    }
}

else {
    $_SESSION['appStat'] = "Please write a cover letter for Application";
    $_SESSION['appStatClass'] = "alert-danger";
    header('location: ../../candidates-available-jobs-view.php#cover');
    ob_end_flush();
}

?>