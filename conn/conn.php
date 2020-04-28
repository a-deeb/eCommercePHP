<?php

//database connection file  



$servername = "localhost";
$username = "root";
$password = "vegeta009";
$db = "testdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
 	 mysqli_query($conn,"set character set utf8");
     mysqli_query($conn,"set names utf8"); 
	 $title="BTS Shopping Mall";
	 define('ROOT_PATH', str_replace('/conn/conn.php', '', str_replace('\\', '/', __FILE__)));
	 define('__BASE__', 'http://localhost/demo2');
	 error_reporting(E_ALL^E_NOTICE^E_WARNING);
	 
?>