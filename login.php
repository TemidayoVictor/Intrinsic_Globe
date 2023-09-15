<?php 
session_start();
if(isset($_SESSION['login-msg'])) {
    $msg = $_SESSION['login-msg'];
    $msgClass = $_SESSION['login-msgClass'];
}
else {
    $msg = "";
    $msgClass = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/login-use.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Login</title>
    <style>
        html {
            font-size: 62.5%;
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
<body onload = "zoom()">
    

    <div class="container">
        <div class="forms">
            <div class="form login">
                <center>
                    <div class="">

                    <?php if($msg != ""): ?>
                    <div class="msg-width <?php echo $msgClass;?>">
                    <?php echo $msg;?>
                    </div>
                    <?php endif;?>

                    </div>
                </center>

                <span class="title" style="font-size: 2.5rem;">Login</span>
                <form action="phpFiles/includes/login.php" method="post">
                    <div class="input-field">
                        <input type="text" style="font-size: 1.65rem;" placeholder="Enter username" name="username" required>
                        <i class="fas fa-user icon" style="font-size: 1.7rem;"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" style="font-size: 1.65rem;" class="password" placeholder="Enter Your Password" name="password" required>
                        <i class="fas fa-lock icon" style="font-size: 1.7rem;"></i>
                        <i class="fas fa-eye-slash showHidePw" style="font-size: 1.7rem;"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" style="font-size: 1.5rem;" class="text">Remember me</label>
                        </div>

                        <a href="#" style="font-size: 1.5rem;" class="text">forgot password?</a>
                        
                    </div>

                    <div class="input-field button">
                        <input type="submit" style="font-size: 1.5rem;" name="login" value="Sign In">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text" style="font-size: 1.5rem;">Not a member?
                        <a href="index.php#start" style="font-size: 1.5rem;" class="text signup-link">Home</a>
                    </span>
                </div>
            </div>


            <!--Registration form -->

        </div>
    </div>

    <script src="js/script6.js"></script>
    <script type="text/javascript">
        function zoom() {
            dooument.body.style.zoom = "90%";
        }
    </script>
</body>
</html>