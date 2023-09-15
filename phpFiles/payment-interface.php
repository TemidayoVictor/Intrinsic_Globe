<?php
ob_start();
session_start();
include 'connect.php';
if(!empty($_GET['username'])) {
    $paidFor = $_GET['username'];
    $_SESSION['paidFor'] = $paidFor;
    header('location: payment-freelance.php');
    ob_end_flush();
}

elseif(!empty($_GET['usernameAll'])) {
    $paidFor = $_GET['usernameAll'];
    $_SESSION['paidFor'] = $paidFor;
    header('location: payment-freelanceAll.php');
    ob_end_flush();
}

elseif(!empty($_GET['usernameFreeEmp'])) {
    $paidFor = $_GET['usernameFreeEmp'];
    $_SESSION['paidFor'] = $paidFor;
    header('location: payment-freelanceemp.php');
    ob_end_flush();
}

elseif(!empty($_GET['usernameFreeEmpAll'])) {
    $paidFor = $_GET['usernameFreeEmpAll'];
    $_SESSION['paidFor'] = $paidFor;
    header('location: payment-freelanceempAll.php');
    ob_end_flush();
}

elseif(!empty($_GET['usernameCandidate'])) {
    $paidFor = $_GET['usernameCandidate'];
    $_SESSION['paidFor'] = $paidFor;
    header('location: payment-candidate.php');
    ob_end_flush();
}

elseif(!empty($_GET['usernameCandidateAll'])) {
    $paidFor = $_GET['usernameCandidateAll'];
    $_SESSION['paidFor'] = $paidFor;
    header('location: payment-candidateAll.php');
    ob_end_flush();
}

elseif(!empty($_GET['usernameEmployer'])) {
    $paidFor = $_GET['usernameEmployer'];
    $_SESSION['paidFor'] = $paidFor;
    header('location: payment-employer.php');
    ob_end_flush();
}

elseif(!empty($_GET['usernameEmployerAll'])) {
    $paidFor = $_GET['usernameEmployerAll'];
    $_SESSION['paidFor'] = $paidFor;
    header('location: payment-employerAll.php');
    ob_end_flush();
}

?>