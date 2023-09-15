<?php

ob_start();
session_start();
if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include 'classes.php';
$controller = new Controller();
$view = new View();

$track = $controller->userInput($_POST['track']);
if ($track == 'track1') {
    $cat = $controller->userInput($_POST['cat']);
    if(!empty($cat)) {
        $insertCat = $controller->createCatContr($cat);
        $_SESSION['msgCat'] = "Category Inserted Successfully";
        $_SESSION['msgClassCat'] = "alert-success";
        $_SESSION['msgnewCat'] = "Add another Category";
        header('location: ../create-cat.php');
        ob_end_flush();
    }
}

elseif ($track == 'track2') {
    $cat = $_SESSION['cat'];
    $sub = $controller->userInput($_POST['sub']);
    if(!empty($cat) && !empty($sub)) {
        $insertCat = $controller->createSubContr($cat, $sub);
        $_SESSION['msgSub'] = "Sub category Inserted Successfully";
        $_SESSION['msgClassSub'] = "alert-success";
        header('location: ../create-sub.php');
        ob_end_flush();
    }
}

?>