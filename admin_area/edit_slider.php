<?php

if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<?php
if (isset($_GET['edit_slide'])) {
	$edit_id=$_GET['edit_slide'];
    $edit_slide="select * from slider where id='$edit_id'";
	$run_edit=mysqli_query($con,$edit_slide);
	$row_edit=mysqli_fetch_array($run_edit);
	$slide_id=$row_edit['id'];
	$slider_name=$row_edit['slider_name'];
	$slider_image=$row_edit['slider_image'];
}

?>
<div class="row"><!--row start-->
<div class="col-lg-12">
<div class="breadcrumb">
	<li class="active">
<i class="fa fa-dashboard"></i>	
Dashboard/ Edit Slider
</li>
</ol>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>Edit Slider	
</h3>	
</div>	
<div class="panel-body">
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<label class="col-md-3" control-label>Slide Name:</label>	
<div class="col-md-6">
	<input type="text" name="slider_name" class="form-control" value="<?php echo $slider_name; ?>">
</div>
</div>
<div class="form-group">
<label class="col-md-3" control-label>Slide Image:</label>
<div class="col-md-6">	
<input type="file" name="slider_image" class="form-control"><br>
<img src="slides_images/<?php echo $slider_image; ?>" width="70" height="70">	
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
<?php
if (isset($_POST['update'])) {
	$slider_name=$_POST['slider_name'];
	$slider_image=$_FILES['slider_image']['name'];
	$temp_name=$_FILES['slider_image']['tmp_name'];
	move_uploaded_file($temp_name, "slides_images/$slider_image");
	$update_slide="UPDATE slider SET slider_name='$slider_name',slider_image='$slider_image' WHERE id='$slide_id'";
	$run_slide=mysqli_query($con,$update_slide);
	if ($run_slide) {
		echo "<script> alert('Slide Edit Sucessfully')</script>";
		echo " <script> window.open('index_admin.php?view_slider','_self')</script>";
	}
}
?>
<?php } ?>