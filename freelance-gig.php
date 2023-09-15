<?php
ob_start();
$page = "freelance-gig";

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

$_SESSION['track-freelancer'] = 1;
$username = $_SESSION['usernameUse'];
$status = $_SESSION['status'];

if($status == 'undone') {
    header('location: freelance-account.php');
    ob_end_flush();
}

else {

}

if(isset($_SESSION['msgFree4'])) {
    $msg4 = $_SESSION['msgFree4'];
    $msgClass4 = $_SESSION['msgClassFree4'];
}
else {
    $msg4 = "";
    $msgClass4 = "";
}

if(isset($_SESSION['msgFree5'])) {
    $msg5 = $_SESSION['msgFree5'];
    $msgClass5 = $_SESSION['msgClassFree5'];
}
else {
    $msg5 = "";
    $msgClass5 = "";
}

if(isset($_SESSION['msgFree3'])) {
    $msg3 = $_SESSION['msgFree3'];
    $msgClass3 = $_SESSION['msgClassFree3'];
}
else {
    $msg3 = "";
    $msgClass3 = "";
}

if(isset($_SESSION['msgDisplayFree2'])) {
    $msgDisplay2 = $_SESSION['msgDisplayFree2'];
}
else {
    $msgDisplay2 = "Add a Portfolio";
}

if(isset($_SESSION['msgGIG'])) {
    $msgGIG = $_SESSION['msgGIG'];
}
else {
    $msgGIG = "Create GIG";
}

