<table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>AUTHOR</th>
                                  <th>USER</th>
                                  <th>TITLE</th>
                                  <th>STATUS</th>
                                  <th>IMAGE</th>
                                  <th>CONTENT</th>
                                  <th>TAG</th>
                                  <th>CATEGORY</th>
                                  <th>DATE</th>
                                  <th>COMMENTS</th>
                                  <!-- <th>COUNT</th> -->
                                  <th>EDIT</th>
                                  <th>DEL</th>
                              </tr>
                          </thead>
                          <tbody>

                          <?php
                        $query = "SELECT * FROM post_blog ";
                        $select_posts = mysqli_query($connection,$query);
                       while($row = mysqli_fetch_assoc($select_posts)){
                        $posts_id = $row['post_id'];
                        $posts_author = $row['post_author'];
                        $posts_user = $row['post_user'];
                        $post_category = $row['post_category'];
                        $posts_title = $row['post_title'];
                        $posts_status = $row['post_status'];
                        $posts_image = $row['post_image'];
                        $posts_content = substr($row['post_content'], 0, 50) ;
                        $posts_tag = $row['post_tags'];
                        $posts_comment = $row['post_comments_count'];
                        $posts_date = $row['post_date'];
                        $posts_views_count = $row['post_views_count'];

                        echo "<tr>";
                        echo "<td>{$posts_id}</td>";
                        echo "<td>{$posts_author}</td>";
                        echo "<td>{$posts_user}</td>";
                        echo "<td>{$posts_title}</td>";
                        echo "<td>{$posts_status}</td>";
                        echo "<td> <img class='img-responsive' src='../images/{$posts_image}'  width='150px'></td>";
                        echo "<td>{$posts_content}</td>";
                        echo "<td>{$posts_tag}</td>";
                        
                        $query = "SELECT * FROM categories WHERE cat_id = $post_category";
                        $post_cat_query = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($post_cat_query)){
                        testResult($post_cat_query);
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<td>{$cat_title}</td>";
                        }
                        
                        echo "<td>{$posts_date}</td>";
                        echo "<td>{$posts_comment}</td>";
                        // echo "<td>{$posts_views_count}</td>";
                        echo "<td> <a href='posts.php?source=edit_allpost&p_id= {$posts_id}'> Edit</td>";
                        echo "<td> <a href='posts.php?delete={$posts_id}'> delete</td>";
                        echo "</tr>";
                    }
                        ?>
                          </tbody>
                      </table>
                      <?php 
                        if(isset($_GET['delete'])){
                        $delete = $_GET['delete'];
                        $deletequery = "DELETE FROM post_blog WHERE post_id = {$delete} ";
                        $delete_id = mysqli_query($connection, $deletequery);
                    }
                    ?>
                   
                       
                      