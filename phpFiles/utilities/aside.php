<aside>
    <button id="close-btn">
        <span class="fas fa-times"></span>
    </button>

    <div class="sidebar">
        <a href="candidates-recommended-jobs.php" class="<?php if ($page == 'candidates-recommended') echo "active";?>">
            <span class="fas fa-briefcase"></span>
            <h4>Recommended</h4>
        </a>
        <a href="candidates-available-jobs.php" class="<?php if ($page == 'candidates-available') echo "active";?>">
            <span class="fas fa-briefcase"></span>
            <h4>Available Jobs</h4>
        </a>
        <a href="candidates-applications.php" class="<?php if ($page == 'candidates-application') echo "active";?>">
            <span class="fas fa-signal"></span>
            <h4>Applications</h4>
        </a>
        <a href="candidates-shortlisting.php" class="<?php if ($page == 'candidates-shortlist') echo "active";?>">
            <span class="fas fa-envelope"></span>
            <h4>Interviews</h4>
        </a>
        <!--<a href="#">
            <span class="fas fa-calendar"></span>
            <h4>interviews</h4>
        </a>-->
        <a href="candidates-profile.php" class="<?php if ($page == 'candidates-profile') echo "active";?>">
            <span class="fas fa-user"></span>
            <h4>Resume</h4>
        </a>

    </div>           
</aside>