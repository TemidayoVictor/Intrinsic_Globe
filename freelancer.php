<?php 
session_start();
ob_start();
$page = "freelance";
if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include 'phpFiles/classes.php';

$controller = new Controller();
$view = new View();

category();
sub();
//$keyword = $controller->userInput($_POST['keyword']);
 
if(!empty($category)) {
    $_SESSION['catSelect'] = $category;
    $_SESSION['subSelect'] = $sub;
    header('location: freelancers-all-selected.php');
    ob_end_flush();
}

else {
    header('location: freelancers-all.php');
    ob_end_flush();
}

function category() {
    global $msg, $msgClass, $category;
    if($_POST['category'] == "") {
        return false;   
    }
    elseif($_POST['category'] != "") {
        $category = $_POST['category'];
        return true;
    }
    
}

function sub() {
    global $msg, $msgClass, $sub;
    if($_POST['sub'] == "") {
        return false;   
    }
    elseif($_POST['sub'] != "") {
        $sub = $_POST['sub'];
        return true;
    } 
}

?>