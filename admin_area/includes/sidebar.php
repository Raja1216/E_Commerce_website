
<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background: black">
	<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	<span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	</button>
	<a href="index_admin.php?dashboard" class="navbar-brand">Admin </a>	
	</div>
	<ul class="nav navbar-right top-nav"><!--navbar strat-->
	<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	<i class="fa fa-user"></i><?php echo $admin_name ?>
	</a>

	<ul class="dropdown-menu">
	<li>
		<a href="index_admin.php?user_profile?id= <?php echo $admin_id ?>">
			<i class="fa fa-fw fa-user"></i>Profile
		</a>
	</li>	

	<li>
		<a href="index_admin.php?view_product">
			<i class="fa fa-fw fa-envelope"></i>Products
			<span class="badge"><?php echo $count_pro ?></span>
		</a>
	</li>

	<li>
		<a href="index_admin.php?view_customer">
			<i class="fa fa-fw fa-users"></i>Customers
			<span class="badge"><?php echo $count_cust ?></span>
		</a>
	</li>

	<li>
		<a href="index_admin.php?pro_cat">
			<i class="fa fa-fw fa-gear"></i>Product categories
			<span class="badge"><?php echo $count_p_cust ?></span>
		</a>
	</li>
	<li class="divider"></li>
	<li>
	<a href="logout.php">Logout<i class="fa fa-fw fa-power-off"></i>
	</a>	
	</li>
	</ul>	
	</li>
	</ul><!--navbar stop-->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav sidebar-nav">
		<li>
			<a href="index_admin.php?dashboard">
				<i class="fa fa-fw fa-dashboard"></i>Dashboard 
			</a>
			</li>
		<li><!--star-->
			<a href="#" data-toggle="collapse" data-target="#products">
			<i class="fa fa-fw fa-table"></i>Products<i class="fa fa-fw fa-caret-down"></i>	
			</a>
		<ul  id="products" class="collapse">
		<li>
			<a href="index_admin.php?insert_product">Add Product</a>
		</li>
		<li>
			<a href="index_admin.php?view_product">View Product</a>
		</li>	
		</ul>
		</li><!--stop-->

		<li><!--star-->
			<a href="#" data-toggle="collapse" data-target="#product_cat">
			<i class="fa fa-fw fa-table"></i>Product Categories<i class="fa fa-fw fa-caret-down"></i>	
			</a>
		<ul  id="product_cat" class="collapse">
		<li>
			<a href="index_admin.php?insert_product_cat">Add Product Categories</a>
		</li>
		<li>
			<a href="index_admin.php?view_p_cat">View Product Categories</a>
		</li>	
		</ul>
		</li><!--stop-->

		<li><!--star-->
			<a href="#" data-toggle="collapse" data-target="#category">
			<i class="fa fa-fw fa-table"></i>Categories<i class="fa fa-fw fa-caret-down"></i>	
			</a>
		<ul  id="category" class="collapse">
		<li>
			<a href="index_admin.php?insert_categories">Add Categories</a>
		</li>
		<li>
			<a href="index_admin.php?view_categories">View Categories</a>
		</li>	
		</ul>
		</li><!--stop-->

		<li><!--star-->
			<a href="#" data-toggle="collapse" data-target="#p_label">
			<i class="fa fa-fw fa-table"></i>Product Label<i class="fa fa-fw fa-caret-down"></i>	
			</a>
		<ul  id="p_label" class="collapse">
		<li>
			<a href="index_admin.php?insert_p_label">Add Product Label</a>
		</li>
		<li>
			<a href="index_admin.php?view_p_label">View Product Label</a>
		</li>	
		</ul>
		</li><!--stop-->

		<li><!--star-->
			<a href="#" data-toggle="collapse" data-target="#p_sell">
			<i class="fa fa-fw fa-table"></i>Product sell percentage<i class="fa fa-fw fa-caret-down"></i>	
			</a>
		<ul  id="p_sell" class="collapse">
		<li>
			<a href="index_admin.php?insert_p_sell_p">Add Product seling percentage</a>
		</li>	
		</ul>
		</li><!--stop-->


		<li><!--star-->
			<a href="#" data-toggle="collapse" data-target="#slider">
			<i class="fa fa-fw fa-table"></i>Slider<i class="fa fa-fw fa-caret-down"></i>	
			</a>
		<ul  id="slider" class="collapse">
		<li>
			<a href="index_admin.php?insert_slider">Add Slider</a>
		</li>
		<li>
			<a href="index_admin.php?view_slider">View Slider</a>
		</li>	
		</ul>
		</li><!--stop-->
		<li>
		<a href="index_admin.php?view_customer">
			<i class="fa fa-fw fa-edit"></i>View Customer
		</a>	
		</li>

		<li>
		<a href="index_admin.php?view_order">
			<i class="fa fa-fw fa-list"></i>View Order
		</a>	
		</li>

		<li>
		<a href="index_admin.php?view_payments">
			<i class="fa fa-fw fa-pencil"></i>View Payments
		</a>	
		</li>

<!--  li>star
			<a href="#" data-toggle="collapse" data-target="#users">
			<i class="fa fa-fw fa-table"></i>Users<i class="fa fa-fw fa-caret-down"></i>	
			</a>
		<ul  id="users" class="collapse">
		<li>
			<a href="index_admin.php?insert_user">Insert Users</a>
		</li>
		<li>
			<a href="index_admin.php?view_user">View User</a>
		</li>
		<li>
			<a href="index_admin.php?user_profile=<?php  echo $admin_id ?>">Edit Profile</a>
		</li>	
		</ul>
		</li>stop-->	
		</ul>
	</div>
</nav>
<?php  } ?>