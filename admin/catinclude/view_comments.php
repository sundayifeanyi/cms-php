<table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>AUTHOR</th>
                                  <th>RESPONSE TO</th>
                                  <th>EMAIL</th>
                                  <th>STATUS</th>
                                  <th>CONTENT</th>
                                  <th>DATE</th>
                                  <th>APPROVED</th>
                                  <th>UNAPPROVED</th>
                                  <!-- <th>EDIT</th> -->
                                  <th>DELETE</th>
                              </tr>
                          </thead>
                          <tbody>

                          <?php
                        $query = "SELECT * FROM commets ";
                        $post_comments = mysqli_query($connection,$query);
                       while($row = mysqli_fetch_assoc($post_comments)){
                        $comment_id = $row['comment_id'];
                        $comment_title = $row['comment_post_id'];
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_emial'];
                        $comment_content = substr($row['comment_content'], 0, 50) ;
                        $comment_status = $row['comment_status'];
                        $comment_date = $row['comment_date'];

                        echo "<tr>";
                        echo "<td>{$comment_id}</td>";
                        echo "<td>{$comment_author}</td>";

                        $query = "SELECT * FROM post_blog WHERE post_id = $comment_title";
                        $select_post_blog_comment = mysqli_query($connection,$query);
     
                        while($row = mysqli_fetch_assoc($select_post_blog_comment)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        echo "<td><a href='../post.php?p_id = $post_id'>$post_title</a></td>";
                        }
                        echo "<td>{$comment_email}</td>";
                        echo "<td>{$comment_status}</td>";
                        echo "<td>{$comment_content}</td>";
                        echo "<td>{$comment_date}</td>";
                        echo "<td> <a href='comments.php?approved={$comment_id}'>Approved</td>";
                        echo "<td> <a href='comments.php?unapproved={$comment_id}'>unapproved</td>";
                        //echo "<td> <a href='post.php?source=edit_allpost&p_id= {$comment_id}'> Edit</td>";
                        echo "<td> <a href='comments.php?delete={$comment_id}'> delete</td>";
                        echo "</tr>";
                    }
                        ?>
                          </tbody>
                      </table>
                      <?php 
                         if(isset($_GET['approved'])){
                            $approve = $_GET['approved'];
                            $approvecomments = "UPDATE commets SET comment_status = 'approved' WHERE comment_id = $approve";
                            $approve = mysqli_query($connection,  $approvecomments);
                            header("location: comments.php");
                        }

                        if(isset($_GET['unapproved'])){
                            $unapprove = $_GET['unapproved'];
                            $unapprovecomments = "UPDATE commets SET comment_status = 'unapproved' WHERE comment_id = $unapprove";
                            $unapprove = mysqli_query($connection,  $unapprovecomments);
                            header("location: comments.php");
                        }

                        if(isset($_GET['delete'])){
                        $delete = $_GET['delete'];
                        $deletecomments = "DELETE FROM commets WHERE comment_id = {$delete} ";
                        $delete_id = mysqli_query($connection, $deletecomments);
                        header("location: comments.php");
                    }
                    ?>



                   
                       
                      