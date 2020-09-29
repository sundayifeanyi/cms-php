<?php include "catinclude/admin_header.php"?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "catinclude/navigate.php"?>
        

        <div id="page-wrapper">


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            welcome 
                            <small> <?php echo $_SESSION['firstname'];?> </small>
                        </h1>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $post_counts = record_count('post_blog');?></div><div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="/cms-php/admin/posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $comment_counts = record_count('commets');?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                    $query = "SELECT * FROM users";
                    $select = mysqli_query($connection, $query);
                    $user_counts =mysqli_num_rows($select);
                    echo "<div class='huge'>$user_counts</div>";
                    ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="/cms-php/admin/users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                    $query = "SELECT * FROM categories";
                    $select = mysqli_query($connection, $query);
                    $cat_counts =mysqli_num_rows($select);
                    echo "<div class='huge'>$cat_counts</div>";
                    ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categorys.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- row_end -->
<div class="row">
    <?php
    $draft_counts = disabled( "post_blog",'post_status','published');

    $query = "SELECT * FROM commets WHERE comment_status = 'unapproved'";
    $select_unapproved_comments = mysqli_query($connection, $query);
    $unapproved_comments =mysqli_num_rows($select_unapproved_comments);

    
    // $query = "SELECT * FROM categories WHERE ";
    // $select_ = mysqli_query($connection, $query);
    // $cat_counts =mysqli_num_rows($select);
    ?>

<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Counts'],
          <?php
          $Entries = ['Posts','Published','Categories','Users','Comments','unapproved_comments'];
          $counts = [$post_counts,$draft_counts,$cat_counts,$user_counts,$comment_counts,$unapproved_comments];
          for($i= 0; $i < 6; $i++){
              echo "['{$Entries[$i]}'" . "," . "{$counts[$i]}],";
          }
          ?>
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  
    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
  
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "catinclude/admin_footer.php"?>