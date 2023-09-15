<?php
ob_start();
session_start();
if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

if(isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    $msgClass = $_SESSION['msgClass'];
}
else {
    $msg = "";
    $msgClass = "";
}

if(!empty($_GET['section'])) {
    $_SESSION["signupSection"] = $_GET['section'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/signup.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Sign Up</title>
    <style>
        html {
                font-size: 62.5%;
        }

        .input-box input,
        textarea{
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        .msg-width {
            color: #000;
            padding: 10px;
            font-weight: 600;
            font-size: 1.7rem;
        }
        .msg-width.alert-danger {
            color: orangered;
            
        }
        .msg-width.alert-success {
            color: rgb(4,4,58);
        }

        label a {
            text-decoration: none;
        }

        label a:hover {
            text-decoration: underline;
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
    

    <div class="container">
        <div class="forms">

            <!--Registration form -->

            <div class="form signup">
                <span class="title" style="font-size: 2.5rem;">Create Account</span>

                <center>
                    <div class="">

                    <?php if($msg != ""): ?>
                    <div class="msg-width <?php echo $msgClass;?>">
                    <?php echo $msg;?>
                    </div>
                    <?php endif;?>

                    </div>
                </center>
                
                <form action="phpFiles/includes/signup.php" method="post">
                    <div class="input-field">
                        <input type="text" style="font-size: 1.65rem;" name="username" placeholder="Create Username" required>
                        <i class="fas fa-user" style="font-size: 1.7rem;"></i>
                    </div>
                    <div class="input-field">
                        <input type="email" name="email" style="font-size: 1.65rem;" placeholder="Enter Your Email" required>
                        <i class="fas fa-envelope icon" style="font-size: 1.7rem;"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" style="font-size: 1.65rem;" class="password" placeholder="Enter Your Password" required>
                        <i class="fas fa-lock icon" style="font-size: 1.7rem;"></i>
                        <i class="fas fa-eye-slash showHidePw" style="font-size: 1.7rem;"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="confirmPassword" style="font-size: 1.65rem;" class="password" placeholder="Confirm Password" required>
                        <i class="fas fa-lock icon" style="font-size: 1.7rem;"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="signCheck" required>
                            <label for="signCheck" style="font-size: 1.5rem;" class="text"><a href="tandc.php">I accept all terms and conditions</a></label>
                        </div>                        
                    </div>

                    <div class="input-field button">
                        <input type="submit" style="font-size: 1.5rem;" value="Sign Up">
                    </div>

                </form>

                <div class="login-signup">
                    <span class="text" style="font-size: 1.5rem;">Have an Account?
                        <a href="login.php" style="font-size: 1.5rem;" class="text login-link">Login now</a>
                    </span>
                </div>
            </div>

        </div>
    </div>

    <script src="js/script6.js"></script>
</body>
</html>