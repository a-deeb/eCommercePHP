<?php
include_once("top.php");
include_once("conn/page.php");
$keywords = !empty($_GET['keywords']) ? trim($_GET['keywords']) : '';
?>
<link href="css/center.css" rel='stylesheet' type='text/css' />
<link href="css/pages.css" rel='stylesheet' type='text/css' />
<div class="main-content">
	<div class="container">
    	
		<h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>product search</h3>
		<div class="grid">
			<?php
			$sqlwhere="";
			if(!empty($keywords)&&$keywords!='')
			{
				$sqlwhere.="and name like '%$keywords%'";
			}
			$countSql="select id from products where 1=1 $sqlwhere ";
			$keywords=urlencode($keywords);
			$KeyWord = "typeid=$typeid&keywords=$keywords";
			$pageSize="12"; 
			$curPage= !empty($_GET['curPage']) ? intval($_GET['curPage']) :0;
			$urlPara= $KeyWord;
		    $pageid="";
			$pageOutStr=reterPageStrSam($pageSize,$curPage,$countSql,$urlPara,$pageid);
			$pageOutStrArr=explode("||",$pageOutStr);
			$rsStart=$pageOutStrArr[0];
			$pageStr=$pageOutStrArr[2];
			$pageCount=$pageOutStrArr[1];
			
			
			$sql_ = "select *  from products where 1=1 $sqlwhere order by memberprice asc limit $rsStart, $pageSize";
			
			
						 
	          $sql = mysqli_query($conn,$sql_) or die(mysqli_error($conn));
			while($row=mysqli_fetch_array($sql))
			{
			?>
			<div class="col-md-4 m-b">
				<a href="shopshow.php?id=<?php echo $row['id'];?>">
                	<figure class="effect-layla">
						<img src="/upimages/<?php echo $row["image"];?>" alt="">
						<figcaption><h4>member price:<?php echo $row['memberprice'];?>
					</figure>
				</a>
				<div class="m-b-text">
					<a href="shopshow.php?id=<?php echo $row['id'];?>" class="wd"><?php echo $row['name'];?></a>
					<a class="read" href="shopshow.php?id=<?php echo $row['id'];?>&typeid=<?php echo $row['typeid'];?>">See the details</a> 
					<a class="order" href="addproduct.php?id=<?php echo $row['id'];?>">add to Shopping Cart</a>
				</div>
			</div><input type="hidden" value="<?=$urlPara?>" name="url"><input type="hidden" value="<?=$curPage?>" name="curPage">
            <?php
                }
			?>
            <div class="clearfix"></div>
    
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php
include_once("foot.php");
?>