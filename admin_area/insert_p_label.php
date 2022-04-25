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
Dashboard/ Insert Product Label
</li>
</ol>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>Insert Product Label	
</h3>	
</div>	
<div class="panel-body">
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<label class="col-md-3" control-label>Product Label Title</label>	
<div class="col-md-6">
	<input type="text" name="p_label_title" class="form-control">
</div>
</div>
<div class="form-group">
<label class="col-md-3" control-label>Product Label Description</label>
<div class="col-md-6">	
<textarea type="text" name="P_label_desc" class="form-control">

</textarea>	
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
	$p_label_title=$_POST['p_label_title'];
	$P_label_desc=$_POST['P_label_desc'];
	$insert_p_cat="insert into product_label(p_label_title,P_label_desc) values ('$p_label_title','$P_label_desc')";
	$run_p_cat=mysqli_query($con,$insert_p_cat);
	if ($run_p_cat) {
		echo "<script> alert('Product Label update Sucessfully')</script>";
		echo " <script> window.open('index_admin.php?view_p_label','_self')</script>";
	}
}
?>
<?php } ?>