<?php
ob_start();
$page = "freelance-application";

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}
include 'phpFiles/classes-upper.php';
include 'phpFiles/includes/check-login-freelance.php';
include 'phpFiles/includes/connect.php';

$controller = new Controller();
$view = new View();

$hide = "-------";

$candidate = $_SESSION['usernameUse'];
$usernameFree = $_SESSION['usernameUse'];
$status = $_SESSION['status'];
$_SESSION['milestoneView'] = 'none';

$date = date('Y/m/d');
$todaystime = date('Y-m-d', strtotime($date.'now'));

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
$_SESSION['candidate'] = $candidate;
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
$description = str_replace( '\r\n', '', $description);

$query2 = mysqli_query($con, "SELECT * FROM applicationfree WHERE candidate = '$usernameFree' AND companyId = '$idUse'");
if(mysqli_num_rows($query2) > 0) {
    $displayApp = "";
    $results = mysqli_fetch_all($query2, MYSQLI_ASSOC);
    foreach ($results as $result) {
        $cover = $result['coverLetter'];
        $cover = str_replace( '\r\n', '', $cover);
        $bid = $result['bid'];
        $support = $result['support'];
        $payment = $result['payment'];
        if($payment == 'one') {
            $paymentUse = "By Project";
            $displayMile = "none";
        }
        else {
            $paymentUse = "Milestones";
            $displayMile = "";
        }
        if(empty($support)) {
            $supportDisplay = "none";
        }
        else {
            $supportDisplay = "";
        }
    }
}

else {
    $displayApp = "none";
}

if(empty($sample)) {
    $display = "none";
}

else {
    $display = "";
}

if(isset($_SESSION['msgFreeTerms2'])) {
    $msg2 = $_SESSION['msgFreeTerms2'];
    $msgClass2 = $_SESSION['msgClassFreeTerms2'];
}

else {
    $msg2 = "Yellow";
    $msgClass2 = "alert-danger";
}

$query3 = mysqli_query($con, "SELECT * FROM paymentfreelanceemp WHERE paidBy = '$candidate' AND paidFor = '$username'");
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
    <title>Intrinsic Globe | Applications</title>
    <style>        
            a.logo img {
                width: 70%;
            }
            html {
                font-size: 52.5%;
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
    


    <?php include 'phpFiles/utilities/header4.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside4.php';?>
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
                        <p><span>Created on:</span> <?php echo $created;?> </p>
                    </div>
                </div>
            
                <div class="container active selected">
                        <div class="body">
                            <p class="heading"><strong>Client Requirements</strong></p>
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
                
                <div class="bottom-elements">
                    <a href="phpFiles/payment-interface.php?usernameFreeEmp=<?php echo $username;?>" style="display: <?php if($status == "paid") echo "none"; ?>" class="btn">Make Payment</a>
                </div>

            </div>
            
            <div class="container-cover" style="display:<?php echo $displayApp;?>">
                
                <div class="container active selected">
                    <div class="body">
                        <p class="heading"><strong>Your Application Details</strong></p>
                        <p> <?php echo $cover;?> </p>
                        <div class="fast-payment">
                            <div class="badges">

                                <div class="badge">
                                    <div>
                                        <h5>Your Bid :</h5>
                                        <h4>#<?php echo $bid;?></h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <small style="font-size: 16px; line-height: 1.7;"><strong> Its is imperative to know that coupled with this cover letter, the employer will have access to view your personal details, work details and other details you submitted via this platform </strong></small>
                    </div>
                    <div class="bottom-elements" style="margin-top: 10px; ">
                        <a href="freelance-gig.php" class="btn">Edit Work Profile</a>
                        <a href="phpFiles/includes/delete.php?candidate4=<?php echo $candidate?>&companyId4=<?php echo $idUse;?>" class="btn" style="background-color: orangered">Withdraw Application</a>
                    </div>
                </div>

            </div>

            
            <div class="container-cover" style="border-bottom: 3px solid #ccc;">
                
            </div>

            <div class="container-cover">
                <div class="topmost">
                    <div class="job-title">
                        <h2>Similar Freelance Jobs</h2>
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

                    $query = mysqli_query($con, "SELECT * FROM freelanceemployers WHERE category = '$category'");
                    if(mysqli_num_rows($query)>0) {
                        $number_of_jobs = mysqli_num_rows($query);
                        $number_of_pages = ceil($number_of_jobs/$results_per_page);
                    }
                    else {
                        $number_of_jobs = 0;
                        $number_of_pages = 0;
                    }
                    $query = mysqli_query($con, "SELECT * FROM freelanceemployers WHERE category = '$category' LIMIT $page_starting_limit , $results_per_page ");
                    if(mysqli_num_rows($query)>0) {
                        $i = 1;
                        while($row = mysqli_fetch_array($query)) {
                            $id = $row['id'];
                            $jobTitle = $row['jobTitle'];
                            $budget = $row['budget'];
                            $usernameChoose = $row['username'];
                            $description = $row['description'];
                            $query3 = mysqli_query($con, "SELECT * FROM paymentfreelanceemp WHERE paidBy = '$username' AND paidFor = '$usernameChoose'");
                            if(mysqli_num_rows($query3)>0) {
                                $status = "paid";
                            }
                            else {
                                $status = "unpaid";
                            }
                            
                ?>
                
                <div class="container active selected">
                    
                    <div class="body2">
                        <p class="heading2"><strong><?php echo $jobTitle;?></strong></p>
                    </div>
                    <div class="body-main">
                        <p> <?php echo $description;?></p>
                    </div>
                    <div class="ending2">
                        <a href="freelance-available-jobs-view.php?id=<?php echo $id;?>&username=<?php echo $usernameChoose;?>" class="btn btn2">Apply</a>
                        <a href="freelance-available-jobs-view.php?id=<?php echo $id;?>&username=<?php echo $usernameChoose;?>" class="btn">VIEW</a>
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
                        <h1>There are no Similar jobs now</h1>
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
                        <a href="freelance-applications-view.php?pageId=<?php echo $i;?>"> <div><?php echo $i;?></div> </a>
                    <?php
                    }
                    ?>
                    </div>
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