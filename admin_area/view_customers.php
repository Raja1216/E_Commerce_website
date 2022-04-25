<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>	
<div class="row"><!--row start-->
<div class="col-lg-12" style="width: 1100px; float: right;">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-dashboard"></i>	
Dashboard/ View Customers
</li>	
</ol>
</div>
</div><!--row stop-->
<div class="row">
<div class="col-lg-12" style="width: 1100px; float: right;">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>View Customers
</h3>	
</div>	
<table id="mtable" class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Customer No:</th>
<th>Customer Name:</th>
<th>Customer Email:</th>
<th>Customer Image:</th>
<th>Customer Country:</th>
<th>Customer City:</th>
<th>Customer Phone Numer:</th>
<th>Customer Address:</th>
<th>Customer Delete:</th>	
</tr>	
</thead>
<tbody>
<?php
$i=0;
$get_c="select * from customers order by 1 DESC";
$run_c=mysqli_query($con,$get_c);
$count=mysqli_num_rows($run_c);
while ($row_c=mysqli_fetch_array($run_c)) {
$c_id=$row_c['customer_id'];
$c_name=$row_c['customer_name'];
$c_email=$row_c['customer_email'];
$c_image=$row_c['customer_image'];
$c_country=$row_c['customer_country'];
$c_city=$row_c['customer_city'];
$c_contact=$row_c['customer_contact'];
$c_address=$row_c['customer_address'];	
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $c_name;?></td>
<td><?php echo $c_email;?></td>
<td><img src="../customer/customer_images/<?php echo $c_image ;?>" width="40" height="40"></td>
<td><?php echo $c_country;?></td>
<td><?php echo $c_city;?></td>
<td><?php echo $c_contact;?></td>
<td><?php echo $c_address;?></td>
<td>
	<p class="button">   
<a href="index_admin.php?customer_delete=<?php echo $c_id; ?>" onclick="return confirm('Are You Really Want To Delet');" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
</p>
	
</a>	
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

<script >
    $(document).ready(function() {
    $('#mtable').DataTable();
} );
</script>

<?php } ?>
