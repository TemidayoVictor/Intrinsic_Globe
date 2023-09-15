<aside>
    <button id="close-btn">
        <span class="fas fa-times"></span>
    </button>

    <div class="sidebar">
        <a href="freemp-create.php" class="<?php if ($page == 'freemp-create') echo "active";?>">
            <span class="fas fa-cogs"></span>
            <h4>Create Job</h4>
        </a>    
        <a href="freemp-created-jobs.php" class="<?php if ($page == 'freemp-available') echo "active";?>">
            <span class="fas fa-briefcase"></span>
            <h4>Active Jobs</h4>
        </a>
        <a href="freemp-all-freelancers.php" class="<?php if ($page == 'freemp-all') echo "active";?>">
            <span class="fas fa-briefcase"></span>
            <h4>All Freelancers</h4>
        </a>
        <a href="freemp-freelancers-application.php" class="<?php if ($page == 'freemp-app') echo "active";?>">
            <span class="fas fa-signal"></span>
            <h4> Applications</h4>
        </a>
        <a href="freemp-shortlist.php" class="<?php if ($page == 'freemp-short') echo "active";?>">
            <span class="fas fa-user"></span>
            <h4>Interviews</h4>
        </a>
    </div>
            
</aside>