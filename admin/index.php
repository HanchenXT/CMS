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
                        <div class="col-xs-6">
                            <?php
                            if(isset($_POST['add_cate'])) {
                                $cat_title = $_POST['cat_title'];
                                $query = "INSERT INTO categories(cat_title) VALUE ('{$cat_title}') ";
                                $insert_cate = mysqli_query($connection, $query);
                                
                                if (!$insert_cate) {
                                    die('insert failed' . mysqli_error($connection));
                                }
                                
                            }
                            ?>
                            <form action="" method="post">
                            <div class="form-group">
                               <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title" required>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="add_cate" value="Add Category">
                            </div>
                            </form>
                        </div>
                        
                        <div class="col-xs-2">
                           
                            <?php
                            $query = "SELECT * FROM categories";
                            $query_cate = mysqli_query($connection, $query);

                            ?>
                            
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                   <?php
                                   while($row = mysqli_fetch_assoc($query_cate)) {
                                   $cat_id = $row['cat_id'];
                                   $cat_title = $row['cat_title'];
                                   echo "<tr>";
                                   echo "<td>{$cat_id}</td>";
                                   echo "<td>{$cat_title}</td>";
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