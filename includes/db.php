<?php ob_start();

$connection = mysqli_connect('localhost','root','','cms');
if(!$connection){
    echo 'not connected';
}
?>
