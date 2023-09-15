<aside>
    <button id="close-btn">
        <span class="fas fa-times"></span>
    </button>

    <div class="sidebar">
        
        <a href="freelance-gig.php" class="<?php if ($page == 'freelance-gig') echo "active";?>">
            <span class="fas fa-cogs"></span>
            <h4>Create GIG</h4>
        </a>

        <a href="freelance-recommended-jobs.php" class="<?php if ($page == 'freelance-recommended') echo "active";?>">
            <span class="fas fa-briefcase"></span>
            <h4>Recommended</h4>
        </a>
        <a href="freelance-available-jobs.php" class="<?php if ($page == 'freelance-available') echo "active";?>">
            <span class="fas fa-briefcase"></span>
            <h4>Freelance Jobs</h4>
        </a>
        <a href="freelance-applications.php" class="<?php if ($page == 'freelance-application') echo "active";?>">
            <span class="fas fa-signal"></span>
            <h4>Applications</h4>
        </a>
        <a href="freelance-shortlistings.php" class="<?php if ($page == 'freelance-shortlist') echo "active";?>">
            <span class="fas fa-envelope"></span>
            <h4>Interviews</h4>
        </a>
        <a href="freelance-resume.php" class="<?php if ($page == 'freelance-resume') echo "active";?>">
            <span class="fas fa-user"></span>
            <h4>Resume</h4>
        </a>
        
    </div>
    <!--<div class="update-cover">
        <div class="updates">
            <!--<span class="fas fa-address-card"></span>
            <h4>Signed In as Freelancer</h4>
            <!--<small></small>
            <small>General Updates</small>
            <a href="#">Update Now</a>
        </div>
    </div>-->
            
</aside>