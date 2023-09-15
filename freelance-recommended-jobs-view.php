<?php
ob_start();
$page = "freelance-recommended";

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
$_SESSION['track-freelancer'] = 1;
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
    $state1 = "none";
    $state2 = "";
    $results = mysqli_fetch_all($query2, MYSQLI_ASSOC);
    foreach ($results as $result) {
        $cover = $result['coverLetter'];
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
    $state2 = "none";
    $state1 = "";
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
    <script src="https://cdn.tiny.cloud/1/t87rwwndacrt9grg1jwlnfaxaabxw3cxj77od5l8m4dhkcox/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/job-details3maxxx.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Recommended Jobs</title>
    <style>        
            a.logo img {
                width: 70%;
            }
            html {
                font-size: 52.5%;
                scroll-behavior: smooth;
            }
            .msg-width {
                padding: 20px;
                font-size: 15px;
                border-radius: 5px;
                margin-bottom: 10px;
            }
            .alert-success{
                color: #fff;
                background: rgb(11, 156, 48);
                
            }
            .alert-danger {
                color: #fff;
                background: red;
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
                        <p><span>Created on:</span> <?php echo $created;?></p>
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


            <form action="phpFiles/includes/signup-freelance.php" method="post" enctype="multipart/form-data" class="container-cover" id="1">
                
                <div class="container active selected">
                    <div class="body">
                        <p class="heading"><strong>Application Form</strong></p>
                    </div>
                    <div style="display: <?php echo $state2;?>" class="msg-width alert-success">Your Application has been Sucessfully Sent</div>    
                    <div class="body" >
                        <p class="heading" style="border-color:transparent">How Much Do You Bid?</p>
                        <input style="margin-top:0px; padding: 10px 15px; display: inline-block; width: 100%; border-radius:5px; border: 1px solid #aaa; font-family: 'poppins', sans-serif; font-size: 17px;" type="number" name="bid" placeholder="Bid" value="<?php echo isset($_SESSION['bid']) ? $_SESSION['bid'] : ""; ?>" required>
                    </div>
                    <div class="body">
                        <p class="heading">Add Cover Letter</p>
                        <textarea name="cover" type="text" style="background-color: #eee; font-size:17px; padding:15px; width:100%; height: 200px; border: 2px solid #eee;"></textarea>
                    </div>
                    <div class="section-body">
                        <div class="details">
                            <div class="title" style="font-size: 16px; line-height: 1.7;">Add document to support application (optional)</div>
                            <input type="file" name="support" style="padding: 10px 0; border: none;">
                        </div>
                    </div>

                    <div class="input-box">
                        <input type="text" name="track" value="track5" hidden>
                    </div>

                    <div class="bottom-elements" style="margin-bottom: 40px;">
                        <input type="submit" class="btn" style="display: <?php echo $state1;?>" value="Apply">
                        <a href="freelance-applications.php" style="display: <?php echo $state2;?>" class="btn">View All Applications</a>
                    </div>
                    <small style="font-size: 15px; line-height: 1.7; color: #011033"> Its is imperative to know that coupled with this cover letter, the employer will have access to view your personal details, work details and other details you submitted via this platform upon completion of application</small>

                </div>

            </form>
            
            <div class="container-cover" style="border-bottom: 3px solid #ccc;">
                
            </div>

            
        </section>

    </main>
    <?php include 'phpFiles/utilities/footer2.php';?>
    
    <script src="js/dashboard2.js"></script>
</body>
</html>