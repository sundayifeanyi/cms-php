<?php include "includes/db.php"; ?>



<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                

               <?php 
               $query = "SELECT * FROM categories";
               $select_categories = mysqli_query($connection,$query);
               testResult($select_categories);
               while($row = mysqli_fetch_assoc($select_categories)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    $cat_class= '';
                    $reg_class='';
                    $pagename = basename($_SERVER['PHP_SELF']);
                    $registration = 'registration.php';
                    if(isset($_GET['category']) && $_GET['category'] == $cat_id){
                        $cat_class= 'active'; 
                    }else{
                        $reg_class = 'active';
                    }
                   echo "<li class='$cat_class'> <a href='category.php?category= $cat_id'>{$cat_title}</a></li>";
               }
               
               ?>
               
               ?>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <li class='<?php echo $reg_class;?>'>
                        <a href="registration.php">Registration</a>
                    </li>

                    <li>
                        <a href="contact.php">contact us</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
