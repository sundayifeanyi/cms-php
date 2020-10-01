<?php ob_start(); ?>
<?php session_start();?>
<?php include "catinclude/db.php"?>
<?php include "catinclude/functions.php"?>

<?php 
    if(!isset($_SESSION['role'])){
            header("location: ../index.php");
        }
  
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Sanny</title>

    <!-- Bootstrap Core CSS -->
    <link href="css_admin/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css_admin/sb-admin.css" rel="stylesheet">
    

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css_admin/css.css" rel="stylesheet">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script src="https://cdn.tiny.cloud/1/ehecemuxmcc1o5ql1gd3rlojgqod516iwigyb3zs0c672zxf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="js/jquery.js"></script>
    
</head>

<body>
