<?php
ob_start();
$page = "employer-available";
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

if(!empty($_GET['cat'])) {
    $categoryRec = $_GET['cat'];
    $_SESSION['categoryRec'] = $categoryRec;
}

else {
    header("location: login.php");
    ob_end_flush();
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
    <title>Intrinsic Globe | Recommended Candidates</title>
    <style>        
            a.logo img {
                width: 70%;
            }
            html {
                font-size: 52.5%;
            }

            .current {
                margin-top: 3rem;
            }

            .current form select {
                box-shadow: 0px 2px 5px rgba(0,0,0,.2);
                padding: 1.4rem;
                border-radius: .2rem;
                font-family: 'poppins', sans-serif;
            }

            .current form .btn {
                background-color: #011033;
                padding: 1.4rem;
                color: #fff;
                border-radius: .4rem;
                font-family: 'poppins', sans-serif;
            }

            
            .current form .btn:hover {
                background-color: #3aaa35;
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
                <small>Welcome back, Employer</small>
                <h1>Little drops make the Ocean, keep pushing</h1>
            </div>
            <div class="current" style="margin-bottom: 2rem;">
                <h1>Recommended Candidates</h1>
                <?php include 'phpFiles/utilities/searchEmployer.php'?>
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

                    $query = mysqli_query($con, "SELECT * FROM jobs WHERE category = '$categoryRec'");
                    if(mysqli_num_rows($query)>0) {
                        $number_of_jobs = mysqli_num_rows($query);
                        $number_of_pages = ceil($number_of_jobs/$results_per_page);
                    }
                    else {
                        $number_of_jobs = 0;
                        $number_of_pages = 0;
                    }
                    $query = mysqli_query($con, "SELECT * FROM jobs WHERE category = '$categoryRec' LIMIT $page_starting_limit , $results_per_page");
                    if(mysqli_num_rows($query)>0) {
                        $i = 1;
                        while($row = mysqli_fetch_array($query)) {
                            $id = $row['id'];
                            $jobTitle = $row['jobTitle'];
                            $category = $row['category'];
                            $username = $row['username'];
                            $salary = $row['salary'];
                            $experience = $row['experience'];
                            $query3 = mysqli_query($con, "SELECT * FROM paymentcandidates WHERE paidBy = '$employer' AND paidFor = '$username'");
                            if(mysqli_num_rows($query3)>0) {
                                $status = "Paid";
                            }
                            else {
                                $status = "Unpaid";
                            }

                            $query5 = mysqli_query($con, "SELECT * from subscription WHERE username = '$employer'");
                            if(mysqli_num_rows($query5)>0){
                                $results = mysqli_fetch_all($query5, MYSQLI_ASSOC);
                                foreach ($results as $result) {
                                    $expiry = $result['expiry'];
                                }

                                if($expiry > $todaystime) {
                                    $status = "subscribed";
                                } 
                            }
                ?>

                <div class="container active">
                    <h3><?php echo $category;?></h3>
                    <div class="content">
                        <h3><?php echo $jobTitle;?></h3>
                        <p><span>Yearly Income: </span><?php echo $salary;?></p>
                        <p><span>Experience: </span><?php echo $experience;?></p>
                        <p><span>Payment Status: </span><span style="text-decoration: line-through;"><?php echo $status;?></span> Free [trial]</p>
                        <div class="icons">
                            <a href="employer-recommended-candidates-view.php?username=<?php echo $username;?>" class="btn">Portfolio</a>
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
                        <h1>No Recommended candidates for your specification</h1>
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
                        <a href="employer-recommended-candidates.php?pageId=<?php echo $i;?>"> <div><?php echo $i;?></div> </a>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
            
        </section>

    </main>
    <?php include 'phpFiles/utilities/footer2.php';?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#category').on('change', function() {
                var category = this.value;
                $.ajax({
                    url: "get-subcat.php",
                    type: "POST",
                    data: {
                        category: category
                    },
                    cache: false,
                    success: function(result) {
                        $("#sub-cat").html(result);
                    }
                });
            });
        });
    </script>
    <script src="js/dashboard2.js"></script>
</body>
</html>