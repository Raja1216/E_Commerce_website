<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php
if (isset($_GET['customer_delete'])) {
	$delete_id= $_GET['customer_delete'];
	$delete_customer= "delete from customers where customer_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_customer);
	if ($run_delete) {
		echo "<script>alert('One customer has been Deleted')</script>";
		echo "<script>window.open('index_admin.php?view_customer','_self')</script>";
	}
}

?>
<?php } ?>