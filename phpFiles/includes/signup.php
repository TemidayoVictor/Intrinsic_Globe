<?php
ob_start();
session_start();

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include '../classes.php';

$controller = new Controller();



if($_SESSION["signupSection"] == "candidate") {
   
  $controller = new Controller();

  $username = $controller->userInput($_POST['username']);
  $email = $controller->userInput($_POST['email']);
  $password = $controller->userInput($_POST['password']);
  $confirmPassword = $controller->userInput($_POST['confirmPassword']);

  $_SESSION['username'] = $username; 
  $_SESSION['email'] = $email;
  $_SESSION['password'] = $password;
  $_SESSION['confirmPassword'] = $confirmPassword;

  if(!empty($username) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
    username_check($username);
    email_check($email);
    password_check($password, $confirmPassword);
    if(username_check($username) && email_check($email) && password_check($password, $confirmPassword)) {
      $section = "candidate";
      $insert = $controller->createUserContr($username, $email, $password, $section);
      $_SESSION['login-msg'] = 'Account Created. Please Login';
      $_SESSION['login-msgClass'] = 'alert-success';
      $_SESSION['msg'] = '';
      $_SESSION['msgClass'] = '';
      header('location:../../login.php');
      ob_end_flush();
    }  
    
    else {
      $_SESSION['msg'] = $msg;
      $_SESSION['msgClass'] = $msgClass;
      header('location:../../signup.php?section=candidate');
      ob_end_flush();
    } 
  }     
}


if($_SESSION["signupSection"] == "employer") {
  
  $controller = new Controller();

  $username = $controller->userInput($_POST['username']);
  $email = $controller->userInput($_POST['email']);
  $password = $controller->userInput($_POST['password']);
  $confirmPassword = $controller->userInput($_POST['confirmPassword']);

  $_SESSION['username'] = $username; 
  $_SESSION['email'] = $email;
  $_SESSION['password'] = $password;
  $_SESSION['confirmPassword'] = $confirmPassword;

  if(!empty($username) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
    username_check($username);
    email_check($email);
    password_check($password, $confirmPassword);
    if(username_check($username) && email_check($email) && password_check($password, $confirmPassword)) {
      $section = "employer";
      $insert = $controller->createUserContr($username, $email, $password, $section);
      $_SESSION['login-msg'] = 'Account Created. Please Login';
      $_SESSION['login-msgClass'] = 'alert-success';
      $_SESSION['msg'] = '';
      $_SESSION['msgClass'] = '';
      header('location: ../../login.php');
      ob_end_flush(); 
    }  

    else {
      $_SESSION['msg'] = $msg;
      $_SESSION['msgClass'] = $msgClass;
      header('location: ../../signup.php?section=employer');
      ob_end_flush();
    }      
  }
}


if($_SESSION["signupSection"] == "freelancer") {
  
  $controller = new Controller();

  $username = $controller->userInput($_POST['username']);
  $email = $controller->userInput($_POST['email']);
  $password = $controller->userInput($_POST['password']);
  $confirmPassword = $controller->userInput($_POST['confirmPassword']);

  $_SESSION['username'] = $username; 
  $_SESSION['email'] = $email;
  $_SESSION['password'] = $password;
  $_SESSION['confirmPassword'] = $confirmPassword;

  if(!empty($username) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
    username_check($username);
    email_check($email);
    password_check($password, $confirmPassword);
    if(username_check($username) && email_check($email) && password_check($password, $confirmPassword)) {
      $section = "freelancer";
      $insert = $controller->createUserAllContr('users',$username, $email, $password, $section);
      $_SESSION['login-msg'] = 'Account Created. Please Login';
      $_SESSION['login-msgClass'] = 'alert-success';
      $_SESSION['msg'] = '';
      $_SESSION['msgClass'] = '';
      header('location: ../../login.php');
      ob_end_flush();  
    }  
    
    else {
      $_SESSION['msg'] = $msg;
      $_SESSION['msgClass'] = $msgClass;
      header('location: ../../signup.php?section=freelancer');
      ob_end_flush();
    }      
  }

}

if($_SESSION["signupSection"] == "freelancerEmp") {
  
  $controller = new Controller();

  $username = $controller->userInput($_POST['username']);
  $email = $controller->userInput($_POST['email']);
  $password = $controller->userInput($_POST['password']);
  $confirmPassword = $controller->userInput($_POST['confirmPassword']);

  $_SESSION['username'] = $username; 
  $_SESSION['email'] = $email;
  $_SESSION['password'] = $password;
  $_SESSION['confirmPassword'] = $confirmPassword;

  if(!empty($username) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
    username_check($username);
    email_check($email);
    password_check($password, $confirmPassword);
    if(username_check($username) && email_check($email) && password_check($password, $confirmPassword)) {
      $section = "freelancerEmp";
      $insert = $controller->createUserAllContr('users',$username, $email, $password, $section);
      $_SESSION['login-msg'] = 'Account Created. Please Login';
      $_SESSION['login-msgClass'] = 'alert-success';
      $_SESSION['msg'] = '';
      $_SESSION['msgClass'] = '';
      
      header('location: ../../login.php');
      ob_end_flush();  
    }  
    
    else {
      $_SESSION['msg'] = $msg;
      $_SESSION['msgClass'] = $msgClass;
      header('location: ../../signup.php?section=freelancerEmp');
      ob_end_flush();
    }      
  }
}


function username_check($username) {
  global $controller, $msg, $msgClass;
  $controller->searchDbContr($username, "username", "users");
  if($controller->searchDbContr($username, "username", "users")) {
    $msg ="' ". $username . " ' Already Exists. Please Choose Another Username";
    $msgClass = "alert-danger";
    return false;
  }
  else {
    return true;
  }
}
 

function email_check($email) {
  global $controller, $msg, $msgClass;
  $controller->searchDbContr($email, "email", "users");
  if($controller->searchDbContr($email, "email", "users")) {
    $msg = "Email is already in use. Please Choose Another Email";
    $msgClass = "alert-danger";
    return false;
  }
  else {
    return true;
  }
}
      
function password_check($password, $confirmPassword) {
  global $con,$password,$confirmPassword, $msg, $msgClass;
  if($password === $confirmPassword)
  {
    return true;
  }
  else {
    $msg = "Password Mismatch";
    $msgClass = "alert-danger";
    return false;
  }
}
  

?>