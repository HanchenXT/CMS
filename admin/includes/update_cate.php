<?php
if (isset($_GET['edit'])) {
    $cat_id = $_GET['edit'];
?>
    <form action="" method="post">
        <div class="form-group">
           <label for="cat-title">Update Category</label>
            <?php
            // edit and update category
               if(isset($_GET['edit'])) {
                    $cat_id = $_GET['edit'];
                    $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                    $query_edit = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($query_edit)) {
                       $cat_id = $row['cat_id'];
                       $cat_title = $row['cat_title'];
                       ?>
                       <input value="<?php if (isset($cat_title)) {echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
                       <?php
                    }

               }

               if(isset($_POST['update_cate'])) {
                    $update_cate = $_POST['cat_title'];
                    $query = "UPDATE categories SET cat_title = '{$update_cate}' WHERE cat_id = '{$cat_id}' ";
                    $query_update = mysqli_query($connection, $query);
                    header("Location: category.php");
               }

            ?>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_cate" value="Update Category">
        </div>
    </form>

<?php
}
?>