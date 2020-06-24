 <!-- update form -->
 <form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit category</label>
                            <?php 
                            if(isset($_GET['edit'])){
                                $edit_id = $_GET['edit'];
                                $selectquery = "SELECT * FROM categories WHERE cat_id = $edit_id ";
                                $select_categorys_id = mysqli_query($connection,$selectquery);
                                while($row = mysqli_fetch_assoc($select_categorys_id)){
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                ?>
                                 <div class="form-group">
                                    <input value="<?php if(isset($cat_title)){ echo $cat_title;}?>" class="form-control" type="text" name="cat_title">
                                </div>
                            <?php }  }?>
                               <?php
                                    if(isset($_POST['update'])){
                                    $update = $_POST['cat_title'];
                                    $update_query = "UPDATE categories SET cat_title = '{$update}' WHERE cat_id = $cat_id";
                                    $update_query_set = mysqli_query($connection,$update_query) ;
                                    if(!$update_query){
                                        die("QUERY FIALED " . mysqli_error($connection));
                                    }
                                    }
                               
                               ?>
                               </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update" value="Update Cart">
                                </div>
                            </form>