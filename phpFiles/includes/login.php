<?php 

ob_start();
if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

session_start();
include '../classes.php';

$controller = new Controller();

if(filter_has_var(INPUT_POST, 'login')) {

    $username = $controller->userInput($_POST['username']);
    $password = $controller->userInput($_POST['password']);

    $stats = $controller->userLoginContr($username, $password);
    if ($stats) {
        $_SESSION['usernameUse'] = $username;
        $section = $stats['section'];
        $status = $stats['status'];
        $userEmail = $stats['email'];
        $firstName = $stats['firstName'];
        $lastName = $stats['lastName'];
        $rep = $stats['rep'];
        $picture = $stats['picture'];
        $fullname = $firstName.' '.$lastName;

        $_SESSION['section'] = $section;
        $_SESSION['status'] = $status;
        $_SESSION['userEmail'] = $userEmail;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['repUse'] = $rep;
        $_SESSION['prevPic'] = $picture;
        $_SESSION['login-msg'] = '';
        $_SESSION['login-msgClass'] = '';

        if($section == 'candidate' && $status == 'undone') {
            header('location:../../candidates-account.php');
            ob_end_flush();
        }
        elseif($section == 'candidate' && $status == 'done') {
            header('location:../../candidates-recommended-jobs.php');
            ob_end_flush();
        }
        elseif($section == 'employer' && $status == 'undone') {
            header('location:../../employer-accounts.php');
            ob_end_flush();
        }
        elseif($section == 'employer' && $status == 'done') {
            header('location:../../employer-created-jobs.php');
            ob_end_flush();
        }
        elseif($section == 'freelancer' && $status == 'undone') {
            header('location:../../freelance-account.php');
            ob_end_flush();
        }
        elseif($section == 'freelancer' && $status == 'done') {
            header('location:../../freelance-recommended-jobs.php');
            ob_end_flush();
        }
        elseif($section == 'freelancerEmp' && $status == 'undone') {
            header('location:../../freemp-account.php');
            ob_end_flush();
        }
        elseif($section == 'freelancerEmp' && $status == 'done') {
            header('location:../../freemp-created-jobs.php');
            ob_end_flush();
        }
        elseif($section == 'outsourcer' && $status == 'undone') {
            header('location:../../dashboard-outsourcer.php');
            ob_end_flush();
        }
        elseif($section == 'outsourcerEmp' && $status == 'undone') {
            header('location:../../dashboard-outsourcerEmp.php');
            ob_end_flush();
        } 
    } 

    else {
        $_SESSION['login-msg'] = 'Invalid Username or Password';
        $_SESSION['login-msgClass'] = 'alert-danger';        
        header('location: ../../login.php');
        ob_end_flush();
    }
}


?>