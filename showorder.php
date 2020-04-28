<?php
include_once("sessionuser.php");
include_once("top.php");
?>
<?php
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
if($act == 'zhifu')
{
	$ordernumber=!empty($_GET['ordernumber']) ? trim($_GET['ordernumber']) : '';
	
	
	$sql_="update orders set zt='paid for' where ordernumber='".$ordernumber."'";
	
	$sqlss = mysqli_query($conn,$sql_) or die(mysqli_error($conn));
	
	echo "<script>alert('payment successful!');location.href='orders.php';</script>";
}
  $ordernumber=!empty($_GET['dd']) ? trim($_GET['dd']) : '';
  
  
  
  $sql_="select * from orders where ordernumber='".$ordernumber."'";
  $sql2 = mysqli_query($conn,$sql_) or die(mysqli_error($conn));
  
  
	
  $info2=mysqli_fetch_array($sql2);
  
  
  $spc=$info2['spc'];
  $slc=$info2['slc'];
  $arraysp=explode("@",$spc);
  $arraysl=explode("@",$slc);
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> Home</a></li>
				<li>
check order</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                    <table class="table table-bordered">
                      <caption><?php echo $_SESSION['username'];?>, Your order number is:<font color="#FF0000"><?php echo $ordernumber;?></font>!The details are as follows:</caption>
                      <thead>
                        <tr bgcolor="#FFEDBF">
                          <th height="35" align="center">product name</th>
                          <th height="35" align="center">Quantity</th>
                          <th height="35" align="center"> price</th>
                          <th height="35" align="center">Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                     <?php
					 			$total=0;
						$array=explode("@",$_SESSION['producelist']);
						$arrayquatity=explode("@",$_SESSION['Quatity']);
						
						
						 while(list($name,$value)=@each($_POST))
						 {
							  for($i=0;$i<count($array)-1;$i++){
								if(($array[$i])==$name){
								  $arrayquatity[$i]=$value;  
								}
							}
						}
						$_SESSION['Quatity']=implode("@",$arrayquatity);
					  
					  for($i=0;$i<count($arraysp)-1;$i++){
						  
						
							
						   $num=$arrayquatity[$i];
						  

						if($arraysp[$i]!="")
						 {
							 
							 
						 $sql_="select * from products where id='".$arraysp[$i]."'";				 
						  $sql1 = mysqli_query($conn,$sql_) or die(mysqli_error($conn));
						 
						 $info1=mysqli_fetch_array($sql1);
						    $total1=$num*$info1['memberprice'];
						   $total+=$total1;
						   $_SESSION["total"]=$total;
					  ?>
                      	<tr>
                          <td height="35"><?php echo $info1['name'];?></td>
                          <td height="35"><?php echo $num ?></td>              
                          <td height="35"><?php echo $info1['memberprice'];?> $ </td>
                          <td height="35"><?php echo $info1['memberprice']*$num." $ ";?></td>
                        </tr>
                     <?php
						  }
						 }
					 ?>
                      </tbody>
                     <tbody>
                      	<tr>
                          <td align="center" colspan="5"> Total : <?php echo $total;?> $  </td>
                        </td>
                       </tr>
                      </tbody>
                    </table>
                    <div class="height1"></div>
                    <table class="table table-bordered">
                      <tbody>
                      	<tr>
                          <td height="35">Orders</td>
                          <td height="35"><?php echo $_SESSION['username'];?></td>
                        </tr>
                        <tr>
                          <td height="35">recipient</td>
                          <td height="35"><?php echo $info2['seller'];?></td>
                        </tr>
                        <tr>
                          <td height="35">recipient address</td>
                          <td height="35"><?php echo $info2['address'];?></td>
                        </tr>
                        <tr>
                          <td height="35">phone number</td>
                          <td height="35"><?php echo $info2['tel'];?></td>
                        </tr>
                        <tr>
                          <td height="35">E-mail</td>
                          <td height="35"><?php echo $info2['email'];?></td>
                        </tr>
                     	
                        <tr>
                          <td height="35">payment method</td>
                          <td height="35"><?php echo $info2['zfff'];?></td>
                        </tr>
                      </tbody>
                     <tbody>
                      	<tr>
                          <td align="center" colspan="5">Creation time:<?php echo $info2['time'];?></td>
                        </td>
                       </tr>
                       <?php
					   $_SESSION['producelist']="";
						$_SESSION['quatity']="";
					    ?>
                       <tr>
                          <td align="center" colspan="5"><a href="?act=zhifu&ordernumber=<?=$ordernumber?>" class="details"><button type="button" class="btn btn-danger">Click pay</button></a></td>
                        </td>
                       </tr>
                      </tbody>
                    </table>
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