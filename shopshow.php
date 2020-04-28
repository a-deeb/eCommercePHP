<?php
	include_once("top.php");
	include_once("conn/page.php");
?>
<?php
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
if($act == 'add')
{
	$username = !empty($_SESSION['username']) ? $_SESSION['username'] : '';
	if(empty($username)){
	echo "<script>alert('please log in first!');top.location='login.php'</script>";
	}
	$spid = !empty($_GET['pid']) ? intval($_GET['pid']) : '';
	$sql4=mysqli_query($conn,"select * from orders where  xiadanren='".$_SESSION['username']."' and zt='got it' and spc like '%$spid%'");
	$getcount=@mysqli_num_rows($sql4);
	if($getcount>0){
		$content = !empty($_POST['content_desc']) ? trim($_POST['content_desc']) : '';
		$sql=mysqli_query($conn,"select * from usermember where name='".$_SESSION['username']."'");
		$info=mysqli_fetch_array($sql);
		$userid=$info['id'];
		mysql_query($conn,"insert into comments (userid,spid,content) values ('$userid','$spid','$content') ");
		echo "<script>alert('commment alread updated!');location.href='shopshow.php?id=$spid';</script>";
	}
	else
	{
		echo "<script>alert('transction did not finished or you never buy this product before!');location.href='shopshow.php?id=$spid';</script>";
	}
	
}
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$typeid=!empty($_GET['typeid']) ? intval($_GET['typeid']) : '';


	$sql1 = "update products set link=link+1 where id='$id'";
	$sqlss = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
	
	$sql2="select * from products where id='$id'";

	$sql11 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));



$row11=mysqli_fetch_array($sql11);
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script type="text/javascript"> 
function check(){
    if(document.form1.content_desc.value==""){
		alert("leave your comment");
		document.form1.content_desc.focus();
		return false;}
}
</script>
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="./"> first page</a></li>
				<li><a href="shops.php">product show</a></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-6"><img src="upimages/<?php echo $row11["image"];?>" /></div>
                        <div  class="col-md-6">
                            <h2><?=$row11['name']?></h2>
                            <p>product number：<?=$row11['typeid']?></p>
                            <p>quantity：<?=$row11['Quantity']?></p>
    						<p>price：<font color="#FF0000"><?=$row11['memberprice']?> $</font></p>
                          
                            <div class="details-in">
                                <a href="addproduct.php?id=<?=$row11['id']?>" class="details"><button type="button" class="btn btn-danger">buy it</button></a>
                            </div>
                        </div>
						<div class="clearfix"></div>
                        <div class="height2"></div>
                        <p> <?=$row11['comments']?></p>
                        <div class="height2"></div>
				</div>
			</div>
            <div class="list-group">
			<?php
			$countSql="select id from comments where spid='$id'";
			$pageSize="10"; 
			$curPage= !empty($_GET['curPage']) ? intval($_GET['curPage']) :0;
			$urlPara= "";
		    $pageid="";
			$pageOutStr=reterPageStrSam($pageSize,$curPage,$countSql,$urlPara,$pageid);
			$pageOutStrArr=explode("||",$pageOutStr);
			$rsStart=$pageOutStrArr[0];
			$pageStr=$pageOutStrArr[2];
			$pageCount=$pageOutStrArr[1];
					
			
	$sql = "select * from comments where spid='$id' order by id desc limit $rsStart, $pageSize";
								
	$sql11 = mysqli_query($conn,$sql) or die(mysqli_error($conn));

$row11=mysqli_fetch_array($sql11);
			
			while($row=mysqli_fetch_array($sql))
			{
			?>
				<div class="list-group-item">
					<h4>comment：<font color="#FF0000"><?php 
			  $spid=$row['userid'];
			  $sql1 =  mysqli_query($conn,"select * from usermember where id='$spid'");
				$row1=mysqli_fetch_object($sql1);
                 echo $row1->name;
              ?></font> update time：<span class="badge"> <?=$row['addtime']?></span></a> </h4>
				</div>
                <div class="alert alert-info">
				<?=$row['content']?>
				</div>
            <?php } ?>
			</div>
	
            
                <div class="height2"></div>
                <form class="form-horizontal" method="post" role="form" name="form1" action="?act=add&pid=<?=$id?>&typeid=<?=$typeid?>" onSubmit="return check();">
              
                 
                </form>
            
		</div>
<?php
include_once("left.php");
?>
	</div>
</div>
<?php

include_once("foot.php");
?>
