<?php
 
 function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection,$string);
 }


function online_session(){

    if(isset($_GET['usersonline'])){
    global $connection;

    if(!$connection){
    session_start();
    include ("../catinclude/db.php");
    $session = session_id();
    $time = time();
    $time_out = 5;
    $total_time_spent = $time - $time_out;

    $query = "SELECT * FROM user_online WHERE session = '{$session}'";
    $call_query = mysqli_query($connection,$query);
    $counts = mysqli_num_rows($call_query);

    if($counts == NULL){

        $online_query = "INSERT INTO user_online (session,time) VALUES ('$session','$time')";
        mysqli_query($connection,$online_query);

    }else{
        
        $online_query_update = "UPDATE user_online SET time = '$time' WHERE session = '$session'";
        mysqli_query($connection,$online_query_update);
    }

    $querysession = "SELECT * FROM user_online WHERE time > '{$time_out}'";
    $session_query = mysqli_query($connection,$querysession);
    $count_online_users = mysqli_num_rows($session_query);
    echo $count_online_users;
    }
  }// get request for url reload
}

online_session();
//testResult(online_session());
//test queries
function testResult($result){
    global $connection;
    if(!$result){
        die("ERROR...". mysqli_error($connection));
    }
}

function insert_session(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title)){
            echo "<i> you cant submit an empty field </i>";
        } else{
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";
            $create_categorys = mysqli_query($connection,$query);
            if(!$create_categorys){
                die('QUERY FAILED' . mysqli_error($connection));
            }
           
        }
    }
}

// findallcat

function findall_session(){
    global $connection;
    $query = "SELECT * FROM categories LIMIT 10";
                $select_categorys = mysqli_query($connection,$query);
               while($row = mysqli_fetch_assoc($select_categorys)){
                $cat_id = $row['cat_id'];
                   $cat_title = $row['cat_title'];
                   echo "<tr>";
                   echo "<td>{$cat_id}</td>";
                   echo "<td>{$cat_title}</td>";
                   echo "<td> <a href='categorys.php?delete= {$cat_id}'> delete</td>";
                   echo "<td> <a href='categorys.php?edit= {$cat_id}'> Edit</td>";
                   echo "</tr>";
               }
}

function delete_session(){
    global $connection;
if(isset($_GET['delete'])){
    $del = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$del} ";
    $del_id = mysqli_query($connection, $query);
    header("location: categorys.php");
 }
}
//delete posts from all_posts
function delete_posts(){
    global $connection;
if(isset($_GET['delete'])){
    $delete = $_GET['delete'];
    echo "delete";
    $deletequery = "DELETE FROM post_blog WHERE post_id = {$delete} ";
    $delete_id = mysqli_query($connection, $deletequery);
    header("location: all_posts.php");
    testResult($deletequery);
 }
}

function record_count($table){
    global $connection;
    $query = "SELECT * FROM " .$table;
    $select = mysqli_query($connection, $query);
    $result =mysqli_num_rows($select);
    testResult($result);
    return $result;
}

function disabled($table,$column,$value){
    global $connection;
    $query = "SELECT * FROM $table WHERE $column = '$value'";
    $select_result = mysqli_query($connection, $query);
    return mysqli_num_rows($select_result);
}

// update session in all_post
function update(){
    if(isset($_GET['update'])){
        $update_id = $_GET['update'];
        $updatequery = "SELECT * FROM post_blog WHERE post_id = $update_id ";
        $update_posts_id = mysqli_query($connection,$selectquery);
        while($row = mysqli_fetch_assoc($update_posts_id)){
        $post_id = $row['post_id'];
        
        ?>
         <div class="form-group">
            <input value="<?php if(isset($cat_title)){ echo $cat_title;}?>" class="form-control" type="text" name="cat_title">
        </div>
    <?php }  }?>
       <?php
            if(isset($_POST['update'])){
            $update = $_POST['cat_title'];
            $update_query = "UPDATE categories SET cat_title = '{$update}' WHERE cat_id = $cat_id";
            $update_query_set = mysqli_query($connection,$update_query) ;
            if(!$update_query){
                die("QUERY FIALED " . mysqli_error($connection));
            }
            }
}
?>