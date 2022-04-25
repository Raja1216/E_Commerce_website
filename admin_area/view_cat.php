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
Dashboard/ View Categories
</li>	
</ol>
</div>
</div><!--row stop-->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>View Categories
</h3>	
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Category Id:</th>
<th>Category Title:</th>
<th>Product Category Description:</th>
<th>Delete Category:</th>
<th>Edit Category:</th>	
</tr>	
</thead>
<tbody>
<?php
$i=0;
$get_cats="select * from categories order by 1 DESC";
$run_cats=mysqli_query($con,$get_cats);
while ($row_cats=mysqli_fetch_array($run_cats)) {
$cat_id=$row_cats['cat_id'];
$cat_title=$row_cats['cat_title'];
$cat_desc=$row_cats['cat_desc'];	
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $cat_title;?></td>
<td width="300"><?php echo $cat_desc; ?></td>
<td>
	<center>
	<p class="button">
<a href="index_admin.php?delete_cat=<?php echo $cat_id; ?>" onclick="return confirm('Are You Really Want To Delet');" class="btn btn-danger">
<i class="fa fa-trash-o"></i>	
</a>
</p>
</center>	
</td>
<td>
	<center>
	<p class="button">
<a href="index_admin.php?edit_cat=<?php echo $cat_id; ?>" class="btn btn-warning">
<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>
</p>
</center>	
</td>
</tr>
<?php } ?>	
</tbody>	
</table>	
</div>
</div>
</div>
</div>
</div>
<?php } ?>
