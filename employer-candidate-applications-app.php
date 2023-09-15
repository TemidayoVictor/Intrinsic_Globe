<?php
ob_start();
$page = "employer-application";

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

$employer = $_SESSION['usernameUse'];
$status = $_SESSION['status'];

$date = date('Y/m/d');
$todaystime = date('Y-m-d', strtotime($date.'now'));

if(!empty($_GET['username'])) {
    $username = $_GET['username'];
    $_SESSION['usernameCandidate'] = $username;
}

elseif(empty($_GET['username']) && !empty($_SESSION['usernameCandidate'])) {
    $username = $_SESSION['usernameCandidate'];
}

else {
    header("location: login.php");
    ob_end_flush();
}

$companyId = $_SESSION['idCompany'];

$hide = "-------";

$userData = $controller->searchDbContr($username, 'username', 'users');
$id = $userData['id'];
$email = $userData['email'];
$firstName = $userData['firstName'];
$lastName = $userData['lastName'];
$address = $userData['address'];
$phone = $userData['phone'];
$picture = $userData['picture'];
$about = $userData['about'];
$city = $userData['city'];
$gender = $userData['gender'];
$country = $userData['country'];
$about = str_replace( '\r\n', '', $about);

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
    $level = "";
    $course = "";
}

$query = mysqli_query($con, "SELECT * from application WHERE candidate = '$username' AND company = '$employer' AND companyId = '$companyId'");
if(mysqli_num_rows($query)>0){
    $state1 = "none";
    $state2 = "";
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    foreach($results as $result) {
        $cover = $result['coverLetter'];
        $cover = str_replace( '\r\n', '', $cover);
    }
}
else {
    $state2 = "none";
    $state1 = "";
}

$query3 = mysqli_query($con, "SELECT * FROM paymentcandidates WHERE paidBy = '$employer' AND paidFor = '$username'");
if(mysqli_num_rows($query3)>0) {
    $status = "paid";
}
else {
    $status = "unpaid";
}


$query5 = mysqli_query($con, "SELECT * from subscription WHERE username = '$employer'");
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
    <script src="https://cdn.tiny.cloud/1/t87rwwndacrt9grg1jwlnfaxaabxw3cxj77od5l8m4dhkcox/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/profile3maxxx.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | All Candidates</title>
    <style>        
            a.logo img {
                width: 70%;
            }
            html {
                font-size: 52.5%;
                scroll-behavior: smooth;
            }
            .btn.btn2 {
                background-color: orangered !important;
            }
            .btn.btn2:hover {
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
    


    <?php include 'phpFiles/utilities/header3.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside3.php';?>
        <section class="middle">
            <div class="profile-pic">
                <img src="recruitimages/<?php echo $picture;?>" alt="">
            </div>


            <div class="container-cover">
                <div class="topmost">
                    <div class="job-title">
                        <h1><?php if($status == "paid") {echo $firstName .' '. $lastName;} else echo $hide;?></h1>
                        <div class="details">
                            <p><?php echo $level.': '.$course;?></p>
                            <p><?php echo $jobTitle;?></p>
                        </div>
                    </div>
                    <div class="timeframe">
                        <p><span>Email:</span> <?php if($status == "paid") {echo $email;} else echo $hide;?></p>
                        <p><span>Phone:</span> <?php if($status == "paid") {echo $phone;} else echo $hide;?></p>
                        <p><span>Location:</span> <?php echo $city.' '. $address .', '. $country;?></p>
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
            
            <h1 class="skills" id="skill">Skills</h1>

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
                
                <div class="container active selected">
                    <div class="body">
                        <p class="heading"><strong>Candidate's Application Details</strong></p>
                        <p style="border-bottom: 2px solid #ccc; padding-bottom: 10px;"> <?php echo $cover;?></p>
                    </div>
                    <!--<div class="bottom-elements" style="margin-top: 10px; ">
                        <a href="#" class="btn">Edit Work Profile</a>
                        <a href="#" class="btn" style="background-color: orangered">Withdraw Application</a>
                    </div>-->
                </div>

            </div>

            <div class="container-cover">
                
                <div class="bottom-elements">
                    <a href="phpFiles/payment-interface.php?usernameCandidate=<?php echo $username;?>" style="display: <?php if($status == "paid") echo "none"; ?>" class="btn">Make Payment</a>
                </div>

            </div>

            <div class="container-cover" style="border-bottom: 3px solid #ccc; display: <?php if($status != "paid") echo "none"; ?>">
                <div class="bottom-elements" style="margin-bottom: 40px;">
                    <a style="display: <?php echo $state1;?>" href="phpFiles/includes/shortlist.php?company=<?php echo $employer;?>&candidate=<?php echo $username;?>&companyId=<?php echo $companyId;?>" class="btn">Shortlist Candidate</a>
                    <a style="display: <?php echo $state2;?>" href="phpFiles/includes/delete.php?company=<?php echo $employer;?>&candidate=<?php echo $username;?>&companyId=<?php echo $companyId;?>" class="btn btn2">Withdraw Shortlist</a>
                </div>
            </div>

     
            
        </section>

    </main>
    <?php include 'phpFiles/utilities/footer2.php';?>
    
    <script src="js/dashboard2.js"></script>
</body>
</html> 