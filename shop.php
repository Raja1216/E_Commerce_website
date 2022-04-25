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
    <a href="index.php"> Home </a>  
    </li>
    <li class="active">
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
    <li>
    <a href="index_about.php"> About Us </a>  
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
<div id="content"><!--content start-->
  <div class="container"><!--container start-->
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li>
          Shope
        </li>
      </ul>
    </div>
    <div class="col-md-3">
      <?php
      include("includes/sidebar.php")
      ?>
    </div>
    <div class="col-md-9"><!--Row start-->
    <?php
      if (!isset($_GET['p_cat'])){
        if (!isset($_GET['cat_id'])){
          echo "<div class='box'>
            <h1>Shop</h1>        
            <p>cfhgfhgygyyuihiuhuymhjmgnygfddfhfngmkuhymkunhsfsxgdbdhggmuhk</p>
          </div>";
        }
      }
      ?>
     <div class="row">
       <?php
       if (!isset($_GET['p_cat'])) {
         if (!isset($_GET['cat_id'])) {
           $per_page=6;
           if (isset($_GET['page'])) {
            $page=$_GET['page'];
           }else{
            $page=1;
           }
           $start_from=($page-1)*$per_page;
           $get_product="select * from product order by 1 DESC LIMIT $start_from, $per_page";
           $run_pro=mysqli_query($con,$get_product);

           while ($row=mysqli_fetch_array($run_pro)) {
             $pro_id=$row['product_id'];
             $pro_title=$row['product_title'];
             $pro_price=$row['product_price'];
             $pro_img1=$row['product_img1'];
               $pro_label_id=$row['product_label_id'];
                $pro_sell=$row['sell_id'];


$get_sell="select * from sell_percent where sell_id='$pro_sell'";
$run_sell=mysqli_query($db,$get_sell);
$row_sell=mysqli_fetch_array($run_sell);
$p_sell_per=$row_sell['sell_per'];


         $new_P_price=$pro_price;


    if ($pro_label_id == 2) {
	$new_p=($p_sell_per/100)*$pro_price;
	$new_P_price=($pro_price - $new_p);
}


           $get_label="select * from product_label where p_label_id='$pro_label_id'";
           $run_label=mysqli_query($con,$get_label);
           $row_label=mysqli_fetch_array($run_label);
          $p_label_title=$row_label['p_label_title'];


             
             echo "
                 <div class='col-md-4 col-sm-6 center-responsive'>
                   <div class='product'>
                     <a href='details.php?pro_id=$pro_id'>
                     <center>
                       <img src='admin_area/product_image/$pro_img1' class='img-responsive' style='height: 300px; width: auto;'>
                       </center>
                     </a>

                      <span class='product-label'>$p_label_title"; ?><?php if($pro_label_id==2){echo "  ".$p_sell_per  ."%";}
               echo "</span>
                     <div class='text'>
                       <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a>
                       <p style='color:#ffba00'; ><i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star-o'></i></p>
                       <p><small><s class='text-secondary'> "?><?php if($p_sell_per>0){echo "<i class='fa fa-rupee'></i>".$pro_price;}
                else
                {
                	echo " <br>";
                }
                 echo "</s></small></p></h3>
                    <p class='price'><b><i class='fa fa-rupee'></i>  $new_P_price</b></p>
                       <p class='button'>
                         <a href='details.php?pro_id=$pro_id' class='btn btn-default'>Vew Details</a>
                         <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a>
                       </p>
                     </div>
                   </div>
                 </div>
                 ";
           }
       ?>

     </div><!--Row stop-->
     <center>
       <ul class="pagination">
        <?php
        $query="select * from product";
        $result=mysqli_query($con,$query);
        $total_record=mysqli_num_rows($result);
        $total_pages=ceil($total_record/$per_page);
        echo "
           <li><a href='shop.php?page=1'>".'First Page'."</a></li>
           ";
           for ($i=1; $i<=$total_pages; $i++) {
           echo " 
           <li><a href='shop.php?page=".$i."'>".$i."</a></li>
           ";
           };

           echo "
             <li><a href='shop.php?page=$total_pages'>".'Last Page'."</a></li> 
            ";
         }
         }
        ?>
       </ul>
     </center>
       <?php
       getPcatPro();
       getCatPro();
       ?>
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





      