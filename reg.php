<?php
	include_once("top.php");
?>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'add')
	{
		$name = !empty($_POST['usernc']) ? trim($_POST['usernc']) : '';
		$pwd = !empty($_POST['p2']) ? md5(md5(trim($_POST['p2']))) : '';
		$email = !empty($_POST['email']) ? trim($_POST['email']) : '';
		$truename = !empty($_POST['truename']) ? trim($_POST['truename']) : '';
		$address = !empty($_POST['address']) ? trim($_POST['address']) : '';
		$tel = !empty($_POST['tel']) ? trim($_POST['tel']) : '';


		$sql_ = "SELECT username FROM `usermember` WHERE username = '$name'";
		
	    $sql4 = mysqli_query($conn,$sql_) or die(mysqli_error($conn));
					  
		$getcount= mysqli_num_rows($sql4);
		
		if($getcount>0)
		{
			echo "<script language='javascript'>alert('The user already exists');history.back();</script>";
		}
		else
		{	
				  	$sql = "INSERT INTO `usermember` 
		(`username`, `email`, `pwd`,`tel`, `name`, `address`) VALUES 
		   ( '$name', '$email', '$pwd','$tel', '$truename', '$address')";
		   
	                  $sql5 = mysqli_query($conn,$sql) or die(mysqli_error($conn));
					  
					  $_SESSION['username'] = $name;
					  echo "<script>alert('account created!');window.location='usercenter.php';</script>";
					  					 					 					  
		}
	}
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script type="text/javascript" src="js/checkuser.js"></script>
<script language="javascript">
function checkuser11(){
get(document.getElementById("usernc").value);
}

</script>
<script language="javascript">
function check(){   
    if(document.getElementById("usernc").value==""){
		alert("please enter your user name");
		return false;
		}
	if(document.getElementById("p1").value==""){
		alert("please enter your password");
		return false;
	}
	if(document.getElementById("p2").value==""){
		alert("please confirm your password");
		return false;
	}
	if(document.getElementById("p1").value!=document.getElementById("p2").value){
		alert("the password did not match");
		return false;
	}
	if(document.getElementById("email").value==""){
		alert("please enter your email");
		return false;}
	if(document.getElementById("truename").value==""){
		alert("please enter your name");
		return false;}
	if(document.getElementById("address").value==""){
		alert("please enter your shipping address");
		return false;}
	var mobile=document.getElementById("tel").value;
		if(mobile.length==0) 
       { 
          alert('please enter your phone number！'); 
          return false; 
       }     
 

if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", mobile)) 
{
     alert('This phone number is not in right format！');
           return false; 
}


}
</script>
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> </a></li>
				<li><a href="reg.php">register membership</a></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				
                <center><h3>register membership</h3></center>
                
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=add" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="please enter your user name" onchange="checkuser11();"><span id="usercheck" style="color:red;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">please enter your password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p1" id="p1" placeholder="please enter your password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">repeat password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p2" id="p2" placeholder="please enter your password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="please enter your email">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">contract phone number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" id="tel" placeholder="please enter phone number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Full name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="truename" id="truename" placeholder="please enter the name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">shipping address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" id="address" placeholder="please enter your address">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">submit</button>
                        </div>
                    </div>
                </form>
				</div>
			</div>
		</div>
<?php
include_once("left.php");
?>
	</div>
</div>

<?php
	include_once("foot.php");
?>