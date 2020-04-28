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
   <div class="title_right"><strong>manager order</strong></div>
   <?php
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$sql=mysqli_query($conn,"select * from orders where id='".$id."'");
 $info=mysqli_fetch_array($sql)
	  ?>
<table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
     <form name="form1" method="post" action="saveorder.php?id=<?php echo $info['id'];?>">
	  <tr>
        <td width="70" height="35" align="right">#order：</td>
        <td width="271"><?php echo $info['dingdanhao'];
		?></td>
        <td width="100">get payment
          <input type="checkbox" value="get payment" name="ysk" <?php if($info['zt']=="get payment") {?>checked<?php }?>></td>
        <td width="101">shipped
          <input name="yfh" type="checkbox" value="shipped" <?php if($info['zt']=="shipped") {?>checked<?php }?>>
        </td>
        <td width="100">get product
          <input name="ysh" type="checkbox" value="已收货" <?php if($info['zt']=="get product") {?>checked<?php }?>>
        </td>
        <td width="101"><input type="submit" value="modify" class="buttoncss"></td>
	  </tr>
	  </form>
    </table>
    <table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
      <tr bgcolor="#cecece">
        <td height="35" align="center">name of product</td>
        <td width="106" align="center">quantity</td>
        <td width="106" align="center"> price</td>
        <td width="106" height="20" align="center">final price</td>
        <td width="10%">summary</td>
      </tr>
	 <?php
	   $array=explode("@",$info['spc']);
	   $arraysl=explode("@",$info['slc']);
	   $total=0;
	   for($i=0;$i<count($array)-1;$i++)
	    {
		  if($array[$i]!="")
		  {
	       $sql1=mysqli_query($conn,"select * from products where id='".$array[$i]."'");
		   $info1=mysqli_fetch_array($sql1);
		   $total=$total+$info1['memberprice']*$arraysl[$i];
	 ?>
      <tr>
        <td height="35" align="center"> &nbsp;<?php echo $info1['name'];?></td>
        <td height="25" align="center"><?php if($info1['Quantity']<0) echo "sold out"; else echo $arraysl[$i];?></td> 
        <td height="25" align="center"><?php echo $info1['memberprice'];?></td>
        <td height="25" align="center"><?php echo $info1['memberprice'];?></td>  
        <td height="25"><?php echo $info1['memberprice']*$arraysl[$i];?></td>
      </tr>
	 <?php
	     }
	   }
	 ?> 
    </table>
<table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
  <tr>
    <td height="35" align="center">total：<?php echo $total;?>&nbsp;$&nbsp;</td>
  </tr>
</table>
<table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
      <tr bgcolor="#cecece">
        <td height="35" colspan="2" align="center">receiver information</td>
      </tr>
      <tr>
        <td width="120" height="25" align="right">name of receiver</td>
        <td width="627"><?php echo $info['shouhuoren'];?></td>
      </tr>
      <tr>
        <td height="25" align="right">detail ：</td>
        <td height="25"><?php echo $info['dizhi'];?></td>
      </tr>
      <tr>
        <td height="25" align="right">telephone number：</td>
        <td height="25"><?php echo $info['tel'];?></td>
      </tr>
      <tr>
        <td height="25" align="right">email：</td>
        <td height="25"><?php echo $info['email'];?></td>
      </tr>
      
      <?php if($info['kuaidi']){?>
      <tr>
        <td height="25" align="right">shipping information：</td>
        <td height="25"><?php echo $info['kuaidi'];?>-<?php echo $info['bianhao'];?></td>
      </tr>
      <?php }?>
      <tr>
        <td height="25" align="right">payment type：</td>
        <td height="25"><?php echo $info['zfff'];?></td>
      </tr>
	  <tr>
        <td height="25" align="right">simple comment：</td>
        <td height="25"><?php echo $info['leaveword'];?></td>
      </tr>
    </table>
<table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
  <tr>
    <td height="20" align="center">      <input name="button" type="button" class="buttoncss" onClick="javascript:history.back();" value="back">    </td>
  </tr>
</table>
 
     </div>     
     </div>
    </div>
    
<!-- bottom -->
<?php
include_once("foot.php");
?>
</body>
</html>