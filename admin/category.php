<?php
include "includes/header.php";
?>
<html>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        
        <?php
        include "includes/navigation.php"
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <div class="col-xs-4">
                            
                            <form action="" method="post">
                            <?php 
                            add_cate();
                            delete_cate();
                            ?>
                            <div class="form-group">
                               <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title" required>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="add_cate" value="Add Category">
                            </div>
                            </form>
                        <?php include "includes/update_cate.php";?>
                        </div>
                        
                        <div class="col-xs-2">
                            
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                <?php
                                $query = "SELECT * FROM categories";
                                $query_cate = mysqli_query($connection, $query);
                                while($row = mysqli_fetch_assoc($query_cate)) {
                                   $cat_id = $row['cat_id'];
                                   $cat_title = $row['cat_title'];
                                   echo "<tr>";
                                   echo "<td>{$cat_id}</td>";
                                   echo "<td>{$cat_title}</td>";
                                   echo "<td><a href='category.php?delete={$cat_id}'>Delete</td>";
                                   echo "<td><a href='category.php?edit={$cat_id}'>Edit</td>";
                                   echo "</tr>";
                                }
                                ?>
                                
                                </tbody>
                            </table>
                        </div>
                        
<!--
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
-->
                    </div>
                </div>
                <!-- /.row -->
                
                <?php
                include "includes/footer.php";
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
    </div>
    <!-- /#wrapper -->

</body>
</html>