<?php include "catinclude/header.php "?>
    <?php
    if(isset($_SESSION['username'])){
       $username = $_SESSION['username'];
       $query = "SELECT * FROM users WHERE username = '{$username}'";
       $queryprofile =mysqli_query($connection,$query);

    while($row=mysqli_fetch_array($queryprofile)){
       $userid = $row['user_id'];
       $password = $row['user_password'];
       $username = $row['username'];
       $userfirstn = $row['user_firstname'];
       $userlastn = $row['user_lastname'];
       $useremail = $row['user_email'];
       $userimage = $row['user_image'];
       $userrole = $row['user_role'];
    }
    }
    
if(isset($_POST['update_profile'])){
    $username= $_POST['username'];
    $userpassword= $_POST['userpassword'];
    $userfirstname= $_POST['userfirstname'];
    $userlastname= $_POST['userlastname'];
    $useremail= $_POST['useremail'];
    $userimage= $_FILES['userimage']['name'];
    $userimage_temp= $_FILES['userimage']['tmp_name'];
    $userrole = $_POST['role'];
    
    move_uploaded_file($userimage_temp,"../images/$userimage");

    if(empty($userimage)){
        $user_image = "SELECT * FROM users WHERE username = '{$username}'";
        $select_user_image = mysqli_query($connection,$user_image);
        while($row = mysqli_fetch_assoc($select_user_image)){
        $userimage = $row['user_image'];
        }
    }

    $query ="UPDATE users SET 
    username= '{$username}',
    user_password= '{$userpassword}',
    user_firstname= '{$userfirstname}',
    user_lastname= '{$userlastname}',
    user_email= '{$useremail}',
    user_image= '{$userimage}',
    user_date = now(),
    user_role = '{$userrole}'
    WHERE username = '{$username}'";

    $update_user_query = mysqli_query($connection,$query);
}
    ?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include "catinclude/navigate.php "?>
        <!-- page-wrapper-->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      <h1 class="text-center">Welcome Back</h1>
                      <form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
        <label for="Username">Username</label>
        <input type="text" value="<?php echo $username;?>" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" value="<?php echo $password;?>" class="form-control" name="userpassword">
    </div>
    <div class="form-group">
        <label for="Firstname">Firstname</label>
        <input type="text" value="<?php echo $userfirstn;?>" class="form-control" name="userfirstname">
    </div>
    <div class="form-group">
        <label for="Lastname">Lastname</label>
        <input type="text" value="<?php echo $userlastn;?>" class="form-control" name="userlastname">
        
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" value="<?php echo $useremail;?>" class="form-control" name="useremail">
    </div>
    <div class="form-group">
        <select name="role" id="">
            <option value=""> <?php echo $userrole;?> </option>
            <?php 
            if($role == 'Admin'){
                echo "<option value='Subscriber'>Subscriber</option>";
            }else{
                echo "<option value='Admin'>Admin</option>";
            }
            ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="Image">Image</label>
        <img src="../images/<?php echo $userimage?>" alt="image loading" class="img-responsive" width="100px">
        <input type="file" class="form-control" name="userimage">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_profile" value="submit">
    </div>
</form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
</div>
<?php include "catinclude/footer.php "?>