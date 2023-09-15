<?php
ob_start();
$currentTab = "";

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

$usernameUse = $_SESSION['usernameUse'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../css/app9maxxx.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | All Freelancers</title>
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
                <small>Welcome back, <?php echo $usernameUse;?></small>
            </div>
            
            <div class="current">
                <h1>All Freelancers</h1>
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

                    $query = mysqli_query($con, "SELECT * FROM freelancejobs ");
                    if(mysqli_num_rows($query)>0) {
                        $number_of_jobs = mysqli_num_rows($query);
                        $number_of_pages = ceil($number_of_jobs/$results_per_page);
                    }
                    else {
                        $number_of_jobs = 0;
                        $number_of_pages = 0;
                    }
                    $query = mysqli_query($con, "SELECT * FROM freelancejobs LIMIT $page_starting_limit , $results_per_page");
                    if(mysqli_num_rows($query)>0) {
                        $i = 1;
                        while($row = mysqli_fetch_array($query)) {
                            $id = $row['id'];
                            $jobTitle = $row['jobTitle'];
                            $category = $row['category'];
                            $username = $row['username'];
                            $price = $row['price'];
                            $query3 = mysqli_query($con, "SELECT * FROM paymentfreelance WHERE paidBy = '$usernameUse' AND paidFor = '$username'");
                            if(mysqli_num_rows($query3)>0) {
                                $status = "Paid";
                            }
                            else {
                                $status = "Unpaid";
                            }
                            
                ?>

                <div class="container active">
                    <h3><?php echo $category;?></h3>
                    <div class="content">
                        <h3><?php echo $jobTitle;?></h3>
                        <p><span>Current Renumeration: </span><?php echo $price;?></p>
                        <div class="icons">
                            <a href="freelancers-all-view.php?username=<?php echo $username;?>" class="btn">Portfolio</a>
                        </div>
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
                        <h1>No available Freelancers yet</h1>
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
                        <a href="freelancers-all.php?pageId=<?php echo $i;?>"> <div><?php echo $i;?></div> </a>
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