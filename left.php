		<div class="col-md-3 sm-hidden">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span> membership center</div>
                <?php if(isset($_SESSION['username']))
				{
				?>
				<div class="list-group">
					<a href="usercenter.php" class="list-group-item">modify information</a>
					<a href="changeuserpwd.php" class="list-group-item">change password</a>
                    <a href="orders.php" class="list-group-item">my orders</a>
                    <a href="logout.php" class="list-group-item">logout</a>
                    <a href="cart.php" class="list-group-item">my shopping cart</a>
				</div>
                <?php
				}
				else
				{
				?>
                <div class="panel-body">
                <div class="height1"></div>
                <script language="javascript">
				function check1(){
					if(document.form2.usernc.value==""){
						alert("please enter user name");
						return false;
						}
					if(document.form2.p1.value==""){
						alert("please enter password");
						return false;
					}
				}
				</script>
                <form class="form-horizontal" method="post" role="form" name="form2" action="login.php?act=login" onSubmit="return check1();">
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="please enter user name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p1" id="p1" placeholder="please enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">log in</button> <a href="reg.php"><button type="button" class="btn btn-link">sign up</button></a>
                        </div>
                    </div>
                </form></div>
                <?php } ?>
			</div>
			<div class="panel panel-default">
				<div class="search">
						<form action="shops.php" method="get">
							<input name="keywords" type="search" placeholder="search" required />
                            <input type="hidden" value="<?php if(isset($typeid)){echo $typeid;} ?>" name="id">
							<input type="submit" value=" ">
						</form>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span> product cagetories</div>
				<div class="list-group">
					<?php
					 
					  $sql_ = "select * from category order by id desc";
	                  $sql = mysqli_query($conn,$sql_) or die(mysqli_error($conn));	
					  while($row=mysqli_fetch_array($sql))
                        {
                	?>
					<a href="shops.php?id=<?=$row['id']?>" class="list-group-item"><?=$row['cat_name']?></a>
					<?php
                        }
                    ?>
				</div>
			</div>
		</div>