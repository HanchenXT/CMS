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
                        
                        <?php
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        } else {
                            $source = '';
                        }
                        switch($source) {

                            case 'add_post';
                            include "includes/add_post.php";
                            break; 

                            default:
                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Delete</th> 
                                    <th>Edit</th>                                 
                                </thead>

                                <tbody>
                                <tr>
                                <?php
                                    $query = "SELECT * FROM posts";
                                    $query_post = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($query_post)) {
                                       $post_id = $row['post_id'];
                                       $post_author = $row['post_author'];
                                       $post_title = $row['post_title'];
                                       $post_category_id = $row['post_category_id'];
                                       $post_status = $row['post_status'];
                                       $post_image = $row['post_image'];
                                       $post_tags = $row['post_tags'];
                                       $post_comment_count = $row['post_comment_count'];
                                       $post_date = $row['post_date'];
                                        echo "<tr>";
                                        echo "<td>{$post_id}</td>";
                                        echo "<td>{$post_author}</td>";
                                        echo "<td>{$post_title}</td>";
                                        $cat_title = find_cate($post_category_id);
                                        echo "<td>{$cat_title}</td>";
                                        echo "<td>{$post_status}</td>";
                                        echo "<td><img width='20' src='../images/$post_image' alt='image'></td>";
                                        echo "<td>{$post_tags}</td>";
                                        echo "<td>{$post_comment_count}</td>";
                                        echo "<td>{$post_date}</td>";
                                        echo "<td><a href='posts.php?delete={$post_id}'>Delete</td>";
                                        echo "<td><a href='posts.php?edit={$post_id}'>Edit</td>";
                                        echo "</tr>";
                                    }
                                break;
                                }

                                // delete a post
                                if (isset($_GET['delete'])) {
                                    $id = $_GET['delete'];
                                    $query = "DELETE FROM posts WHERE post_id = {$id}";
                                    $delete_query = mysqli_query($connection, $query);
                                    header("Location: posts.php");

                                }
        
                                // edit a post
                                include "includes/edit_post.php";
                                ?>   
                                </tr>
                                </tbody>
                            </table>
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