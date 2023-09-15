<?php
ob_start();
$page = "freelance-available";
$currentTab = "created";

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

$username = $_SESSION['usernameUse'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../css/app8max.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Available Jobs</title>
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
    


    <?php include '../phpFiles/utilities/header6.php'?>

    <main>
        <?php include '../phpFiles/utilities/aside6.php';?>
        <section class="middle">
            <div class="header">
                <small>Welcome back, <?php echo $username;?></small>
            </div>

            <!--<h1 class="status">Your Current status</h1>
            <?php //include '../phpFiles/utilities/tabs6.php';?>-->
            <div class="container-cover">
                <div class="current">
                    <h1>Available Freelance Jobs</h1>
                    <form action="">
                        <input type="search" class="search" placeholder="Search Jobs">
                        <input type="button" class="btn" value="search">
                    </form>
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

                    $query = mysqli_query($con, "SELECT * FROM freelanceemployers");
                    if(mysqli_num_rows($query)>0) {
                        $number_of_jobs = mysqli_num_rows($query);
                        $number_of_pages = ceil($number_of_jobs/$results_per_page);
                    }
                    else {
                        $number_of_jobs = 0;
                        $number_of_pages = 0;
                    }
                    $query = mysqli_query($con, "SELECT * FROM freelanceemployers LIMIT $page_starting_limit , $results_per_page ");
                    if(mysqli_num_rows($query)>0) {
                        $i = 1;
                        while($row = mysqli_fetch_array($query)) {
                            $id = $row['id'];
                            $jobTitle = $row['jobTitle'];
                            $budget = $row['budget'];
                            $usernameChoose = $row['username'];
                            $query3 = mysqli_query($con, "SELECT * FROM paymentfreelanceemp WHERE paidBy = '$username' AND paidFor = '$usernameChoose'");
                            if(mysqli_num_rows($query3)>0) {
                                $status = "Paid";
                            }
                            else {
                                $status = "Unpaid";
                            }
                            
                ?>
                <div class="container active">
                    <div class="heading">
                        <h1><?php echo $jobTitle;?></h1>
                    </div>
                    <div class="body">
                        <p><span>Renumeration:</span> <?php echo $budget;?></p>
                        <!--<p><span>Date Created:</span> 10-Mar-2022</p>
                        <p><span>Expiry Date:</span> 10-Mar-2022</p> -->
                        <p><span>Payment Status: <?php echo $status;?></span></p>
                    </div>
                    <div class="ending">
                        <p>Intrinsic Globe</p>
                        <a href="freemp-all-view.php?id=<?php echo $id;?>&username=<?php echo $usernameChoose;?>" class="btn">VIEW</a>
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
                        <h1>There are no available jobs now</h1>
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
                        <a href="freemp-all.php?pageId=<?php echo $i;?>"> <div><?php echo $i;?></div> </a>
                    <?php
                    }
                    ?>
                    </div>
                </div>

            </div>
            
        </section>

    </main>
    <?php include '../phpFiles/utilities/footer2.php';?>
    <script src="../js/dashboard.js"></script>
</body>
</html>