$query = mysqli_query($con, "SELECT * FROM freelancejobs WHERE username = '$username'");
if(mysqli_num_rows($query)>0) {
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
    <link href="css/account7.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Freelance GIGS</title>
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
    


    <?php include 'phpFiles/utilities/header4.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside4.php';?>
        <section class="middle">
            
            <div class="title-add" style="display: <?php echo $showMessage;?>"> 
                <h1>Update your work profile to get offers tailored just for you.</h1>
                <h2 style="color: #3aaa35;">Add your GIG(s)</h2>
            </div>

            <div class="container-cover">            
                <div class="container active selected" style="margin-top: -10px;" id="1">
                    <div class="body">
                        <form action="phpFiles/includes/signup-freelance.php" method="post">
                            <div class="section">
                                <p class="heading"><strong>Create New GIG</strong></p>
                                <?php if($msg4 != ""): ?>
                                    <div class="msg-width <?php echo $msgClass4;?>"><?php echo $msg4;?></div>
                                <?php endif;?>
                                <?php
                                    $query = mysqli_query($con, "SELECT * FROM freelancejobs WHERE username = '$username'");
                                    if(mysqli_num_rows($query)>0) {
                                        $i = 1;
                                        while($row = mysqli_fetch_array($query)) {
                                            $id = $row['id'];
                                            $title = $row['jobTitle'];
                                            $price = $row['price'];
                                            $category = $row['category'];
                                            $subcategory = $row['subCategory'];
                                            $description = $row['description'];
                                            $description = str_replace( '\r\n', '', $description);
                                            
                                ?>
                                <div class="section-body">
                                    <div class="details">
                                        <div class="title"><?php echo $title;?></div>
                                        <div class="subtitle"><span><?php echo $category;?> ||</span> <?php echo $subcategory;?></div>
                                        <p style="font-size: 2rem;"> <?php echo $description;?> </p>
                                        <div class="bottom-elements" style="margin-bottom: 40px; margin-top: 10px;">
                                            <a href="phpFiles/includes/delete.php?id5=<?php echo $id;?>" class="btn delete">Delete GIG</a>
                                        </div>
                                    </div>
                                    <div class="period">
                                        <p style="font-weight: 400; font-size: 2rem;">Starting Price: <?php echo $price;?></p>
                                    </div>
                                </div>

                                <?php
                                    $i++;
                                        }
                                    }
                                ?>

                                <div class="title-add"> 
                                    <h1><?php echo $msgGIG;?></h1>
                                </div>
                   
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
                                        <div class="title label">Job Title</div>
                                        <input type="text" class="input" name="job" placeholder="Job Title" value="<?php echo isset($_SESSION['job']) ? $_SESSION['job']: ""; ?>" required>
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Add website URL to this GIG(optional)</div>
                                        <input type="text" class="input" name="url" placeholder="URL" value="<?php echo isset($_SESSION['url']) ? $_SESSION['url'] : ""; ?>">
                                    </div>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title label">Brief Describe what you will do for this GIG</div>
                                        <textarea style="border: 1px solid #aaa; background: #eee; height: 200px;" class="input" name="description"><?php echo isset($_SESSION['description']) ? $_SESSION['description'] : ""; ?></textarea>
                                    </div>
                                </div>

                                <div class="section-body naira" id="ngn">
                                    <div class="details">
                                        <div class="title label">Starting Price for this GIG (Select Currency)</div>
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

                                <div class="section-body" id="naira" style="display:none;">
                                    <div class="details">
                                        <div class="title label">Starting Price for this GIG (Home Currency)</div>
                                        <div>
                                            <select name="price1" class="input" id="">
                                                <option value="">Select Price</option>
                                                <option value="Below #50,000">Below #50,000</option>
                                                <option value="#50,000- #100,000">#50,000 - #100,000</option>
                                                <option value="#100,000 - #200,000">#100,000 - #200,000</option>
                                                <option value="above #200,000">above #200,000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="section-body" id="dollar" style="display:none;">
                                    <div class="details">
                                        <div class="title label">Starting Price for this GIG (Dollar)</div>
                                        <div>
                                            <select name="price2" class="input" id="">
                                                <option value="">Select Price</option>
                                                <option value="Below $50,000">Below $50,000</option>
                                                <option value="$50,000- $100,000">$50,000 - $100,000</option>
                                                <option value="$100,000 - $200,000">$100,000 - $200,000</option>
                                                <option value="above $200,000">above $200,000</option>
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
                                    <input type="submit" class="btn" value="Create GIG">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="container active selected" id="2">
                    <div class="body">
                        <form action="phpFiles/includes/signup-freelance.php" method="post">
                            <div class="section">
                                <p class="heading"><strong>Portfolio</strong></p>
                                <?php if($msg5 != ""): ?>
                                    <div class="msg-width <?php echo $msgClass5;?>"><?php echo $msg5;?></div>
                                <?php endif;?>
                                
                                <?php
                                    $query = mysqli_query($con, "SELECT * FROM freelanceportfolio WHERE username = '$username'");
                                    if(mysqli_num_rows($query)>0) {
                                        $i = 1;
                                        while($row = mysqli_fetch_array($query)) {
                                            $id = $row['id'];
                                            $titleP = $row['title'];
                                            $descriptionP = $row['description'];
                                ?>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title"><?php echo $titleP;?></div>
                                        <p> <?php echo $descriptionP;?> </p>
                                        <div class="bottom-elements" style="margin-bottom: 40px; margin-top: 10px;">
                                            <a href="phpFiles/includes/delete.php?id6=<?php echo $id;?>" class="btn delete">Delete Portfolio</a>
                                        </div>
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
                                        <div class="title label">Title</div>
                                        <input type="text" name="title" class="input" placeholder="Portfolo Title" required>
                                    </div>
                                </div>
                                
                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title label">Describe Project</div>
                                        <textarea type="number" name="project" style="border: 1px solid #aaa; background: #eee; height: 200px;" class="input" placeholder=""></textarea>
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Add web URL to this portfolio (optional)</div>
                                        <input type="text" name="porturl" class="input" placeholder="Portfolo URL">
                                    </div>
                                </div>

                                <div class="input-box">
                                    <input type="text" name="track" value="track4" hidden>
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