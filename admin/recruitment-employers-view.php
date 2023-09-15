<?php
ob_start();
$page = "candidates-available";

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

$candidate = $_SESSION['usernameUse'];

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
$active = $userData2['status'];

if($active == "inactive") {
    $activeStyle1 = "none";
    $activeStyle2 = "";
}

else {
    $activeStyle1 = "";
    $activeStyle2 = "none";
}

if(empty($closing)) {
    $closingUse = "Unspecified";
}

else {
    $closingUse = $closing;
}


$query = mysqli_query($con, "SELECT * from application WHERE candidate = '$candidate' AND company = '$username' AND companyId = '$idUse'");
if(mysqli_num_rows($query)>0){
    $state1 = "none";
    $state2 = "";
}
else {
    $state2 = "none";
    $state1 = "";
}

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
            .bottom-elements .btn.delete {
                background-color: orangered !important;
            }
            .bottom-elements .btn.delete:hover {
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
                            <p class="location"><span>Employer: </span><?php if($status == "paid") {echo $company;} else echo $hide;?></p>
                            <p class="location"><span>Email: </span><?php if($status == "paid") {echo $email;} else echo $hide;?></p>
                            <p class="location"><span>Phone: </span><?php if($status == "paid") {echo $phone;} else echo $hide;?></p>
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
                            <h5>Gender Preference</h5>
                            <h4><?php echo $gender;?></h4>
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
                <div class="bottom-elements" >
                    <a style="display: <?php echo $activeStyle1;?>" href="phpFiles/delete.php?idEmployerDeactivate=<?php echo $idUse;?>" class="btn">Deactivate Job</a>
                    <a style="display: <?php echo $activeStyle2;?>" href="phpFiles/delete.php?idEmployerActivate=<?php echo $idUse;?>" class="btn">Activate Job</a>
                </div>
            </div>
            
        </section>

    </main>
    <?php include '../phpFiles/utilities/footer2.php';?>
    <script src="../js/dashboard.js"></script>
</body>
</html>