<?php
$page = "recruitment";

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include 'phpFiles/classes-upper.php';
include 'phpFiles/includes/connect.php';

$controller = new Controller();
$view = new View();

if(!empty($_GET['username'])) {
    $username = $_GET['username'];
}

if(!empty($_GET['id'])) {
    $idUse = $_GET['id'];
}
if(empty($username) || empty($idUse)) {
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

$userData2 = $controller->searchDbContr($idUse, 'id', 'recruitmentemployers');
$username = $userData2['username'];
$category = $userData2['category'];
$subCategory = $userData2['subCategory'];
$jobTitle = $userData2['jobTitle'];
$salary = $userData2['salary'];
$jobType = $userData2['jobType'];
$qualifications = $userData2['qualifications'];
$responsibilities = $userData2['responsibilities'];
$gender = $userData2['gender'];
$created = $userData2['created'];
$closing = $userData2['closing'];

if(empty($closing)) {
    $closingUse = "Unspecified";
}

else {
    $closingUse = $closing;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/recruitment-jobs4.css" rel="stylesheet" type="text/css">
    <title>Recruitment Jobs</title>
    <style>
        a {

        }

        a.logo {
            background-color: transparent;
        }

        a.logo img {
            background-color: transparent;
            width: 70%;
        }
        html {
                font-size: 55.5%;
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
    


    <?php include 'phpFiles/utilities/header.php'?>

    <main>
    <aside>
            <button id="close-btn">
                <span class="fas fa-times"></span>
            </button>

            <div class="sidebar">
                
                <a href="index.php" style="color:transparent;">
                    <span class="fas fa-sign-out-alt"></span>
                    <h4>Log out</h4>
                </a>
            </div>
                    
        </aside>
        <section class="middle">
            <div class="header">
                <h1>You have got a support system in us</h1>
            </div>

            <div class="container-cover">
                <div class="topmost">
                    <div class="job-title">
                        <h1><?php echo $jobTitle;?></h1>
                        <div class="details">
                            <p class="location"><span>Category: </span><?php echo $category;?> || <?php echo $subCategory;?></p>
                            <p class="location"><span>Location:</span> <?php echo $address .', '. $city;?></p>
                        </div>
                    </div>
                    <div class="timeframe">
                        <p><span>Created on:</span> <?php echo $created;?></p>
                        <p><span>Expires on:</span> <?php echo $closingUse;?></p>
                    </div>
                </div>
            
                <div class="container active selected">
                        <div class="body">
                            <p class="heading"><strong>Job Responsibilities</strong></p>
                            <p> <?php echo $responsibilities;?> </p>
                            <p class="heading"><strong>Job Requirements</strong></p>
                            <p> <?php echo $qualifications;?> </p>
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
                            <h5>Renumeration</h5>
                            <h4> <?php echo $salary;?> </h4>
                        </div>
                    </div>
                    
                    <div class="badge">
                        <div>
                            <h5>Job Type</h5>
                            <h4><?php echo $jobType;?></h4>
                        </div>
                    </div>

                </div>
            </div>
            
            <div class="container-cover">
                
                <div class="bottom-elements" style="margin-bottom: 40px;">
                    <a href="signup.php?section=candidate" class="btn btn2">Apply with Intrinsic</a>
                </div>

            </div>
            
            <div class="container-cover" style="border-bottom: 3px solid #ccc;">
                
            </div>            
            
        </section>

    </main>
    <?php include 'phpFiles/utilities/footer2.php';?>
    <script src="js/index3.js"></script>
</body>
</html>