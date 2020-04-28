

<?php


include("conn/conn.php");
$nc = !empty($_GET['nc']) ? trim($_GET['nc']) : '';
if($nc=="")
	  {
	    echo " this username is available !!";
	  
	  }
	  else
	  {	  	  
	$sql_="select * from usermember where username='".$nc."'";
	
	$sql= mysqli_query($conn,$sql_) or die(mysqli_error($conn));
		  

	    $info=mysqli_fetch_array($sql);
		if($info==true)
		{
		  echo "Sorry, this username is already in use!";
		}
		else
		{
		   echo "this username is available!";
		} 
	  }
 exit;	  
?>