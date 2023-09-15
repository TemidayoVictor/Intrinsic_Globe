<?php
ob_start();
$page = "freemp-all";

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}
include 'phpFiles/classes-upper.php';
include 'phpFiles/includes/check-login-freelanceEmp.php';
include 'phpFiles/includes/connect.php';

$controller = new Controller();
$view = new View();

$usernameUse = $_SESSION['usernameUse'];
$status = $_SESSION['status'];

$companyUse = $_SESSION['usernameUse'];

$hide = "-------";

$date = date('Y/m/d');
$todaystime = date('Y-m-d', strtotime($date.'now'));

if(empty($_SESSION['idCompany'])) {
    if(!empty($_GET['companyId'])) {
        $companyId = $_GET['companyId'];
        $_SESSION['idCompany'] = $companyId;
    }
}

if(!empty($_GET['username'])) {
    $username = $_GET['username'];
    $_SESSION['userChoose'] = $username;
}
elseif(empty($username) && !empty($_SESSION['userChoose'])) {
    $username = $_SESSION['userChoose'];
}

else {
    header('location: login.php');
    ob_end_flush();
}


$query = mysqli_query($con, "SELECT * FROM freelancejobs WHERE username = '$username'");
if(mysqli_num_rows($query)> 0) {

}

else {
    header('location: freemp-recommended-freelancers.php');
    ob_end_flush();
}

$userData = $controller->searchDbContr($username, 'username', 'users');
$id = $userData['id'];
$email = $userData['email'];
$firstName = $userData['firstName'];
$lastName = $userData['lastName'];
$phone = $userData['phone'];
$picture = $userData['picture'];
$about = $userData['about'];
$address = $userData['address'];
$city = $userData['city'];
$country = $userData['country'];
$gender = $userData['gender'];

$about = str_replace( '\r\n', '', $about);


$query3 = mysqli_query($con, "SELECT * FROM paymentfreelance WHERE paidBy = '$companyUse' AND paidFor = '$username'");

if(mysqli_num_rows($query3)>0) {
    $status = "paid";
}
else {
    $status = "unpaid";
}

$query5 = mysqli_query($con, "SELECT * from subscription WHERE username = '$companyUse'");
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
    <link href="css/profile3maxxx.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | All Freelancers</title>
    <style>        
            a.logo img {
                width: 70%;
            }
            html {
                font-size: 52.5%;
                scroll-behavior: smooth;
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
    


    <?php include 'phpFiles/utilities/header5.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside5.php';?>
        <section class="middle">
            <div class="profile-pic">
                <img src="freelanceimages/<?php echo $picture;?>" alt="">
            </div>


            <div class="container-cover">
                <div class="topmost">
                    <div class="job-title">
                        <h1><?php if($status == "paid") {echo $firstName .' '. $lastName;} else echo $hide;?></h1>
                        <?php
                            $query = mysqli_query($con, "SELECT * FROM freelancejobs WHERE username = '$username'");
                            if(mysqli_num_rows($query)>0) {
                                $i = 1;
                                while($row = mysqli_fetch_array($query)) {
                                    $id = $row['id'];
                                    $jobTitle = $row['jobTitle'];
                        ?>
                        <div class="details">
                            <p><?php echo $jobTitle;?>;</p>
                        </div>
                        <?php
                            $i++;
                            }
                        }
                        ?>
                    </div>
                    <div class="timeframe">
                        <p class="location"><span>Phone:</span> <?php if($status == "paid") {echo $phone;} else echo $hide;?> </p>
                        <p class="location"><span>Email:</span> <?php if($status == "paid") {echo $email;} else echo $hide;?> </p>
                        <p><span>Location:</span> <?php echo $city.', '.$address.' '.$country;?></p>
                    </div>
                </div>
            
                <div class="container active selected">
                        <div class="body">
                            <div class="body-head">
                                <p class="heading head2"><strong>Executive Brief</strong></p>
                            </div>
                            <p> <?php echo $about;?> </p>
                            
                            <div class="section">
                                <p class="heading"><strong>GIGs And Services</strong></p>
                                <?php
                                    $query = mysqli_query($con, "SELECT * FROM freelancejobs WHERE username = '$username'");
                                    if(mysqli_num_rows($query)>0) {
                                        $i = 1;
                                        while($row = mysqli_fetch_array($query)) {
                                            $id = $row['id'];
                                            $jobTitle = $row['jobTitle'];
                                            $price = $row['price'];
                                            $category = $row['category'];
                                            $sub = $row['subCategory'];
                                            $url = $row['url'];
                                            $description = $row['description'];
                                            $url = str_replace( 'https://', '', $url);

                                ?>
                                <div class="section-body" style="border-bottom: 1px solid #aaa;">
                                    <div class="details">
                                        <div class="title"><?php echo $jobTitle;?></div>
                                        <div class="subtitle"><span>Category: </span><?php echo $category;?></div>
                                        <div class="subtitle"><span>Sub-category: </span><?php echo $sub;?></div>
                                        <p> <?php echo $description;?></p>
                                    </div>
                                    <div class="period">
                                        <p style="font-weight: 300;"><strong style="color: #011030; font-weight: 600;">Starting Price:</strong> <?php echo $price;?></p>
                                    </div>
                                </div>
                                <?php
                                $i++;
                                    }
                                }
                            ?>
                            </div>
                            
                            <div class="section">
                                <p class="heading"><strong>Portfolio</strong></p>
                                <div class="section-body">
                                    <?php
                                        $query = mysqli_query($con, "SELECT * FROM freelanceportfolio WHERE username = '$username'");
                                        if(mysqli_num_rows($query)>0) {
                                            $i = 1;
                                            while($row = mysqli_fetch_array($query)) {
                                                $id = $row['id'];
                                                $title = $row['title'];
                                                $description = $row['description'];
                                                $porturl = $row['porturl'];
                                                $porturl = str_replace( 'https://', '', $porturl);
                                                if(empty($porturl)) {
                                                    $show = "none";
                                                }
                                                else {
                                                    $show = "";
                                                }
                                    ?>
                                    <div class="details">
                                        <div class="title"><?php echo $title;?></div>
                                        <p> <?php echo $description;?></p>
                                        <div class="period">
                                            <div class="container-cover">
                                                <div class="bottom-elements" style="margin-bottom: 40px;">
                                                    <a href="https://<?php echo $porturl;?>" class="btn" style="display: <?php echo $show;?>">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $i++;
                                            }
                                        }
                                    ?>
                                    
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container-cover">
                
                    <div class="bottom-elements">
                        <a href="phpFiles/payment-interface.php?username=<?php echo $username;?>" style="display: <?php if($status == "paid") echo "none"; ?>" class="btn">Make Payment</a>
                    </div>

                </div>
               
                
        </section>

    </main>
    <?php include 'phpFiles/utilities/footer2.php';?>
    <script src="js/dashboard2.js"></script>
</body>
</html>