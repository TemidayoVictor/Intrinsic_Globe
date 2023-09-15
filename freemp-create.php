<?php
ob_start();
$page = "freemp-create";

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
    header('location: freemp-account.php');
    ob_end_flush();
}

else {

}

if(isset($_SESSION['msgFreeEmp4'])) {
    $msg4 = $_SESSION['msgFreeEmp4'];
    $msgClass4 = $_SESSION['msgClassFreeEmp4'];
}
else {
    $msg4 = "";
    $msgClass4 = "";
}

if(isset($_SESSION['msgDisplayFreeEmp'])) {
    $msgDisplay = $_SESSION['msgDisplayFreeEmp'];
}
else {
    $msgDisplay = "Create New Job";
}

$query = mysqli_query($con, "SELECT * FROM freelanceemployers WHERE username = '$username'");
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
    <script src="https://cdn.tiny.cloud/1/t87rwwndacrt9grg1jwlnfaxaabxw3cxj77od5l8m4dhkcox/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/account7.css" rel="stylesheet" type="text/css">
    <title>Intrinsic Globe | Create Job</title>
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
                <h1>Update your Work requirement and preferences to get offers tailored just for you.</h1>
                <h2 style="color: #3aaa35;">Create a Job</h2>
            </div>
            
            <div class="container-cover">
                <div class="container active selected" style="margin-top: -10px;" id="1">
                    <div class="body">
                        <form action="phpFiles/includes/signup-freelanceemp.php" method="post" enctype="multipart/form-data">
                            <div class="section">
                                <p class="heading"><strong><?php echo $msgDisplay;?></strong></p>
                                <?php if($msg4 != ""): ?>
                                    <div class="msg-width <?php echo $msgClass4;?>"><?php echo $msg4;?></div>
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
                                        <div class="title label">Job Title</div>
                                        <input type="text" class="input" name="job" placeholder="Job Title" value="<?php echo isset($_SESSION['job']) ? $_SESSION['job'] :  ""; ?>" required>
                                    </div>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title label">Job Requirements</div>
                                        <textarea style="border: 1px solid #aaa; background: #eee; height: 200px;" class="input" name="description" id="" required><?php echo isset($_SESSION['description']) ? $_SESSION['description'] : ""; ?></textarea>
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Add Sample File (optional)</div>
                                        <input type="file" name="sample" style="padding: 10px 0; border: none;">
                                    </div>
                                </div>

                                <div class="section-body naira" id="ngn">
                                    <div class="details">
                                        <div class="title label">Budget for this GIG (Select Currency)</div>
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
                                        <div class="title label">Budget for this GIG (Home Currency)</div>
                                        <div>
                                            <select name="price1" class="input" id="">
                                                <option value="">Select Budget</option>
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
                                        <div class="title label">Budget for this GIG (Dollar)</div>
                                        <div>
                                            <select name="price2" class="input" id="">
                                                <option value="">Select Budget</option>
                                                <option value="Below $50,000">Below $50,000</option>
                                                <option value="$50,000- $100,000">$50,000 - $100,000</option>
                                                <option value="$100,000 - $200,000">$100,000 - $200,000</option>
                                                <option value="above $200,000">above $200,000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-box">
                                    <input type="text" name="track-freeEmp" value="track3" hidden>
                                </div>
                            </div>

                            <div class="container-cover">
                                <div class="bottom-elements" style="margin-bottom: 40px;">
                                    <div class="bottom-elements">
                                        <a href="freemp-created-jobs.php" class="btn">Active Jobs</a>
                                    </div>
                                    <input type="submit" class="btn" value="Create Job">
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
    <!--<script>
        tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
  </script>-->
    <script src="js/dashboard2.js"></script>
</body>
</html>