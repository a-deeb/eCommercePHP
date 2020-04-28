<div class="left">
     
     <script type="text/javascript">
var myMenu;
window.onload = function() {
	myMenu = new SDMenu("my_menu");
	myMenu.init();
};
</script>

<div id="my_menu" class="sdmenu">
	<div >
		<span>
Management settings</span>
		<a href="changeadmin.php">
change Password</a>
	</div>
	<div class="collapsed">
		<span>
Commodity management</span>
		<a href="addgoods.php">
Adding goods</a>
        <a href="goods.php">
Commodity management</a>
        <a href="fenleiadd.php">
Add Product Category</a>
        <a href="fenlei.php">Product category management</a>
	</div>
	<div class="collapsed">
		<span>User Management</span>
		 <a href="usermember.php">
Membership management</a>
	</div>
	<div class="collapsed">
		<span>
Order management</span>
		 <a href="dingdan.php">Order management</a>
	</div>    

</div>

     </div>
     <div class="Switch"></div>
     <script type="text/javascript">
	$(document).ready(function(e) {
    $(".Switch").click(function(){
	$(".left").toggle();
	 
		});
});
</script>