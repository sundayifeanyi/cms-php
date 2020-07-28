<?php include "db.php"; ?>
<?php session_start(); ?>
<?php
         if(isset($_POST['login'])){
            $usern = $_POST['username'];
            $passw = $_POST['password'];

            $usern = mysqli_real_escape_string($connection,$usern);
            $passw = mysqli_real_escape_string($connection,$passw);

           // $passw = password_hash($passw, PASSWORD_BCRYPT, array('cost' => 12));

            $query = "SELECT * FROM users WHERE username = '{$usern}'";
            $select = mysqli_query($connection,$query);
            if(!$select){
                die('QUERY FAILED'. mysqli_error($connection));
            }

            while($row=mysqli_fetch_array($select)){
               $new_userid = $row['user_id'];
               $new_password = $row['user_password'];
               $new_username = $row['username'];
               $new_userfirstn = $row['user_firstname'];
               $new_userlastn = $row['user_lastname'];
               $new_userrole = $row['user_role'];
            }

           // $passw = crypt($passw, $new_password);
          // if($usern === $new_username && $passw === $new_password && $new_userrole == 'Admin')
            if(password_verify($passw,$new_password)){
                if($new_userrole == 'Admin'){
                $_SESSION['username'] = $new_username;
                $_SESSION['firstname'] = $new_userfirstn;
                $_SESSION['lastname'] = $new_userlastn;
                $_SESSION['role'] = $new_userrole;
                header("location: ../admin");
            
           // }elseif($usern == $new_username && $passw == $new_password){

                // $_SESSION['username'] = $new_username;
                // $_SESSION['firstname'] = $new_userfirstn;
                // $_SESSION['lastname'] = $new_userlastn;
                // $_SESSION['role'] = $new_userrole;
                //$session['username'] = $new_username;
                }
            }else{header("location: ../index.php");}
        }
    ?>