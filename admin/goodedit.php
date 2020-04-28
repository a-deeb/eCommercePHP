<?php
include_once("top.php");
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$sql1=mysqli_query($conn,"select * from products where id=".$id."");
$info1=mysqli_fetch_array($sql1);
?>
<div id="middle">
<?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>change product</strong></div>
      <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">
	<script language="javascript">
	function chkinput()
	{
	  if(document.form1.name.value==""){
		alert("please insert product name");
		document.form1.name.focus();
		return false;}
		if(document.form1.memberprice.value==""){
		alert("please insert membership price");
		document.form1.memberprice.focus();
		return false;}
	
		if(document.form1.model.value==""){
		alert("please insert #product");
		document.form1.model.focus();
		return false;}
		
	  if(document.form1.Quantity.value==""){
		alert("please insert quantity");
		document.form1.Quantity.focus();
		return false;}
	   if(document.form1.summary.value==""){
		alert("product introduction");
		document.form1.summary.focus();
		return false;}
		
	}
    </script>
     <form name="form1" enctype="multipart/form-data" method="post" action="?action=update&id=<?php echo $info1['id'];?>" onSubmit="return chkinput();">
     <tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" bgcolor="#ffffff"><strong>
                
              change product</strong></td>
          </tr>
	  <tr>
        <td width="129" height="35" align="right">name：</td>
        <td width="618"><input type="text" name="name" size="25" class="span1-1" style="width:50%;" value="<?php echo $info1['name'];?>"></td>
      </tr>
      <tr>
        <td height="35" align="right">price：</td>
        <td height="25"><input type="text" name="memberprice" size="10" class="span1-1" value="<?php echo $info1['memberprice'];?>">
          $</td>
      </tr>
      <tr>
        <td height="35" align="right">category：</td>
        <td height="25">
           <?php
			$sql=mysqli_query($conn,"select * from category order by id desc");
			$info=mysqli_fetch_array($sql);
			if($info==false)
			{
			  echo "please insert product category!";
			}
			else
			{
			?>
                <select name="typeid" class="span1-1">
                  <?php
			do
			{
			?>
                  <option value=<?php echo $info['id'];?> <?php if($info1['typeid']==$info['id']) {echo "selected";}?>><?php echo $info['cat_name'];?></option>
                  <?php
			}
			while($info=mysqli_fetch_array($sql));
			?>
                </select>
                <?php
		     }
		    ?>
        </td>
      </tr>
 

      <tr>
        <td height="35" align="right">quantity：</td>
        <td height="25"><input type="text" name="Quantity" class="span1-1" size="20" value="<?php echo $info1['Quantity'];?>"></td>
      </tr>
      <tr>
        <td height="35" align="right">picture：</td>
        <td height="25">
		<input type="file" name="img" class="span1-1" size="30">
        <input type="hidden" name="upfile1" class="span1-1" size="30" value="<?php echo $info1['image'];?>">
        <?php if( $info1['image']){?><img src="../upimages/<?php echo $info1["image"];?>"  height="100" width="100"/><?php }?></td>
      </tr>
      <tr>
        <td height="80" align="right">summary:</td>
        <td><div style="margin:10px;"><script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
$(function(){
	$("#submitBtn").click(function(){
		$("#content").val(UE.getEditor('editor').getContent());
		$("#form1").submit();
	});

	var ue = UE.getEditor('editor');
});
</script>
			  <script id="editor" type="text/plain" style="width:100%;height:200px;"><?php echo $info1['summary'];?></script>
				<textarea name="content" id="content" style="display:none;"><?php echo $info1['summary'];?></textarea></div>
        </td>
      </tr>
      <tr>
        <td height="25" colspan="2"><input type="submit" id="submitBtn" value="submit" class="btn btn-info " style="width:80px;">
        </td>
      </tr>
	  </form>
    </table>
     </div>     
     </div>
    </div>
    
<!-- bottom -->
<?php
$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'update')
	{
		$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
		if( is_numeric($_POST['memberprice'])==false)
	 {
	   echo "<script>alert('the quantity must be a number！');history.back();</script>";
	   exit;
	 }
	if(!is_numeric($_POST['Quantity']))
	 {
	   echo "<script>alert('quantity must be a number！');history.back();</script>";
	   exit;
	 }
	$name=$_POST['name'];
	$memberprice=$_POST['memberprice'];
	$typeid=$_POST['typeid'];
	$Quantity=$_POST['Quantity'];
	if(!empty($_FILES['img']['name'])){
			$file = $_FILES['img'];

			$type = strtolower(substr($name,strrpos($name,'.')+1)); 
			$upload_path = ROOT_PATH.'/upimages/'; 
			$mu=mt_rand(1,10000000);
			if(move_uploaded_file($file['tmp_name'],$upload_path.$mu.".".$type)){
			  $fileName =$mu.".".$type;
			 
			}else{
			  //echo "Failed!";
			}
		}
		else
		{
			$fileName=$_POST['upfile1'];
			}
	$summary=$_POST['content'];
	$addtime=date("Y-m-j");
	mysqli_query($conn,"update products set name='$name',summary='$summary',model='$model',image='$fileName',typeid='$typeid',Marketprice='$Marketprice',memberprice='$memberprice',Quantity='$Quantity' where id=".$id."");
echo "<script>alert('product  ".$name."  successful change!');history.back();;</script>";
}
include_once("foot.php");
?>
</body>
</html>