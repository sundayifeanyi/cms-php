<?php //ob_start(); ?>
<?php include "db.php"; ?>
<?php session_start(); ?>
<?php

$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['role'] = null;

header("location: ../index.php");

?>