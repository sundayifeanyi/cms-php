<?php include "includes/db.php"?>
<?php include "includes/header.php"?>
    <!-- Navigation -->
<?php include "./includes/navigation.php"?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">

                <?php

                    if(isset($_GET['p_id'])){
                        $d_post_id = $_GET['p_id'];
                        $d_author = $_GET['author'];
                        }
                    $query = "SELECT * FROM post_blog WHERE post_author = '{$d_author}'";
                    $select_post_blog = mysqli_query($connection,$query);
     
                    while($row = mysqli_fetch_assoc($select_post_blog)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_user = $row['post_user'];
                        $post_author = $row['post_author'];
                        $post_content = substr($row['post_content'], 0, 100) ;
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        echo "<a href='#'>User: {$post_user}</a>";

                        ?>
                <h1 class="page-header">
                page header
                <small>Secondary test</small>
                </h1>
                      <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author ?> & p_id = <?php echo $post_id?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="./images/<?php echo $post_image ?>" alt="images">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Second Blog Post content omitted-->
                

           
  
             <?php } 
                    
                ?>
 <?php
                if(isset($_POST['submitcomment'])){
                    $d_post_id = $_GET['p_id'];
                    $author = $_POST['comment_author'];
                    $email = $_POST['comment_email'];
                    $content = $_POST['comment_content'];
                    
                    if(!empty($author) && !empty($email) && !empty($content)){

                    $query = "INSERT INTO commets (comment_post_id,	comment_author,comment_emial,comment_content,comment_status,comment_date)";
                    $query .= "VALUES ($d_post_id, '{$author}', '{$email}', '{$content}','unapproved',now())";

                    $query_comments = mysqli_query($connection,$query);
                    if(!$query_comments){
                        die('query fialed' . mysqli_error($connection));
                    }

                    $query = "UPDATE post_blog SET post_comments_count = post_comments_count + 1 WHERE post_id = $d_post_id";
                    $count_query = mysqli_query($connection,$query);
                } else {
                    //echo "<script> window.alert('fields can't be empty');</script>";
                    echo '<script language="javascript">';
                    echo 'alert("Field(s) Can\'t Be empty")';  //not showing an alert box.
                    echo '</script>';
                }
                }
                ?>

                <!-- Posted Comments -->
                <?php
                    $query = "SELECT * FROM commets WHERE comment_post_id = {$d_post_id}
                    AND comment_status = 'approved' 
                    ORDER BY comment_id DESC";

                    
                    $approve_comments = mysqli_query($connection,$query);
                    if(!$approve_comments){
                        die ('query failed'. mysqli_error($connection));
                    }
                while($row = mysqli_fetch_array($approve_comments)){
                    $comment_author = $row['comment_author'];
                    $comment_content = substr($row['comment_content'], 0, 50) ;
                    $comment_date = $row['comment_date'];
                ?>
                    <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media jumbotron">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="/images/ss" alt="image">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author?>
                            <small><?php echo $comment_date?></small>
                        </h4>
                        <?php echo $comment_content?>
                        </div>
                </div>
                <?php } 
                    
                ?>

             </div>
             
                
            <!-- Blog Sidebar Widgets Column -->
    <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

       <?php include "./includes/footer.php"?>