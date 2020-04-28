<?php
 include_once("top.php");
?>


<link href="css/center.css" rel='stylesheet' type='text/css' />

<div class="main-content">
	<div class="container">
		<h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>
Recommended Products<a href="shops.php" class="text-muted pull-right">More &gt;&gt;</a></h3>
		<div class="grid">
			<?php
				
			
    $sql = "select * from products where recommend=1 order by id desc limit 0,3";
	$run_query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	
			while($row=mysqli_fetch_array($run_query))
				{
			?>
			<div class="col-md-4 m-b">
				<a href="shopshow.php?id=<?php echo $row['id'];?>">
                	<figure class="effect-layla">
						<img src="upimages/<?php echo $row["image"];?>" />
						<figcaption><h4>Price : $ <?php echo $row['memberprice'];?></h4></figcaption>
					</figure>
				</a>
				<div class="m-b-text">
					<a href="shopshow.php?id=<?php echo $row['id'];?>&typeid=<?php echo $row['typeid'];?>" class="wd"><?php echo $row['name'];?></a>
					<a class="read" href="shopshow.php?id=<?php echo $row['id'];?>&typeid=<?php echo $row['typeid'];?>">
See the details</a> <a class="order" href="addgouwuche.php?id=<?php echo $row['id'];?>">
add to Shopping Cart</a>
				</div>
			</div>
            <?php
                }
			?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="main-content margin-2">
	<div class="container">
		<h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>Latest Products<a href="shops.php" class="text-muted pull-right">More &gt;&gt;</a></h3>
		<div class="grid">
			<?php
							
			    $sql = "select * from products order by addtime desc limit 0,6";
				$run_query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
					while($row=mysqli_fetch_array($run_query))
				{
			?>
			<div class="col-md-4 m-b">
				<a href="shopshow.php?id=<?php echo $row['id'];?>">
                	<figure class="effect-layla">
						<img src="upimages/<?php echo $row["image"];?>" />
						<figcaption><h4>
 Price : $ <?php echo $row['memberprice'];?><span style="text-decoration:line-through"></span></h4></figcaption>
					</figure>
				</a>
				<div class="m-b-text">
					<a href="shopshow.php?id=<?php echo $row['id'];?>" class="wd"><?php echo $row['name'];?></a>
					 <a class="read" href="shopshow.php?id=<?php echo $row['id'];?>&typeid=<?php echo $row['typeid'];?>">
See the details</a> <a class="order" href="addproduct.php?id=<?php echo $row['id'];?>">add to Shopping Cart</a>
				</div>
			</div>
            <?php
                }
			?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php
 include_once("foot.php");
?>