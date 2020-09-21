<?php include "modaldel.php";?>



<?php
if(isset($_POST['checkBoxArray'])){

   foreach( $_POST['checkBoxArray'] as $checkBoxId ){
     $bulkOption = $_POST['bulkOption'];
     switch ($bulkOption){
         case 'Published':
         $queryP = "UPDATE post_blog SET post_status = '{$bulkOption}' WHERE post_id = {$checkBoxId}";
         $update_query = mysqli_query($connection,$queryP);
         break;
         case 'Draft':
            $queryR = "UPDATE post_blog SET post_status = '{$bulkOption}' WHERE post_id = {$checkBoxId}";
            $update_query = mysqli_query($connection,$queryR);
        break;
        case 'Delete':
            $queryD = "DELETE FROM post_blog WHERE post_id = {$checkBoxId}";
            $update_query = mysqli_query($connection,$queryD);
        break;

        case 'Clone':
            $queryk = "SELECT * FROM post_blog WHERE post_id = {$checkBoxId}";
            $clone_post = mysqli_query($connection,$queryk);

            while($row = mysqli_fetch_array($clone_post)){
            $post_author = $row['post_author'];
            $post_user = $row['post_user'];
            $post_cate = $row['post_category'];
            $post_title = $row['post_title'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tag = $row['post_tags'];
            $post_date = $row['post_date'];
            $post_views = $row['post_views_count'];
            }
            $query = "INSERT INTO post_blog ( post_user, post_author
            , post_title, post_content, post_date,post_image
            , post_status, post_category,post_tags,post_views_count)
            VALUES('{$post_user}','{$post_author}','{$post_title}','{$post_content}',now(),
            '{$post_image}','{$post_status}','{$post_cate}','{$post_tag}','{$post_views}')";

            $clone_query = mysqli_query($connection,$query);
        break;
     };

    }
}
?>

<form action="" method="post">
<table class="table table-bordered table-hover">
<div id="bulkoptionContainer" class="col-xs-4">
    <select name="bulkOption" id="bulkOption"  class="form-control">
        <option value="">Select option</option>
        <option value="Published">Published</option>
        <option value="Draft">Draft</option>
        <option value="Delete">Delete</option>
        <option value="Clone">Clone</option>
    </select>
</div>
<div class="col-xs-4">
<input type="submit" class="btn btn-success" name="submit" value="Apply">
<a href="posts.php?source=add_post" class="btn btn-primary">Add new</a>
</div>
                          <thead>
                              <tr>
                                 <th><input id="selectAll" type="checkbox"></th>
                                  <th>ID</th>
                                  <th>AUTHOR</th>
                                  <th>USER</th>
                                  <th>TITLE</th>
                                  <th>STATUS</th>
                                  <th>IMAGE</th>
                                  <th>CONTENT</th>
                                  <th>TAG</th>
                                  <th>CATEGORY</th>
                                  <th>DATE</th>
                                  <th>COMMENTS</th>
                                  <th>POSTS</th>
                                  <th>EDIT</th>
                                  <th>DEL</th>
                              </tr>
                          </thead>
                          <tbody>

                          <?php
                        $query = "SELECT * FROM post_blog ORDER BY post_id DESC";
                        $select_posts = mysqli_query($connection,$query);
                       while($row = mysqli_fetch_assoc($select_posts)){
                        $posts_id = $row['post_id'];
                        $posts_author = $row['post_author'];
                        $posts_user = $row['post_user'];
                        $post_category = $row['post_category'];
                        $posts_title = $row['post_title'];
                        $posts_status = $row['post_status'];
                        $posts_image = $row['post_image'];
                        $posts_content = substr($row['post_content'], 0, 50) ;
                        $posts_tag = $row['post_tags'];
                        $posts_comment = $row['post_comments_count'];
                        $posts_date = $row['post_date'];
                        $posts_views_count = $row['post_views_count'];

                        echo "<tr>";
                        echo "<td><input class='checkboxes' name='checkBoxArray[]' type='checkbox' value='{$posts_id}'> </td>";
                        echo "<td>{$posts_id}</td>";
                        echo "<td>{$posts_author}</td>";
                        echo "<td>{$posts_user}</td>";
                        echo "<td>{$posts_title}</td>";
                        echo "<td>{$posts_status}</td>";
                        echo "<td> <img class='img-responsive' src='../images/{$posts_image}'  width='150px'></td>";
                        echo "<td>{$posts_content}</td>";
                        echo "<td>{$posts_tag}</td>";
                        
                        $query = "SELECT * FROM categories WHERE cat_id = $post_category";
                        $post_cat_query = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($post_cat_query)){
                        testResult($post_cat_query);
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<td>{$cat_title}</td>";
                        }
                        
                        echo "<td>{$posts_date}</td>";

                        $comments_query = "SELECT * FROM commets WHERE comment_post_id = $posts_id";
                        $confirmcomment = mysqli_query($connection, $comments_query);
                        $row = mysqli_fetch_array($confirmcomment);
                        $comment_id = $row['comment_post_id'];
                        $countqueryrows = mysqli_num_rows($confirmcomment);
                        echo "<td> <a href='single_comments.php?id=$posts_id'> {$countqueryrows}</a></td>";

                        echo "<td> <a href='../post.php?p_id=$posts_id'> view posts</a> </td>";
                        echo "<td> <a href='posts.php?source=edit_allpost&p_id= {$posts_id}'> Edit</td>";
                        // echo "<td> <a onclick=\"javascript: return confirm('Are you sure');\" href='posts.php?delete={$posts_id}'> delete</a></td>";
                        echo "<td> <a rel='$posts_id' class='delete' href='javascript:void(0)'> delete</a></td>";
                        echo "<td> <a href='posts.php?reset=$posts_id'>{$posts_views_count}</a></td>";
                        echo "</tr>";
                    }
                        ?>
                          </tbody>
                      </table>
                      </form>
                      <?php 
                        if(isset($_GET['delete'])){
                        $delete = $_GET['delete'];
                        $deletequery = "DELETE FROM post_blog WHERE post_id = {$delete} ";
                        $delete_id = mysqli_query($connection, $deletequery);
                        header("location: posts.php");
                    }

                    if(isset($_GET['reset'])){
                        $views = $_GET['reset'];
                        $viewquery = "UPDATE post_blog SET post_views_count = 0 WHERE post_id = ". mysqli_real_escape_string($connection,$views)."";
                        $view_id = mysqli_query($connection, $viewquery);
                        header("location: posts.php");
                    }
                    ?>
                   
                       
 <script>
 $(document).ready(function(){
     $('.delete').on('click', function(){
         var id = $(this).attr('rel');
         var delete_url = "posts.php?delete="+ id +"";
         $('.modaldel').attr("href", delete_url);
         $('#myModal').modal('show');
     })
 })
 
 </script>                     