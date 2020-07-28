<?php

    if(isset($_GET['u_id'])){
    $u_id = $_GET['u_id'];

    $query = "SELECT * FROM users WHERE user_id = $u_id ";
    $select_users_by_id = mysqli_query($connection,$query);
   while($row = mysqli_fetch_assoc($select_users_by_id)){
    $usename= $row['username'];
    $password= $row['user_password'];
    $firstname= $row['user_firstname'];
    $lastname= $row['user_lastname'];
    $email= $row['user_email'];
    $image= $row['user_image'];
    $role = $row['user_role'];
     }
   
   }
      
if(isset($_POST['update_user'])){
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
        $user_image = "SELECT * FROM users WHERE user_id = $u_id";
        $select_user_image = mysqli_query($connection,$user_image);
        while($row = mysqli_fetch_assoc($select_user_image)){
        $userimage = $row['user_image'];
        }
    }

//     $query = "SELECT encrytpass FROM users";
//    $randquery = mysqli_query($connection, $query);
//    if(!$randquery){
//        die('Query fialed'. mysqli_error($connection));
//    } 

    //   $row = mysqli_fetch_array($randquery);
    //   $emcrypt = $row['encrytpass'];
    //   $hashedpassword = crypt($userpassword,$emcrypt);
    $hashedpassword = password_hash($userpassword, PASSWORD_BCRYPT, array('cost' => 12));

    $query ="UPDATE users SET 
    username= '{$username}',
    user_password= '{$hashedpassword}',
    user_firstname= '{$userfirstname}',
    user_lastname= '{$userlastname}',
    user_email= '{$useremail}',
    user_image= '{$userimage}',
    user_date = now(),
    user_role = '{$userrole}'
    WHERE user_id = $u_id";

    $update_user_query = mysqli_query($connection,$query);
}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
        <label for="Username">Username</label>
        <input type="text" value="<?php echo $usename;?>" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" value="<?php echo $password;?>" class="form-control" name="userpassword">
    </div>
    <div class="form-group">
        <label for="Firstname">Firstname</label>
        <input type="text" value="<?php echo $firstname;?>" class="form-control" name="userfirstname">
    </div>
    <div class="form-group">
        <label for="Lastname">Lastname</label>
        <input type="text" value="<?php echo $lastname;?>" class="form-control" name="userlastname">
        
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" value="<?php echo $email;?>" class="form-control" name="useremail">
    </div>
    <div class="form-group">
        <select name="role" id="">
            <option value="<?php echo $role;?>"> <?php echo $role;?> </option>
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
        <img src="../images/<?php echo $image?>" alt="image loading" class="img-responsive" width="100px">
        <input type="file" class="form-control" name="userimage">
    </div>
    
    <!-- <div class="form-group">
        <label for="Date">Date</label>
        <input type="date" class="form-control" name="userdate">
    </div> -->
    <!-- <div class="form-group">
        <label for="post_tag">post_tag</label>
        <input type="text" class="form-control" name="post_tag">
    </div> -->
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_user" value="submit">
    </div>
</form>