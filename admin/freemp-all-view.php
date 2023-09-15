<?php
ob_start();

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}
include '../phpFiles/classes-upper.php';
include 'phpFiles/check-login-admin.php';
include '../phpFiles/includes/connect.php';

$controller = new Controller();
$view = new View();

$hide = "-------";

if(isset($_SESSION['msgFreeTerms'])) {
    $msg = $_SESSION['msgFreeTerms'];
    $msgClass = $_SESSION['msgClassFreeTerms'];
}
else {
    $msg = "";
    $msgClass = "";
}


if(!empty($_GET['username'])) {
    $username = $_GET['username'];
    $_SESSION['usernameSelect'] = $username;
}
elseif(empty($username) && !empty($_SESSION['usernameSelect'])) {
    $username = $_SESSION['usernameSelect'];
}

if(!empty($_GET['id'])) {
    $idUse = $_GET['id'];
    $_SESSION['useId'] = $idUse;
}
elseif(empty($idUse) && !empty($_SESSION['useId'])) {
    $idUse = $_SESSION['useId'];
}
else {
    header('location: login.php');
    ob_end_flush();
}

$_SESSION['company'] = $username;
$_SESSION['companyId'] = $idUse;

$userData = $controller->searchDbContr($username, 'username', 'users');
$id = $userData['id'];
$email = $userData['email'];
$firstName = $userData['firstName'];
$lastName = $userData['lastName'];
$address = $userData['address'];
$phone = $userData['phone'];
$about = $userData['about'];
$city = $userData['city'];
$country = $userData['country'];
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
$created = $userData2['created'];
$sample = $userData2['sample'];

$status = "paid";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../css/job-details3maxxx.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Available Jobs</title>
    <style>        
            a.logo img {
                width: 70%;
            }
            html {
                font-size: 52.5%;
                scroll-behavior: smooth;
            }
            .msg-width {
                padding: 20px;
                font-size: 15px;
                border-radius: 5px;
                margin-bottom: 10px;
            }
            .alert-success{
                color: #fff;
                background: rgb(11, 156, 48);
                
            }
            .alert-danger {
                color: #fff;
                background: red;
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
    


    <?php include '../phpFiles/utilities/header6.php'?>

    <main>
        <?php include '../phpFiles/utilities/aside6.php';?>
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
                            <p class="location"><span>Client:</span> <?php if($status == "paid") {echo $firstName .' '. $lastName;} else echo $hide;?> </p>
                            <p class="location"><span>Phone:</span> <?php if($status == "paid") {echo $phone;} else echo $hide;?> </p>
                            <p class="location"><span>Email:</span> <?php if($status == "paid") {echo $email;} else echo $hide;?> </p>
                            <p class="location"><span>Location:</span> <?php echo $city.' '.$address.' '.$country;?></p>
                        </div>
                    </div>
                    <div class="timeframe">
                        <p><span>Created on: </span><?php echo $created;?></p>
                    </div>
                </div>
            
                <div class="container active selected">
                        <div class="body">
                            <p class="heading"><strong>Client Requirements</strong></p>
                            <p> <?php echo $description;?> </p>
                        </div>
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
                <div class="ending">
                    <a href="phpFiles/delete.php?idfreelanceemp=<?php echo $idUse;?>" class="btn">Delete Job</a>
                </div>    
            </div>

            
            <div class="container-cover" style="border-bottom: 3px solid #ccc;">
                
            </div>

            
        </section>

    </main>
    <?php include '../phpFiles/utilities/footer2.php';?>
    <script src="../js/dashboard.js"></script>
</body>
</html>