<?php 

$query1 = mysqli_query($con, "SELECT * FROM shortlist WHERE candidate = '$username'");
if(mysqli_num_rows($query1) > 0) {
    $shortListNumber = mysqli_num_rows($query1);
}

else {
    $shortListNumber = 0;
}

$query2 = mysqli_query($con, "SELECT * FROM application WHERE candidate = '$username'");
if(mysqli_num_rows($query2) > 0) {
    $applicationNumber = mysqli_num_rows($query2);
}

else {
    $applicationNumber = 0;
}

$query = mysqli_query($con, "SELECT * FROM recruitmentemployers");
if(mysqli_num_rows($query)<= 0) {
    $display = 'none';
    $jobNumber = 0;
}
else {
    $jobNumber = mysqli_num_rows($query);
    $display = "";
}

?>

<div class="cards">
    <a href="candidates-available-jobs.php" class="card <?php if ($currentTab == "available") echo "active";?>">
        <div class="top">
            <div class="left">
                <!--<img src="images/subject-icon-6.png" alt="">-->
                <h2>Available Jobs</h2>
            </div>
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="middle">
                <h1>Over <?php echo $jobNumber;?> job(s) are currently available</h1>
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

    <a href="candidates-applications.php" class="card <?php if ($currentTab == "application") echo "active";?>">
        <div class="top">
            <div class="left">
                <!--<img src="images/subject-icon-6.png" alt="">-->
                <h2>Applications</h2>
            </div>
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="middle">
            <?php if($applicationNumber > 0): ?>
                <h1>You have made aplications for a total of <?php echo $applicationNumber;?> job(s)</h1>
            <?php else: ?>
                <h1>You have not applied for any job</h1>
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

    <a href="candidates-shortlisting.php" class="card <?php if ($currentTab == "shortlist") echo "active";?>">
        <div class="top">
            <div class="left">
                <!--<img src="images/subject-icon-6.png" alt="">-->
                <h2>Shortlists</h2>
            </div>
            <i class="fas fa-briefcase"></i>
        </div>
        
        <div class="middle">
            <?php if($shortListNumber > 0): ?>
                <h1>You have been shortlisted for <?php echo $shortListNumber;?> job(s)</h1>
            <?php else: ?>
                <h1>You have not been shortlisted for any job</h1>
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

</div>