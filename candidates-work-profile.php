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
$about = str_replace( '\r\n', '', $about);
$city = $userData['city'];
$_SESSION['prevPic'] = $picture;


$query = mysqli_query($con, "SELECT * FROM jobs WHERE username = '$username'");
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
    <link href="css/account7.css" rel="stylesheet" type="text/css">
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
                <h1>Update your work profile to get offers tailored just for you.</h1>
                <h2 style="color: #3aaa35;">Section : 1/4</h2>
            </div>
            <div class="container-cover">

                <div class="container active selected" style="margin-top: -10px;" id="1">
                    <div class="body">
                        <!--<div class="body-head">
                            <p class="heading head2"><strong>Executive Brief</strong></p>
                            <small> <span>Current Pay range: </span>$250/yr </small>
                        </div>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio exercitationem at est, veritatis labore corrupti natus laboriosam et soluta possimus tempora placeat eius expedita. Aspernatur ipsam consequatur at corporis fugiat? </p>-->
                        <form action="phpFiles/includes/signup-candidate.php" method="post">
                            <div class="section">
                                <p class="heading"><strong>User Work Details</strong></p>
                                <?php if($msg3 != ""): ?>
                                    <div class="msg-width <?php echo $msgClass3;?>"><?php echo $msg3;?></div>
                                <?php endif;?>
                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Select Category</div>
                                        <div>
                                            <select name="category" id="category" class="input">
                                            <option value="">Select Category</option>
                                            <?php
                                                $query = mysqli_query($con, "SELECT * FROM categories");
                                                if(mysqli_num_rows($query)>0) {
                                                    $i = 1;
                                                    while($row = mysqli_fetch_array($query)) {
                                                        $category = $row['category'];
                                                
                                            ?>
                                            <option value="<?php echo $category?>"><?php echo $category?></option>
                                            <?php
                                            $i++;
                                                }
                                            }
                                    
                                            ?>
                                            </select>
                                        </div>
                                
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Select Sub-category</div>
                                        <div>
                                            <select name="sub" id="sub-cat" class="input">
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Job Title e.g Office Assistant</div>
                                        <input type="text" name="job" class="input" value="<?php echo isset($_SESSION['job']) ? $_SESSION['job'] : $jobTitle; ?>" required>
                                    </div>
                                </div>


                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Job Type</div>
                                        <div>
                                            <select name="type" class="input" id="">
                                                <option value="Permanent">Permanent</option>
                                                <option value="Temporary">Temporary</option>
                                                <option value="Contract">Contract</option>
                                            </select>
                                        </div>
                                
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Experience</div>
                                        <div>
                                            <select name="exp" class="input" id="">
                                                <option value="Under 1 year">Under 1 year</option>
                                                <option value="1 - 3 years">1 - 3 years</option>
                                                <option value="3 - 5 years">3 - 5 years</option>
                                                <option value="Above 5 years">Above 5 years</option>
                                            </select>
                                        </div>
                                
                                    </div>
                                </div>

                                <div class="section-body naira" id="ngn">
                                    <div class="details">
                                        <div class="title label">Yearly Income (Select Currency)</div>
                                        <div>
                                            <input type="radio" name="curr" style="background: blue;" id="ngn" onclick="currency(1)"> 
                                            <label style="font-size: 2rem; margin-left: 1rem;" for="ngn">Home Currency</label>
                                        </div>

                                        <div>
                                            <input type="radio" name="curr" style="background: blue;" id="usd" onclick="currency(2);">
                                            <label style="font-size: 2rem; margin-left: 1rem;" for="usd">Dollar</label>
                                        </div>
                                
                                    </div>
                                </div>


                                <div class="section-body naira" id="naira" style="display:none;">
                                    <div class="details">
                                        <div class="title label">Yearly Income Range (Home Currency)</div>
                                        <div>
                                            <select name="salary1" class="input" id="">
                                                <option value="">Select Range</option>
                                                <option value="Below #50,000">Below #50,000</option>
                                                <option value="#50,000 - #100,000">#50,000 - #100,000</option>
                                                <option value="#100,000 - #200,000">#100,000 - #200,000</option>
                                                <option value="Above #200,000">Above #200,000</option>
                                            </select>
                                        </div>
                                
                                    </div>
                                </div>

                                <div class="section-body dollar" id="dollar" style="display:none;">
                                    <div class="details">
                                        <div class="title label">Yearly Income Range (Dollar)</div>
                                        <div>
                                            <select name="salary2" class="input" id="">
                                                <option value="">Select Range</option>
                                                <option value="Below $50,000">Below $50,000</option>
                                                <option value="$50,000 - $100,000">$50,000 - $100,000</option>
                                                <option value="$100,000 - $200,000">$100,000 - $200,000</option>
                                                <option value="Above $200,000">Above $200,000</option>
                                            </select>
                                        </div>
                                
                                    </div>
                                </div>

                                <div class="input-box">
                                    <input type="text" name="track" value="track3" hidden>
                                </div>

                            </div>

                            <div class="container-cover">
                                <div class="bottom-elements" style="margin-bottom: 40px;">
                                    <a href="#" class="btn" style="background:transparent; color:transparent">Edit Details</a>
                                    <input type="submit" class="btn" value="Update Details">
                                </div>
                            </div>

                        </form>
                        
                    </div>
                    
                </div>

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
                                            <a href="phpFiles/delete.php?id3=<?php echo $id;?>" class="btn delete">Delete Work Experience</a>
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
                                    <a href="#" class="btn" style="background:transparent; color:transparent">Edit Details</a>
                                    <input type="submit" class="btn" value="Add Work Experience">
                                </div>
                            </div>

                        </form>
                        
                    </div>
                    
                </div>

                <div class="container active selected" id="3">
                    <div class="body">
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
                                    <a href="#" class="btn" style="background:transparent; color:transparent">Edit Details</a>
                                    <input type="submit" class="btn" value="Add Education">
                                </div>
                            </div>

                        </form>
                        
                    </div>
                    
                </div>
                
                <div class="container active selected" id="4">
                    <div class="body">
                        
                        <form action="phpFiles/includes/signup-candidate.php" method="post">
                            <div class="section">
                                <p class="heading"><strong>Profile Pitch / Skills</strong></p>
                                <?php if($msg6 != ""): ?>
                                    <div class="msg-width <?php echo $msgClass6;?>"><?php echo $msg6;?></div>
                                <?php endif;?>
                                <div class="title-add"> 
                                    <h1>Say Something about yourself</h1>
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
                                    <h1><?php echo $msgDisplay3;?></h1>
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
                                    <a href="#" class="btn" style="background:transparent; color:transparent">Edit Details</a>
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
    <script>
        function currency(e) {
            if(e==1) {
                document.getElementById('naira').style.display = "block";
                document.getElementById('dollar').style.display = "none";
            }
            else if(e==2) {
                document.getElementById('dollar').style.display = "block";
                document.getElementById('naira').style.display = "none";
            }
        }            
    </script>
    
    <script src="js/dashboard2.js"></script>
</body>
</html>