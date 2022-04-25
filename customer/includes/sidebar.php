<div class="panel panel-default sidebar-menu">
	<div class="panel-heading"><!--start panel hadding -->
		<?php
	$session_customer=$_SESSION['customer_email'];
	$get_cust="select * from customers where customer_email='$session_customer'";
	$run_cust=mysqli_query($con,$get_cust);
	$row_customer=mysqli_fetch_array($run_cust);
	$customer_image=$row_customer['customer_image'];
	$customer_name=$row_customer['customer_name'];
    if (!isset($_SESSION['customer_email'])) {
    	
    }else{
    	echo "<center>
		<img src='customer_images/$customer_image' class='img-responsive'>
	<br>
	<h3 align='center' class='panel-title'>Name:$customer_name</h3></center>";
    }


     ?>	
	</div><!--stop panel hadding -->
	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">
			<li class="<?php if(isset($_GET['my_order'])){echo "active";}?>">
				<a href="my_account.php?my_order"><i class="fa fa-list"></i> My Order</a>
			</li>

			<li class="<?php if(isset($_GET['pay_offline'])){echo "active";}?>">
				<a href="my_account.php?pay_offline"><i class="fa fa-bolt"></i> Pay Offline</a>
			</li>
            

			<li class="<?php if(isset($_GET['edit_act'])){echo "active";}?>">
				<a href="my_account.php?edit_act"><i class="fa fa-pencil"></i> Edit Account</a>
			</li>

			<li class="<?php if(isset($_GET['change_password'])){echo "active";}?>">
				<a href="my_account.php?change_password"><i class="fa fa-user"></i>Chenge Password</a>
			</li>

			<li class="<?php if(isset($_GET['delete_ac'])){echo "active";}?>">
				<a href="my_account.php?delete_ac"><i class="fa fa-trace-o"></i>Delet Account</a>
			</li>

			<li class="<?php if(isset($_GET['logout'])){echo "active";}?>">
				<a href="my_account.php?logout"><i class="fa fa-sign-out"></i> Logout</a>
			</li>
		</ul>
	</div>
</div>