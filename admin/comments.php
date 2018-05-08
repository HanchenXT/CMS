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
                                        echo "<td>{$comment_post_id}</td>";
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
               <!-- Comments Form
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
               
                <hr>
               
                Posted Comments
               
                Comment
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
               
                Comment
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        Nested Comment
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        End Nested Comment
                    </div>
                </div> -->