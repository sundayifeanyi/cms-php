<?php
if(isset($_GET['p_id'])){
$p_id = $_GET['p_id'];
}
$query = "SELECT * FROM post_blog WHERE post_id = $p_id";
$select_posts_by_id = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_posts_by_id)){
    //$post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_user = $row['post_user'];
    $post_cate = $row['post_category'];
    $post_title = $row['post_title'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tag = $row['post_tags'];
    $post_comment = $row['post_comments_count'];
    $post_date = $row['post_date'];
    $post_views_count = $row['post_views_count'];
    }

    if(isset($_POST['update'])){
    $post_id = $row['post_id'];
    $post_author= $_POST['post_author'];
    $post_user= $_POST['post_user'];
    $post_title= $_POST['post_title'];
    $post_cat= $_POST['post_category'];
    $post_status= $_POST['post_status'];
    $post_image= $_FILES['post_image']['name'];
    $post_image_temp= $_FILES['post_image']['tmp_name'];
    $post_content= $_POST['post_content'];
    $post_tags= $_POST['post_tag'];
    $post_comment= $_POST['post_comment'];
    $post_views = $_POST['post_views_count'];
    //$post_date= date('d-m-y');
    
    move_uploaded_file($post_image_temp,"../images/$post_image");

    if(empty($post_image)){
    $query_image = "SELECT * FROM post_blog WHERE post_id = $p_id";
    $select_posts_image = mysqli_query($connection,$query_image);
    while($row = mysqli_fetch_assoc($select_posts_image)){
    $post_image = $row['post_image'];
    }
}

    $query = "UPDATE post_blog SET
    post_author = '{$post_author}',
    post_user = '{$post_user}',
    post_title = '{$post_title}',
    post_category = '{$post_cat}',
    post_status = '{$post_status}', 
    post_image = '{$post_image}', 
    post_content = '{$post_content}',
    post_tags = '{$post_tags}', 
    post_comments_count = '{$post_comment}',
    post_views_count = '{$post_views}', 
    post_date = now()
    WHERE post_id = $p_id ";

    $update_query = mysqli_query($connection,$query) ;
    testResult($update_query);
    echo"<p class='bg-success'>post updated .  <a href='../post.php?p_id=$p_id'> view posts</a> or
    <a href='posts.php'>Edit more posts</a>
    </p>";
    }
?>


<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
        <label for="post_title">post_title</label>
        <input type="text" value="<?php echo $post_title?>" class="form-control" name="post_title">
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
        <input type="text" value="<?php echo $post_author?>" class="form-control" name="post_author">
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
       <?php 
        
        $query = "SELECT * FROM post_blog ";
        echo "<option value=''>$post_status</option>";
        if($post_status !== 'draft'){
            echo "<option value='draft'>draft</option>";
        }else{
            echo "<option value='published'>published</option>";
        }
        ?>
       </select>
         </div>
         
    <div class="form-group">
        <label for="post_image">post_image</label>
        <img src="../images/<?php echo $post_image?>" alt="image loading" class="img-responsive" width="100px">
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tag">post_tag</label>
        <input type="text" value="<?php echo $post_tag?>" class="form-control" name="post_tag">
    </div>
    <div class="form-group">
        <label for="post_comment">post_comment</label>
        <input type="text" value="<?php echo $post_comment?>" class="form-control" name="post_comment">
    </div>
    <div class="form-group">
        <label for="post_views_count">post_view_count</label>
        <input type="number" value="<?php echo $post_views_count?>" class="form-control" name="post_views_count">
    </div>
    <div class="form-group">
        <label for="post_content">post_content</label>
        <textarea  class="form-control" name="post_content" id="textarea" col="30" row="10"><?php echo $post_content?>"</textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update" value="update">
    </div>
</form>