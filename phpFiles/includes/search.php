<?php 

session_start();
ob_start();


if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include '../classes.php';
include 'connect.php';

$controller = new Controller();
$view = new View();

$username = $_SESSION['usernameUse'];

$search = $controller->userInput($_POST['searchForm']);

if($search == 'candidate') {
    category();
    sub();

    if(!empty($category) && !empty($sub)) {
        $_SESSION['searchCat'] = $category;
        $_SESSION['searchSub'] = $sub;
        header('location: ../../candidates-search.php');
        ob_end_flush();
    }

    else {
        header('location: ../../candidates-available-jobs.php');
        ob_end_flush();
    }
}

elseif($search == 'employer') {
    category();
    sub();

    if(!empty($category) && !empty($sub)) {
        $_SESSION['searchCat'] = $category;
        $_SESSION['searchSub'] = $sub;
        header('location: ../../employer-search.php');
        ob_end_flush();
    }

    else {
        header('location: ../../employer-created-jobs.php');
        ob_end_flush();
    }
}

elseif($search == 'freelancer') {
    category();
    sub();

    if(!empty($category) && !empty($sub)) {
        $_SESSION['searchCat'] = $category;
        $_SESSION['searchSub'] = $sub;
        header('location: ../../freelance-search.php');
        ob_end_flush();
    }

    else {
        header('location: ../../freelance-available-jobs.php');
        ob_end_flush();
    }
}

elseif($search == 'freemp') {
    category();
    sub();

    if(!empty($category) && !empty($sub)) {
        $_SESSION['searchCat'] = $category;
        $_SESSION['searchSub'] = $sub;
        header('location: ../../freemp-search.php');
        ob_end_flush();
    }

    else {
        header('location: ../../freemp-created-jobs.php');
        ob_end_flush();
    }
}



function category() {
    global $msg, $msgClass, $category;
    if($_POST['category'] == "") {
        $msg = "Please select a category";
        $msgClass = "alert-danger"; 
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
        $msg = "Please select a sub category";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['sub'] != "") {
        $sub = $_POST['sub'];
        return true;
    }
    
}

?>