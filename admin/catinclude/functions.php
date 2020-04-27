<?php
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
    $query = "DELETE FROM post_blog WHERE post_id = {$delete} ";
    $delete_id = mysqli_query($connection, $query);
    header("location: all_posts.php");
 }
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