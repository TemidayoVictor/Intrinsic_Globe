<?php
ob_start();
if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

session_start();
include 'classes.php';

$controller = new Controller();

if(filter_has_var(INPUT_POST, 'login')) {

    $username = $controller->userInput($_POST['username']);
    $password = $controller->userInput($_POST['password']);

    $status = $controller->userLoginContr($username, $password);
    if ($status) {
        $_SESSION['section'] = "admin";
        $_SESSION['usernameUse'] = $username;
        header('location:../recruitment-candidates.php');
        ob_end_flush();
    } 

    else {
        $_SESSION['login-msg'] = 'Invalid Username or Password';
        $_SESSION['login-msgClass'] = 'alert-danger';        
        header('location: ../index.php');
        ob_end_flush();
    }
}


/*include 'connect.php';
$username = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$query = mysqli_query($con, "SELECT * from users WHERE username='$username' and password='$password'");
if(mysqli_num_rows($query)>0)
{
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
        $section = $result['section'];
    }
    $_SESSION['usernameUse'] = $username;
        $_SESSION['section'] = $section;
        if($section == 'candidate') {
            header('location: ../dashboard-candidate.php');
        }
        elseif($section == 'employer') {
            header('location: ../dashboard-employer.php');
        }

}

else {
    $_SESSION['login-msg'] = 'Invalid Username or Password';
        $_SESSION['login-msgClass'] = 'alert-danger';        
        header('location: ../login.php');
}*/
?>