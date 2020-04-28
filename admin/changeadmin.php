<?php
include_once("top.php");
$sql=mysqli_query($conn,"select * from admin where admin_name='".$_SESSION['sessionname']."'");
$info=mysqli_fetch_array($sql);
?>

<script type="text/javascript"> 
function check(){   
        if(document.form1.username.value==""){
		alert("please insert account of admins");
		document.form1.username.focus();
		return false;}
	if(document.form1.password.value==""){
		alert("please insert password");
		document.form1.password.focus();
		return false;
	}
	if(document.form1.password2.value==""){
		alert("comfirm password");
		document.form1.password2.focus();
		return false;
	}
	if(document.form1.password.value!=document.form1.password2.value){
		alert("password is not match");
		document.form1.password2.focus();
		return false;
	}
	
}
</script> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>change information of admin</strong></div>
   <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">
             <form name="form1" method="post" action="?act=update" onSubmit="return check(this)">
			<tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" bgcolor="#ffffff"><strong>change account of admin</strong></td>
              </tr> <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>account of admin：</b> </td>
             
              <td><input type="text" name="username" class="span1-1" value="<?php echo $info['admin_name'];?>" readonly></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td height="35" align="right"><b>password：</b> </td>
             
              <td><input type="password" name="password" class="span1-1"></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td height="35" align="right"><b>comfirm:</b> </td>
             
              <td><input type="password" name="password2" class="span1-1"></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td align="right"> </td>
             
              <td><input type="submit" value="comfirm" class="btn btn-info " style="width:80px;" onClick="return confirm('are you sure to change？');"></td>
            </tr></form>
          </table>
     </div>     
     </div>
    </div>
    
<!-- bottom -->
<?php
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
if($act == 'update')
{
	$username = !empty($_POST['username']) ? trim($_POST['username']) : '';
	$password2 = !empty($_POST['password2']) ? md5(trim($_POST['password2'])) : '';
	mysql_query("update admin set admin_pwd='$password2'",$conn);
	echo "<script>alert('successful change！');</script>";
}
include_once("foot.php");
?>
 <script>
!function(){
laydate.skin('molv');
laydate({elem: '#Calendar'});
}();
 
</script>
</body>
</html>