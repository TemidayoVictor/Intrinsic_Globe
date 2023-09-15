<?php
ob_start();
session_start();
// To enable only users or brand owners.
if($_SESSION['section'] == 'admin') {

}

else {
  header('location: index.php');
  ob_end_flush();
}

 ?>
