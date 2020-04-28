<?php

include_once("top.php");

?>

<div id="middle">

     <?php

include_once("left.php");

?>

     <div class="right"  id="mainFrame">

     <div class="right_cont">

   <div class="title_right"><strong>Add Product</strong></div>

      <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">

	<script language="javascript">

	function chkinput()

	{

	  if(document.form1.name.value==""){

		alert("please insert the product name");

		document.form1.name.focus();

		return false;}

		if(document.form1.memberprice.value==""){

		alert("please insert the membership price");

		document.form1.memberprice.focus();

		return false;}

	

		if(document.form1.model.value==""){

		alert("please instert the product #");

		document.form1.model.focus();

		return false;}

		

	  if(document.form1.Quantity.value==""){

		alert("please the quantity of the product");

		document.form1.Quantity.focus();

		return false;}

		

	}

    </script>

     <form name="form1" enctype="multipart/form-data" method="post" action="?action=update" onSubmit="return chkinput();">

     <tr bgcolor="#FFFFFF">

              <td height="25" colspan="2" align="center" bgcolor="#ffffff"><strong>

                

              Add product</strong></td>

          </tr>

	  <tr>

        <td width="129" height="35" align="right">name：</td>

        <td width="618"><input type="text" name="name" size="25" class="span1-1" style="width:50%;"></td>

      </tr>

      <tr>

        <td height="35" align="right">price：</td>

        <td height="25">



          <input type="text" name="memberprice" size="10" class="span1-1">

          $</td>

      </tr>

      <tr>

        <td height="35" align="right">brand:</td>

        <td height="25">

           <?php

			$sql=mysqli_query($conn,"select * from category order by id desc");

			$info=mysqli_fetch_array($sql);

			if($info==false)

			{

			  echo "please add the categories first";

			}

			else

			{

			?>

            <select name="typeid" class="span1-1">

			<?php

			do

			{

			?>

              <option value=<?php echo $info['id'];?>><?php echo $info['cat_name'];?></option>

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

        <td height="35" align="right">#product：</td>

        <td height="25"><input type="text" name="model" class="span1-1" size="20"></td>

      </tr>



      <tr>

        <td height="35" align="right">quantity：</td>

        <td height="25"><input type="text" name="Quantity" class="span1-1" size="20"></td>

      </tr>

      <tr>

        <td height="35" align="right">picture：</td>

        <td height="25">

		<input type="file" name="img" class="span1-1" size="30"></td>

      </tr>

      <tr>

        <td height="80" align="right">simple detail：</td>

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

			  <script id="editor" type="text/plain" style="width:100%;height:200px;"></script>

				<textarea name="content" id="content" style="display:none;"></textarea></div>

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

		if( is_numeric($_POST['memberprice'])==false)

	 {

	   echo "<script>alert('The price can only be numbers!');history.back();</script>";

	   exit;

	 }

	if(is_numeric($_POST['Quantity'])==false)

	 {

	   echo "<script>alert('Quantity can only be numbers!');history.back();</script>";

	   exit;

	 }

	$name=$_POST['name'];



	$memberprice=$_POST['memberprice'];

	$typeid=$_POST['typeid'];

	$model=$_POST['model'];


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

			$fileName="";

			}

	$summary=$_POST['content'];

	$addtime=date("Y-m-j");

	mysqli_query($conn,"insert into products(name,summary,addtime,model,image,typeid,memberprice,recommend,Quantity,frequency)values('$name','$summary','$addtime','$model','$fileName','$typeid','$memberprice','$recommend','$Quantity','0')");

	echo "<script>alert('product ".$name." Added successfully!');window.location.href='addgoods.php';</script>";

}

include_once("foot.php");

?>

</body>

</html>