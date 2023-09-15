<?php 
ob_start();
session_start();
include 'connect.php';
$username = $_SESSION['usernameUse'];
$trackUser = $_SESSION['track-user'];
$month = $_SESSION['month'];
$date = date('Y/m/d');
$todaystime = date('Y-m-d', strtotime($date.'now'));
$time = '+'.($month * 33).'days';
$expTime = date('Y-m-d', strtotime($todaystime.$time));


if($trackUser == 'candidate') {
    $sql1 = "SELECT * FROM subscription WHERE username ='$username'";
    $query1 = mysqli_query($con,$sql1);
    if(mysqli_num_rows($query1)>0) {
        $results = mysqli_fetch_all($query1, MYSQLI_ASSOC);
        foreach ($results as $result) {
            $expiry = $result['expiry'];
        }
        if($expiry > $todaystime) {
            $expTime = date('Y-m-d', strtotime($expiry.$time));
        } 
        else {
            $expTime = date('Y-m-d', strtotime($todaystime.$time));
        }

        $sql2 = "UPDATE subscription SET expiry = '$expTime' WHERE username = '$username'";
        $query2 = mysqli_query($con,$sql2);
        if($query2) {
            header('location: ../../candidates-records.php');
            ob_end_flush();
        }

    }
    else {
        $sql = "INSERT INTO subscription (username, paid, expiry, section) VALUES ('".$username."','".$todaystime."','".$expTime."','".$trackUser."')";
        $query = mysqli_query($con,$sql);       
        if($query) {
            header('location: ../../candidates-records.php');
            ob_end_flush();
        }
    }
    
}


elseif($trackUser == 'employer') {
    $sql1 = "SELECT * FROM subscription WHERE username ='$username'";
    $query1 = mysqli_query($con,$sql1);
    if(mysqli_num_rows($query1)>0) {
        $results = mysqli_fetch_all($query1, MYSQLI_ASSOC);
        foreach ($results as $result) {
            $expiry = $result['expiry'];
        }
        if($expiry > $todaystime) {
            $expTime = date('Y-m-d', strtotime($expiry.$time));
        } 
        else {
            $expTime = date('Y-m-d', strtotime($todaystime.$time));
        }

        $sql2 = "UPDATE subscription SET expiry = '$expTime' WHERE username = '$username'";
        $query2 = mysqli_query($con,$sql2);
        if($query2) {
            header('location: ../../employer-records.php');
            ob_end_flush();
        }

    }
    else {
        $sql = "INSERT INTO subscription (username, paid, expiry, section) VALUES ('".$username."','".$todaystime."','".$expTime."','".$trackUser."')";
        $query = mysqli_query($con,$sql);       
        if($query) {
            header('location: ../../employer-records.php');
            ob_end_flush();
        }
    }
    
}


elseif($trackUser == 'freelancer') {
    $sql1 = "SELECT * FROM subscription WHERE username ='$username'";
    $query1 = mysqli_query($con,$sql1);
    if(mysqli_num_rows($query1)>0) {
        $results = mysqli_fetch_all($query1, MYSQLI_ASSOC);
        foreach ($results as $result) {
            $expiry = $result['expiry'];
        }
        if($expiry > $todaystime) {
            $expTime = date('Y-m-d', strtotime($expiry.$time));
        } 
        else {
            $expTime = date('Y-m-d', strtotime($todaystime.$time));
        }

        $sql2 = "UPDATE subscription SET expiry = '$expTime' WHERE username = '$username'";
        $query2 = mysqli_query($con,$sql2);
        if($query2) {
            header('location: ../../freelance-records.php');
            ob_end_flush();
        }

    }
    else {
        $sql = "INSERT INTO subscription (username, paid, expiry, section) VALUES ('".$username."','".$todaystime."','".$expTime."','".$trackUser."')";
        $query = mysqli_query($con,$sql);       
        if($query) {
            header('location: ../../freelance-records.php');
            ob_end_flush();
        }
    }    
}


elseif($trackUser == 'freelancerEmp') {
    $sql1 = "SELECT * FROM subscription WHERE username ='$username'";
    $query1 = mysqli_query($con,$sql1);
    if(mysqli_num_rows($query1)>0) {
        $results = mysqli_fetch_all($query1, MYSQLI_ASSOC);
        foreach ($results as $result) {
            $expiry = $result['expiry'];
        }
        if($expiry > $todaystime) {
            $expTime = date('Y-m-d', strtotime($expiry.$time));
        } 
        else {
            $expTime = date('Y-m-d', strtotime($todaystime.$time));
        }

        $sql2 = "UPDATE subscription SET expiry = '$expTime' WHERE username = '$username'";
        $query2 = mysqli_query($con,$sql2);
        if($query2) {
            header('location: ../../freemp-records.php');
            ob_end_flush();
        }

    }
    else {
        $sql = "INSERT INTO subscription (username, paid, expiry, section) VALUES ('".$username."','".$todaystime."','".$expTime."','".$trackUser."')";
        $query = mysqli_query($con,$sql);       
        if($query) {
            header('location: ../../freemp-records.php');
            ob_end_flush();
        }
    } 
}



?>