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
   <div class="title_right"><strong>manage membership</strong></div>
   <?php
       $sql=mysqli_query($conn,"select count(*) as total from usermember");
	   $info=mysqli_fetch_array($sql);
	   $total=$info['total'];
	   if($total==0)
	   {
	   ?>
   <table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <tr bgcolor="#ffffff"><td>there is no information</td></tr></table>
   <?php
   }
  else
  {
	  ?>
   <table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <tr bgcolor="#ffffff">
    <th height="15">Member name</th>
	<th height="15">Username</th>
    <th width="10%">create time</th>
    <th width="10%">setting</th>
    </tr><?php
			$pagesize=20;
		   if ($total<=$pagesize){
		      $pagecount=1;
			} 
			if(($total%$pagesize)!=0){
			   $pagecount=intval($total/$pagesize)+1;
			
			}else{
			   $pagecount=$total/$pagesize;
			
			}
			$page = !empty($_GET['page']) ? trim($_GET['page']) : '';
			if(($page)==""){
			    $page=1;
			
			}else{
			    $page=intval($_GET['page']);
			
			}
             $sql1=mysqli_query($conn,"select * from usermember order by id desc limit ".($page-1)*$pagesize.",$pagesize ");
             while($info1=mysqli_fetch_array($sql1))
		     {
		  ?>
   <tr align="middle" bgcolor="#FFFFFF" onMouseOut="mOut(this,'#FFFFFF');" onMouseOver="mOvr(this,'#DCF9B9');" style="cursor: default;">
    <td height="25" align="left">&nbsp;<SPAN> <strong><?=$info1['name']?></strong></SPAN>    </TD>
	  <td height="25" align="left">&nbsp;<SPAN> <strong><?=$info1['username']?></strong></SPAN>    </TD>
    <td height="25" align="center"><?=$info1['regtime']?></TD>
    <td align="center"><a href="useredit.php?id=<?=$info1['id']?>">View Details</a>&nbsp;<a href="?id=<?=$info1['id']?>&action=del" onClick="return confirm('are u sure delete？')">delete</a></TD>
    </tr>
<?php
	}
?>     
    </table><?php
	}
?>   

     </div>     
     </div>
    </div>
    
<!-- bottom -->
<?php

$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'del')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	mysqli_query($conn,"delete from usermember where id='".$id."'");
	echo "<script>alert('successful delete！');location.href='usermember.php';</script>";
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