<?php
ob_start();
$page = "candidates-work";

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

$_SESSION['track-candidate'] = 1;

$username = $_SESSION['usernameUse'];
$status = $_SESSION['status'];

if($status == 'undone') {
    header('location: candidates-account.php');
    ob_end_flush();
}

else {

}

if(isset($_SESSION['msgPersonal3'])) {
    $msg3 = $_SESSION['msgPersonal3'];
    $msgClass3 = $_SESSION['msgClassPersonal3'];
}
else {
    $msg3 = "";
    $msgClass3 = "";
}

if(isset($_SESSION['msgPersonal4'])) {
    $msg4 = $_SESSION['msgPersonal4'];
    $msgClass4 = $_SESSION['msgClassPersonal4'];
}
else {
    $msg4 = "";
    $msgClass4 = "";
}

if(isset($_SESSION['msgPersonal5'])) {
    $msg5 = $_SESSION['msgPersonal5'];
    $msgClass5 = $_SESSION['msgClassPersonal5'];
}
else {
    $msg5 = "";
    $msgClass5 = "";
}

if(isset($_SESSION['msgPersonal6'])) {
    $msg6 = $_SESSION['msgPersonal6'];
    $msgClass6 = $_SESSION['msgClassPersonal6'];
}
else {
    $msg6 = "";
    $msgClass6 = "";
}

if(isset($_SESSION['msgDisplay'])) {
    $msgDisplay = $_SESSION['msgDisplay'];
}
else {
    $msgDisplay = "Add Educational Background [Begin with highest qualification]";
}

if(isset($_SESSION['msgDisplay2'])) {
    $msgDisplay2 = $_SESSION['msgDisplay2'];
}
else {
    $msgDisplay2 = "Add Work Experience";
}

if(isset($_SESSION['msgDisplay3'])) {
    $msgDisplay3 = $_SESSION['msgDisplay3'];
}
else {
    $msgDisplay3 = "Add a Skill";
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
$city = $userData['city'];
$_SESSION['prevPic'] = $picture;


/*$query = mysqli_query($con, "SELECT * FROM jobs WHERE username = '$username'");
if(mysqli_num_rows($query)> 0) {
    $display = "";
    $userData2 = $controller->searchDbContr($username, 'username', 'jobs');
    $id = $userData2['id'];
    $jobTitle = $userData2['jobTitle'];
    $salary = $userData2['salary'];
    $category = $userData2['category'];
    $subCategory = $userData2['subCategory'];
    $jobType = $userData2['jobType'];
    $showMessage = "none";    
}
else {
    $jobTitle = "";
    $display = "none";
    $showMessage = "";
}*/

$query2 = mysqli_query($con, "SELECT * FROM experience WHERE username = '$username'");
if(mysqli_num_rows($query2)> 0) {
    $showMessage = "none";
}

else {
    $showMessage = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/account6max.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Work Profile</title>
    <style>        
            * {
                transition: all .3s linear;
            }
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

            body {
                scroll-behavior: smooth;
                transition: all .3s ease;
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
    


    <?php include 'phpFiles/utilities/header2.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside.php';?>
        <section class="middle">

            <div class="title-add" style="display: <?php echo $showMessage;?>"> 
                <h1>Please fill your Work Experience Details.</h1>
                <h2 style="color: #3aaa35;">Section : 2/4</h2>
            </div>
            <div class="container-cover">
                <div class="container active selected" id="2">
                    <div class="body">
                        
                        <form action="phpFiles/includes/signup-candidate.php" method="post">
                            <div class="section">
                                <p class="heading"><strong>User Work Experience</strong></p>
                                <?php if($msg4 != ""): ?>
                                    <div class="msg-width <?php echo $msgClass4;?>"><?php echo $msg4;?></div>
                                <?php endif;?>
                                
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
                                ?>
                                <div class="section-body">
                                    <div class="details">
                                        <div class="title"><?php echo $company;?></div>
                                        <div class="subtitle"><span><?php echo $position;?></span></div>
                                        <p style="font-size: 2rem;"> <?php echo $duty;?> </p>
                                        <div class="bottom-elements" style="margin-bottom: 40px;">
                                            <a href="phpFiles/includes/delete.php?id3=<?php echo $id;?>" class="btn delete">Delete Work Experience</a>
                                        </div>
                                    </div>
                                    <div class="period">
                                        <p style="font-size: 2rem;"><?php echo $start;?> <strong>||</strong> <?php echo $end;?></p>
                                    </div>
                                </div>

                                <?php
                                    $i++;
                                        }
                                    }
                                ?>
                                <div class="title-add"> 
                                    <h1><?php echo $msgDisplay2;?></h1>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Company / Institution Name</div>
                                        <input type="text" name="company" class="input" placeholder="Company/Institution">
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Position Held</div>
                                        <input type="text" name="position" class="input" placeholder="Position Held" required>
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">From</div>
                                        <input type="month" name="start2" class="input" >
                                    </div>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title label">Till</div>
                                        <input type="month" name="end2" class="input" >
                                    </div>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title label">Discuss your roles, duties and accomplishments</div>
                                        <textarea type="number" name="duty" style="border: 1px solid #aaa; background: #eee; height: 200px;" class="input" placeholder=""></textarea>
                                    </div>
                                </div>

                                <div class="input-box">
                                    <input type="text" name="track" value="track4" hidden>
                                </div>
                            </div>

                            <div class="container-cover">
                                <div class="bottom-elements" style="margin-bottom: 40px;">
                                    <div class="bottom-elements">
                                        <a href="candidates-work-profile1.php" class="btn" style="margin-right: 5px;">Prev</a>
                                        <a href="candidates-work-profile3.php" class="btn">Next</a>
                                    </div>
                                    
                                    <input type="submit" class="btn" value="Add Work Experience">
                                </div>
                            </div>

                        </form>
                        
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