<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

 <?php
if(isset($_POST['submit'])){

   //you can also write a function for user register()
    $uname= $_POST['username'];
    $upassword= $_POST['password'];
    $uemail= $_POST['email'];
    $ufirstname= $_POST['fname'];
    $ulastname= $_POST['lname'];
    $uimage= $_FILES['image']['name'];
    $uimage_temp= $_FILES['image']['tmp_name'];
    
    move_uploaded_file($uimage_temp,"./images/$uimage");

    
      if(!empty($uname) && !empty($uemail) && !empty($upassword) &&
       !empty($ufirstname) && !empty($ulastname)){

        $uname = mysqli_escape_string($connection,$uname);
        $uemail  = mysqli_escape_string($connection,$uemail);
        $upassword = mysqli_escape_string($connection,$upassword);
        $ufirstname = mysqli_escape_string($connection,$ufirstname);
        $ulastname = mysqli_escape_string($connection,$ulastname);

        if(checkuserexist($uname)){
            echo "<h3 class='text-center'> {$username} already exist..   </h3>";
        }
        
         $upassword = password_hash('secret', PASSWORD_BCRYPT, array('cost' => 12));

    $queryme = "INSERT INTO users (username,user_password
    ,user_firstname,user_lastname,user_email,user_image
    ,user_date,user_role)
    VALUES('{$uname}','{$upassword}','{$ufirstname}','{$ulastname}',
    '{$uemail}','{$uimage}',now(),'Subscriber')";

    $create_user_query = mysqli_query($connection,$queryme);
    //echo "1 User Created Successfully: " . " " . "<a href='admin/users.php'>View Users</a>";
    $message = 'User Created Successfully';
    if(!$create_user_query){
        die('Fialed request' . mysqli_error($connection) . ' '. mysqli_errno($connection));
    }
}
    else{
        echo "<h3 class='text-center'> Field(s) cannot be empty  </h3>";
    } 
}
?>
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>kindly Register</h1>
                    <form role="form" action="registration.php" method="post" id="Registration-form" autocomplete="on" enctype="multipart/form-data">
                    <div class="form-group">
                            <label for="fname" class="sr-only">Lastname</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter Firstname">
                        </div>
                        <div class="form-group">
                            <label for="lname" class="sr-only">Lastname</label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Lastname">
                        </div>
                        <div class="form-group">
                            <label for="image" class="sr-only">Image</label>
                            <input type="file" name="image"  class="form-control" placeholder="choose image">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
