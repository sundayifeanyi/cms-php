<div class="col-md-4">
<?php
// if(isset($_POST['submit'])){
//     $search =  $_POST['search'];

//     $query = "SELECT * FROM post_blog WHERE post_tags LIKE '%$search%'";
//     $search_query = mysqli_query($connection,  $query);

//     if(!$search_query){
//         die("query failed" . mysqli_error($connection));
//     }
//     $count = mysqli_num_rows($search_query);
//     if($count == 0){
//         echo "<h1> NO RESULT </h1>";
//     }
// }
 
?>
<!-- Blog Search Well -->
<div class="well">

<?php 
               $query = "SELECT * FROM categories LIMIT 6";
               $select_categories_sidebar = mysqli_query($connection,$query);
               ?>
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

            <?php 
               while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                   $cat_title = $row['cat_title'];
                   echo "<li> <a href='#'>{$cat_title}</a></li>";
               }
               
               ?>
                <!-- <li><a href="#">Category title</a>
                </li>
                <li><a href="#">Category user</a>
                </li>
                <li><a href="#">Category author</a>
                </li>
                <li><a href="#">Category content</a>
                </li> -->
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <!-- <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category title</a>
                </li>
                <li><a href="#">Category user</a>
                </li>
                <li><a href="#">Category author</a>
                </li>
                <li><a href="#">Category content</a>
                </li>
            </ul>
        </div> -->
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
<?php include "widget.php"?>
    </div>

</div>