<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">

<?php 
               //$query = "SELECT * FROM categories LIMIT 6";
               $query = "SELECT * FROM categories";
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
    
    
    <?php if(isset($_SESSION['role'])):?>
        <h4>Logged in as <? echo $_SESSION['username'];?></h4>
    <?php else:?>

        <?php endif; ?>

    <!-- /login form -->
    <h4>Login</h4>
    <form action="includes/login.php" method="post">
    <div class="form-group">
        <input name="username" type="text" class="form-control" placeholder="username"> <br>
        <input name="password" type="password" class="form-control" placeholder="password"> <br>
        <span class="input-group-btn"> 
            <button name="login" class="btn btn-default" type="submit"> login
                <!-- <span class="glyphicon glyphicon-search"></span> -->
        </button>
        </span>
    </div>
    </form>

</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

            <?php 
               while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                   echo "<li> <a href='category.php?category= $cat_id'>{$cat_title}</a></li>";
               }
               
               ?>
            </ul>
        </div>
       
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
<?php include "widget.php"?>
    </div>

</div>