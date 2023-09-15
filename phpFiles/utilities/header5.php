<header class="header">
        <a href="index.php" class="logo" style=""><img src="images/smallLogo.png" alt="" width="100px;"> </a>
        <a href="index.php" class="logo pic"> <img src="images/logo.png" alt="" width="120px;"> </a>
        
        <nav class="navbar">
            <div class="top-nav">
                <div class="logo">
                    <h1>Intrisic Globe</h1>
                </div>
                <div class="close">
                    <i class="fas fa-times"></i>
                </div>
            </div>
        </nav>

        <div class="profile">
                <div class="profile-name desktop">
                    <h5><?php echo $_SESSION['usernameUse']; ?></h5>
                </div>
                <i id="drop" class="fas fa-angle-down desktop"></i>
            </div>

            <div class="account-list">
                
                <div>
                    <h2 class="mobile" ><?php echo $_SESSION['usernameUse']; ?></h2>
                    <h2>Signed in as Freelancer Employer</h2>
                </div>
                
                <a href="freemp-account.php" class="<?php if ($page == 'freemp-account') echo "active";?>">
                    <span class="fas fa-cog"></span>
                    <h4>Account</h4>
                </a>

                <a href="freemp-records.php" class="<?php if ($page == 'freemp-record') echo "active";?>">
                    <span class="fas fa-cog"></span>
                    <h4>Payment Records</h4>
                </a>

                <a href="phpFiles/includes/logout.php">
                    <span class="fas fa-sign-out-alt"></span>
                    <h4>Log out</h4>
                </a>
                
            </div>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars" ></div>
            </div>

            <div class="icons mobile">
                <div id="drop2" class="fas fa-ellipsis-v"></div>
            </div>

    </header>

    </header>
