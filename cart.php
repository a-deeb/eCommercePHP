<?php
session_start();
include_once("top.php");
?>
<?php
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$typeid=!empty($_GET['typeid']) ? intval($_GET['typeid']) : '';						  
$sqlss="update products set link=link+1 where id='$id'";
$sql2 = mysqli_query($conn,$sqlss) or die(mysqli_error($conn));
$sql_="select * from products where id='$id'";
$sql = mysqli_query($conn,$sql_) or die(mysqli_error($conn));
$row=mysqli_fetch_object($sql);
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script type="text/javascript"> 
function check(){
    if(document.form1.content_desc.value==""){
		alert("please insert your comment");
		document.form1.content_desc.focus();
		return false;}
}
</script>
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> Home</a></li>
				<li>my shopping cart</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                    <table class="table table-bordered">
                    <form name="form1" method="post" action="cart.php">
                      <caption>my shopping cart</caption>
                      <?php
					  $_SESSION['total'] = null;
					  $qk = !empty($_GET['qk']) ? trim($_GET['qk']) : '';
					  if($qk=="yes"){
						 $_SESSION['producelist']="";
						 $_SESSION['Quatity']=""; 
					  }
					  $sessionproducelist = !empty($_SESSION['producelist']) ? trim($_SESSION['producelist']) : '';
					  if(!isset($_SESSION['producelist'])){
					echo "<tr>";
						   echo" <td height='25' colspan='6' bgcolor='#FFFFFF' align='center'>Your shopping cart is empty!</td>";
						   echo"</tr>";
					
					}else{
					   $arraygwc=explode("@",$_SESSION['producelist']);
					   $s=0;
					   for($i=0;$i<count($arraygwc);$i++){
						   $s+=intval($arraygwc[$i]);
					   }
					  if($s==0 ){
						   echo "<tr>";
						   echo" <td height='25' colspan='6' bgcolor='#FFFFFF' align='center'>Your shopping cart is empty!</td>";
						   echo"</tr>";
						}
					  else{ 
					?>
                      <thead>
                        <tr bgcolor="#FFEDBF">
                          <th height="35" align="center">product name</th>
                          <th height="35" align="center">Quantity</th>
                          <th height="35" align="center">price</th>
                          <th height="35" align="center">Subtotal</th>
                          <th height="35" align="center">operation</th>
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
						
						for($i=0;$i<count($array)-1;$i++)
						{ 
						   $id=$array[$i];
						   $num=$arrayquatity[$i];
						  
						  if($id!=""){
							  
							  
							  
							$sql_="select * from products where id='".$id."'";
							$sql = mysqli_query($conn,$sql_) or die(mysqli_error($conn));
							  
							  
				
						   $info=mysqli_fetch_array($sql);
						   $total1=$num*$info['memberprice'];
						   $total+=$total1;
						   $_SESSION["total"]=$total;
					?>    
                      	<tr>
                          <td height="35"><?php echo $info['name'];?></td>
                          <td height="35"><input type="text" name="<?php echo $info['id'];?>" size="2" class="inputcss" value=<?php echo $num;?>></td>
                   
                          <td height="35"><?php echo $info['memberprice'];?>$</td>
                          <td height="35"><?php echo $info['memberprice']*$num."$";?></td>
                          <td height="35"><a href="removegwc.php?id=<?php echo $info['id']?>">Remove</a></td>
                        </tr>
                     <?php
						  }
						 }
					 ?>
                      </tbody>
                     <tbody>
                      	<tr>
                      	  <td colspan="7" align="center">
                        <table class="table" style="margin-bottom: 0px;" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center"><button name="submit2" type="submit" class="btn btn-default">
Change the number of products</button></td>
                          <td align="center"><a href="checkout.php">Go to checkout</a></td>
                          <td align="center"><a href="cart.php?qk=yes">
Empty the shopping cart</a></td>
                          <td align="center">Total:<?php echo $total;?>$</td>
                        </tr>
                      </table>
                        </td>
                       </tr>
                      </tbody>
                     <?php
						 }}
						?></form>
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