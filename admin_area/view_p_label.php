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
Dashboard/ View Product Label
</li>	
</ol>
</div>
</div><!--row stop-->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>View Product Label
</h3>	
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Product Label Id</th>
<th>Product Label Title</th>
<th>Product Label Description</th>
<th>Delete Label </th>
<th>Edit Label </th>	
</tr>	
</thead>
<tbody>
<?php
$i=0;
$get_p_label="select * from product_label order by 1 DESC";
$run_p_label=mysqli_query($con,$get_p_label);
while ($row_p_cats=mysqli_fetch_array($run_p_label)) {
$p_label_id=$row_p_cats['p_label_id'];
$p_label_title=$row_p_cats['p_label_title'];
$P_label_desc=$row_p_cats['P_label_desc'];	
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $p_label_title;?></td>
<td><?php echo $P_label_desc;?></td>
<td>
	<p class="button">   
<a href="index_admin.php?delete_p_label=<?php echo $p_label_id; ?>" onclick="return confirm('Are You Really Want To Delet');" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
</p>
 </td>
<td>
 <p class="button">   
<a href="index_admin.php?edit_p_label=<?php echo $p_label_id; ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
</p>
</td>   
	
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
