<?php

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
    <link href="css/index20.css" rel="stylesheet" type="text/css">
    <title>Intrisic Globe | Home</title>
    <style>
        a.logo img {
            width: 70%;
        }
            
        html {
            font-size: 55.5%;
        }
    
        .swiper-pagination-bullet-active {
            background: #3aaa35;
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
    

    <?php include 'phpFiles/utilities/header1.php'?>


    <!--<section id="home" class="home">
        <div class="swiper-container home-slider desktop">
            <div class="swiper-wrapper wrapper">
                <div class="swiper-slide slide" style="background-image:linear-gradient(rgba(9, 5, 54, 0.1), rgba(5, 4, 46, 0.1)), url('images/bg-4.jpg'); no-repeat; background-size:cover; background-position: center">
                    <div class="content">
                        <h3 class="first">We Bring Opportuni<span>t</span>ies</h3>
                        <span class="first">to <span>everyone,</span><br> Everywhere</span>
                    </div>
                </div>
                <section class="swiper-slide section" style="background-image:linear-gradient(rgba(9, 5, 54, 0.1), rgba(5, 4, 46, 0.1)), url('images/bg-2.jpg'); no-repeat; background-size: cover; background-position: center;">
                    <div class="product-banner">
                        
                        <div class="right">
                            <div class="content">
                                <span>A global network</span>
                                <h3>of the <br> <span>opportunity</span> marketplace</h3>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="swiper-slide section" style="background-image:linear-gradient(rgba(9, 5, 54, 0.1), rgba(5, 4, 46, 0.1)), url('images/third.jpg'); no-repeat; background-size: cover; background-position: center;">
                    <div class="product-banner">
                        <div class="left" style="opacity: 0;">
                            <img src="images/teacher-2.png" alt="">
                        </div>
                        
                        <div class="right">
                            <div class="content last">
                                <h1>
                                    <span>Your dreams <br> are valid.</span>
                                </h1>
                                <h2> Start the journey <br> to your dreams <br> <span>here</span> today</h2>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="swiper-container home-slider mobile">
            <div class=" wrapper">
                <section class="swiper-slide section" style="background-image:linear-gradient(rgba(9, 5, 54, 0.6), rgba(5, 4, 46, 0.6)), url('images/third.jpg'); no-repeat; background-size: cover; background-position: center;">
                    <div class="product-banner">
                        
                        <div class="right">
                            <div class="content mobile">
                                <h1>
                                    <span>Your dreams are valid,</span>
                                </h1>
                                <h2> Start the journey to your dreams <span class="discount">here</span> today</h2>
                                <a href="#start" class="btn">Get Started</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="bottom-nav">
            <a href="recruitment.php" class="desktop">Recruitment</a>
            <a href="freelance.php" class="desktop">Freelancing</a>
            <a href="#" class="desktop">Outsourcing</a>
            <a href="#" class="desktop">Training</a>
            <a href="#" class="desktop">Vendorship</a>
            <a href="#" class="desktop">Sponsorship</a>
        </div>
        
    </section> -->

    <section class="home desktop" id="home">
        <div class="swiper home-slider">

            <div class="swiper-wrapper wrapper">

                <div class="swiper-slide slide" style="background-image:linear-gradient(rgba(9, 5, 54, 0.1), rgba(5, 4, 46, 0.1)), url('images/bg-4.jpg'); no-repeat; background-size:cover; background-position: center">
                    <div class="content">
                        <h3 class="first">We Bring Opportuni<span>t</span>ies</h3>
                        <span class="first">to <span>everyone,</span><br> Everywhere</span>
                    </div>
                </div>

                <section class="swiper-slide section" style="background-image:linear-gradient(rgba(9, 5, 54, 0.1), rgba(5, 4, 46, 0.1)), url('images/bg-2.jpg'); no-repeat; background-size: cover; background-position: center;">
                    <div class="product-banner">
                        
                        <div class="right">
                            <div class="content">
                                <span>A global network</span>
                                <h3>of the <br> <span>opportunity</span> marketplace</h3>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="swiper-slide section" style="background-image:linear-gradient(rgba(9, 5, 54, 0.1), rgba(5, 4, 46, 0.1)), url('images/third.jpg'); no-repeat; background-size: cover; background-position: center;">
                    <div class="product-banner">
                        <div class="left" style="opacity: 0;">
                            <img src="images/teacher-2.png" alt="">
                        </div>
                        
                        <div class="right">
                            <div class="content last">
                                <h1>
                                    <span>Your dreams <br> are valid.</span>
                                </h1>
                                <h2> Start the journey <br> to your dreams <br> <span>here</span> today</h2>
                            </div>
                        </div>

                    </div>
                </section>

            </div>
            <div class="swiper-pagination"></div>
        </div>
        
        <div class="bottom-nav">
            <a href="recruitment.php" class="desktop">Recruitment</a>
            <a href="freelance.php" class="desktop">Freelancing</a>
            <a href="#" class="desktop">Outsourcing</a>
            <a href="#" class="desktop">Training</a>
            <a href="#" class="desktop">Vendorship</a>
            <a href="#" class="desktop">Sponsorship</a>
        </div>
        </section>
    <section>

    <section class="home mobile" id="home">
        <div class="swiper-container home-slider mobile">
            <div class=" wrapper">
                <section class="swiper-slide section" style="background-image:linear-gradient(rgba(9, 5, 54, 0.6), rgba(5, 4, 46, 0.6)), url('images/third.jpg'); no-repeat; background-size: cover; background-position: center;">
                    <div class="product-banner">
                        
                        <div class="right">
                            <div class="content mobile">
                                <h1>
                                    <span>Your dreams are valid,</span>
                                </h1>
                                <h2> Start the journey to your dreams <span class="discount">here</span> today</h2>
                                <a href="#start" class="btn">Get Started</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
            <div class="swiper-pagination"></div>
        </div> 
        </section>
    <section>
        
        <div class="title" id="start">
            <h1>Explore Global Opportunities</h1>
        </div>
        
        <div class="categories">
            <div class="image-box" id="rec">
                <img src="images/course-2-6.jpg" alt="">
                <div class="overlay">
                    <div class="details">
                        <h3 class="cat-title">
                            <a href="recruitment.php">Recruitment</a>
                        </h3>
                        <span class="cat">
                            <a href="recruitment.php" class="btn">Explore</a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="image-box" id="free">
                <img src="images/freelance.jpg" alt="">
                <div class="overlay">
                    <div class="details">
                        <h3 class="cat-title">
                            <a href="#">Freelancing</a>
                        </h3>
                        <span class="cat">
                            <a href="freelance.php" class="btn">Explore</a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="image-box" id="out">
                <img src="images/course-2-2.jpg" alt="">
                <div class="overlay">
                    <div class="details">
                        <h3 class="cat-title">
                            <a href="#">Outsourcing</a>
                        </h3>
                        <span class="cat">
                            <a href="#" class="btn">Explore</a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="image-box" id="ven">
                <img src="images/vendor.jpg" alt="">
                <div class="overlay">
                    <div class="details">
                        <h3 class="cat-title">
                            <a href="#">Vendorship</a>
                        </h3>
                        <span class="cat">
                            <a href="#" class="btn" class="btn">Explore</a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="image-box" id="tra">
                <img src="images/course-2-3.jpg" alt="">
                <div class="overlay">
                    <div class="details">
                        <h3 class="cat-title">
                            <a href="#">Training</a>
                        </h3>
                        <span class="cat">
                            <a href="#" class="btn">Explore</a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="image-box">
                <img src="images/sponsorship.jpg" alt="">
                <div class="overlay">
                    <div class="details">
                        <h3 class="cat-title">
                            <a href="#">Sponsorship</a>
                        </h3>
                        <span class="cat">
                            <a href="#" class="btn">Explore</a>
                        </span>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section  style="background-image:linear-gradient(rgba(9, 5, 54, 0.1), rgba(5, 4, 46, 0.1)), url('images/Goals.jpg'); no-repeat; background-size: cover; background-position: center;">
        <div class="product-banner started">
            
            <div class="right">
                <div class="content">
                    <h2>
                        <span>You can achieve <br> your goals.</span>
                    </h2>
                    <h1> You've got <br> a support system in us</h1>
                </div>
            </div>

            <div class="left">
                <a href="#start" class="btn btn3">Get Started</a>
            </div>
        </div>
    </section>
    
    <section>
        <div class="title">
                <h1>Join Our League of Clients</h1>
        </div>    

        <div class="slider-pic">
            <div class="slide-track-pic">
                
                <div class="slide-pic">
                    <img src="images/CASBig.png" height="100px" width="100px" alt="">
                </div>
                <div class="slide-pic">
                    <img src="images/Logos-01.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide-pic">
                    <img src="images/Logos-03.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide-pic">
                    <img src="images/Logos-04.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide-pic">
                    <img src="images/Logos-05.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide-pic">
                    <img src="images/Logos-01.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide-pic">
                    <img src="images/Logos-03.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide-pic">
                    <img src="images/Logos-04.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide-pic">
                    <img src="images/Logos-05.svg" height="100px" width="100px" alt="">
                </div>
                <div class="slide-pic">
                    <img src="images/cas.svg" height="100px" width="100px" alt="">
                </div>
            </div>
        </div>



    </section>

    <section class="review" id="reviews">
        <div class="title title-review">
            <h1>Clients Review</h1>
        </div>
        <div class="reviews-slider">
            <div class="reviews-wrapper">
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/Valueman-05.png" alt="">
                        <div class="user-info">
                            <h3>Niyi Olaleye</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p> Intrinsic is an amazing company. The team really cares and helps you get the best </p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/CASBig.png" alt="">
                        <div class="user-info">
                            <h3>Abraham O. Bams</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p> Employees from Intrinsic just get the job done. Thats why we use Intrinsic for all our hiring.</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/cas.svg" alt="">
                        <div class="user-info">
                            <h3>Oladayo Olanike</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p>Our HR Team has been relieved of the usual hiring tension because of Intrinsic. They are just the solution</p>
                </div>

            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <div class="title title-review">
            <h1>Contact Us</h1>
        </div>
        
        <div class="icons-container">
            <div class="icons">
                <i class="fas fa-clock"></i>
                <h3>open</h3>
                <p>24 Hours</p>
            </div>

            <div class="icons">
                <i class="fas fa-phone"></i>
                <h3>Phone</h3>
                <p>08134567890</p>
            </div>

            <div class="icons">
                <i class="fas fa-envelope"></i>
                <h3>Email</h3>
                <p>Intrinsicglobe@gmail.com</p>
            </div>

            <div class="icons">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Location</h3>
                <p>Lagos, Nigeria</p>
            </div>
        </div>

    </section>


    <?php include 'phpFiles/utilities/footer.php'?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/index4.js"></script>

</body>
</html>