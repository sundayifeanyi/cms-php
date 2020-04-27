<?php
$db['host'] = 'localhost';
$db['root'] =  'root';
$db['cmsdb']= 'cms';
$db['pass'] = "";

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$connection = mysqli_connect (HOST,ROOT,PASS,CMSDB);
// $host = 'localhost';
// $root = 'root';
// $cmsdb = 'cms';


// $connection = mysqli_connect($host,$root,'',$cmsdb);
 if($connection){
      echo 'connected';
}

?>