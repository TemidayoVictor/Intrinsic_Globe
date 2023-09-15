<?php 
session_start();
ob_start();
if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include '../classes.php';

$controller = new Controller();
$view = new View();
$username = $_SESSION['usernameUse'];

$track = $controller->userInput($_POST['track']);
if ($track == 'candidate') {
    month();
    if(!empty($month)) {
        $_SESSION['month'] = $month;
        $_SESSION['track-user'] = 'candidate';
        header('location: subscription-candidate.php');
        ob_end_flush();
    }
}

elseif ($track == 'employer') {
    month();
    if(!empty($month)) {
        $_SESSION['month'] = $month;
        $_SESSION['track-user'] = 'employer';
        header('location: subscription-employer.php');
        ob_end_flush();
    }
}

elseif ($track == 'freelancer') {
    month();
    if(!empty($month)) {
        $_SESSION['month'] = $month;
        $_SESSION['track-user'] = 'freelancer';
        header('location: subscription-freelancer.php');
        ob_end_flush();
    }
}

elseif ($track == 'freelancerEmp') {
    month();
    if(!empty($month)) {
        $_SESSION['month'] = $month;
        $_SESSION['track-user'] = 'freelancerEmp';
        header('location: subscription-freelancerEmp.php');
        ob_end_flush();
    }
}


function month() {
    global $msg, $msgClass, $month;
    if($_POST['month'] == "") {
        $msg = "Please select a monthly duration";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['month'] != "") {
        $month = $_POST['month'];
        return true;
    }   
}
?>