<?php
include_once("sessionuser.php");
include_once("top.php");
?>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	

	
	if($act == 'edit')
	{
		
		
		
			
			if( is_numeric($_POST['tel'])==false)

	 {

	   echo "<script>alert('cannot use letters for telephone !');history.back();</script>";

	   exit;

	 }
	else{
		$tel = !empty($_POST['tel']) ? trim($_POST['tel']) : '';
		$name = !empty($_POST['name']) ? trim($_POST['name']) : '';
		$address = !empty($_POST['address']) ? trim($_POST['address']) : '';
		$email = !empty($_POST['email']) ? trim($_POST['email']) : '';
		
		$sql_ = "update usermember set email='$email',name='$name',tel='$tel',address='$address' where username='".$_SESSION['username']."'";
			     mysqli_query($conn,$sql_) or die(mysqli_error($conn));
			     echo "<script>alert('Successfully modified!');location.href='usercenter.php';</script>";
				 
	}
	}
		
	$sql=mysqli_query($conn,"select * from usermember where username='".$_SESSION['username']."'");
	$row=mysqli_fetch_array($sql);	
?>





<table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
<tr>
        <td height="35" colspan="4" align="center" bgcolor="#ffffff"> members Details</td>
        </tr>
      <tr>
        <td width="99" height="30" align="right">user-name：</td>
        <td width="180"><?php echo $row['username'];?></td>
       
        <td width="266"></td>
      </tr>
      <tr>
        <td height="30" align="right">full name：</td>
        <td colspan="3"><?php echo $row['name'];?></td>
      </tr>
	  <tr>
        <td height="30" align="right">E-mail：</td>
        <td colspan="3"><?php echo $row['email'];?></td>
      </tr>
	  <tr>
        <td height="30" align="right">contract number：</td>
        <td colspan="3"><?php echo $row['tel'];?></td>
      </tr>
	  <tr>
        <td height="30" align="right">create date：</td>
        <td colspan="3"><?php echo $row['regtime'];?></td>
      </tr>
      <tr>
      </td>
        </tr>
    </table>
 
     </div>     
     </div>
    </div>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script language="javascript">
function check(){
	if(document.getElementById("email").value==""){
		alert("please enter email");
		return false;}
	if(document.getElementById("name").value==""){
		alert("Please type your name");
		return false;}
	if(document.getElementById("address").value==""){
		alert("Please enter the shipping address");
		return false;}
	
	var mobile=document.getElementById("tel").value;
		if(mobile.length==0) 
       { 
          alert('Please enter the phone number!'); 
          return false; 
       }     
       if(mobile.length!=11) 
       { 
           alert('Please enter a valid phone number!');
           return false; 
       } 
        
   if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", mobile)) {
     alert('Please enter a valid phone number！');
           return false; 
}
</script>



<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> Home</a></li>
				<li>Member Centre</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				
                <center><h3>Modify User Information</h3></center>
                
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=edit" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label"> user name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="Username can not be modified" value="<?php echo $row['username'];?>"  readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="please enter E-mail" value="<?php echo $row['email'];?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Contact the phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" id="tel" placeholder="Please enter phone number" value="<?php echo $row['tel'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Please type in your name" value="<?php echo $row['name'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Delivery address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Please enter the address" value="<?php echo $row['address'];?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
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