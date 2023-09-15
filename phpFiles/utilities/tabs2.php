<?php 

$query = mysqli_query($con, "SELECT * FROM recruitmentemployers WHERE username = '$username'");
if(mysqli_num_rows($query)<= 0) {
    $display = 'none';
    $jobNumber = 0;
}
else {
    $jobNumber = mysqli_num_rows($query);
    $display = "";
}

$query1 = mysqli_query($con, "SELECT * FROM shortlist WHERE company = '$username'");
if(mysqli_num_rows($query1) > 0) {
    $shortListNumber = mysqli_num_rows($query1);
}

else {
    $shortListNumber = 0;
}

$query2 = mysqli_query($con, "SELECT * FROM application WHERE company = '$username'");
if(mysqli_num_rows($query2) > 0) {
    $applicationNumber = mysqli_num_rows($query2);
}

else {
    $applicationNumber = 0;
}


?>


<div class="cards">
    <a  href="employer-created-jobs.php" class="card <?php if ($currentTab == "created") echo "active";?>">
        <div class="top">
            <div class="left">
                <!--<img src="images/subject-icon-6.png" alt="">-->
                <h2>Jobs Created</h2>
            </div>
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="middle">
            <?php if($jobNumber > 0): ?>
                <h1>You have created <?php echo $jobNumber;?> job(s)</h1>
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
                    <h5><?php echo date('Y/m'); ?> </h5>
                </div>
                
            </div>
        </div>
    </a>

    <a href="employer-candidate-applications.php" class="card <?php if ($currentTab == "application") echo "active";?>">
        <div class="top">
            <div class="left">
                <!--<img src="images/subject-icon-6.png" alt="">-->
                <h2>Applications</h2>
            </div>
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="middle">
            <?php if($applicationNumber > 0): ?>
                <h1>You have recieved <?php echo $applicationNumber;?> application(s) for your job(s)</h1>
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
                    <h5><?php echo date('Y/m'); ?> </h5>
                </div>
                
            </div>
        </div>
    </a>

    <a href="employer-candidate-shortlist.php" class="card <?php if ($currentTab == "shortlist") echo "active";?>">
        <div class="top">
            <div class="left">
                <!--<img src="images/subject-icon-6.png" alt="">-->
                <h2>Shortlists</h2>
            </div>
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="middle">
        <?php if($shortListNumber > 0): ?>
                <h1>You have shortlisted <?php echo $shortListNumber;?> candidates</h1>
            <?php else: ?>
                <h1>You have not shortlisted any candidate</h1>
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
                    <h5><?php echo date('Y/m'); ?> </h5>
                </div>
                
            </div>
        </div>
    </a>

</div>