<?php

include_once("sessionuser.php");

include_once("top.php");

?>

<?php

$act = !empty($_GET['act']) ? trim($_GET['act']) : '';



	if($act == 'shouhuo')

	{

		$ordernumber=!empty($_GET['ordernumber']) ? trim($_GET['ordernumber']) : '';

		$sqlss=mysql_query("update orders set zt='received' where ordernumber='".$ordernumber."'",$conn);

		echo "<script>alert('received successful！');location.href='orders.php';</script>";

	}

  $ordernumber=$_GET['dd'];

  

  

  		$sql="select * from orders where ordernumber='".$ordernumber."'";

		$sql2= mysqli_query($conn,$sql_) or die(mysqli_error($conn));



		



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

				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> /a></li>

				<li></li>

			</ul>

			<div class="panel panel-default">

				<div class="panel-body">

                    <table class="table table-bordered">

                      <caption><?php echo $_SESSION['username'];?>, Your order number is:<font color="#FF0000"><?php echo $ordernumber;?></font>!The details are as follows:</caption>

                      <thead>

                        <tr bgcolor="#FFEDBF">

                          <th height="35" align="center">product name</th>

                          <th height="35" align="center">Quantity</th>

                          <th height="35" align="center">Market price</th>

                          <th height="35" align="center">member price</th>

                          <th height="35" align="center">Subtotal</th>

                        </tr>

                      </thead>

                      <tbody>

                     <?php

					  $total=0;

					  for($i=0;$i<count($arraysp)-1;$i++){

						 if($arraysp[$i]!=""){

							 

							  $sql_="select * from products where id='".$arraysp[$i]."'";

							  

							  		$sql1= mysqli_query($conn,$sql_) or die(mysqli_error($conn));

							 

	

						 $info1=mysqli_fetch_array($sql1);

						 $total=$total+=$arraysl[$i]*$info1['memberprice'];

					  ?>

                      	<tr>

                          <td height="35"><?php echo $info1['mingcheng'];?></td>

                          <td height="35"><?php echo $arraysl[$i];?></td>

                          <td height="35"><?php echo $info1['shichangjia'];?>$</td>

                          <td height="35"><?php echo $info1['memberprice'];?>$</td>

                          <td height="35"><?php echo $arraysl[$i]*$info1['memberprice'];?>$</td>

                        </tr>

                     <?php

						  }

						 }

					 ?>

                      </tbody>

                     <tbody>

                      	<tr>

                          <td align="center" colspan="5">Total：<?php echo $total;?>$</td>

                        </td>

                       </tr>

                      </tbody>

                    </table>

                    <div class="height1"></div>

                    <table class="table table-bordered">

                      <tbody>

                      	<tr>

                          <td height="35">order person</td>

                          <td height="35"><?php echo $_SESSION['username'];?></td>

                        </tr>

                        <tr>

                          <td height="35">recevier</td>

                          <td height="35"><?php echo $info2['shouhuoren'];?></td>

                        </tr>

                        <tr>

                          <td height="35">receiver address</td>

                          <td height="35"><?php echo $info2['dizhi'];?></td>

                        </tr>

                        <tr>

                          <td height="35">phone number</td>

                          <td height="35"><?php echo $info2['tel'];?></td>

                        </tr>

                        <tr>

                          <td height="35">E-mail</td>

                          <td height="35"><?php echo $info2['email'];?></td>

                        </tr>

                         <?php if($info2['kuaidi']){?>

                          <tr>

                            <td height="35">tracking information：</td>

                            <td height="35"><?php echo $info2['kuaidi'];?>-<?php echo $info2['bianhao'];?></td>

                          </tr>

                          <?php }?>

                        

                        <tr>

                          <td height="35">payment method</td>

                          <td height="35"><?php echo $info2['zfff'];?></td>

                        </tr>

                      </tbody>

                     <tbody>

                      	<tr>

                          <td align="center" colspan="5">create time：<?php echo $info2['time'];?></td>

                        </td>

                       </tr>

                       <tr>

                          <td align="center" colspan="5">order status：<?php if($info2['zt']=="received"&&$info2['th']==1)

							{

					   echo "已退货";

							}

							elseif($info2['zt']=="shipped" )

							{?>

                            <a href="?act=shouhuo&ordernumber=<?=$ordernumber?>" class="details"><button type="button" class="btn btn-danger">comfirm received</button></a>

                            <?php }

							else

							{echo $info2['zt'];}

					   ?></td>

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