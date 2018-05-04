<?php
// add category
function add_cate() {
     
   global $connection;

   if(isset($_POST['add_cate'])) {
        $cat_title = $_POST['cat_title'];
        $query = "INSERT INTO categories(cat_title) VALUE ('{$cat_title}') ";
        $insert_cate = mysqli_query($connection, $query);

        if (!$insert_cate) {
            die('insert failed' . mysqli_error($connection));
        }

   }
    
}

// delete category
function delete_cate() {
    
    global $connection;
    
    if (isset($_GET['delete'])) {
           $the_cat_id = $_GET['delete'];
           $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
           $delete_query = mysqli_query($connection, $query);
           header("Location: category.php");
    }
    
}

?>