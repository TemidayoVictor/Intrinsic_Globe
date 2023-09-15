<?php
ob_start();
$page = "employer-create";

if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}
include 'phpFiles/classes-upper.php';
include 'phpFiles/includes/check-login-employer.php';
include 'phpFiles/includes/connect.php';

$controller = new Controller();
$view = new View();

$_SESSION['track-employer'] = 1;

$username = $_SESSION['usernameUse'];
$status = $_SESSION['status'];
if(isset($_SESSION['msgEmployer4'])) {
    $msg4 = $_SESSION['msgEmployer4'];
    $msgClass4 = $_SESSION['msgClassEmployer4'];
}
else {
    $msg4 = "";
    $msgClass4 = "";
}

if($status == 'undone') {
    header('location: employer-accounts.php');
    ob_end_flush();
}

else {

}

$query = mysqli_query($con, "SELECT * FROM recruitmentemployers WHERE username = '$username'");
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
            #ngn:checked ~ .naira {
                display:block
            }
            
            #usd:checked ~ .dollar {
                display:block
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

    <?php include 'phpFiles/utilities/header3.php'?>

    <main>
        <?php include 'phpFiles/utilities/aside3.php';?>
        <section class="middle">

            <div class="title-add" style="display: <?php echo $showMessage;?>"> 
                <h1>Update your work requirement and preferences to get offers tailored just for you.</h1>
                <h2 style="color: #3aaa35;">Create a Job</h2>
            </div>

            <div class="container-cover">
                <div class="container active selected" style="margin-top: -10px;" id="1">
                    <div class="body">
                        <form action="phpFiles/includes/signup-employer.php" method="post">
                            <div class="section">
                                <p class="heading"><strong>Create New Job</strong></p>
                                <?php if($msg4 != ""): ?>
                                    <div class="msg-width <?php echo $msgClass4;?>"><?php echo $msg4;?></div>
                                <?php endif;?>
                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Choose Job Category</div>
                                        <div>
                                            <select name="category" id="category" class="input" id="">
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
                                        <div class="title label">Choose sub-category</div>
                                        <div>
                                            <select name="sub" id="sub-cat" class="input">
                                                <option value="banking">Banking</option>
                                            </select>
                                        </div>
                            
                                    </div>
                                </div>
                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Job Title</div>
                                        <input type="text"name="job" class="input" placeholder="Job Title" required>
                                    </div>
                                </div>
                                
                                <div class="section-body naira" id="ngn">
                                    <div class="details">
                                        <div class="title label">Salary Range (Select Currency)</div>
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
                                        <div class="title label">Salary Range Range (Home Currency)</div>
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
                                        <div class="title label">Salary Range Range (Dollar)</div>
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

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Job Type</div>
                                        <div>
                                            <select name="type" class="input" id="">
                                                <option value="Permanent">Permanent</option>
                                                <option value="Temporary">Temporary</option>
                                                <option value="Task Based">Task Based</option>
                                            </select>
                                        </div>
                                
                                    </div>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title label">Qualifications / Skills required</div>
                                        <textarea style="border: 1px solid #aaa; background: #eee; height: 200px;" class="input" name="qualification"></textarea>
                                    </div>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title label">Job Responsibilities</div>
                                        <textarea style="border: 1px solid #aaa; background: #eee; height: 200px;" class="input" name="responsibilities"></textarea>
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Closing date for this application</div>
                                        <input type="date" name="close" placeholder="Close" class="input" value="">
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title label">Job Location [City, State, Country]</div>
                                        <input type="text" name="location" placeholder="City, State, Country " class="input" required>
                                    </div>
                                </div>
                                
                                <div class="input-box">
                                    <input type="text" name="track" value="track3" hidden>
                                </div>

                            </div>

                            <div class="container-cover">
                                <div class="bottom-elements" style="margin-bottom: 40px;">
                                    <a href="#" class="btn" style="background:transparent; color:transparent">Edit Details</a>
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
    
    <script src="js/dashboard2.js"></script>
</body>
</html>