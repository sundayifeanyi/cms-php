<?php
if(isset($_POST['create_post'])){
    $post_title= $_POST['post_title'];
    $post_user= $_POST['post_user'];
    $post_author= $_POST['post_author'];
    $post_category= $_POST['post_category'];
    $post_content= $_POST['post_content'];
    $post_image= $_FILES['post_image']['name'];
    $post_image_temp= $_FILES['post_image']['tmp_name'];
    $post_tags= $_POST['post_tag'];
    $post_comment= $_POST['post_comment'];
    $post_status= $_POST['post_status'];
    $post_views = $_POST['post_views_count'];
    $post_date= date('d-m-y');
    
    move_uploaded_file($post_image_temp,"../images/$post_image");

    $query = "INSERT INTO post_blog(post_category,post_title,
    post_user,post_author,post_date,post_image,post_content,
    post_tags,post_comments_count,post_status,post_views_count)";
    $query .= "VALUES('{$post_category}','{$post_title}','{$post_user}','{$post_author}',
    now(),'{$post_image}','{$post_content}','{$post_tags}',
    '{$post_comment}','{$post_status}',{$post_views})";

    $create_post_query = mysqli_query($connection,$query);
   
    //testResult($create_post_query);
}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
        <label for="post_title">post_title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_user">post_user</label>
        <input type="text" class="form-control" name="post_user">
    </div>
    <div class="form-group">
        <label for="post_author">post_author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_category">post_category</label>
        <input type="text" class="form-control" name="post_category">
    </div>
    <div class="form-group">
        <label for="post_status">post_status</label>
        <input type="text" class="form-control" name="post_status">
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
        <label for="post_comment">post_comment</label>
        <input type="text" class="form-control" name="post_comment">
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