<?php

if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<?php
if (isset($_GET['edit_cat'])) {
	$edit_cat_id=$_GET['edit_cat'];
    $edit_cat_query="select * from categories where cat_id='$edit_cat_id'";
	$run_edit=mysqli_query($con,$edit_cat_query);
	$row_edit=mysqli_fetch_array($run_edit);
	$cat_id=$row_edit['cat_id'];
	$cat_title=$row_edit['cat_title'];
	$cat_desc=$row_edit['cat_desc'];
}

?>
<div class="row"><!--row start-->
<div class="col-lg-12">
<div class="breadcrumb">
	<li class="active">
<i class="fa fa-dashboard"></i>	
Dashboard/ Edit Category
</li>
</ol>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>Edit Category	
</h3>	
</div>	
<div class="panel-body">
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<label class="col-md-3" control-label>Category Title</label>	
<div class="col-md-6">
	<input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>">
</div>
</div>
<div class="form-group">
<label class="col-md-3" control-label>Categories Description</label>
<div class="col-md-6">	
<textarea type="text" name="cat_desc" class="form-control">
<?php echo $cat_desc; ?>
</textarea>	
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label"></label>
<div class="col-md-6">
<input type="submit" name="update" value="Edit" class="bat btn-primary form-control">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<?php
if (isset($_POST['update'])) {
	$cat_title=$_POST['cat_title'];
	$cat_desc=$_POST['cat_desc'];
	$update_cat="UPDATE categories SET cat_title='$cat_title',cat_desc='$cat_desc' WHERE cat_id='$cat_id'";
	$run_cat=mysqli_query($con,$update_cat);
	if ($run_cat) {
		echo "<script> alert('Category Edit Sucessfully')</script>";
		echo " <script> window.open('index_admin.php?view_categories','_self')</script>";
	}
}
?>
<?php } ?>