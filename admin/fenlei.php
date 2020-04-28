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
   <div class="title_right"><strong>manage category</strong></div>
   <TABLE width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <TBODY>
  <TR bgcolor="#ffffff">
    <TH width="90%" height="24">colum name</TH>
    <TH width="10%">opreration</TH>
    </TR>
<?php
$sql=mysqli_query($conn,"select * from category  order by id desc");
$info=mysqli_fetch_array($sql);
 if($info==false)
  {
    echo "there is no category!";
   }
  else
  {
		  do
		  {
?>
   <tr align="middle" bgcolor="#FFFFFF" onMouseOut="mOut(this,'#FFFFFF');" onMouseOver="mOvr(this,'#DCF9B9');" style="cursor: default;">
    <td height="25" align="left">&nbsp;<SPAN> <strong><?=$info['cat_name']?></strong></SPAN>    </TD>
    <td align="center"><a href="fenleiedit.php?id=<?=$info['id']?>">modify</a>&nbsp;<a href="?id=<?=$info['id']?>&action=del" onClick="return confirm('are u sure delete this category？')">delete</a></TD>
    </TR>
<?php
	}
		 while($info=mysqli_fetch_array($sql));
	}
?>     
    </TBODY></TABLE>
     </div>     
     </div>
    </div>
    
<!-- bottom -->
<?php

$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'del')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	mysqli_query($conn,"delete from category  where id='".$id."'");
	mysqli_query($conn,"delete from products where typeid='".$id."'");
	echo "<script>alert('successful delete！');location.href='fenlei.php';</script>";
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