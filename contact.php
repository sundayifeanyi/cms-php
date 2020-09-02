<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

 <?php
if(isset($_POST['submit'])){
    $to = 'thekingdomsunday@yahoo.com';
    $subject= $_POST['subject'];
    $name= $_POST['name'];
    $content= $_POST['content'];
    
      if(!empty($to) && !empty($subject) && !empty($content)){

        $to = mysqli_escape_string($connection,$to);
        $subject  = mysqli_escape_string($connection,$subject);
        $content = mysqli_escape_string($connection,$content);

    $queryme = "INSERT INTO contact (ids,subjects,content)
    VALUES('{$name}','{$subject}','{$content}')";

    $contact_me = mysqli_query($connection,$contact_me);
    //echo "1 User Created Successfully: " . " " . "<a href='admin/users.php'>View Users</a>";
    $message = 'message submitted Successfully';
    if(!$contact_me){
        die('Fialed request' . mysqli_error($connection) . ' '. mysqli_errno($connection));
    }
}
    else{
        echo "<h3 class='text-center'> Field(s) cannot be empty  </h3>";
    } 
}
?>
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Please we love to hear from you</h1>
                    <form role="form" action="contact.php" method="post" id="contact-form" autocomplete="on" enctype="multipart/form-data">
                    <div class="form-group">
                            <label for="fname" class="sr-only">Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter Name">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter subject">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Content</label>
                            <textarea  class="form-control" name="content" id="body" placeholder="message"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-save" class="btn btn-custom btn-lg btn-block" value="Save">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
