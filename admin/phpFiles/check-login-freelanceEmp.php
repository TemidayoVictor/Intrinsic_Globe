<?php
ob_start();
session_start();
// To enable only users or brand owners.
if($_SESSION['section'] == 'freelancerEmp') {

}

else {
  header('location: login.php');
  ob_end_flush();
}

 ?>
