<?php
session_start();
include("includes/db.php");
include("function/function.php");
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
  $session_customer=$_SESSION['customer_email'];
  $get_cust="select * from customers where customer_email='$session_customer'";
  $run_cust=mysqli_query($con,$get_cust);
  $row_customer=mysqli_fetch_array($run_cust);
  $customer_name=$row_customer['customer_name'];
  echo "WELCOME  " .$customer_name."";
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
<a href="checkout.php"> My Account</a>  
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
      <img id="log" src="small.jpg" alt="SPshoping" class="visible-xs">
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
    <li class="active">
    <a href="index.php"> Home </a>  
    </li>
    <li>
    <a href="shop.php"> Shop </a> 
    </li>
    <li>
    <a href="checkout.php"> My Account </a> 
    </li>
    <li>
    <a href="cart.php"> Shopping Cart </a> 
    </li>
    <li>
    <a href="about.php"> About Us </a>  
    </li>
    <li>
    <a href="services.php"> Services </a> 
    </li>
    <li>
    <a href="contactus.php"> Contact Us </a>  
    </li>       
    </ul> 
    </div><!--padding nav close-->  
    <a href="cart.php" class="btn btn-primary navbar-btn right">
    <i class="fa fa-shopping-cart"></i>
    <span> <?php item(); ?> item in cart</span> 
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
<div id="content"><!--content start-->
  <div class="container"><!--container start-->
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li>
          Registration
        </li>
      </ul>
    </div>
    <div class="col-md-3">
      <?php
      include("includes/sidebar.php")
      ?>
    </div>
    <div class="col-md-9"><!--col-md-9 start-->
      <div class="box">
        <div class="box-header">
          <center>
            <h2>Customer Registration</h2>
          </center>
        </div>
        <form name="myform" action="customer_registration.php" method="post" enctype="multipart/form-data" id="form" onsubmit="return vali()">
          <div class="form-group">
            <label>Customer Name</label>
            <input type="text" name="c_name" required="" class="form-control" autocomplete="off" id="name" onkeydown="vali()" >
            <span id="text3"> </span>
          </div>
          
          <div class="form-group">
            <label> Customer Email</label>
            <input type="text" name="c_email" required="" class="form-control" id="email" onkeydown="vali()" value="" autocomplete="off">
            <span id="text1"> </span>
          </div>
           
            <div class="form-group">
            <label> Customer Password</label>
            <input type="password" name="c_password" required="" class="form-control fa " autocomplete="off">
          </div>

           <div class="form-group">
            <label> Country</label>
            <input type="text" name="c_country" required="" class="form-control" autocomplete="off">
          </div>

           <div class="form-group">
            <label> City</label>
            <input type="text" name="c_city" required="" class="form-control" autocomplete="off">
          </div>
          
           <div class="form-group">
            <label> Contact Number</label>
            <input type="text" name="c_contact" required="" class="form-control" id="num" onkeydown="vali()" autocomplete="off">
            <span id="text2"></span>
          </div>
           
            <div class="form-group">
            <label> Address</label>
            <input type="text" name="c_address" required="" class="form-control" autocomplete="off">
          </div>
            
             <div class="form-group">
            <label> Customer image</label>
            <input type="file" name="c_image" required="" class="form-control" autocomplete="off">
          </div>

          <div class="text-center">
           <button type="submit" name="submit" class="btn btn-primary" value="Submit">
             <i class="fa fa-user-md">Register</i>
           </button>
          </div>

        </form>
      </div>
    </div><!--col-md-9 stop-->




     </div><!--container stop-->
 
</div><!--content stop-->

<!--footer strat-->
<?php
include("includes/footetr.php");
?>
<!--footer stop-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--Validation  start-->
<script type="text/javascript">
	function vali()
	{
		var email = document.getElementById("email").value;
		var text1 = document.getElementById("text1");
		var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; 
        
       var name = document.getElementById("name").value;
		var text3 = document.getElementById("text3");

		var num = document.getElementById("num").value;
		var text2 = document.getElementById("text2");
		var pattern2 = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/; 

		if (!isNaN(name)) {
			text3.innerHTML = "Please Enter valid Name (only character).";
		 	text3.style.color = "#ff0000";
		 	return false;
		}
		else
		{
		text3.innerHTML = "Your Name is valid.";
		 text3.style.color = "#00ff00";	
		}

		if (email.match(pattern))
		 {
		 	text1.innerHTML = "Your Email address is valid.";
		 	text1.style.color = "#00ff00";
		 }
		 else
		 {
		 	text1.innerHTML = "Please Enter Valid Email Address.";
		 	text1.style.color = "#ff0000";
		 	return false;
		 }


		if (num.match(pattern2))
		 {
		 	text2.innerHTML = " Your Phone Number is valid.";
		 	text2.style.color = "#00ff00 ";
		 }
		 else
		 {
		 	text2.innerHTML = "Please Enter Valid Phone Number.";
		 	text2.style.color = "#ff0000";
		 	return false;
		 }
	}



</script>
<!--Validation stop-->


</body>
</html>
<?php

if (isset($_POST['submit'])) {
  
  $c_name=$_POST['c_name'];
  $c_email=$_POST['c_email'];
  $c_password=$_POST['c_password'];
  $c_country=$_POST['c_country'];
  $c_city=$_POST['c_city'];
  $c_contact=$_POST['c_contact'];
  $c_address=$_POST['c_address'];
  $c_image=$_FILES['c_image']['name'];
  $c_tmp_name=$_FILES['c_image']['tmp_name'];
  $c_ip=getUserIP();
  
  move_uploaded_file($c_tmp_name,"customer\customer_images/$c_image");
  $insert_customer="insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
  $run_customer=mysqli_query($con,$insert_customer);
  $sel_cart="select * from cart where ip_add='$c_ip'";
  $run_cart=mysqli_query($con,$sel_cart);
  $check_cart=mysqli_num_rows($run_cart);
  if ($check_cart>0) {
    $_SESSION['customer_email']=$c_email;
    echo "<script>alert('you have been registered successfully')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
  }else
  {
    $_SESSION['customer_email']=$c_email;
    echo "<script>alert('you have been registered successfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }



}

?>




















