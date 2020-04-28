<?php
session_start();
include_once("conn/conn.php");
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';

		
		      $sql_ = "select * from products where id='".$id."'";
			  $sql4 = mysqli_query($conn,$sql_) or die(mysqli_error($conn)); 
			  $info=mysqli_fetch_array($sql4);

 

  $array=explode("@",$_SESSION['producelist']);
  for($i=0;$i<count($array)-1;$i++){
	 if($array[$i]==$id){
	     echo "<script>alert('This item is already in your shopping cart!');history.back();</script>";
		 exit;
	  }
	}
  $_SESSION['producelist']=$_SESSION['producelist'].$id."@";
  $_SESSION['Quatity']=$_SESSION['quatity']."1@";
  header("location:cart.php");
?>