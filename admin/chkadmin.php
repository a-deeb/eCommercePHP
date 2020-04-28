<?php
session_start();
 class chkinput{
   var $admin_name;
   var $admin_pwd;

   function chkinput($x,$y)
    {
     $this->admin_name=$x;
     $this->admin_pwd=$y;
    }

   function checkinput()
   {
             include("../conn/conn.php");
	 
		      $sql_ = "select * from admin where admin_name='".$this->admin_name."'";
			  
			  $sql = mysqli_query($conn,$sql_) or die(mysqli_error($conn));
	 

	 
     $info=mysqli_fetch_array($sql);
     if($info==false)
       {
          echo "<script language='javascript'>alert('this admin is not exist！');history.back();</script>";
          exit;
       }
      else
       {
          if($info['admin_pwd']==$this->admin_pwd){
			  $_SESSION['sessionname'] = $info['admin_name'];
				$_SESSION['sessionid'] = $info['id'];
               header("location:default.php");
            }
          else
           {
             echo "<script language='javascript'>alert('password is not correct！');history.back();</script>";
             exit;
           }

      }    
   }
 }


    $obj=new chkinput(trim($_POST['name']),(trim($_POST['pwd'])));
    $obj->checkinput();

?>