<?php

$customer_email=$_SESSION['customer_email'];
$get_customer="select * from customers where customer_email='$customer_email'";
$run_cust=mysqli_query($con,$get_customer);
$row_cust=mysqli_fetch_array($run_cust);
$customer_id=$row_cust['customer_id'];
$customer_name=$row_cust['customer_name'];
$customer_email=$row_cust['customer_email'];
$customer_country=$row_cust['customer_country'];
$customer_city=$row_cust['customer_city'];
$customer_contact=$row_cust['customer_contact'];
$customer_address=$row_cust['customer_address'];
$customer_image=$row_cust['customer_image'];

?>

<div class="box">
	<center>
	<h1>Edit Your Account</h1>
	</center>
	<form action="" enctype="multipart/form-data" method="POST">
	<div class="form-group"> 
		<label>Customer Name</label>
		<input type="text" name="c_name" class="form-control" value="<?php echo $customer_name ?>" required="">
		<label>Customer Email</label>
		<input type="text" name="c_email" class="form-control" value="<?php echo $customer_email ?>" required="">
		<label>Customer Country</label>
		<input type="text" name="c_country" class="form-control" value="<?php echo $customer_country ?>" required="">
		<label>Customer City</label>
		<input type="text" name="c_city" class="form-control" value="<?php echo $customer_city ?>" required="">
		<label>Contact Number</label>
		<input type="text" name="c_number" class="form-control" value="<?php echo $customer_contact ?>" required="">
		<label>Customer Address</label>
		<input type="text" name="c_address" class="form-control" value="<?php echo $customer_address ?>" required="">
		<label>Customer Name</label>
		<input type="file" name="c_img" class="form-control" required="">
		<img src="customer_images/<?php echo $customer_image ?>"  class="img-respomsive" height="100" width="100">
	</div>
	<div class="text-center">
		<!--<button class="btn btn-primary" name="update" type="submit">
			Update
		</button>-->
		<input class="btn btn-primary" value="update" name="update" type="submit">
	</div>
	</form>
</div>
<?php

if (isset($_POST['update'])) {
	$update_id=$customer_id;
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST['c_city'];
	$c_number=$_POST['c_number'];
	$c_address=$_POST['c_address'];
	$c_img=$_FILES['c_img']['name'];
	$c_img_tmp=$_FILES['c_img']['tmp_name'];

	move_uploaded_file($c_img_tmp,"customer_images/$c_img");
	$update_act= "update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_number',customer_address='$c_address',customer_image='$c_img' where customer_id='$update_id'";
	$run_customer=mysqli_query($con,$update_act);
	if ($run_customer) {
		echo "<script>alert('Your details has been updated');</script>";
		echo "<script>window.open('logout.php','_self');</script>";
		
	}else
	echo "<script>alert('There is soume problem');</script>";
}


?>
