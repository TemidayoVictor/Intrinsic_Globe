<?php
ob_start();
$page = "freemp-account";

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

$_SESSION['track-freelancerEmp'] = 1;
$username = $_SESSION['usernameUse'];
$status = $_SESSION['status'];

if($status == 'undone') {
    $showMessage = "";
}

else {
    $showMessage = "none";
}

if(isset($_SESSION['msgFreeEmp1'])) {
    $msg = $_SESSION['msgFreeEmp1'];
    $msgClass = $_SESSION['msgClassFreeEmp1'];
}
else {
    $msg = "";
    $msgClass = "";
}

if(isset($_SESSION['msgFreeEmp2'])) {
    $msg2 = $_SESSION['msgFreeEmp2'];
    $msgClass2 = $_SESSION['msgClassFreeEmp2'];
}
else {
    $msg2 = "";
    $msgClass2 = "";
}

if(isset($_SESSION['msgFreeEmp3'])) {
    $msg3 = $_SESSION['msgFreeEmp3'];
    $msgClass3 = $_SESSION['msgClassFreeEmp3'];
}
else {
    $msg3 = "";
    $msgClass3 = "";
}

$userData = $controller->searchDbContr($username, 'username', 'users');
$id = $userData['id'];
$email = $userData['email'];
$firstName = $userData['firstName'];
$lastName = $userData['lastName'];
$address = $userData['address'];
$city = $userData['city'];
$country = $userData['country'];
$phone = $userData['phone'];
$picture = $userData['picture'];
$about = $userData['about'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/account6max.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Account</title>
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
    


    <?php include 'phpFiles/utilities/header5.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside5.php';?>
        <section class="middle">
           
            <div class="title-add" style="display: <?php echo $showMessage;?>"> 
                <h1>Welcome <?php echo $username;?>, Fill in your personal details to start exploring the Intrinsic Globe  </h1>
                <h2 style="color: #3aaa35;">Account Settings</h2>
            </div>

            <div class="container-cover">
                
                <div class="container active selected" style="margin-top: -10px;" id="1">
                    <div class="body">
                        
                        <form action="phpFiles/includes/signup-freelanceemp.php" method="post">
                            <div class="section">
                                <p class="heading"><strong>User Personal Details</strong></p>
                                <?php if($msg != ""): ?>
                                    <div class="msg-width <?php echo $msgClass;?>"><?php echo $msg;?></div>
                                <?php endif;?>
                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">First Name</div>
                                        <input type="text" name="firstName" placeholder="First Name" class="input" value="<?php echo isset($_SESSION['firstName']) ? $_SESSION['firstName'] : $firstName ; ?>" required>
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Last Name</div>
                                        <input type="text" class="input" name="lastName" placeholder="Last Name" value="<?php echo isset($_SESSION['lastName']) ? $_SESSION['lastName'] : $lastName; ?>" required>
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">City</div>
                                        <input type="text" class="input" name="city" placeholder="City" value="<?php echo isset($_SESSION['city']) ? $_SESSION['city'] : $city; ?>" required>
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">State</div>
                                        <input type="text" class="input" name="state" placeholder="State" value="<?php echo isset($_SESSION['state']) ? $_SESSION['state'] : $address; ?>" required>
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Country</div>
                                        <div>
                                            <select name="country" id="country" class="input">
                                            <option value="">Select Country</option>
                                            <?php
                                                $query = mysqli_query($con, "SELECT * FROM country");
                                                if(mysqli_num_rows($query)>0) {
                                                    $i = 1;
                                                    while($row = mysqli_fetch_array($query)) {
                                                        $country = $row['nicename'];
                                                
                                            ?>
                                            <option value="<?php echo $country?>"><?php echo $country?></option>
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
                                        <div class="title label">Phone</div>
                                        <div id="phone">
                                                 
                                        </div>
                                    </div>
                                </div>


                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Gender</div>
                                        <div>
                                            <select name="Gender" class="input" id="">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="I Prefer not to Say">I Prefer not to Say</option>
                                            </select>
                                        </div>
                                
                                    </div>
                                </div>

                                <div class="input-box">
                                    <input type="text" name="track-freeEmp" value="track1" hidden>
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
                        <form action="phpFiles/includes/signup-freelanceemp.php" method="post">
                            <div class="section">
                                <p class="heading"><strong>User Account Details</strong></p>
                                <?php if($msg2 != ""): ?>
                                    <div class="msg-width <?php echo $msgClass2;?>"><?php echo $msg2;?></div>
                                <?php endif;?>
                                <?php if($msg3 != ""): ?>
                                    <div class="msg-width <?php echo $msgClass3;?>"><?php echo $msg3;?></div>
                                <?php endif;?>
                                
                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Change Email</div>
                                        <input type="email" name="email" class="input" value="<?php echo $email;?>">
                                    </div>
                                </div>

                                <div class="title label" style ="font-size: 20px; font-weight: 700; margin-bottom: 10px;">Change Password</div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title label">Old Password</div>
                                        <input type="password" name="oldPass" class="input">
                                    </div>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title label">New Password</div>
                                        <input type="password" name="newPass" class="input">
                                    </div>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title label">Retype Password</div>
                                        <input type="password" name="conNew" class="input">
                                    </div>
                                </div>

                                <div class="input-box">
                                    <input type="text" name="track-freeEmp" value="track2" hidden>
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

                
                
            </div>
            
        </section>

    </main>
    <?php include 'phpFiles/utilities/footer2.php';?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country').on('change', function() {
                var country = this.value;
                $.ajax({
                    url: "get-phone.php",
                    type: "POST",
                    data: {
                        country: country
                    },
                    cache: false,
                    success: function(result) {
                        $("#phone").html(result);
                    }
                });
            });
        });
    </script>
    <script src="js/dashboard2.js"></script>
</body>
</html>