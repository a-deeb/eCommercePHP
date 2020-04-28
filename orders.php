<?php

include("sessionuser.php");

include_once("top.php");

?>

<link href="css/page.css" rel='stylesheet' type='text/css' />

<div class="height2"></div>

<div class="container">

	<div class="row">

		<div class="col-md-9">

			<ul class="breadcrumb">

				<li><span class="glyphicon glyphicon-home"></span> <a href="./"> first page</a></li>

				<li>my order</li>

			</ul>

			<div class="panel panel-default">

				<div class="panel-body">

                    <table class="table table-bordered">

                      <caption>my order</caption>

                      <?php

						  $username=$_SESSION['username'];

						  

						    $sql_ = "select * from orders where xiadanren='".$username."'";

	                  $sql = mysqli_query($conn,$sql_) or die(mysqli_error($conn));	

						  



						  $info=mysqli_fetch_array($sql);

						  if($info==false)

						   {

							  echo "<div algin='center'>Sorry, no order was found!</div>";    

						   }

						   else

						   {

					  ?>

                      <thead>

                        <tr bgcolor="#FFEDBF">

                          <th height="35" align="center">order#</th>

                          <th height="35" align="center">time</th>

                          <th height="35" align="center">order person</th>

                          <th height="35" align="center">total amount</th>

                          <th height="35" align="center">payment method</th>

                          <th height="35" align="center">order status </th>

                        </tr>

                      </thead>

                      <tbody>

                    <?php

						  do

						  {

						?>

                      	<tr>

                          <td height="35"><a href="orderlook.php?dd=<?php echo $info['ordernumber'];?>"><?php echo $info['ordernumber'];?></a></td>

                          <td height="35"><?php echo $info['time'];?></td>

                          <td height="35"><?php echo $info['seller'];?></td>

                          <td height="35"><?php echo $info['total'];?></td>

                          <td height="35"><?php echo $info['zfff'];?></td>

                          <td height="35"><?php echo $info['zt'];?></td>

                        </tr>

                      <?php

						   }while($info=mysqli_fetch_array($sql));

						?>

                      </tbody>

                     <?php

						 }

						?>

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