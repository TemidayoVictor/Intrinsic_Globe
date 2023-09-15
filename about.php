<?php
ob_start();
$page = "about";
if(TRUE)// toggle to false after debugging
{
  ini_set( 'display_errors', 'true');
  error_reporting(-1);
}

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
    <title>Intrisic Globe | About Us</title>
    <style>
            
        html {
            font-size: 55.5%;
        }

        .bottom-elements .pagination {
            display: flex;
            justify-content: flex-end;
        }

        .about-text {
            text-align: center;
            font-size: 4rem;
            color: #fff;
            font-weight: 600;
        }

        .swiper-slide.slide {
            height: 40vh;
        }

        .main {
            padding: 0 25rem;
            padding-bottom: 5rem;
            margin-top: 1rem;
        }

        .main .content {
            box-shadow: 0 5px 10px rgba(0,0,0,.02);
            padding: 2rem 10rem;
            border-radius: 1rem;
        }

        .main .content article {
            line-height: 2;
            margin-bottom: 2rem;
            font-size: 2rem;
            font-weight: 300;
            text-align: justify;
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

            .about-text {
                font-size: 3rem;
            }

            .main {
                padding: 0 2rem;
            }

            .swiper-slide.slide {
                height: 30vh;
            }

            .main .content {
                padding: 2rem 2rem;
                border-radius: 1rem;
            }

        }
    </style>
</head>
<body class="">
    

    <?php include 'phpFiles/utilities/header.php'?>


    <section id="home" class="home">
        <div class="swiper-container ">
            <div class="swiper-wrapper wrapper">
                <div class="swiper-slide slide" style=" background-image:linear-gradient(rgba(9, 5, 54, 0.1), rgba(5, 4, 46, 0.1)), url('images/home-use.jpg'); no-repeat; background-size:cover; background-position: center">
                    <h1 class="about-text">About Us</h1>
                </div>
            </div>
           
        </div>
        
    </section>



    <section class="main">
        <div class="content">
            <article>
                <b>At Intrinsic Globe,</b> we understand the values that underlie self discovery; knowing who you are will help take advantage of the numerous opportunities around you.
                We are deeply concerned about humanity, equal opportunities and the possibility of a great future when opportunities are accessible.
            </article>

            <article>
                Intrinsic globe was birthed to support untold dreams by bringing global opportunities to every corner of the earth. We are passionate about your success and we believe this world needs you to manifest its full potential.
            </article>

            <article>
                We are a fintech organisation established to create systems through which all can prosper and thrive in their career & life path.
            </article>

            <article>
                The founders have over 20 years experiences in financial services, tech, social enterprise and business management. We are also willing to collaborate with organisations that share our vision for humanity.
            </article>

            <article>
                Our focus now lies around creating value for humanity by  creating right paths for everyone wiling to succeed in life.
            </article>

            <div>
                <h1 class="sub-heading"><b>Vision</b></h1>
                <article>Become a global opportunity market</article>
            </div>

            <div>
                <h1 class="sub-heading"><b>Mission</b></h1>
                <article>Creating local and global platforms that will increase opportunities for "human" success.</article>
            </div>

            <article>To help prepare and adapt every wiling person to change through training & upskilling, thereby improving productivity.</article>
            
            <article>Serve as the bridge between philanthropical projects and their beneficiaries, with proper supervision & accountability.</article>
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