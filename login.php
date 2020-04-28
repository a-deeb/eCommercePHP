<?php
include_once("top.php");
?>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'login')
	{
			$name = !empty($_POST['usernc']) ? trim($_POST['usernc']) : '';
			$pwd = !empty($_POST['p1']) ? md5(md5(trim($_POST['p1']))) : '';
			
			
		      $sql_ = "select * from usermember where username='".$name."'";
	          $sql4 = mysqli_query($conn,$sql_) or die(mysqli_error($conn));
			  
			  	$row=mysqli_fetch_array($sql4);
		
		
		 if($row==false){
			  echo "<script language='javascript'>alert('this user does not exist');history.back();</script>";
			  exit;
		   }
		  else{
			
		
			  if($row['pwd']==$pwd)
				{
				   $_SESSION['username']=$row['username'];
				   echo "<script>alert('login successful!');location.href='usercenter.php';</script>";
				}
			  else {
				 echo "<script language='javascript'>alert('Incorrect password!');history.back();</script>";
				 exit;
			   }
	
		  } 
	}
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script language="javascript">
function check(){
	if(document.getElementById("usernc").value==""){
		alert("please enter your account");
		return false;
		}
	if(document.getElementById("p1").value==""){
		alert("Please enter the password");
		return false;
	}
}
</script>
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> Home</a></li>
				<li>Member Login</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				<div class="height2"></div>
                <center><h3>Member Login</h3></center>
                <div class="height2"></div>
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=login" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Fill in the user name</label>
                        <div class="col-sm-10">
                     <input type="text" class="form-control" name="usernc" id="usernc" placeholder="please enter user name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">enter password</label>
                        <div class="col-sm-10">
                 <input class="form-control" type="password" name="p1" id="p1" placeholder="Please enter the password">
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