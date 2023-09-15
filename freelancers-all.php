<?php
ob_start();
$page = "freelance";
if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

include 'phpFiles/classes-upper.php';
include 'phpFiles/includes/connect.php';

$controller = new Controller();
$view = new View();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link href="css/swiper-bundle.min.css" rel="stylesheet">
    <link href="css/freelancers-all3.css" rel="stylesheet" type="text/css">
    <title>Intrisic Globe | Freelancers</title>
    <style>
        .images {
            width: 20rem;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0,0,0,.2)
        } 
        a.logo img {
            width: 70%;
        }
        html {
            font-size: 55.5%;
        }
        .bottom-elements .pagination {
            display: flex;
            justify-content: flex-end;
        }

        .bottom-elements .pagination div {
            padding: 10px;
            border: 2px solid #d5d0d0;
            height: 40px;
            width: 40px;
            border-radius: 3px;
            display: flex;
            justify-content: center;
            background-color: #011033;
            color: #fff;
            margin: 0 5px;s
            cursor: pointer;
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
<body class="">
    

    <?php include 'phpFiles/utilities/header.php'?>


    <section id="home" class="home">
        <div class="swiper-container ">
            <div class="swiper-wrapper wrapper">
                <div class="swiper-slide slide" style="background-image:linear-gradient(rgba(9, 5, 54, 0.1), rgba(5, 4, 46, 0.1)), url('images/home-use.jpg'); no-repeat; background-size:cover; background-position: center">
                    <form action="freelancer.php" method="post">
                        <div class="content">

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
                            
                            <select name="sub" id="sub-cat" class="input">
                                                
                            </select>
                            <input type="submit" class="btn bttn" value="Search">
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
        
    </section>

    <section class="container-section">
        <div class="title" id="start">
            <h1>Top Freelancers</h1>
        </div>
        
        <div class="container-all">
            <?php
                $results_per_page = 9;
                if(!isset($_GET['pageId'])){
                    $page = '1';
                } 
                else {
                    $page = $_GET['pageId'];
                }

                $page_starting_limit = ($page - 1)*$results_per_page;

                $query = mysqli_query($con, "SELECT * FROM freelancejobs ");
                if(mysqli_num_rows($query)>0) {
                    $number_of_jobs = mysqli_num_rows($query);
                    $number_of_pages = ceil($number_of_jobs/$results_per_page);
                }
                else {
                    $number_of_jobs = 0;
                    $number_of_pages = 0;
                }
                $query = mysqli_query($con, "SELECT * FROM freelancejobs LIMIT $page_starting_limit , $results_per_page");
                if(mysqli_num_rows($query)>0) {
                    $i = 1;
                    while($row = mysqli_fetch_array($query)) {
                        $id = $row['id'];
                        $jobTitle = $row['jobTitle'];
                        $category = $row['category'];
                        $username = $row['username'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $query2 = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
                        if(mysqli_num_rows($query2)>0) {
                            $results = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                            foreach($results as $result) {
                                $picture = $result['picture'];
                            }
                        }
                        
            ?>

            <div class="container-in">
                <div class="image-box images">
                    <img src="freelanceimages/<?php echo $picture;?>" alt="">
                </div>
                
                <div class="heading">
                    <h1><?php echo $jobTitle;?></h1>
                </div>
                <div class="body">
                    <p><span>Starting Price:</span> <?php echo $price;?></p>
                    <p><span></span><?php echo $description;?></p>
                </div>
                <div class="ending">
                    <a href="signup.php?section=freelancerEmp" class="btn">view portfolio</a>
                </div>
            
            </div>

            <?php
                $i++;
                    }
                }
                else {
            ?>
            <div class="container active">
                <div class="body" style="border:none;">
                    <h1>No available Freelancers yet</h1>
                </div>
            </div>
            <?php
                }
            ?>

            <div class="bottom-elements">
                <a href="#" class="btn" style="display:none;">Apply for new jobs</a>
                <div class="pagination">
                <?php
                    for($i=1; $i<=$number_of_pages; $i++) {
                ?>
                    <a href="freemp-all-freelancers.php?pageId=<?php echo $i;?>"> <div><?php echo $i;?></div> </a>
                <?php
                }
                ?>
            </div>
        </div>
            
        </div>
    </section>


    <?php include 'phpFiles/utilities/footer.php'?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
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
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/index3.js"></script>

</body>
</html>