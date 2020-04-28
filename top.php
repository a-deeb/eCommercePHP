<?php
if(!session_id())
{
	session_start();
}
include("conn/conn.php");
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title;?></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link href="css/body.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/head.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script>
$(function() {
	var pull= $('#pull');
		menu = $('nav ul');
		menuHeight	= menu.height();
	$(pull).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	$(window).resize(function(){
		var w = $(window).width();
		if(w > 320 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
});
</script>
</head>
<body>
<div class="top-bar">
		<div class="container">
			<div class="logo"><a href="/"><img src="images/logo.png" title="logo" /></a></div>
		
			<div class="clearfix"></div>
		</div>
	</div>
<div id="home" class="header">
	<div class="container">
		<div style="float: left;"><img src="images/index.png" title="" /> </div>
		<nav class="topnav">
			<ul class="topnav">
				<li class="active"><a style="color: white; font-size: 15px;" href="index.php">Home page</a></li>
				<li><a style="color: white; font-size: 15px;" href="shops.php">Brands </a></li>
                <li><a  style="color: white; font-size: 15px;"  href="cart.php">my shopping cart</a></li>
				<?php
                	if(isset($_SESSION["username"])){?><li><a href="usercenter.php">Member Centre</a></li>
					<li><a  style="color: white; font-size: 15px;"  href="logout.php">Log out</a><?php } else{?><li><a style="color: white; font-size: 15px;"  href="reg.php">register</a></li>
					<li><a  style="color: white; font-size: 15px;"  href="login.php">log in</a></li>
				<?php }?>
				<li  cstyle="text-align:center;"><div class="search">
						<form name="form2" action="search.php" method="get">
							<input type="search" placeholder="please input the product name" required  name="keywords"/>
							<input type="submit" value=" ">
						</form>
				</div>
					</li>
					<div style="float: right;"><a href="cart.php"><img src="images/gouwuche.jpg" title="" /></a></div></li>
					

			</ul>
			<a href="" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
		</nav>

		
	
	</div>
	
</div>