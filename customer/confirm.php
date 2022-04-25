
<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
  echo "<script>window.open('../checkout.php','_self')</script>";
}else{
include("includes/db.php");
include("function/function.php");
if (isset($_GET['order_id'])) {
  $order_id=$_GET['order_id'];

}


$customer_email=$_SESSION['customer_email'];
$get_customer="select * from customers where customer_email='$customer_email'";
$run_cust=mysqli_query($con,$get_customer);
$row_cust=mysqli_fetch_array($run_cust);
$customer_id=$row_cust['customer_id'];
$get_customerorder="select * from customer_order where customer_id='$customer_id'";
$runs_cust=mysqli_query($con,$get_customerorder);
$rows_cust=mysqli_fetch_array($runs_cust);
$invoice_no=$rows_cust['invoice_no'];
$due_amount=$rows_cust['due_amount'];

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
?></a>
<a href="#">Shopping Cart Total Price:IR 100, Total Items 2</a> 
</div>
<div class="col-md-6">
<ul class="menu">
<li>
<a href="../customer_registration.php"> Register</a> 
</li>
<li>
<a href="my_account.php"> My Account</a>  
</li> 
<li>
<a href="../cart.php">Goto Cart</a>  
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
      <img id="log" src="small.jpg" alt="spshoping" class="visible-xs">
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
    <a href="../index.php"> Home </a>  
    </li>
    <li>
    <a href="../shop.php"> Shop </a> 
    </li>
    <li class="active">
    <a href="my_account.php"> My Account </a> 
    </li>
    <li>
    <a href="../cart.php"> Shopping Cart </a> 
    </li>
    <li>
    <a href="../about.php"> About Us </a>  
    </li>
    <li>
    <a href="../services.php"> Services </a> 
    </li>
    <li>
    <a href="../contactus.php"> Contact Us </a>  
    </li>       
    </ul> 
    </div><!--padding nav close-->  
    <a href="cart.php" class="btn btn-primary navbar-btn right">
    <i class="fa fa-shopping-cart"></i>
    <span>4 item in cart</span> 
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
          My Account
        </li>
      </ul>
    </div>
    <div class="col-md-3">
      <?php
      include("includes/sidebar.php")
      ?>
    </div>
     <div class="col-md-9">
       <div class="box">
         <h1 align="center"> Please confirm your payment</h1>
         <form action="confirm.php?order_id=<?php echo $order_id ?>" method="post" enctype="multipart/form-data">
           <div class="form-group">
             <label>invoice Number</label>
             <input type="text" name="invoice_number" class="form-control" value="<?php echo $invoice_no ?>" required="" disabled>
           </div>

           <div class="form-group">
             <label>Ammount</label>
             <input type="text" name="amount" class="form-control"value="<?php echo $due_amount ?>"  required="" disabled>
           </div>

           <div class="form-group">
             <label>Select Payment Mode</label>
            <select class="form-control" name="payment_mode">
              <option>Bank tranfer</option>
              <option>Paypal</option>
              <option>PayuMoney</option>
              <option>Paytm</option>
            </select>
           </div>

            <div class="form-group">
             <label>Transection Number</label>
             <input type="text" name="trfr_number" class="form-control" required="">
           </div>
           <div class="form-group">
             <label>Patment Date</label>
             <input type="date" name="date" class="form-control" required="">
           </div>
           <div class="text-center">
             <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">Confirm Payment</button>
           </div>
         </form>
   <?php
    if (isset($_POST['confirm_payment'])) {
      $update_id=$_GET['order_id'];
      $invoice_number=$_POST['invoice_number'];
      $amount=$_POST['amount'];
      $payment_mode=$_POST['payment_mode'];
      $trfr_number=$_POST['trfr_number'];
      $date=$_POST['date'];
      $complite="complite";
      $insert="INSERT INTO payments ( invoice_id, amount, payment_mode, ref_no, payment_date) VALUES ('$invoice_number', '$amount', '$payment_mode', '$trfr_number', '$date')";
      $run=mysqli_query($con,$insert);

     $update_q="UPDATE `customer_order` SET `order_status`='".$complite."' WHERE `order_id`= $update_id";
        $run=mysqli_query($con,$update_q);
        
    /*$update_pending="UPDATE `pending_order` SET `order_status`='".$complite."' WHERE `order_id`= $update_id";
       $run_pan=mysqli_query($con,$update_pending);*/

       echo "<script>alert('Your order has been recived')</script>";
       echo "<script>window.open('my_account.php?order_id','_self')</script>";
    }
   ?>         
     </div>
     </div>
     </div><!--container stop-->
 
</div><!--content stop-->

<!--footer strat-->
<?php
include("includes/footetr.php");
?>
<!--footer stop-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>