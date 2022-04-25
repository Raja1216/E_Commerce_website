<?php

if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<div class="row"><!--row start-->
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-dashboard"></i>	
Dashboard/ View Slider
</li>	
</ol>
</div>
</div><!--row stop-->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>View Sliders
</h3>	
</div>
<div class="panel-body">
<?php
$get_slides="select * from slider";
$run_slides=mysqli_query($con,$get_slides);
while ($row_slides=mysqli_fetch_array($run_slides)) {
$slide_id=$row_slides['id'];
$slide_name=$row_slides['slider_name'];
$slide_image=$row_slides['slider_image'];	
?>
<div class="col-lg-3 col-md-3">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title" align="center">
<?php echo $slide_name?>
</h3>
</div>
<div class="panel-body">
<img src="slides_images/<?php echo $slide_image?>" class="img-responsive">	
</div>
<div class="panel_footer">
	<center>
	   
<a href="index_admin.php?delete_slide=<?php echo $slide_id; ?>"  onclick="return confirm('Are You Really Want To Delet');" class="pull-left btn btn-danger"><i class="fa fa-trash-o"></i></a>   
<a href="index_admin.php?edit_slide=<?php echo $slide_id; ?>" class="pull-right btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
  
		
		<div class="clearfix">
			
		</div>
	</center>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
<?php } ?>
