<?php
if(isset($_POST['create_post'])){
    $post_title= escape($_POST['post_title']);
    $post_user= $_POST['post_user'];
    $post_author= $_POST['post_author'];
    $post_category= $_POST['post_category'];
    $post_content= $_POST['post_content'];
    $post_image= $_FILES['post_image']['name'];
    $post_image_temp= $_FILES['post_image']['tmp_name'];
    $post_tags= $_POST['post_tag'];
    $post_status= $_POST['post_status'];
    $post_views = $_POST['post_views_count'];
    $post_date= date('d-m-y');
    
    move_uploaded_file($post_image_temp,"../images/$post_image");

    $query = "INSERT INTO post_blog ( post_user, post_author
    , post_title, post_content, post_date,post_image
    , post_status, post_category,post_tags,post_views_count)
    VALUES('{$post_user}','{$post_author}','{$post_title}','{$post_content}',now(),
    '{$post_image}','{$post_status}','{$post_category}','{$post_tags}','{$post_views}')";
    $create_post = mysqli_query($connection,$query);
   
    $p_id = mysqli_insert_id($connection);
    echo"<p class='bg-success'>post created .  <a href='../post.php?p_id=$p_id'> view posts</a> or
    <a href='posts.php?source=add_post'>Add more posts</a>
    </p>";
    testResult($create_post);
}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
        <label for="post_title">post_title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_user">post_user</label>
        <select name="post_user" id="" class="form-control"> 
       <?php 
        
        $userdisplay = "SELECT * FROM users ";
        $select_Auser = mysqli_query($connection,$userdisplay);
        while($row = mysqli_fetch_assoc($select_Auser)){
            testResult($select_Auser);
            $user_id = $row['user_id'];
            $username = $row['username'];
            $userlname = $row['user_lastname'];
            echo "<option value='$userLname'>$userlname</option>";
        }
        ?>
       </select>
    </div>
    <div class="form-group">
        <label for="post_author">post_author</label>
        <select name="post_author" id="" class="form-control"> 
       <?php 
        
        $userquery = "SELECT * FROM users ";
        $select_user = mysqli_query($connection,$userquery);
        while($row = mysqli_fetch_assoc($select_user)){
            testResult($select_user);
            $user_id = $row['user_id'];
            $username = $row['username'];
            echo "<option value='$username'>$username</option>";
        }
        ?>
       </select>
    </div>
    <div class="form-group">
        <label for="post_category">post_category</label>
        <select name="post_category" id="" class="form-control"> 
       <?php 
        
        $query = "SELECT * FROM categories ";
        $select_post_cat = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_post_cat)){
            testResult($select_post_cat);
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<option value='$cat_title'>$cat_title</option>";
        }
        ?>
       </select>
    </div>
    <div class="form-group">
        <label for="post_status">post_status</label>
         <select name="post_status" id="" class="form-control">
         <option value='Draft'>Draft</option>
         <option value='Published'>Published</option>
        }
        ?>
       </select>
         </div>
    <div class="form-group">
        <label for="post_image">post_image</label>
        <input type="file" class="form-control" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tag">post_tag</label>
        <input type="text" class="form-control" name="post_tag">
    </div>
    <div class="form-group">
        <label for="post_views_count">post_view_count</label>
        <input type="number" class="form-control" name="post_views_count">
    </div>
    <div class="form-group">
        <label for="post_content">post_content</label>
        <textarea class="form-control" name="post_content" id="" col="30" row="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="publish">
    </div>
</form>