<?php
include_once("top.php");
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';


$sql=mysqli_query($conn,"select * from category where id=".$id."");


$info=mysqli_fetch_array($sql);


?>
<!-- 顶部 -->
<script type="text/javascript"> 
function check(){   
        if(document.form1.cat_name.value==""){
		alert("please insert categpry name");
		document.form1.cat_name.focus();
		return false;}
}
</script> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>modify category</strong></div>
   <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">
             <form name="form1" method="post" action="?action=update&id=<?php echo $info['id'];?>" onSubmit="return check(this)">
			<tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" bgcolor="#ffffff"><strong>
                
              modify categpry name</strong></td>
              </tr> <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>category name：</b> </td>
             
              <td><input type="text" name="cat_name" class="span1-1" value="<?php echo $info['cat_name'];?>"/></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td align="right"> </td>
             
              <td><input type="submit" value="comfirm" class="btn btn-info " style="width:80px;"></td>
            </tr></form>
          </table>
     </div>     
     </div>
    </div>
    
<!--  -->
<?php
$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'update')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$cat_name = !empty($_POST['cat_name']) ? trim($_POST['cat_name']) : '';
	mysqli_query($conn,"update category set cat_name='$cat_name' where id=".$id);
	echo "<script>alert('changed successful');location.href='fenlei.php';</script>";
}
include_once("foot.php");
?>
 <script>
!function(){
laydate.skin('molv');
laydate({elem: '#Calendar'});
}();
 
</script>
</body>
</html>