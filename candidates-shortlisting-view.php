<?php
ob_start();
$page = "candidates-shortlist";

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include 'phpFiles/classes-upper.php';
include 'phpFiles/includes/check-login-candidate.php';
include 'phpFiles/includes/connect.php';

$controller = new Controller();
$view = new View();

$hide = "-------";

$candidate = $_SESSION['usernameUse'];

$date = date('Y/m/d');
$todaystime = date('Y-m-d', strtotime($date.'now'));

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
$location = $userData2['location'];
$qualifications = str_replace( '\r\n', '', $qualifications);
$responsibilities = str_replace( '\r\n', '', $responsibilities);

if(empty($closing)) {
    $closingUse = "Unspecified";
}

else {
    $closingUse = $closing;
}


$query3 = mysqli_query($con, "SELECT * FROM paymentemployers WHERE paidBy = '$candidate' AND paidFor = '$username'");

if(mysqli_num_rows($query3)>0) {
    $status = "paid";
}
else {
    $status = "unpaid";
}

$query5 = mysqli_query($con, "SELECT * from subscription WHERE username = '$candidate'");
if(mysqli_num_rows($query5)>0){
    $results = mysqli_fetch_all($query5, MYSQLI_ASSOC);
    foreach ($results as $result) {
        $expiry = $result['expiry'];
    }

    if($expiry > $todaystime) {
        $status = "paid";
    } 
}

// Makes all CV's and Jobs free. Remove to make everything paid
$status = "paid";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/job-details3maxxx.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Interviews</title>
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
    


    <?php include 'phpFiles/utilities/header2.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside.php';?>
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
                            <p class="location"><span>Email: </span><?php if($status == "paid") {echo $company;} else echo $hide;?></p>
                            <p class="location"><span>Phone: </span><?php if($status == "paid") {echo $company;} else echo $hide;?></p>
                            <p class="location"><span>Location:</span> <?php echo $location;?></p>
                        </div>
                    </div>
                    <div class="timeframe">
                        <p><span>Created on:</span> <?php echo $created;?></p>
                        <p><span>Expires on:</span> <?php echo $closingUse;?></p>
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
                            <h5>Renumeration</h5>
                            <h4> <?php echo $salary;?> </h4>
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
                            <h5>Job Type</h5>
                            <h4><?php echo $jobType;?></h4>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container-cover">
                <div class="bottom-elements" >
                    <a href="phpFiles/payment-interface.php?usernameEmployer=<?php echo $username;?>" style="display: <?php if($status == "paid") echo "none"; ?>" class="btn">Make Payment</a>
                </div>
            </div>
            
            <div class="container-cover" style="border-bottom: 3px solid #ccc;">
                
            </div>

            <div class="container-cover" id="sj">
                <div class="topmost">
                    <div class="job-title">
                        <h2>Similar Jobs</h2>
                    </div>
                    
                </div>
            
                <?php
                    $results_per_page = 10;
                    if(!isset($_GET['pageId'])){
                        $page = '1';
                    } 
                    else {
                        $page = $_GET['pageId'];
                    }

                    $page_starting_limit = ($page - 1)*$results_per_page;

                    $query = mysqli_query($con, "SELECT * FROM recruitmentemployers WHERE category = '$category'");
                    if(mysqli_num_rows($query)>0) {
                        $number_of_jobs = mysqli_num_rows($query);
                        $number_of_pages = ceil($number_of_jobs/$results_per_page);
                    }
                    else {
                        $number_of_jobs = 0;
                        $number_of_pages = 0;
                    }
                    $query = mysqli_query($con, "SELECT * FROM recruitmentemployers WHERE category = '$category' LIMIT $page_starting_limit , $results_per_page ");
                    if(mysqli_num_rows($query)>0) {
                        $i = 1;
                        while($row = mysqli_fetch_array($query)) {
                            $id = $row['id'];
                            $jobTitleSj = $row['jobTitle'];
                            $closingSj = $row['closing'];
                            $usernameChooseSj = $row['username'];
                            $requirements = $row['responsibilities'];
                            $query3 = mysqli_query($con, "SELECT * FROM paymentemployers WHERE paidBy = '$username' AND paidFor = '$usernameChooseSj'");
                            if(mysqli_num_rows($query3)>0) {
                                $status = "paid";
                            }
                            else {
                                $status = "unpaid";
                            }
                            if(empty($closingSj)) {
                                $closingUse = "Unspecified";
                            }
                            
                            else {
                                $closingUse = $closing;
                            }
                            
                ?>

                
                <div class="container active selected">
                    
                    <div class="body2">
                        <p class="heading2" style="font-size: 2.3rem;"><strong><?php echo $jobTitleSj;?></strong></p>
                        <p class="sub-heading" style="font-weight: 300; font-size: 1.8rem;"> <span style="font-weight: 500;">Expiry:</span> <?php echo $closingUse;?> </p>
                    </div>
                    
                    <div class="body-main">
                        <p> <?php echo $requirements; ?> </p>
                    </div>
                    <div class="ending2">
                        <a href="candidates-available-jobs-view.php?id=<?php echo $id;?>&username=<?php echo $usernameChooseSj;?>" class="btn btn2">Apply</a>
                        <a href="candidates-available-jobs-view.php?id=<?php echo $id;?>&username=<?php echo $usernameChooseSj;?>" class="btn">VIEW</a>
                    </div>
                    
                </div>

                <?php
                    $i++;
                        }
                    }
                    else {
                ?>
                <div class="container active">
                    <div class="body" style="border:none;">
                        <h1>No Jobs Available at the moment</h1>
                    </div>
                </div>
                <?php
                    }
                ?>
                <div class="bottom-elements">
                    <a href="#" class="btn" style="display:none;">Apply for new jobs</a>
                    <div class="pagination">
                    <?php
                        for($i=1; $i<=$number_of_pages; $i++) {
                    ?>
                        <a href="candidates-available-jobs-view.php?pageId=<?php echo $i;?>"> <div><?php echo $i;?></div> </a>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
            
            
        </section>

    </main>
    <?php include 'phpFiles/utilities/footer2.php';?>
    <script src="js/dashboard2.js"></script>
</body>
</html>