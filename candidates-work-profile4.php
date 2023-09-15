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

$about = str_replace( '\r\n', '', $about);

if (!empty($about)) {
    $showRecommended = "";
}

else {
    $showRecommended = "none";
}


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


$query2 = mysqli_query($con, "SELECT * FROM skill WHERE username = '$username'");
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
    <script src="https://cdn.tiny.cloud/1/t87rwwndacrt9grg1jwlnfaxaabxw3cxj77od5l8m4dhkcox/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
                <h1>Please fill in your Executive Brief and Skills.</h1>
                <h2 style="color: #3aaa35;">Section : 4/4</h2>
            </div>

            <div class="container-cover">
                                
                <div class="container active selected" id="4">
                    <div class="body">
                        
                        <form action="phpFiles/includes/signup-candidate.php" method="post">
                            <div class="section">
                                <p class="heading"><strong>Profile Pitch & Skills</strong></p>
                                <?php if($msg6 != ""): ?>
                                    <div class="msg-width <?php echo $msgClass6;?>"><?php echo $msg6;?></div>
                                <?php endif;?>
                                <div class="title-add"> 
                                    <h1 style="font-weight: 600;">Say Something about yourself</h1>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <textarea name="about" style="border: 1px solid #aaa; background: #eee; height: 200px;" class="input" required><?php echo isset($_SESSION['about']) ? $_SESSION['about'] : $about; ?></textarea>
                                    </div>
                                </div>
                                
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
                                                <a href="phpFiles/includes/delete.php?id4=<?php echo $id;?>"> <i style="color:orangered; font-size: 20px;" class="fas fa-backspace btn delete"></i> </a>
                                            </div>
                                        </div>
                                        
                                        <?php
                                            $i++;
                                                }
                                            }
                                        ?>
                                    </div>
                                </div> 

                                <div class="title-add" style="margin-top: 10px;"> 
                                    <h1 style="font-weight: 600"><?php echo $msgDisplay3;?></h1>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title"> Skill</div>
                                        <input type="text" name="Skill" class="input" placeholder="Skill">
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title">How good are you?</div>
                                        <div>
                                            <select name="level" class="input" id="">
                                                <option value="Beginner">Beginner</option>
                                                <option value="Intermediary">Intermediary</option>
                                                <option value="Expert">Expert</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-box">
                                    <input type="text" name="track" value="track6" hidden>
                                </div>

                            </div>

                            <div class="container-cover">
                                <div class="bottom-elements" style="margin-bottom: 40px;">
                                    <div class="bottom-elements">
                                        <a href="candidates-work-profile3.php" class="btn" style="margin-right: 5px;">Prev</a>
                                        <a href="candidates-recommended-jobs.php" style="display: <?php echo $showRecommended;?>" class="btn">Recommended Jobs</a>
                                    </div>
                                    <input type="submit" class="btn" value="Update Profile">
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