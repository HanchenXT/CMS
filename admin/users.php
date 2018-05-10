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

                            case 'add_user';
                            include "includes/add_user.php";
                            break; 

                            default:
                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Change to Admin</th>
                                    <th>Change to Subscriber</th>
                                    <th>Delete</th>
                                    <th>Ddit</th>                               
                                </thead>

                                <tbody>
                                <tr>
                                <?php
                                //view all comments
                                    $query = "SELECT * FROM users";
                                    $query_user = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($query_user)) {
                                       $user_id = $row['user_id'];
                                       $username = $row['username'];
                                       $user_password = $row['user_password'];
                                       $user_email = $row['user_email'];
                                       $user_firstname = $row['user_firstname'];
                                       $user_lastname = $row['user_lastname'];
                                       $user_image = $row['user_image'];
                                       $user_role = $row['user_role'];
                                        echo "<tr>";
                                        echo "<td>{$user_id}</td>";
                                        echo "<td>{$username}</td>";
                                        echo "<td>{$user_firstname}</td>";
                                        echo "<td>{$user_lastname}</td>";
                                        echo "<td>{$user_email}</td>";
                                        echo "<td>{$user_role}</td>";
//                                        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
//                                        $select_query = mysqli_query($connection, $query);
//                                        while ($row = mysqli_fetch_assoc($select_query)) {
//                                            $post_id = $row['post_id'];
//                                            $post_title = $row['post_title'];
//                                            echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</td>";
//                                        }
//                                        
                                        echo "<td><a href='users.php?change_admin={$user_id}'>Admin</td>";
                                        echo "<td><a href='users.php?change_sub={$user_id}'>Subscriber</td>";
                                        echo "<td><a href='users.php?delete={$user_id}'>Delete</td>";
                                        echo "<td><a href='users.php?edit_user={$user_id}'>Edit</td>";
                                        echo "</tr>";
                                    }
                                break;
                                }
                                // change to admin
                                if (isset($_GET['change_admin'])) {
                                    $id = $_GET['change_admin'];
                                    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$id}";
                                    $admin_query = mysqli_query($connection, $query);
                                    header("Location: users.php");
                                }
        
                                // change to Subscriber
                                if (isset($_GET['change_sub'])) {
                                    $id = $_GET['change_sub'];
                                    $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = {$id}";
                                    $sub_query = mysqli_query($connection, $query);
                                    header("Location: users.php");
                                }

                                // delete a post
                                if (isset($_GET['delete'])) {
                                    $id = $_GET['delete'];
                                    $query = "DELETE FROM users WHERE user_id = {$id}";
                                    $delete_query = mysqli_query($connection, $query);
                                    header("Location: users.php");
                                }
        
                                // edit a post
                                include "includes/edit_user.php";
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