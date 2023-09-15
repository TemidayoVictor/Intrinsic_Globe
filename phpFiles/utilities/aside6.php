<aside>
    <button id="close-btn">
        <span class="fas fa-times"></span>
    </button>

    <div class="sidebar">
        <a href="recruitment-candidates.php" class="<?php if ($page == 'freemp-available') echo "active";?>">
            <span class="fas fa-briefcase"></span>
            <h4>Recruitment Candidates</h4>
        </a>
        <a href="recruitment-employers.php" class="<?php if ($page == 'freemp-all') echo "active";?>">
            <span class="fas fa-briefcase"></span>
            <h4>Recruitment Employers</h4>
        </a>

        <a href="recruitment-employers-inactive.php" class="<?php if ($page == 'freemp-all') echo "active";?>">
            <span class="fas fa-briefcase"></span>
            <h4>Recruitment Inactive Jobs</h4>
        </a>

        <a href="freelancers-all.php" class="<?php if ($page == 'freemp-app') echo "active";?>">
            <span class="fas fa-signal"></span>
            <h4>FreeLancers</h4>
        </a>
        <a href="freemp-all.php" class="<?php if ($page == 'freemp-short') echo "active";?>">
            <span class="fas fa-user"></span>
            <h4>Freelancer Employers</h4>
        </a>
        <a href="create-cat.php" class="<?php if ($page == 'freemp-create') echo "active";?>">
            <span class="fas fa-cogs"></span>
            <h4>Add Category</h4>
        </a>

        <a href="phpFiles/logout.php">
            <span class="fas fa-sign-out-alt"></span>
            <h4>Log out</h4>
        </a>
    </div>
    <div class="update-cover">
        <div class="updates">
            <!--<span class="fas fa-address-card"></span>-->
            <h4>Signed In as Admin</h4>
            <!--<small></small>
            <small>General Updates</small>
            <a href="#">Update Now</a>-->
        </div>
    </div>
            
</aside>