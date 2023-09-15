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


$query2 = mysqli_query($con, "SELECT * FROM education WHERE username = '$username'");
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
                font-size: 52.5%;
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
                <h1>Please fill in details of your Educational Background.</h1>
                <h2 style="color: #3aaa35;">Section : 3/4</h2>
            </div>
            <div class="container-cover">
                <div class="container active selected" id="3">
                    <div class="body">
                        <!--<div class="body-head">
                            <p class="heading head2"><strong>Executive Brief</strong></p>
                            <small> <span>Current Pay range: </span>$250/yr </small>
                        </div>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio exercitationem at est, veritatis labore corrupti natus laboriosam et soluta possimus tempora placeat eius expedita. Aspernatur ipsam consequatur at corporis fugiat? </p>-->
                        <form action="phpFiles/includes/signup-candidate.php" method="post">
                            <div class="section">
                                <p class="heading"><strong>User Educational Background</strong></p>
                                <?php if($msg5 != ""): ?>
                                    <div class="msg-width <?php echo $msgClass5;?>"><?php echo $msg5;?></div>
                                <?php endif;?>
                                
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
                                        <div class="title" style="font-size: 2rem;"><?php echo $institution;?></div>
                                        <div class="subtitle" style="font-size: 1.8rem;"><span style="font-size: 1.8rem;"><?php echo $level;?>: </span> <?php echo $course;?></div>
                                        <div class="bottom-elements" style="margin-bottom: 40px; margin-top: 10px;">
                                            <a href="phpFiles/includes/delete.php?id2=<?php echo $id;?>" class="btn delete">Delete Education</a>
                                        </div>
                                    </div>
                                    <div class="period">
                                        <p style="font-size: 2rem;"><?php echo $start;?> || <?php echo $end;?></p>
                                    </div>
                                </div>

                                <?php
                                    $i++;
                                        }
                                    }
                                ?>

                                <div class="title-add"> 
                                    <h1><?php echo $msgDisplay;?></h1>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label"> Name of Institution</div>
                                        <input type="text" name="school1" class="input" placeholder="Institution">
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">From</div>
                                        <input type="month" name="start1" class="input" placeholder="">
                                    </div>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title label">Till</div>
                                        <input type="month" name="end1" class="input" placeholder="">
                                    </div>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title label">Discipline</div>
                                        <input type="text" name="course" class="input" placeholder="Discipline">
                                    </div>
                                </div>
                                
                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Qualification</div>
                                        <div>
                                            <select name="qualification" class="input" id="">
                                                <option value="">Choose Qualification</option>
                                                <option value="SSCE">SSCE</option>
                                                <option value="B.Sc">B.Sc</option>
                                                <option value="B.Eng">B.Eng</option>
                                                <option value="MBA">MBA</option>
                                            </select>
                                        </div>
                                
                                    </div>
                                </div>

                                <div class="input-box">
                                    <input type="text" name="track" value="track5" hidden>
                                </div>

                            </div>

                            <div class="container-cover">
                                <div class="bottom-elements" style="margin-bottom: 40px;">
                                    <div class="bottom-elements">
                                        <a href="candidates-work-profile2.php" class="btn" style="margin-right: 5px;">Prev</a>
                                        <a href="candidates-work-profile4.php" class="btn">Next</a>
                                    </div>
                                    <input type="submit" class="btn" value="Add Education">
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