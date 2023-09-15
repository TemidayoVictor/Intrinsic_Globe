<header class="header">
        <a href="index.php" class="logo" style=""><img src="images/smallLogo.png" alt="" width="100px;"> </a>
        <a href="index.php" class="logo pic"> <img src="images/logo.png" alt="" width="120px;"> </a>
        <nav class="navbar">
            <div class="top-nav">
                <div class="close">
                    <i class="fas fa-times"></i>
                </div>
            </div>

            <a href="#home" class="active">Home</a>
            <a href="about.php" class="<?php if ($page == 'about') echo "active";?>">About</a>
            <a href="#contact">Contact Us</a>
            <a href="recruitment.php" class="mobile">Recruitment</a>
            <a href="freelance.php" class="mobile">Freelancing</a>
            <a href="#start" class="start">Get Started</a>
            <a href="login.php" class="login">Login</a>
            
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>
    </header>
