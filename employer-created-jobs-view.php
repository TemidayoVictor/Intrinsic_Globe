<?php
ob_start();
$page = "employer-available";

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}
include 'phpFiles/classes-upper.php';
include 'phpFiles/includes/check-login-employer.php';
include 'phpFiles/includes/connect.php';

$controller = new Controller();
$view = new View();

if(!empty($_GET['username']) && !empty($_GET['id'])) {
    $username = $_GET['username'];
    $idUse = $_GET['id'];
    $_SESSION['idCompany'] = $idUse;
}

else {
    header("location: login.php");
    ob_end_flush();
}

$query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
if(mysqli_num_rows($query)>0) {
    
}
else {
    header('location: index.php');
    ob_end_flush();
}

$query = mysqli_query($con, "SELECT * FROM recruitmentemployers WHERE id = '$idUse'");
if(mysqli_num_rows($query)>0) {
    
}
else {
    header('location: index.php');
    ob_end_flush();
}

$userData = $controller->searchDbContr($username, 'username', 'users');
$id = $userData['id'];
$email = $userData['email'];
$phone = $userData['phone'];
$about = $userData['about'];
$address = $userData['address'];
$city = $userData['city'];
$country = $userData['country'];
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
$location = $userData2['location'];
$qualifications = str_replace( '\r\n', '', $qualifications);
$responsibilities = str_replace( '\r\n', '', $responsibilities);

if(empty($closing)) {
    $closingDis = "Unspecified";
}
elseif(!empty($closing)) {
    $closingDis = $closing;
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
    


    <?php include 'phpFiles/utilities/header3.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside3.php';?>
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
                            <p class="location"><span>Location: </span><?php echo $location;?></p>
                        </div>
                    </div>
                    <div class="timeframe">
                        <p><span>Created:</span> <?php echo $created;?></p>
                        <p><span>Expiry:</span> <?php echo $closingDis;?></p>
                    </div>
                </div>
            
                <div class="container active selected">
                    <div class="body">
                        <p class="heading">Job Responsibilities</p>
                        <p> <?php echo $responsibilities;?> </p>
                        <p class="heading">Job Requirements</p>
                        <p> <?php echo $qualifications;?> </p>
                    </div>
                </div>
            </div>
            
            <div class="fast-payment">
                <div class="badges">

                    <div class="badge">
                        <div>
                            <h5>Renumeration:</h5>
                            <h4><?php echo $salary;?></h4>
                        </div>
                    </div>

                    <div class="badge">
                        <div>
                            <h5>Job Location:</h5>
                            <h4><?php echo $location;?></h4>
                        </div>
                    </div>

                    <div class="badge">
                        <div>
                            <h5>Job Type:</h5>
                            <h4><?php echo $jobType;?></h4>
                        </div>
                    </div>

                </div>
            </div>
            
            <div class="container-cover">
                
                <div class="bottom-elements" style="margin-bottom: 3px;">
                    <a href="employer-recommended-candidates.php?cat=<?php echo $category;?>" class="btn">Recommended candidates</a>
                    <a href="employer-edit.php?id=<?php echo $idUse;?>&username=<?php echo $username;?>" class="btn">Edit Job</a>
                    <a href="phpFiles/includes/delete.php?id=<?php echo $idUse;?>" class="btn btn2">Delete Job</a>
                </div>

            </div>

            <div class="container-cover" style="border-bottom: 3px solid #ccc;">
                <h1>Job Link: </h1>        
                <div class="bottom-elements">
                    <input id="brandLink" style="border-bottom:none; background-color: transparent; font-size: 1.5rem; user-select: all;" value="https://intrinsicglobe.com/employer-jobs.php?id=<?php echo $idUse;?>&username=<?php echo $username;?>" readonly>
                </div>
            
                <div class="bottom-elements" style="margin-bottom: 20px; margin-top: 20px;">
                    <input type="button" id="copy" class="btn" style="margin-bottom:10px;margin-top:-10px;" value="Copy Job Link">
                </div>
            </div>
        
        </section>

    </main>
    <?php include 'phpFiles/utilities/footer2.php';?>
    <script src="js/dashboard2.js"></script>
    <script >
        const button = document.getElementById("copy");
        const brandLink = document.getElementById("brandLink");

        button.onclick = () =>{
            brandLink.select();
            document.execCommand("Copy");
        }
    </script>
</body>
</html>