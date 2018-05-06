<div class="col-md-4">
    
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method = "post">
        <div class="input-group">
            <input name="searchContent" type="text" class="form-control">
            <span class="input-group-btn">
                <button name="searchBtn" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        </form>
        <!-- /.input-group -->
    </div>
    
    <?php
    $query = "SELECT * FROM categories";
    $query_cate = mysqli_query($connection, $query);
    
    ?>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                   
                    <?php
                    while($row = mysqli_fetch_assoc($query_cate)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                    ?>
                    <li>
                        <a href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_title?></a>
                    </li>
                    <?php
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php
    include "widget.php";
    ?>

</div>