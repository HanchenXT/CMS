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
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response to</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                    <th>Edit</th>                                
                                </thead>

                                <tbody>
                                <tr>
                                <?php
                                //view all comments
                                    $query = "SELECT * FROM comments";
                                    $query_comment = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($query_comment)) {
                                       $comment_id = $row['comment_id'];
                                       $comment_post_id = $row['comment_post_id'];
                                       $comment_author = $row['comment_author'];
                                       $comment_email = $row['comment_email'];
                                       $comment_content = $row['comment_content'];
                                       $comment_status = $row['comment_status'];
                                       $comment_date = $row['comment_date'];
                                        echo "<tr>";
                                        echo "<td>{$comment_id}</td>";
                                        echo "<td>{$comment_author}</td>";
                                        echo "<td>{$comment_content}</td>";
                                        echo "<td>{$comment_email}</td>";
                                        echo "<td>{$comment_status}</td>";
                                        
                                        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                                        $select_query = mysqli_query($connection, $query);
                                        while ($row = mysqli_fetch_assoc($select_query)) {
                                            $post_id = $row['post_id'];
                                            $post_title = $row['post_title'];
                                            echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</td>";
                                        }
                                        
                                        echo "<td>{$comment_date}</td>";
                                        echo "<td><a href='comments.php?approve={$comment_id}'>Approve</td>";
                                        echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</td>";
                                        echo "<td><a href='comments.php?delete={$comment_id}'>Delete</td>";
                                        echo "<td><a href='comments.php?edit={$comment_id}'>Edit</td>";
                                        echo "</tr>";
                                    }
                                break;
                                }

                                // delete a post
                                if (isset($_GET['delete'])) {
                                    $id = $_GET['delete'];
                                    $query = "DELETE FROM comments WHERE comment_id = {$id}";
                                    $delete_query = mysqli_query($connection, $query);
                                    header("Location: comments.php");
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