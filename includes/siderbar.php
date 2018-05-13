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
    
    <!--Login -->
    <?php
    if(ifItIsMethod('post')){
        if(isset($_POST['login'])){
            if(isset($_POST['username']) && isset($_POST['password'])){
                login_user($_POST['username'], $_POST['password']);
            }else {
                redirect('index');
            }
        }
    }
    ?>
    <div class="well">
        <?php if(isset($_SESSION['user_role'])): ?>
             <h4>Logged in as <?php echo $_SESSION['username'] ?></h4>
             <a href="includes/logout.php" class="btn btn-primary">Logout</a>
        <?php else: ?>
             <h4>Login</h4>
                    <form method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter Username">
                    </div>

                    <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter Password">
                        <span class="input-group-btn">
                           <button class="btn btn-primary" name="login" type="submit">Submit</button>
                        </span>
                    </div>

                    <div class="form-group">
                        <a href="forgot.php?forgot=<?php echo uniqid(true); ?>">Forgot Password</a>
                    </div>
                </form>
                <!-- /.input-group -->
        <?php endif; ?>  
    </div>

    <!-- Blog Categories Well -->
    <?php
    $query = "SELECT * FROM categories";
    $query_cate = mysqli_query($connection, $query);
    ?>
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