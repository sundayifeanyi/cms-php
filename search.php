<?php include "includes/db.php"?>
<?php include "includes/header.php"?>
<?php include "includes/navigation.php"?>
   
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
if(isset($_POST['submit'])){
    $search =  $_POST['search'];

    $query = "SELECT * FROM post_blog WHERE post_category LIKE '%$search%' ";
    $search_query = mysqli_query($connection,  $query);

    if(!$search_query){
        die("query failed" . mysqli_error($connection));
    }
    $count = mysqli_num_rows($search_query);
    if($count == 0){
        echo "<h4>Sadly, there is no information on your Search request</h4>";
        echo "<p> 
        Make sure that the information you enter is correct or 
        specify another number. After fixing the mistake,
        <b> <em> please try again...</em> </b>Also you can use 
        manual search in case there is no information on your request.
        </p>";
    } else{
        // $query = "SELECT * FROM post_blog";
        // $select_post_blog = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($search_query)){
            $post_title = $row['post_title'];
            $post_user = $row['post_user'];
            $post_author = $row['post_author'];
            $post_content = $row['post_content'];
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
        by <a href="index.php"><?php echo $post_author ?></a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
    <hr>
    <img class="img-responsive" src="./images/<?php echo $post_image ?>" alt="images">
    <hr>
    <p><?php echo $post_content ?></p>
    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>
    <?php 
        } 

    }
}

             ?>
             </div>
                
            <!-- Blog Sidebar Widgets Column -->
    <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

       <?php include "./includes/footer.php"?>