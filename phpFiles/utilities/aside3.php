<aside>
    <button id="close-btn">
        <span class="fas fa-times"></span>
    </button>

    <div class="sidebar">
        <a href="employer-create.php" class="<?php if ($page == 'employer-create') echo "active";?>">
            <span class="fas fa-user"></span>
            <h4>Create Job</h4>
        </a>

        <a href="employer-created-jobs.php" class="<?php if ($page == 'employer-available') echo "active";?>">
            <span class="fas fa-briefcase"></span>
            <h4>Active Jobs</h4>
        </a>
        <a href="employer-all-candidates.php" class="<?php if ($page == 'employers-allcandidates') echo "active";?>">
            <span class="fas fa-briefcase"></span>
            <h4>Candidates</h4>
        </a>
        <a href="employer-candidate-applications.php" class="<?php if ($page == 'employer-application') echo "active";?>">
            <span class="fas fa-signal"></span>
            <h4>Applications</h4>
        </a>
        <a href="employer-candidate-shortlist.php" class="<?php if ($page == 'employer-shortlist') echo "active";?>">
            <span class="fas fa-envelope"></span>
            <h4>Interviews</h4>
        </a>
        <!--<a href="#">
            <span class="fas fa-calendar"></span>
            <h4>interviews</h4>
        </a>-->

        
    </div>
    <!--<div class="update-cover">
        <div class="updates">
            <!--<span class="fas fa-address-card"></span>
            <h4>Signed In as Employer</h4>
            <!--<small></small>
            <small>General Updates</small>
            <a href="#">Update Now</a>
        </div>
    </div>-->
            
</aside>