<?php 

$query1 = mysqli_query($con, "SELECT * FROM users WHERE section = 'candidate'");
if(mysqli_num_rows($query1) > 0) {
    $candidates = mysqli_num_rows($query1);
}

$query2 = mysqli_query($con, "SELECT * FROM users WHERE section = 'employer'");
if(mysqli_num_rows($query2) > 0) {
    $employer = mysqli_num_rows($query2);
}


$query3 = mysqli_query($con, "SELECT * FROM users WHERE section = 'freelancer'");
if(mysqli_num_rows($query3)<= 0) {
    $freelance = mysqli_num_rows($query3);
}

$query4 = mysqli_query($con, "SELECT * FROM users WHERE section = 'freelancerEmp'");
if(mysqli_num_rows($query4)<= 0) {
    $freelancerEmp = mysqli_num_rows($query4);
}

?>


<div class="cards">
    <a href="freemp-created-jobs.php" class="card <?php if ($currentTab == "created") echo "active";?>">
        <div class="top">
            <div class="left">
                <!--<img src="images/subject-icon-6.png" alt="">-->
                <h2>Recruitment Candidates</h2>
            </div>
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="middle">
            <?php if($candidates > 0): ?>
                <h1>You have created <?php echo $candidates;?> job(s)</h1>
            <?php else: ?>
                <h1>You have not created any job</h1>
            <?php endif ?>
        </div>
        <div class="bottom">
            <div class="left">
                <!--<small>2.3</small>-->
                <h5></h5>
            </div>
            <div class="right">
                <div class="expiry">
                    <!--<small>Expiry</small> -->
                    <h5><?php echo date('Y/m');?></h5>
                </div>
                
            </div>
        </div>
    </a>

    <a href="freemp-freelancers-application.php" class="card <?php if ($currentTab == "application") echo "active";?>">
        <div class="top">
            <div class="left">
                <!--<img src="images/subject-icon-6.png" alt="">-->
                <h2>Recruitment Employers</h2>
            </div>
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="middle">
            <?php if($employer > 0): ?>
                <h1>You have recieved <?php echo $employer;?> applications</h1>
            <?php else: ?>
                <h1>You have not recieved any application</h1>
            <?php endif ?>
        </div>
        <div class="bottom">
            <div class="left">
                <!--<small>2.3</small>-->
                <h5></h5>
            </div>
            <div class="right">
                <div class="expiry">
                    <!--<small>Expiry</small> -->
                    <h5><?php echo date('Y/m');?> </h5>
                </div>
                
            </div>
        </div>
    </a>

    <a href="freemp-shortlist.php" class="card <?php if ($currentTab == "shortlist") echo "active";?>">
        <div class="top">
            <div class="left">
                <!--<img src="images/subject-icon-6.png" alt="">-->
                <h2>Freelancers</h2>
            </div>
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="middle">
            <?php if($freelance > 0): ?>
                <h1>You have shortlisted <?php echo $freelance;?> freelancer(s)</h1>
            <?php else: ?>
                <h1>You have not shortlisted any freelancer</h1>
            <?php endif ?>
        </div>
        <div class="bottom">
            <div class="left">
                <!--<small>2.3</small>-->
                <h5></h5>
            </div>
            <div class="right">
                <div class="expiry">
                    <!--<small>Expiry</small> -->
                    <h5><?php echo date('Y/m');?></h5>
                </div>
                
            </div>
        </div>
    </a>

    <a href="freemp-shortlist.php" class="card <?php if ($currentTab == "shortlist") echo "active";?>">
        <div class="top">
            <div class="left">
                <!--<img src="images/subject-icon-6.png" alt="">-->
                <h2>Freelance Employers</h2>
            </div>
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="middle">
            <?php if($freelancerEmp > 0): ?>
                <h1>You have shortlisted <?php echo $freelancerEmp;?> freelancer(s)</h1>
            <?php else: ?>
                <h1>You have not shortlisted any freelancer</h1>
            <?php endif ?>
        </div>
    </a>

</div>