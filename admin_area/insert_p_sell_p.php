<?php

if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<div class="row"><!--row start-->
<div class="col-lg-12">
<div class="breadcrumb">
	<li class="active">
<i class="fa fa-dashboard"></i>	
Dashboard/ Insert Product sell price
</li>
</ol>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>Insert Product sell price	
</h3>	
</div>	
<div class="panel-body">
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<label class="col-md-3" control-label>Product sell percent value </label>	
<div class="col-md-6">
	<input type="text" name="sell_per" class="form-control">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label"></label>
<div class="col-md-6">
<input type="submit" name="submit" value="Insert" class="bat btn-primary form-control">
</div>
</div>
</form>
</div>
<?php
if (isset($_POST['submit'])) {
	$sell_per=$_POST['sell_per'];
	$insert_p_cat="insert into sell_percent(sell_per) values ('$sell_per')";
	$run_p_cat=mysqli_query($con,$insert_p_cat);
	if ($run_p_cat) {
		echo "<script> alert('Product sell price insert  Sucessfully')</script>";
		echo " <script> window.open('index_admin.php?insert_p_sell_p','_self')</script>";
	}
}
?>
<?php } ?>