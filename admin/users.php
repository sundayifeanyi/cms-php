<?php include "catinclude/header.php "?>


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
                            case "add_user";
                            include "./catinclude/add_user.php";
                        break;
                        
                            case "edit_user";
                            include "./catinclude/edit_user.php";
                        break;
                        default ;
                        include "./catinclude/view_users.php";
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
<?php include "catinclude/footer.php "?>