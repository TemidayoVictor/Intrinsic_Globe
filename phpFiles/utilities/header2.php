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

            <!--<a href="candidates-recommended-jobs.php">Recommended Jobs</a>
            <a href="candidates-available-jobs.php">Available Jobs</a>
            <a href="candidates-applications.php">All Applications</a>
            <a href="candidates-shortlisting.php">Interviews</a>
            <a href="candidates-profile.php">Resume</a>
            <a href="candidates-work-profile.php">Work Profile</a>
            <a href="candidates-account.php">Account</a>-->
        </nav>

        <div class="profile">
                <div class="profile-image desktop">
                    <img src="recruitimages/<?php echo $_SESSION['prevPic'];?>" width="40px" height="40px" alt="">
                </div>
                <div class="profile-name desktop">
                    <h5><?php echo $_SESSION['usernameUse']; ?></h5>
                </div>
                <i id="drop" class="fas fa-angle-down desktop"></i>
            </div>

            <div class="account-list">
                
                <div>
                    <h2 class="mobile" ><?php echo $_SESSION['usernameUse']; ?></h2>
                    <h2>Signed in as Candidate</h2>
                </div>
                
                <a href="candidates-work-profile.php" class="<?php if ($page == 'candidates-work') echo "active";?>">
                    <span class="fas fa-cog"></span>
                    <h4>Work Profile</h4>
                </a>

                <a href="candidates-account.php" class="<?php if ($page == 'candidates-account') echo "active";?>">
                    <span class="fas fa-cog"></span>
                    <h4>Account Settings</h4>
                </a>

                <a href="candidates-records.php" class="<?php if ($page == 'candidates-record') echo "active";?>">
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
