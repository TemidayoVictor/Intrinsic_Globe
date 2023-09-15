<?php
ob_start();
$page = "candidates-application";
$currentTab = "application";

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

$username = $_SESSION['usernameUse'];

$date = date('Y/m/d');
$todaystime = date('Y-m-d', strtotime($date.'now'));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/app8max.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Applications</title>
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
    

    <?php include 'phpFiles/utilities/header2.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside.php';?>
        <section class="middle">
            <div class="header">
                <small>Welcome back, <?php echo $username;?></small>
                <h1>Little drops make the Ocean, keep pushing</h1>
            </div>

            <h1 class="status">Your Current status</h1>
            <?php include 'phpFiles/utilities/tabs.php';?>
            <div class="current" style="margin-top:2rem;">
                <h1>Job Applications</h1>
                <?php include 'phpFiles/utilities/searchCandidate.php'?>
            </div>

            <div class="container-cover">
                

                <?php
                    $query = mysqli_query($con, "SELECT * FROM application WHERE candidate = '$username'");
                    if(mysqli_num_rows($query)>0) {
                        $i = 1;
                        while($row = mysqli_fetch_array($query)) {
                            $id = $row['id'];
                            $companyId = $row['companyId'];
                            $usernameChoose = $row['company'];
                            $query2 = mysqli_query($con, "SELECT * FROM recruitmentemployers WHERE id = '$companyId'");
                            if(mysqli_num_rows($query2)>0) {
                                $results = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                                foreach($results as $result) {
                                    $jobTitle = $result['jobTitle'];
                                    $salary = $result['salary'];
                                    $closing = $result['closing'];
                                    $created = $result['created'];

                                    if(empty($closing)) {
                                        $closingUse = "Unspecified";
                                    }
                                    
                                    else {
                                        $closingUse = $closing;
                                    }
                                }
                            }

                            $query3 = mysqli_query($con, "SELECT * FROM paymentemployers WHERE paidBy = '$username' AND paidFor = '$usernameChoose'");
                            if(mysqli_num_rows($query3)>0) {
                                $status = "Paid";
                            }
                            else {
                                $status = "Unpaid";
                            }

                            $query5 = mysqli_query($con, "SELECT * from subscription WHERE username = '$username'");
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
                    <div class="heading">
                        <h1><?php echo $jobTitle;?></h1>
                    </div>
                    <div class="body">
                        <p><span>Renumeration:</span> <?php echo $salary;?></p>
                        <p><span>Date Created:</span> <?php echo $created;?></p>
                        <p><span>Expiry Date:</span> <?php echo $closingUse;?></p>
                        <p><span>Payment Status: <span style="text-decoration: line-through;"><?php echo $status;?></span> Free [trial] </span> </p>
                    </div>
                    <div class="ending">
                        <p>Intrinsic Globe</p>
                        <a href="candidates-applications-view.php?id=<?php echo $companyId;?>&username=<?php echo $usernameChoose;?>" class="btn">View Application</a>
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
                        <h1>You have not applied for any job yet.</h1>
                    </div>
                </div>
                <?php
                    }
                ?>
                
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