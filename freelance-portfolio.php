<?php
ob_start();
$page = "freelance-resume";

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}
include 'phpFiles/classes-upper.php';
include 'phpFiles/includes/connect.php';

$controller = new Controller();
$view = new View();

if(!empty($_GET['username'])) {
    $username = $_GET['username'];
    $_SESSION['usernameUse'] = $_GET['username'];
}

else {
    header("location: index.php");
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
$city = $userData['city'];
$address = $userData['address'];
$country = $userData['country'];
$gender = $userData['gender'];
$about = $userData['about'];

$query = mysqli_query($con, "SELECT * FROM freelancejobs WHERE username = '$username'");
if(mysqli_num_rows($query)>0) {
    
}
else {
    header('location: index.php');
    ob_end_flush();
}

$query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
if(mysqli_num_rows($query)>0) {
    
}
else {
    header('location: index.php');
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
    <link href="css/profile3maxxx.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Resume</title>
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
    


    <?php include 'phpFiles/utilities/header7.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside7.php';?>
        <section class="middle">
            <div class="profile-pic">
                <img src="freelanceimages/<?php echo $picture;?>" alt="">
            </div>


            <div class="container-cover">
                <div class="topmost">
                    <div class="job-title">
                        <h1><?php echo '-------';?></h1>
                        <?php
                            $query = mysqli_query($con, "SELECT * FROM freelancejobs WHERE username = '$username'");
                            if(mysqli_num_rows($query)>0) {
                                $i = 1;
                                while($row = mysqli_fetch_array($query)) {
                                    $id = $row['id'];
                                    $jobTitle = $row['jobTitle'];
                        ?>
                        <div class="details">
                            <p><?php echo $jobTitle;?></p>
                        </div>
                        <?php
                            $i++;
                            }
                        }
                        ?>
                    </div>
                    <div class="timeframe">
                        <p><span>Email:</span> <?php echo '-------';?></p>
                        <p><span>Phone:</span> <?php echo '-------';?></p>
                        <p><span>Location:</span> <?php echo '-------';?></p>
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
                                            $description = str_replace( '\r\n', '', $description);
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
                                        <p><strong style="color: #011030;">Starting Price:</strong> <?php echo $price;?></p>
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
                                                <div class="bottom-elements" style="margin-bottom: 10px;">
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

                        <div class="container-cover">
                
                            <div class="bottom-elements" style="margin-bottom: 10px;">
                                <a href="signup.php?section=freelancerEmp" class="btn">Hire</a>
                            </div>

                        </div>    
                </div>
                
            </div>
            
               
            
        </section>

    </main>
    <?php include 'phpFiles/utilities/footer2.php';?>
    <script src="js/dashboard2.js"></script>
</body>
</html>