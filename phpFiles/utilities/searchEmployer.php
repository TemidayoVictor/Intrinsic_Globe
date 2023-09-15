<form action="phpFiles/includes/search.php" method="post" >
    <select name="category" id="category" class="input">
        <option value="">Search Candidates</option>
        <?php
            $query = mysqli_query($con, "SELECT * FROM categories");
            if(mysqli_num_rows($query)>0) {
                $i = 1;
                while($row = mysqli_fetch_array($query)) {
                    $category = $row['category'];
            
        ?>
        <option value="<?php echo $category?>"><?php echo $category?></option>
        <?php
        $i++;
            }
        }

        ?>
    </select>
        
    <select name="sub" id="sub-cat" class="input">
                        
    </select>

    <input type="text" name="searchForm" value="employer" hidden>

    <input type="submit" class="btn" value="search">
</form>