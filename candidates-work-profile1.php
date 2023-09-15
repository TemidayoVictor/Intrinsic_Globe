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

if(isset($_SESSION['msgWork'])) {
    $msg3 = $_SESSION['msgWork'];
    $msgClass3 = $_SESSION['msgClassWork'];
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
                                    <div class="bottom-elements">
                                        <a href="candidates-work-profile2.php" class="btn">Next</a>
                                    </div>
                                    <input type="submit" class="btn" value="Update Details">
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