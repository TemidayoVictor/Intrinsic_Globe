<?php
ob_start();
$page = "candidates-account";

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include '../phpFiles/classes-upper.php';
include 'phpFiles/check-login-admin.php';
include '../phpFiles/includes/connect.php';

$controller = new Controller();
$view = new View();

$_SESSION['track-candidate'] = 1;

$username = $_SESSION['usernameUse'];


if(isset($_SESSION['msgCat'])) {
    $msg = $_SESSION['msgCat'];
    $msgClass = $_SESSION['msgClassCat'];
}
else {
    $msg = "";
    $msgClass = "";
}

if(isset($_SESSION['msgnewCat'])) {
    $msgnew = $_SESSION['msgnewCat'];
}
else {
    $msgnew = "Add new Category";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../css/account6max.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Add  Category</title>
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

            body {
                scroll-behavior: smooth;
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
    


    <?php include '../phpFiles/utilities/header6.php'?>

    <main>
        <?php include '../phpFiles/utilities/aside6.php';?>
        <section class="middle">
            <div class="container-cover">
                
                <div class="container active selected" style="margin-top: -10px;"  id="1">
                    <div class="body">
                        
                        <form action="phpFiles/categories.php" method="post" enctype="multipart/form-data">
                            <div class="section">
                                <p class="heading"><strong><?php echo $msgnew;?></strong></p>
                                <?php if($msg != ""): ?>
                                    <div class="msg-width <?php echo $msgClass;?>"><?php echo $msg;?></div>
                                <?php endif;?>
                            
                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Category Name</div>
                                        <input type="text" name="cat" class="input" placeholder="Category Name" required>
                                    </div>
                                </div>

                                <div class="input-box">
                                    <input type="text" name="track" value="track1" hidden>
                                </div>
                            </div>
                            <div class="container-cover">
                                <div class="bottom-elements" style="margin-bottom: 40px;">
                                    <a href="#" class="btn" style="background:transparent; color:transparent"></a>
                                    <input type="submit" class="btn" value="Add Category">
                                </div>
                            </div>

                        </form>
                        
                    </div>
                    
                </div>

                
            </div>
            <div class="container-cover">
                
                <div class="container active selected" style="margin-top: -10px;"  id="1">
                    <div class="body">
                        
                        <form action="phpFiles/categories.php" method="post" enctype="multipart/form-data">
                            <div class="section">
                                <p class="heading"><strong>All Categories</strong></p>
                                <?php
                                    $query = mysqli_query($con, "SELECT * FROM categories");
                                    if(mysqli_num_rows($query)>0) {
                                        $i = 1;
                                        while($row = mysqli_fetch_array($query)) {
                                            $id = $row['id'];
                                            $category = $row['category'];      
                                ?>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title"><?php echo $category;?></div>
                                        <div class="bottom-elements" style="margin-bottom: 40px;">
                                            <a href="create-sub.php?cat=<?php echo $category;?>" class="btn">Add Sub</a>
                                            <a href="phpFiles/delete.php?id12=<?php echo $id;?>" class="btn delete">Delete</a>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    $i++;
                                        }
                                    }
                                ?>
                        </form>
                        
                    </div>
                    
                </div>

                
            </div>
            
        </section>

    </main>
    <?php include '../phpFiles/utilities/footer2.php';?>
    <script src="../js/dashboard.js"></script>
</body>
</html>