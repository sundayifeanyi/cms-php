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
                        <h1 class="page-header">
                            welcome to admin page
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">

                        <?php insert_session(); ?>
                            <form action="" method="post">
                            <label for="cat-title">Add Cart</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add cart">
                                </div>
                            </form>
                        <?php 
                        if(isset($_GET['edit'])){
                            $edit_id = $_GET['edit'];
                            include "catinclude/update_cat.php";
                        }
                        ?>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category</th>
                                        <th>delete_Id</th>
                                        <th>Edit_Id</th>
                                    </tr>
                                </thead>
                                <tbody>
                <?php // display all categories session
                findall_session();
               ?>

                <?php // ddelet_session
                delete_session();
                ?>             
                                </tbody>
                            </table>
                        </div>
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

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>
<?php include "catinclude/admin_footer.php "?>