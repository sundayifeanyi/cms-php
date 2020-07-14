<?php
if(isset($_POST['checkBoxArray'])){

   foreach( $_POST['checkBoxArray'] as $checkBoxId ){
     $bulkOption = $_POST['bulkOption'];
     switch ($bulkOption){
        case 'Delete':
            $queryD = "DELETE FROM users WHERE user_id = {$checkBoxId}";
            $update_query = mysqli_query($connection,$queryD);
        break;
     };

    }
}
?>

<table class="table table-bordered table-hover">
<div id="bulkoptionContainer" class="col-xs-4">
    <select name="bulkOption" id="bulkOption"  class="form-control">
        <option value="Delete">Delete</option>
    </select>
</div>
<div class="col-xs-4">
<input type="submit" class="btn btn-success" name="submit" value="Apply">
                          <thead>
                              <tr>
                              <th><input id="selectAll" type="checkbox"></th>
                                  <th>Id</th>
                                  <th>Username</th>
                                  <th>Password</th>
                                  <th>Fname</th>
                                  <th>Lname</th>
                                  <th>Email</th>
                                  <th>Image</th>
                                  <th>Date</th>
                                  <th>Role</th>
                                  <th>Ch_Role</th>
                                  <th>Ch_Role</th>
                                  <th>Edit</th>
                                  <th>Del</th>
                              </tr>
                          </thead>
                          <tbody>

                          <?php
                        $query = "SELECT * FROM users ";
                        $select_users = mysqli_query($connection,$query);
                       while($row = mysqli_fetch_assoc($select_users)){
                        $id = $row['user_id'];
                        $username = $row['username'];
                        $password = $row['user_password'];
                        $firstname = $row['user_firstname'];
                        $lastname = $row['user_lastname'];
                        $email = $row['user_email'];
                        $image = $row['user_image'];
                        $date = $row['user_date'];
                        $role = $row['user_role'];
                        //$encryt = $row['encrytpass'];

                        echo "<tr>";
                        echo "<td><input class='checkboxes' name='checkBoxArray[]' type='checkbox' value='{$id}'> </td>";
                        echo "<td>{$id}</td>";
                        echo "<td>{$username}</td>";
                        echo "<td>{$password}</td>";
                        echo "<td>{$firstname}</td>";
                        echo "<td>{$lastname}</td>";
                        echo "<td>{$email}</td>";
                        echo "<td> <img class='img-responsive' src='../images/{$image}'  width='150px'></td>";
                        echo "<td>{$date}</td>";
                        echo "<td>{$role}</td>";
                        //echo "<td>{$encryt}</td>";
                        echo "<td> <a href='users.php?change_to_admin={$id}'>Admin</td>";
                        echo "<td> <a href='users.php?change_to_subscriber={$id}'>Subscriber</td>";
                        echo "<td> <a href='users.php?source=edit_user&u_id={$id}'> Edit</td>";
                        echo "<td> <a href='users.php?delete={$id}'> del</td>";
                        echo "</tr>";
                    }
                        ?>
                          </tbody>
                      </table>
                      <?php 


if(isset($_GET['change_to_admin'])){
   $change = $_GET['change_to_admin'];
   $changerole = "UPDATE users SET user_role = 'Admin' WHERE user_id = $change";
   $approve = mysqli_query($connection,  $changerole);
   header("location: users.php");
}

if(isset($_GET['change_to_subscriber'])){
    $changeit = $_GET['change_to_subscriber'];
    $changerole = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $changeit";
    $approve = mysqli_query($connection,  $changerole);
    header("location: users.php");
 }
                        if(isset($_GET['delete'])){
                        $delete = $_GET['delete'];
                        $deleteuser = "DELETE FROM users WHERE user_id = {$delete} ";
                        $delete_user = mysqli_query($connection, $deleteuser);
                        header("location: users.php");
                    }
                    ?>
                   
                       
                      