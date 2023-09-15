<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/accounts3.css" rel="stylesheet" type="text/css">
    <title>Dashboard</title>
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
        </style>

</head>
<body>
    


    <?php include 'phpFiles/header2.php'?>

    <main>
        <?php include 'phpFiles/aside.php';?>
        <section class="middle">
            <div class="profile-pic">
                <img src="images/teacher-1.png" alt="">
            </div>


            <div class="container-cover">
                <div class="topmost">
                    <div class="job-title">
                        <h1>Ronnie Woodkin</h1>
                        <div class="details">
                            <p>B.ENG Mechanical Engineering</p>
                            <p>Production Engineering Specialist</p>
                        </div>
                    </div>
                    <div class="timeframe">
                        <p><span>Email:</span> Rwoodkin@intinsicglobe.com</p>
                        <p><span>Location:</span> Lagos, Nigeria</p>
                    </div>
                </div>

                <div class="container active selected">
                    <div class="body">
                        <!--<div class="body-head">
                            <p class="heading head2"><strong>Executive Brief</strong></p>
                            <small> <span>Current Pay range: </span>$250/yr </small>
                        </div>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio exercitationem at est, veritatis labore corrupti natus laboriosam et soluta possimus tempora placeat eius expedita. Aspernatur ipsam consequatur at corporis fugiat? </p>-->
                        <form action="#">
                            <div class="section">
                                <p class="heading"><strong>User Account Details</strong></p>
                                
                                <div class="section-body">
                                    <div class="details">
                                        <div class="title">Username</div>
                                        <input type="text" class="input" placeholder="ronniewoodkin">
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title">Name</div>
                                        <input type="text" class="input" placeholder="Ronnie Woodkin" required>
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title">Email</div>
                                        <input type="email" class="input" placeholder="ronniewoodkin@intrisic.com">
                                    </div>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title">Password</div>
                                        <input type="password" class="input">
                                    </div>
                                </div>
                            </div>

                            <div class="container-cover">
                                <div class="bottom-elements" style="margin-bottom: 40px;">
                                    <a href="#" class="btn" style="background:transparent; color:transparent">Edit Details</a>
                                    <a href="#" class="btn">Update Details</a>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                    
                </div>

                <div class="container active selected">
                    <div class="body">
                        <!--<div class="body-head">
                            <p class="heading head2"><strong>Executive Brief</strong></p>
                            <small> <span>Current Pay range: </span>$250/yr </small>
                        </div>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio exercitationem at est, veritatis labore corrupti natus laboriosam et soluta possimus tempora placeat eius expedita. Aspernatur ipsam consequatur at corporis fugiat? </p>-->
                        <form action="#">
                            <div class="section">
                                <p class="heading"><strong>Payment Details</strong></p>
                                
                                <div class="section-body">
                                    <div class="details">
                                        <div class="title">Type</div>
                                        <input type="text" class="input" placeholder="Bank Transfer">
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title">Bank</div>
                                        <input type="text" class="input" placeholder="Guaranty Trust Bank" required>
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title">Account Number</div>
                                        <input type="number" class="input" placeholder="001122334455">
                                    </div>
                                </div>

                                <div class="section-body" >
                                    <div class="details">
                                        <div class="title">Sort Code</div>
                                        <input type="number" class="input" placeholder="01122334455">
                                    </div>
                                </div>
                            </div>

                            <div class="container-cover">
                                <div class="bottom-elements" style="margin-bottom: 40px;">
                                    <a href="#" class="btn" style="background:transparent; color:transparent">Edit Details</a>
                                    <a href="#" class="btn">Update Details</a>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                    
                </div>

                <div class="container active selected">
                    <div class="body">
                        <!--<div class="body-head">
                            <p class="heading head2"><strong>Executive Brief</strong></p>
                            <small> <span>Current Pay range: </span>$250/yr </small>
                        </div>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio exercitationem at est, veritatis labore corrupti natus laboriosam et soluta possimus tempora placeat eius expedita. Aspernatur ipsam consequatur at corporis fugiat? </p>-->
                        <form action="#">
                            <div class="section">
                                <p class="heading"><strong>Verification</strong></p>
                                
                                <div class="section-body">
                                    <div class="details">
                                        <div class="title">ID Type</div>
                                        <input type="text" class="input" placeholder="ID Type">
                                    </div>
                                </div>

                                <div class="section-body">
                                    <div class="details">
                                        <div class="title">ID Number</div>
                                        <input type="text" class="input" placeholder="ID Number" required>
                                    </div>
                                </div>
                            </div>

                            <div class="container-cover">
                                <div class="bottom-elements" style="margin-bottom: 40px;">
                                    <a href="#" class="btn" style="background:transparent; color:transparent">Edit Details</a>
                                    <a href="#" class="btn">Update Details</a>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </section>

    </main>
    <?php include 'phpFiles/footer2.php';?>
    <script src="js/dashboard.js"></script>
</body>
</html>