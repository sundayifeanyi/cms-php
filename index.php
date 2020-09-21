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
                        $post_id = $_GET['p_id'];
                        }

                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                            }else{
                                $page = '';
                            }

                            if($page == '' || $page == 1){
                                $page_1 = 0;
                            }else{
                                $page_1 = ($page * 5) - 5;
                            }
                    $countquery = "SELECT * FROM post_blog";
                    $select_count = mysqli_query($connection,$countquery);
                    $counts = mysqli_num_rows($select_count);
                   // $counts = ceil($counts/1) ;

                    $query = "SELECT * FROM post_blog LIMIT $page_1, 5";
                    $select_post_blog = mysqli_query($connection,$query);

     
                    while($row = mysqli_fetch_assoc($select_post_blog)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_user = $row['post_user'];
                        // change post authur to user when the need arise
                        $post_author = $row['post_author'];
                        $post_content = $row['post_content'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_status = $row['post_status'];

                        if($post_status ===
                         'Draft'){
                            echo "<h1>SORRY :CONTENT NOT PUBLISHED</h1>";
                        }else{
                        ?>
                        <h1><?php //echo $counts?></h1>
                <h1 class="page-header">
                page header
                <small>Secondary test</small>
                </h1>
                      <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="./images/<?php echo $post_image ?>">
                </a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Second Blog Post content omitted-->
                

           
  
             <?php } 
                        }
                    
                ?>
 <?php
            if(isset($_POST['submitcomment'])){
                $comment_post_id = $_GET['p_id'];
                $post_comment_id = $_POST['comment_id'];
                $author = $_POST['comment_author'];
                $email = $_POST['comment_email'];
                $content = $_POST['comment_content'];

                $query = "INSERT INTO commets (comment_post_id,	comment_author,comment_emial,comment_content,comment_status,comment_date)";
                $query .= "VALUES ($post_comment_id, '{$author}', '{$email}', '{$content}','unapproved',now())";

                $query_comments = mysqli_query($connection,$query);
                if(!$query_comments){
                    die('query fialed' . mysqli_error($connection));
                    }
                }
    ?>
                <div class="well">
                <h4>Leave a comment</h4>
                <form role="form" action="" method="post">
                <div class="form-group">
                <input type="text" class="form-group" name="comment_author" placeholder="author">
                </div>
                <div class="form-group">
                <input type="email" class="form-group" name="comment_email" placeholder="email">
                </div>
                <div class="form-group">
                <select name="comment_id" id="">
                    <?php 
                        
                         $query = "SELECT * FROM post_blog ";
                         $post_cat = mysqli_query($connection,$query);
                         while($row = mysqli_fetch_assoc($post_cat)){
                        //    testResult($post_cat);
                            $post_id = $row['post_id'];
                             $post_title = $row['post_title'];
                             echo "<option value='$post_id'>$post_title</option>";
                         }
                        ?>
                </select>
                </div> 
                        <div class="form-group">
                            <textarea class="form-control" name="comment_content" id="textarea" cols="5" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submitcomment">submit</button>
                </form>
                </div>
                <hr>

                <!-- Posted Comments -->
                <?php
                    if(isset($_GET['p_id'])){
                    $comment_post_id = $_GET['p_id'];
                    }
                    $query = "SELECT * FROM commets";
                    $approve_comments = mysqli_query($connection,$query);
                    if(!$approve_comments){
                        die ('query failed'. mysqli_error($connection));
                    }
                while($row = mysqli_fetch_array($approve_comments)){
                    $comment_author = $row['comment_author'];
                    $comment_content = substr($row['comment_content'], 0, 50) ;
                    $comment_date = $row['comment_date'];
                }
                ?>
                    <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media jumbotron">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="" alt="image">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author?>
                            <small><?php echo $comment_date?></small>
                        </h4>
                        <?php echo $comment_content?>
                        </div>
                </div>

             </div>
             
                
            <!-- Blog Sidebar Widgets Column -->
    <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

        <ul class=pager>
        
        <?php 
             for ($i = 1; $i <= $counts; $i++ ){

                if($i == $page){
                    echo "<li ><a class='active' href='index.php?page={$i}'>{$i}</a></li>";
                } else{
                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }
                    
             }
                
        ?>
        </ul>

       <?php include "./includes/footer.php"?>