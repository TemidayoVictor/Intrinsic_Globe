<?php
ob_start();
$page = "employer-record";
$currentTab = "";

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

$username = $_SESSION['usernameUse'];
$employer = $_SESSION['usernameUse'];
$status = $_SESSION['status'];

$date = date('Y/m/d');
$todaystime = date('Y-m-d', strtotime($date.'now'));

$query = mysqli_query($con, "SELECT * from subscription WHERE username = '$username'");
if(mysqli_num_rows($query)>0){
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach ($results as $result) {
        $expiry = $result['expiry'];
    }

    if($expiry > $todaystime) {
        $subscription = "active";
    } 
    else {
        $subscription = "inactive";
    }
    
}

else {
    $subscription = "inactive"; 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/app9maxxx.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Payment Records</title>
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
    
    <?php include 'phpFiles/utilities/header3.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside3.php';?>
        <section class="middle">
            <div class="header" style="margin-bottom: 20px;">
                <small>Welcome back, Employer</small>
                <h1>Little drops make the Ocean, keep pushing</h1>
            </div>

            <h1 class="status">Active Subscriptions</h1>

            <div class="cards" style="margin-bottom: 20px;">
                <a href="freelance-shortlistings.php" class="card active">
                    <div class="top">
                        <div class="left">
                            <h2>Monthly Subscription</h2>
                        </div>
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="middle">
                        <?php if($subscription == 'active'): ?>
                            <h1 style="font-weight: 500;">Your active subscription expires: <?php echo $expiry;?> </h1>
                        <?php else: ?>
                            <h1 style="font-weight: 500;">You subscription is currently inactive</h1>
                        <?php endif ?>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            
                            <h5></h5>
                        </div>
                        <div class="right">
                            
                        </div>
                    </div>
                </a>
            </div>

            <div class="container-cover" style="display: flex; align-item:start; justify-content: start;">
                <form action="phpFiles/includes/subscription-interface.php" method="post">
                    <h1 class="status" style="margin-top: 10px;">Choose Subscription plan</h1>
                    <div style="margin-bottom: 5px;">
                        <select name="month" style=" padding: 1.1rem; border-radius: .5rem;" id="">
                            <option value="1">1 Month</option>
                            <option value="2">2 Months</option>
                            <option value="3">3 Months</option>
                            <option value="4">4 Months</option>
                            <option value="5">5 Months</option>
                            <option value="6">6 Months</option>
                            <option value="7">7 Months</option>
                            <option value="8">8 Months</option>
                            <option value="9">9 Months</option>
                            <option value="10">10 Months</option>
                            <option value="11">11 Months</option>
                            <option value="12">12 Months</option>
                        </select>
                    </div>

                    <div class="bottom-elements" >
                        <input type="submit" class="btn" value="Subscribe">
                    </div>

                    <div class="input-box">
                        <input type="text" name="track" value="employer" hidden>
                    </div>
                </form>
            </div>

            <div class="current" style="margin-bottom: 10px;">
                <h1>Payment Records</h1>
                
            </div>
            <div class="container-cover">
                
                <?php
                    $results_per_page = 10;
                    if(!isset($_GET['pageId'])){
                        $page = '1';
                    } 
                    else {
                        $page = $_GET['pageId'];
                    }

                    $page_starting_limit = ($page - 1)*$results_per_page;

                    $query = mysqli_query($con, "SELECT * FROM paymentcandidates WHERE paidBy = '$username'");
                    if(mysqli_num_rows($query)>0) {
                        $number_of_jobs = mysqli_num_rows($query);
                        $number_of_pages = ceil($number_of_jobs/$results_per_page);
                    }
                    else {
                        $number_of_jobs = 0;
                        $number_of_pages = 0;
                    }
                    $query1 = mysqli_query($con, "SELECT * FROM paymentcandidates WHERE paidBy = '$username'"); 
                    if(mysqli_num_rows($query1)>0) {
                        $j = 1;
                        while($row = mysqli_fetch_array($query1)) {
                            $id = $row['id'];
                            $paidBy = $row['paidBy'];
                            $paidFor = $row['paidFor'];

                            $query = mysqli_query($con, "SELECT * FROM jobs WHERE username = '$paidFor'");
                            if(mysqli_num_rows($query)>0) {
                                $i = 1;
                                while($row = mysqli_fetch_array($query)) {
                                    $id = $row['id'];
                                    $jobTitle = $row['jobTitle'];
                                    $category = $row['category'];
                                    $username = $row['username'];
                                    $salary = $row['salary'];
                                    $experience = $row['experience'];
                                    $query2 = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
                                    if(mysqli_num_rows($query2)>0) {
                                        $results = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                                        foreach($results as $result) {
                                            $picture = $result['picture'];
                                        }
                                    }
                                    $query3 = mysqli_query($con, "SELECT * FROM paymentcandidates WHERE paidBy = '$employer' AND paidFor = '$username'");
                                    if(mysqli_num_rows($query3)>0) {
                                        $status = "paid";
                                    }
                                    else {
                                        $status = "unpaid";
                                    }
                ?>

                
                <div class="container active">
                    <div class="image">
                        <img src="recruitimages/<?php echo $picture;?>" alt="">
                        <h3><?php echo $category;?></h3>
                    </div>
                    <div class="content">
                        <h3><?php echo $jobTitle;?></h3>
                        <p><span>Yearly Income: </span><?php echo $salary;?></p>
                        <p><span>Experience: </span><?php echo $experience;?></p>
                        <p><span>Payment Status: </span><?php echo $status;?></p>
                        <div class="icons">
                            <a href="employer-all-candidates-view.php?username=<?php echo $username;?>" class="btn">Portfolio</a>
                        </div>
                    </div>
                </div>

                <?php
                    $i++;
                        }
                    }
                    $j++;
                        }
                    }
                    else {
                ?>
                <div class="container active">
                    <div class="body" style="border:none;">
                        <h1>No Record Presently</h1>
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
                        <a href="employer-records.php?pageId=<?php echo $i;?>"> <div><?php echo $i;?></div> </a>
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