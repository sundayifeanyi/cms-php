<?php include "catinclude/admin_header.php "?>


    <div id="wrapper">

        <!-- Navigation -->
       <?php include "catinclude/navigate.php "?>
        <!-- page-wrapper-->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      <h1 class="text-center">Welcome Back</h1>
                        
                      <?php
                      if(isset($_GET['source'])){

                        $source = $_GET['source'];

                        }else{
                            $source = "";
                        }
                        switch($source) {
                            case "add_post";
                            include "./catinclude/add_post.php";
                        break;
                            case "edit_allpost";
                            include "./catinclude/edit_allpost.php";
                        break;
                        default ;
                        include "./catinclude/view_comments.php";
                      }
                      
                      ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>
<?php include "catinclude/admin_footer.php "?>