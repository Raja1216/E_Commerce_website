<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<div class="row"><!-- 1st row start-->
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-dashboard"></i>Dashboard/View order	
</li>	
</ol>	
</div>	
</div><!-- 1st row stop-->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>View Product	
</h3>	
</div>
<div class="panel-body">
<div class="table-responsive">

   <table id="mytable" class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Product Id</th> 
<th>Product Title</th>  
<th>Product Image</th>  
<th>Product price</th>      
<th>Product Keyword</th>
<th>Product Date</th>
<th>Product Delete</th>         
<th>Product Edit</th>   
</tr>   
</thead>
<tbody>
    <?php
    $i=0;
    $get_product="select * from product order by 1 DESC";
    $run_product=mysqli_query($con,$get_product);
    while ($row_product=mysqli_fetch_array($run_product)) {
        $pro_id=$row_product['product_id'];
        $pro_title=$row_product['product_title'];
        $pro_img1=$row_product['product_img1'];
        $pro_price=$row_product['product_price'];
        $pro_keyword=$row_product['product_keyword'];
        $pro_date=$row_product['date'];
        $i++;
    ?>
<tr>
<td><?php echo $i ?></td>
<td><?php echo $pro_title ?></td>
<td><img src="product_image/<?php echo $pro_img1 ?>" class="img-responsive" width="80" height="90"></td>
<td><?php echo $pro_price ?></td>
<td><?php echo $pro_keyword ?></td>
<td><?php echo $pro_date ?></td>
<td>
 <p class="button">   
<a href="index_admin.php?delete_product=<?php echo $pro_id?>" onclick="return confirm('Are you sure');" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
</p>
 </td>
<td>
 <p class="button">   
<a href="index_admin.php?edit_product=<?php echo $pro_id?>" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
</p>
</td>   
</tr>
<?php  } ?> 
</tbody>    
</table> 
</div>	
</div>	
</div>	
</div>	
</div>

<script >
    $(document).ready(function() {
    $('#mytable').DataTable();
} );
</script>



<?php } ?>