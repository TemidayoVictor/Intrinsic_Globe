<?php
ob_start();
$page = "candidates-profile";

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include 'phpFiles/classes-upper.php';
include 'phpFiles/includes/connect.php';

$controller = new Controller();
$view = new View();

$hide = "-------";

if(!empty($_GET['username'])) {
    $username = $_GET['username'];
    $_SESSION['usernameUse'] = $_GET['username'];
}

else {
    header("location: index.php");
    ob_end_flush();
}

$query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
if(mysqli_num_rows($query)>0) {
    
}
else {
    header('location: index.php');
    ob_end_flush();
}

$query = mysqli_query($con, "SELECT * FROM jobs WHERE username = '$username'");
if(mysqli_num_rows($query)> 0) {

}

else {
    header('location: index.php');
    ob_end_flush();
}

$userData = $controller->searchDbContr($username, 'username', 'users');
$id = $userData['id'];
$email = $userData['email'];
$firstName = $userData['firstName'];
$lastName = $userData['lastName'];
$address = $userData['address'];
$phone = $userData['phone'];
$picture = $userData['picture'];
$about = $userData['about'];
$about = str_replace( '\r\n', '', $about);
$city = $userData['city'];
$gender = $userData['gender'];
$country = $userData['country'];

$userData2 = $controller->searchDbContr($username, 'username', 'jobs');
$id = $userData2['id'];
$jobTitle = $userData2['jobTitle'];
$salary = $userData2['salary'];
$category = $userData2['category'];
$subCategory = $userData2['subCategory'];
$jobType = $userData2['jobType'];

$query = mysqli_query($con, "SELECT * FROM education WHERE username = '$username' ORDER BY id DESC");
if(mysqli_num_rows($query)>0) {
    $i = 1;
    while($row = mysqli_fetch_array($query)) {
        $id = $row['id'];
        $institution = $row['institution'];
        //$start = $row['start'];
        //$end = $row['end'];
        $level = $row['level'];  
        $course = $row['course'];     

    }
}
else {
    $level = '';  
    $course = '';
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
                <img src="recruitimages/<?php echo $picture;?>" alt="">
            </div>


            <div class="container-cover">
                <div class="topmost">
                    <div class="job-title">
                        <h1><?php echo '-------';?></h1>
                        <div class="details">
                            <p><?php echo $level.': '.$course;?></p>
                            <p><?php echo $jobTitle;?></p>
                        </div>
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
                            <small> <span>Current Pay range: </span><?php echo $salary;?>/yr </small>
                        </div>
                        <p> <?php echo $about;?> </p>
                        
                        <div class="section">
                            <p class="heading"><strong>Education</strong></p>
                            <?php
                                $query = mysqli_query($con, "SELECT * FROM education WHERE username = '$username'");
                                if(mysqli_num_rows($query)>0) {
                                    $i = 1;
                                    while($row = mysqli_fetch_array($query)) {
                                        $id = $row['id'];
                                        $institution = $row['institution'];
                                        $start = $row['start'];
                                        $end = $row['end'];
                                        $level = $row['level'];  
                                        $course = $row['course'];     
                            ?>

                            <div class="section-body">
                                <div class="details">
                                    <div class="title"><?php echo $institution;?></div>
                                    <div class="subtitle"><span><?php echo $level;?>: </span> <?php echo $course;?></div>
                                </div>
                                <div class="period">
                                    <p><?php echo $start;?> <strong>||</strong> <?php echo $end;?></p>
                                </div>
                            </div>

                            <?php
                                $i++;
                                    }
                                }
                            ?>
                            
                        </div>
                        
                        <div class="section">
                            <p class="heading"><strong>Work Experience</strong></p>
                            <?php
                                $query = mysqli_query($con, "SELECT * FROM experience WHERE username = '$username'");
                                if(mysqli_num_rows($query)>0) {
                                    $i = 1;
                                    while($row = mysqli_fetch_array($query)) {
                                        $id = $row['id'];
                                        $company = $row['company'];
                                        $start = $row['start'];
                                        $end = $row['end'];       
                                        $position = $row['position'];
                                        $duty = $row['duty'];
                                        $duty = str_replace( '\r\n', '', $duty);
                            ?>
                            
                            <div class="section-body">
                                <div class="details">
                                    <div class="title"><?php echo $company;?></div>
                                    <div class="subtitle"><span><?php echo $position;?></span></div>
                                    <p> <?php echo $duty;?></p>
                                </div>
                                <div class="period">
                                    <p><?php echo $start;?> <strong>||</strong> <?php echo $end;?></p>
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
            
            <h1 class="skills">Skills</h1>

            <div class="fast-payment">
                <div class="badges">

                    <?php
                        $query = mysqli_query($con, "SELECT * FROM skill WHERE username = '$username'");
                        if(mysqli_num_rows($query)>0) {
                            $i = 1;
                            while($row = mysqli_fetch_array($query)) {
                                $id = $row['id'];
                                $skill = $row['skill'];
                                $level = $row['level'];
                    ?>
                
                    <div class="badge">
                        <div>
                            <h5><?php echo $skill;?></h5>
                            <h5><?php echo $level;?></h5>
                        </div>
                    </div>

                    <?php
                        $i++;
                            }
                        }
                    ?>

                </div>
            </div>    

            <div class="container-cover">
                
                <div class="bottom-elements" style="margin-bottom: 10px;">
                    <a href="signup.php?section=employer" class="btn">Hire</a>
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