<?php
include_once("top.php");
?>
<!-- first --> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>manage orders</strong></div>
   <?php
   $sql1=mysqli_query($conn,"select count(*) as total from orders");
	   $info1=mysqli_fetch_array($sql1);
	   $total=$info1['total'];
	   if($total==0)
	   {
	   ?>
   <table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <tr bgcolor="#ffffff"><td>there are not information right now</td></tr></table>
   <?php
   }
  else
  {
	  
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
             $sql1=mysqli_query($conn,"select * from orders order by id desc limit ".($page-1)*$pagesize.",$pagesize ");
             $info1=mysqli_fetch_array($sql1);
	  
	  ?>
   <table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
     <tr>
        <td height="35" colspan="9" align="center" bgcolor="#cecece">order center</td>
        </tr>
	  <tr>
        <td width="121" height="35" align="center">#order</td>
        <td width="59" align="center">buyer username</td>
        <td width="60" align="center">buyer fullname</td>
        <td width="70" align="center">total price</td>
        <td width="88" align="center">type payment</td>
        <td width="69" align="center">order status</td>
        <td width="70" align="center">shiping</td>
        <td width="115" align="center">setting</td>
      
	  </tr>
	  <?php
	  
		    do{
			  $array=explode("@",$info1['spc']);
		      $sum=count($array)*20+260;
	  ?>
      <tr>
        <td height="35" align="center"><?php echo $info1['ordernumber'];?></td>
        <td height="21" align="center"><?php echo $info1['xiadanren'];?></td>
        <td height="21" align="center"><?php echo $info1['seller'];?></td>
        <td height="21" align="center"><?php echo $info1['total'];?></td>
        <td height="21" align="center"><?php echo $info1['zfff'];?></td>
        <td height="21" align="center"><?php echo $info1['zt'];?></td>
        <td height="21" align="center"><?php if($info1['zt']=="paid for"){?><a href="fahuo.php?id=<?php echo $info1['id'];?>"><input type="button" value="ship item" /></a><?php }?></td>
        <td height="21" align="center">
          <a href="dingdanedit.php?id=<?=$info1['id']?>">check status</a>
          &nbsp;
          <a href="?id=<?=$info1['id']?>&action=del" onClick="return confirm('are you sure to delete？')">delete</a></td>
      </tr>
	  <?php
	      }while($info1=mysqli_fetch_array($sql1))
	  
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
	mysqli_query($conn,"delete from orders where id='".$id."'");
	echo "<script>alert('successful delete！');location.href='dingdan.php';</script>";
}
if($action == 'tuihuo')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$spc = !empty($_GET['spc']) ? trim($_GET['spc']) : '';
	$slc = !empty($_GET['slc']) ? trim($_GET['slc']) : '';
	mysqli_query($conn,"update orders set th=1 where id='".$id."'");
	 $array=explode("@",$spc);
 $arraysl=explode("@",$slc);
 for($i=0;$i<count($array);$i++){
	 $id=$array[$i];
     $num=$arraysl[$i];
      mysqli_query($conn,"update products set frequency=frequency-'".$num."' ,Quantity=Quantity+'".$num."' where id='".$id."'");
    }
	echo "<script>alert('return successful！');location.href='dingdan.php';</script>";
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