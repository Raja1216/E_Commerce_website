<?php
session_start();
include("db.php");
include("function.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Commerce Store</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div id="top"><!--Top bar-->
<div class="container">
<div class="col-md-6 offer">
<a href="#" class="btn btn-success btn-sm">
<?php
if (!isset($_SESSION['customer_email'])) {
  echo "WELCOME GUEST";
}else
{
  echo "WELCOME  " .$_SESSION['customer_email']."";
}
?>
</a>
<a href="#">Shopping Cart Total Price:INR <?php  totalPrice(); ?>, Total Items <?php item(); ?></a>	
</div>
<div class="col-md-6">
<ul class="menu">
<li>
<a href="customer_registration.php"> Register</a>	
</li>
<li>
	<?php
   
   if (!isset($_SESSION['customer_email'])) {
    echo "<a href='checkout.php'>My Account</a>";
   }else
   {
    echo "<a href='customer/my_account.php?my_order'>My Account</a>";
   }
    ?>
</li>	
<li>
<a href="cart.php">Goto Cart</a>	
</li>
<li>
<?php
if (!isset($_SESSION['customer_email'])) {
  echo "<a href='checkout.php'>Login</a>";
}else{
  echo "<a href='logout.php'>Logout</a>";
}
?>
</li>			
</ul>		
</div>	
</div>	
</div><!-- top end -->
<div class="navbar navbar-default" id="navbar"><!--navbar start-->
 <div class="container">
  	<div class="navbar-header">
  	 <a class="navbar-brand home" href="index.php">
  	 	<img  id="log" src="logo1.png" alt="SPshoping" class="hidden-xs">
  	 	<img id="log" src="logo1.png" alt="spshoping" class="visible-xs">
  	 </a>
  	 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
  	 <span class="sr-only">Toggle Navigation</span>	
  	 <i class="fa fa-align-justify"></i>
  	 </button>
  	 <button type="button" class="navbar-toggle"data-toggle="collapse" data-target="#search" >
  	 	<span class="sr-only"></span>	
  	 	<i class="fa fa-search"></i>
  	 </button>	
  	</div>
  	<div class="navbar-collapse collapse" id="navigation">
  	<div class="padding-nav">
  	<ul class="nav navbar-nav navbar-left">
  	<li>
  	<a href="index.php"> Home </a>	
  	</li>
  	<li>
  	<a href="shop.php"> Shop </a>	
  	</li>
  	<li>
  	<?php
   
   if (!isset($_SESSION['customer_email'])) {
    echo "<a href='checkout.php'>My Account</a>";
   }else
   {
    echo "<a href='customer/my_account.php?my_order'>My Account</a>";
   }
    ?>
  	</li>
  	<li>
  	<a href="cart.php"> Shopping Cart </a>	
  	</li>
  	<li class="active">
  	<a href="about.php"> About Us </a>	
  	</li>
  	<li>
  	<a href="contactus.php"> Contact Us </a>	
  	</li>				
  	</ul>	
  	</div><!--padding nav close-->	
  	<a href="cart.php" class="btn btn-primary navbar-btn right">
  	<i class="fa fa-shopping-cart"></i>
  	<span><?php item(); ?> item in cart</span>	
  	</a>
  	<div class="navbar-collapse collapse right">
  	<button  class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
  	<span class="sr-only">Toggle Search</span>
  	<i class="fa fa-search"></i>	
  	</button>
  	</div>
  	<div class="collapse clearfix" id="search">
  	<form class="navbar-form" method="get" action="result.php">
  	<div class="input-group">
  	<input type="text" name="user_query"  class="form-control" placeholder="Search" required="">
  	<span class="input-group-btn">
  	<button type="submit" value="Search" name="search" class="btn btn-primary">
  		<i class="fa fa-search"></i>
  	</button>
  	</span>	
  	</div>	
  	</form>	
  	</div>
  	</div>
 </div>	
</div><!--navbar end -->
 <!--Main Start-->





<!--Main End-->
<!--footer strat-->
<?php
include("includes/footetr.php");
?>
<!--footer stop-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>