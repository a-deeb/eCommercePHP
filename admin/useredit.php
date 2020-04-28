<?php
include_once("top.php");
?>
<!-- top --> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>manager membership</strong></div>
   <?php
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$sql=mysqli_query($conn,"select * from usermember where id=".$id."");
$info=mysqli_fetch_array($sql);
	  ?>
<table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
<tr>
        <td height="35" colspan="4" align="center" bgcolor="#ffffff"> members Details</td>
        </tr>
      <tr>
        <td width="99" height="30" align="right">user name：</td>
        <td width="180"><?php echo $info['username'];?></td>
       
        <td width="266"></td>
      </tr>
      <tr>
        <td height="30" align="right">full name：</td>
        <td colspan="3"><?php echo $info['name'];?></td>
      </tr>
	  <tr>
        <td height="30" align="right">E-mail：</td>
        <td colspan="3"><?php echo $info['email'];?></td>
      </tr>
	  <tr>
        <td height="30" align="right">contract number：</td>
        <td colspan="3"><?php echo $info['tel'];?></td>
      </tr>
	  <tr>
        <td height="30" align="right">create date：</td>
        <td colspan="3"><?php echo $info['regtime'];?></td>
      </tr>
      <tr>
        <td height="30" colspan="4" align="center"><a href="dongjieuser.php?id=<?php echo $id;?>">
	<?php
	 $sql=mysqli_query($conn,"select * from usermember where id=".$id."");
	 $info=mysqli_fetch_array($sql);
	
	?></a></td>
        </tr>
    </table>
 
     </div>     
     </div>
    </div>
<?php

$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'del')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	mysql_query($conn,"delete from usermember where id='".$id."'");
	echo "<script>alert('successful delete！');location.href='usermember.php';</script>";
}
include_once("foot.php");
?>
</body>
</html>