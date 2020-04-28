<?php
include_once("top.php");
?>

<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong> product manager</strong></div>
   <?php
   
   
   $sql=mysqli_query($conn,"select count(*) as total from products");
	   $info=mysqli_fetch_array($sql);
	   $total=$info['total'];
	   if($total==0)
	   {
	   ?>
   <table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <tr bgcolor="#ffffff"><td>no information</td></tr></table>
   <?php
   }
  else
  {
	  ?>
   <table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <tr bgcolor="#ffffff">
    <th height="24">Product name</th>
    <th width="12%">pictrure</th>
    <th width="8%">membership price</th>
    <th width="5%">quantity</th>
    <th width="8%">time</th>
    <th width="5%">opreation</th>
    </tr>
<?php
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
             $sql1=mysqli_query($conn,"select * from products order by id desc limit ".($page-1)*$pagesize.",$pagesize ");
             while($info1=mysqli_fetch_array($sql1))
		     {
		  ?>
   <tr align="middle" bgcolor="#FFFFFF" onMouseOut="mOut(this,'#FFFFFF');" onMouseOver="mOvr(this,'#DCF9B9');" style="cursor: default;">
    <td height="25" align="left">&nbsp;<SPAN> <strong><?=$info1['name']?></strong></SPAN>    </TD>
    <td height="25" align="center"><img src="../upimages/<?php echo $info1["image"];?>" height="50" width="50" /></TD>
    <td height="25" align="center"><?=$info1['memberprice']?></TD>
    <td height="25" align="center"><?=$info1['Quantity']?></TD>
    <td height="25" align="center"><?=$info1['addtime']?></TD>
    <td align="center"><a href="goodedit.php?id=<?=$info1['id']?>">modify</a>&nbsp;<a href="?id=<?=$info1['id']?>&action=del" onClick="return confirm('are u sure you want to delete？')">delete</a></TD>
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
	mysqli_query($conn,"delete from products where id='".$id."'");
	echo "<script>alert('delete successful！');location.href='goods.php';</script>";
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