<?php
ob_start();
if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include 'check-login-freelance.php';
include 'connect.php';
include 'classes.php';
$controller = new Controller();
$view = new View();
$username = $_SESSION['usernameUse'];
$track = $controller->userInput($_POST['track-free']);

if($track == 'track1') {
    $company = $_SESSION['company'];
    $candidate = $_SESSION['candidate'];
    $companyId = $_SESSION['companyId'];
    $bid = $controller->userInput($_POST['bid']);
    $cover = $controller->userInput($_POST['cover']);
    $support = $_FILES['support']['name'];
    $payment = $controller->userInput($_POST['payment']);

    $_SESSION['bid'] = $bid;
    $_SESSION['cover'] = $cover;
    
    if(!empty($support)) {
        $fileTempName1 = $_FILES['support']['tmp_name'];
        $path1 = "../support/".$support;   
    }
    
    if(!empty($payment)) {

        $sql = "INSERT INTO applicationfree (company, candidate, companyId, coverLetter, bid, support, payment) VALUES ('".$company."','".$candidate."','".$companyId."','".$cover."','".$bid."','".$support."','".$payment."')";
        $query = mysqli_query($con,$sql);       
        if($query) {
            move_uploaded_file($fileTempName1,$path1);
            if($payment == 'one') {
                $_SESSION['msgFreeTerms2'] = "Application Successful";
                $_SESSION['msgClassFreeTerms2'] = "alert-success";
                header('location: ../available-jobs-free-view.php');
                ob_end_flush();
            }
            elseif($payment == 'milestones') {
                $_SESSION['msgFreeTerms'] = "Application Successful";
                $_SESSION['msgClassFreeTerms'] = "alert-success";
                $_SESSION['milestoneView'] = "";
                header('location: ../terms.php#2');
                ob_end_flush();
            }
        }
    }

    elseif(empty($payment)) {
        $_SESSION['msgFreeTerms'] = "Please select a payment mode";
        $_SESSION['msgClassFreeTerms'] = "alert-danger";
        header('location: ../terms.php#1');
        ob_end_flush();
    }
}


elseif($track == 'track2') {

    $company = $_SESSION['company'];
    $candidate = $_SESSION['candidate'];
    $companyId = $_SESSION['companyId'];
    $descriptionmile = $controller->userInput($_POST['descriptionmile']);
    $amount = $controller->userInput($_POST['amount']);
    
    $_SESSION['descriptionmile'] = $descriptionmile;
    $_SESSION['amount'] = $amount;
    
    if(!empty($descriptionmile) && !empty($amount)) {
        duration();
        if(!empty($duration)) {
            $sql = "INSERT INTO milestones (username, description, duration, companyId, amount) VALUES ('".$username."','".$descriptionmile."','".$duration."','".$companyId."','".$amount."')";
            $query = mysqli_query($con,$sql);       
            if($query) {
                $_SESSION['msgFreeMile'] = "Milestone Added Successfully";
                $_SESSION['msgClassFreeMile'] = "alert-success";
                $_SESSION['msgDisplayMile'] = "Add another Milestone";
                header('location: ../terms.php#2');
                ob_end_flush();
            }
        }
        else {
            $_SESSION['msgFreeMile'] = $msg;
            $_SESSION['msgClassFreeMile'] = $msgClass;
            header('location: ../terms.php#2');
            ob_end_flush();
        }
    }

    else {
        $_SESSION['msgFreeMile'] = "Please fill in all fields";
        $_SESSION['msgClassFreeMile'] = "alert-danger";
        header('location: ../terms.php#2');
        ob_end_flush();
    }
}

else {
    header('location: ../login.php');
    ob_end_flush();
}


function duration() {
    global $msg, $msgClass, $duration;
    if($_POST['duration'] == "") {
        $msg = "Please Choose a  duration for this milestone";
        $msgClass = "alert-danger"; 
        return false;   
    }
    elseif($_POST['duration'] != "") {
        $duration = $_POST['duration'];
        return true;
    }
}
?>