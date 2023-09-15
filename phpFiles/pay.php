<?php
ob_start();
session_start();
include 'includes/connect.php';
$payingFor = $_SESSION['payingFor'];
$paidFor = $_SESSION['paidFor'];
if($payingFor == 'freelance') {
    // Freelance employers who have created jobs paying to view freelancers details.
    $paidBy = $_SESSION['usernameUse'];
    
    $sql = "INSERT INTO paymentfreelance (paidBy, paidFor) VALUES ('".$paidBy."','".$paidFor."')";
    $query = mysqli_query($con,$sql);       
    if($query) {
        header('location: ../freemp-recommended-freelancers-view.php');
        ob_end_flush();
    }
}

elseif($payingFor == 'freelanceAll') {
    // Freelance employers who have not created jobs paying to view freelancers details.
    $paidBy = $_SESSION['usernameUse'];
    
    $sql = "INSERT INTO paymentfreelance (paidBy, paidFor) VALUES ('".$paidBy."','".$paidFor."')";
    $query = mysqli_query($con,$sql);       
    if($query) {
        header('location: ../freemp-all-freelancers-view.php');
        ob_end_flush();
    }
}

elseif($payingFor == 'freelanceemp') {
    // Freelancers with GIGS paying to view freelancer Employer's details.
    $paidBy = $_SESSION['usernameUse'];

    $sql = "INSERT INTO paymentfreelanceemp (paidBy, paidFor) VALUES ('".$paidBy."','".$paidFor."')";
    $query = mysqli_query($con,$sql);       
    if($query) {
        header('location: ../freelance-recommended-jobs-view.php');
        ob_end_flush();
    }
}

elseif($payingFor == 'freelanceempAll') {
    // Freelancers without GIGS paying to view freelancer Employer's details.
    $paidBy = $_SESSION['usernameUse'];

    $sql = "INSERT INTO paymentfreelanceemp (paidBy, paidFor) VALUES ('".$paidBy."','".$paidFor."')";
    $query = mysqli_query($con,$sql);       
    if($query) {
        header('location: ../freelance-available-jobs-view.php');
        ob_end_flush();
    }
}

elseif($payingFor == 'candidate') {
    // Employers who have created jobs paying to view Candidates details.
    $paidBy = $_SESSION['usernameUse'];

    $sql = "INSERT INTO paymentcandidates (paidBy, paidFor) VALUES ('".$paidBy."','".$paidFor."')";
    $query = mysqli_query($con,$sql);       
    if($query) {
        header('location: ../employer-recommended-candidates-view.php');
        ob_end_flush();
    }
}

elseif($payingFor == 'candidateAll') {
    // Employers with no created jobs paying to view Candidates details.
    $paidBy = $_SESSION['usernameUse'];

    $sql = "INSERT INTO paymentcandidates (paidBy, paidFor) VALUES ('".$paidBy."','".$paidFor."')";
    $query = mysqli_query($con,$sql);       
    if($query) {
        header('location: ../employer-all-candidates-view.php');
        ob_end_flush();
    }
}

elseif($payingFor == 'employer') {
    // Candidates paying to view Employers details.
    $paidBy = $_SESSION['usernameUse'];

    $sql = "INSERT INTO paymentemployers (paidBy, paidFor) VALUES ('".$paidBy."','".$paidFor."')";
    $query = mysqli_query($con,$sql);       
    if($query) {
        header('location: ../candidates-recommended-jobs-view.php');
        ob_end_flush();
    }
}

elseif($payingFor == 'employerAll') {
    // Candidates paying to view Employers details.
    $paidBy = $_SESSION['usernameUse'];

    $sql = "INSERT INTO paymentemployers (paidBy, paidFor) VALUES ('".$paidBy."','".$paidFor."')";
    $query = mysqli_query($con,$sql);       
    if($query) {
        header('location: ../candidates-available-jobs-view.php');
        ob_end_flush();
    }
}

else {
    header('location: ../recommended-freelancers.php');
    ob_end_flush();
}
?>