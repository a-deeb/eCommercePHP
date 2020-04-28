<?php

include_once("sessionuser.php");

include_once("top.php");

checkout

?>

<?php

	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';

	if($act == 'add')

	{

		$sql=mysqli_query($conn,"select * from usermember where name='".$_SESSION['username']."'");

		$row=mysqli_fetch_array($sql);

		$ordernumber=date("YmjHis").$row['id'];

		$spc=$_SESSION['producelist'];

		$slc= $_SESSION['quatity'];

		$seller= !empty($_POST['name']) ? trim($_POST['name']) : '';

		$sex= !empty($_POST['sex']) ? trim($_POST['sex']) : '';

		$address = !empty($_POST['address']) ? trim($_POST['address']) : '';

		$youbian = !empty($_POST['yb']) ? trim($_POST['yb']) : '';

		$tel = !empty($_POST['tel']) ? trim($_POST['tel']) : '';

		$email = !empty($_POST['email']) ? trim($_POST['email']) : '';

		$shff = !empty($_POST['shff']) ? trim($_POST['shff']) : '';

		$zfff = !empty($_POST['zfff']) ? trim($_POST['zfff']) : '';

		$leaveword = !empty($_POST['ly']) ? trim($_POST['ly']) : '';

 		$xiadanren=$_SESSION['username'];

 		$zt="no action";

 		$total=$_SESSION['total'];

		 mysqli_query($conn,"insert into orders(ordernumber,spc,slc,seller,sex,address,tel,email,zfff,leaveword,xiadanren,zt,total) values ('$ordernumber','$spc','$slc','$seller','$sex','$address','$tel','$email','$zfff','$leaveword','$xiadanren','$zt','$total')"); 

		 header("location:checkout.php?ordernumber=$ordernumber");

	}

    $sql=mysqli_query($conn,"select * from usermember where username='".$_SESSION['username']."'");
	$row=mysqli_fetch_array($sql);	

?>

<link href="css/page.css" rel='stylesheet' type='text/css' />

<script language="javascript">

function check(){

	if(document.getElementById("email").value==""){

		alert("please insert email");

		return false;}

	if(document.getElementById("name").value==""){

		alert("please insert name");

		return false;}

	if(document.getElementById("address").value==""){

		alert("please insert shipping address");

		return false;}

	if(document.getElementById("tsda").value==""){

		alert("please insert the ansewer for the hitting question for password");

		return false;}

	var mobile=document.getElementById("tel").value;

		if(mobile.length==0) 

       { 

          alert('please insert phone number！'); 

          return false; 

       }     

       if(mobile.length!=11) 

       { 

           alert('please insert vaild phone number！');

           return false; 

       } 

        

       var myreg = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 

       if(!myreg.test(mobile)) 

       { 

           alert('please insert vaild phone number！');

           return false; 

       }

}

</script>

<div class="height2"></div>

<div class="container">

	<div class="row">

		<div class="col-md-9">

			<ul class="breadcrumb">

				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> first page</a></li>

				<li>please fill the information for receiver</li>

			</ul>

			<div class="panel panel-default">

				<div class="panel-body">

				<div class="height2"></div>

                <center><h3>fill the information for shipping</h3></center>

                <div class="height2"></div>

                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=add" onSubmit="return check();">

                    <div class="form-group">

                        <label for="firstname" class="col-sm-2 control-label">receiver name</label>

                        <div class="col-sm-10">

                            <input type="text" class="form-control" name="name" id="name" placeholder="Receipt name" value="<?php echo $row['name'];?>">

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="lastname" class="col-sm-2 control-label">gender</label>

                        <div class="col-sm-10">

                            <select name="sex" class="form-control">

                              <option selected value="male">male</option>

                              <option value="female">female</option>

                            </select>

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="lastname" class="col-sm-2 control-label">contact phone number</label>

                        <div class="col-sm-10">

                            <input type="text" class="form-control" name="tel" id="tel" placeholder="please insert phone number" value="<?php echo $row['tel'];?>">

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="firstname" class="col-sm-2 control-label">E-mail</label>

                        <div class="col-sm-10">

                            <input type="text" class="form-control" name="email" id="email" placeholder="please insert email" value="<?php echo $row['email'];?>">

                        </div>

                    </div>



                    <div class="form-group">

                        <label for="lastname" class="col-sm-2 control-label">shipping address</label>

                        <div class="col-sm-10">

                            <input type="text" class="form-control" name="address" id="address" placeholder="please insert address" value="<?php echo $row['address'];?>">

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="lastname" class="col-sm-2 control-label">payment method</label>

                        <div class="col-sm-10">

                            <select name="zfff" class="form-control">

                              <option selected value="debit">debit</option>

                              <option value="paypal">paypal</option>

                              <option value="mail">mail</option>

                              <option value="credit">credit card</option>

                            </select>

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="lastname" class="col-sm-2 control-label">Payment information</label>

                        <div class="col-sm-10">

                            <textarea name="ly" cols="70" rows="5" class="form-control"></textarea>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-offset-2 col-sm-10">

                            <button type="submit" class="btn btn-default">submit</button>

                        </div>

                    </div>

                </form>

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

<?php

 $ordernumber = !empty($_GET['ordernumber']) ? trim($_GET['ordernumber']) : '';

 if($ordernumber!="")

  {  $dd=$ordernumber;

	if(!session_id()) session_start();

	$array=explode("@",$_SESSION['producelist']);

	 $sum=count($array)*20+260;

    echo "<script>alert('successfully ordered!');location.href='showorder.php?dd='+'".$dd."';</script>";

  }

?>