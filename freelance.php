<?php
$page = "freelance";

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
    <link href="css/freelance2.css" rel="stylesheet" type="text/css">
    <title>Intrisic Globe | Freelancing</title>
    <style>
        a.logo img {
                width: 70%;
            }
            
        html {
                font-size: 55.5%;
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
    
    <div class="segment" style="background-image:linear-gradient(rgba(255, 255, 254, 0.8), rgba(255, 255, 255, 0.8)), url('images/Home-10.jpg'); no-repeat; background-size:cover; background-position: center;">
        <div class="content">
            <h1>Freelancing</h1>
            <p class="heading"><span class="bod-bot" style="background:transparent">Do you have a GIG?</span></p>
            <p> By the year 2027, freelancers are projected to make up the majority of workers in the United States with 50.9% of the working population </p>
            <p> We help you get the best freelancer to handles your projects </p>
            <div class="buttons">
                <a href="signup.php?section=freelancerEmp"><button class="btn">Get Started</button></a>
                <a href="freelancers-all.php"><button class="btn">See Freelancers</button></a>
            </div>

            <p class="heading"><span class="bod-bot" style="background:transparent">Or are you a freelancer?</span></p>
            <p> In 2020, it was estimated that 35% of job openings required at least a bachelor's degree, 30% of job openings required some college or an associate degree and 36% of job openings required no education beyond high school. (George University Center on Education and Workforce 2020).</p>
            <p> Let employers contact you directly and get your dream job in no time!</p>
            <div class="buttons">
                <a href="signup.php?section=freelancer"><button class="btn">Get Started</button></a>
            </div>
        </div>

        <div class="image">
            <img src="images/teacher-6.png" alt="">
        </div>
    </div>    
    
        <section class="logo-slides">
        <div class="title">
                <h1>Our Work Speaks</h1>
        </div>    

        <div class="slider">
            <div class="slide-track">
                
                <div class="slide">
                    <img src="images/CASBig.png" height="100px" width="100px" alt="">
                </div>    

                <div class="slide">
                    <img src="images/Logos-01.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide">
                    <img src="images/Logos-03.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide">
                    <img src="images/Logos-04.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide">
                    <img src="images/Logos-05.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide">
                    <img src="images/Logos-01.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide">
                    <img src="images/Logos-03.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide">
                    <img src="images/Logos-04.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide">
                    <img src="images/Logos-05.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide">
                    <img src="images/CASBig.png" height="100px" width="100px" alt="">
                </div>
                <div class="slide">
                    <img src="images/cas.svg" height="100px" width="100px" alt="">
                </div>
                
            </div>
        </div>

    </section>

    <section class="word-banner">
        <h1>Get above the competition and get value</h1>
        <p>Whether you are an employer or job seeker, just register right here, and allow our system hook you up with just what you need to thrive in the career environment</p>
    </section>

    
    
    <?php include 'phpFiles/utilities/footer2.php'?>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/index3.js"></script>

</body>
</html>