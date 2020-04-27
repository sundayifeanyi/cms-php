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
                                  <th>CATEGORY</th>
                                  <th>TAG</th>
                                  <th>DATE</th>
                                  <th>COMMENTS</th>
                                  <th>V_COUNT</th>
                                  <th>REMOVE</th>
                                  <th>EDIT</th>
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
                        $posts_cate = $row['post_category'];
                        $posts_title = $row['post_title'];
                        $posts_status = $row['post_status'];
                        $posts_image = $row['post_image'];
                        $posts_content = $row['post_content'];
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
                        echo "<td>{$posts_cate}</td>";
                        echo "<td>{$posts_date}</td>";
                        echo "<td>{$posts_comment}</td>";
                        echo "<td>{$posts_views_count}</td>";
                        echo "<td> <a href='posts.php?edit&p_id= {$posts_id}'> Edit</td>";
                        echo "<td> <a href='posts.php?delete= {$posts_id}'> delete</td>";
                        echo "</tr>";
             
                       }
                        ?>
                          </tbody>
                      </table>

                      <?php delete_posts() ?>