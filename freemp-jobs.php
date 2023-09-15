<?php
ob_start();
$page = "freemp-available";

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}
include 'phpFiles/classes-upper.php';
include 'phpFiles/includes/connect.php';

$controller = new Controller();
$view = new View();

if(!empty($_GET['username']) && !empty($_GET['id'])) {
    $username = $_GET['username'];
    $idUse = $_GET['id'];
    $_SESSION['idCompany'] = $idUse;
}

else {
    header("location: index.php");
    ob_end_flush();
}

$query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
if(mysqli_num_rows($query)>0) {
    
}
else {
    header('location: index.php');
    ob_end_flush();
}

$query = mysqli_query($con, "SELECT * FROM freelanceemployers WHERE id = '$idUse'");
if(mysqli_num_rows($query)>0) {
    
}
else {
    header('location: index.php');
    ob_end_flush();
}

$userData = $controller->searchDbContr($username, 'username', 'users');
$id = $userData['id'];
$email = $userData['email'];
$address = $userData['address'];
$phone = $userData['phone'];
$about = $userData['about'];
$city = $userData['city'];
$company = $userData['company'];
$rep = $userData['rep'];
$website = $userData['website'];
$staff = $userData['staff'];

$userData2 = $controller->searchDbContr($idUse, 'id', 'freelanceemployers');
$username = $userData2['username'];
$category = $userData2['category'];
$subCategory = $userData2['subCategory'];
$jobTitle = $userData2['jobTitle'];
$budget = $userData2['budget'];
$description = $userData2['description'];
$description = str_replace( '\r\n', '', $description);
$sample = $userData2['sample'];

if(empty($sample)) {
    $display = "none";
}

else {
    $display = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/job-details3maxxx.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Created Jobs</title>
    <style>        
            a.logo img {
                width: 70%;
            }
            html {
                font-size: 52.5%;
            }
            .btn.btn2 {
                background-color: orangered !important;
            }
            .btn.btn2:hover {
                background-color: #011033 !important;
            }
            @media (max-width: 991px) {
                html {
                font-size: 55%;
                }

            }
            @media (max-width: 450px) {
                html {
                font-size: 50%;
                }

            }
    </style>
</head>
<body>
    


    <?php include 'phpFiles/utilities/header7.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside7.php';?>
        <section class="middle">
            <div class="header">
                <h1>Stay Focused, and the sky won't be your limit</h1>
            </div>


            <div class="container-cover">
                <div class="topmost">
                    <div class="job-title">
                        <h1><?php echo $jobTitle;?></h1>
                        <div class="details">
                            <p><?php echo $category;?> || <?php echo $subCategory;?></p>
                        </div>
                    </div>
                    <div class="timeframe">
                        <!--<p><span>Created on:</span> 08/22</p>
                        <p><span>Expires on:</span> 10/22</p>-->
                    </div>
                </div>
            
                <div class="container active selected">
                        <div class="body">
                            <p class="heading"><strong>Job Requirements</strong></p>
                            <p> <?php echo $description;?> </p>
                        </div>
                    <!--<div class="ending">
                        <p>Intrinsic Globe</p>
                        <a href="#" class="btn">VIEW</a>
                    </div>-->
                    
                </div>
            </div>
            
            <div class="fast-payment">
                <div class="badges">

                    <div class="badge">
                        <div>
                            <h5>Budget</h5>
                            <h4><?php echo $budget;?></h4>
                        </div>
                    </div>

                    <div class="badge">
                        <div>
                            <h5>Category</h5>
                            <h4><?php echo $category;?></h4>
                        </div>
                    </div>

                    <div class="badge">
                        <div>
                            <h5>Sub-category</h5>
                            <h4><?php echo $subCategory;?></h4>
                        </div>
                    </div>

                </div>
            </div>
            
            
            <div class="container-cover">
                
                <div class="bottom-elements" style="margin-bottom: 10px;">
                    <a href="signup.php?section=freelancer" class="btn">Apply With Intrinsic</a>
                </div>

            </div>
            
            <div class="container-cover" style="border-bottom: 3px solid #ccc;">
                
            </div>            
            
        </section>

    </main>
    <?php include 'phpFiles/utilities/footer2.php';?>
    <script src="js/dashboard2.js"></script>
</body>
</html>