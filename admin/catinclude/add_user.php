<?php
if(isset($_POST['create_user'])){
    $username= $_POST['username'];
    $userpassword= $_POST['userpassword'];
    $userfirstname= $_POST['userfirstname'];
    $userlastname= $_POST['userlastname'];
    $useremail= $_POST['useremail'];
    $userimage= $_FILES['userimage']['name'];
    $userimage_temp= $_FILES['userimage']['tmp_name'];
    $userrole = $_POST['role'];
    //$userdate= date('d-m-y');
    
    move_uploaded_file($userimage_temp,"../images/$userimage");

    $query = "INSERT INTO users (username,user_password
    ,user_firstname,user_lastname,user_email,user_image
    ,user_date,user_role)
    VALUES('{$username}','{$userpassword}','{$userfirstname}','{$userlastname}',
    '{$useremail}','{$userimage}',now(),'{$userrole}')";

    $create_user_query = mysqli_query($connection,$query);
    echo "1 User Created Successfully: " . " " . "<a href='users.php'>View Users</a>";
   
    //testResult($create_post_query);
}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
        <label for="Username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name="userpassword">
    </div>
    <div class="form-group">
        <label for="Firstname">Firstname</label>
        <input type="text" class="form-control" name="userfirstname">
    </div>
    <div class="form-group">
        <label for="Lastname">Lastname</label>
        <input type="text" class="form-control" name="userlastname">
        
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" class="form-control" name="useremail">
    </div>
    <div class="form-group">
        <label for="Image">Image</label>
        <input type="file" class="form-control" name="userimage">
    </div>
    <div class="form-group">
        <select name="role" id="">
            <option value="subcriber">select</option>
            <option value="admin">Admin</option>
            <option value="subcriber">subcriber</option>
        </select>
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
        <input type="submit" class="btn btn-primary" name="create_user" value="submit">
    </div>
</form>