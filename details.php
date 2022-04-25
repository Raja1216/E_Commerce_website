<?php
session_start();
include("includes/db.php");
include("function/function.php");
?>
<?php
if (isset($_GET['pro_id'])) {
  $pro_id=$_GET['pro_id'];
  $get_product="select * from product where product_id='$pro_id'";
  $run_product=mysqli_query($con,$get_product);
  $row_product=mysqli_fetch_array($run_product);
  $p_cat_id=$row_product['p_cat_id'];
  $p_title=$row_product['product_title'];
  $p_price=$row_product['product_price'];
  $p_desc=$row_product['product_desc'];
  $p_img1=$row_product['product_img1'];
  $p_img2=$row_product['product_img2'];
  $p_img3=$row_product['product_img3'];
  $pro_sell=$row_product['sell_id'];
  $pro_label_id=$row_product['product_label_id'];
  $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
  $run_p_cat=mysqli_query($con,$get_p_cat);
  $row_p_cat=mysqli_fetch_array($run_p_cat);
  $p_cat_id=$row_p_cat['p_cat_id'];
  $p_cat_title=$row_p_cat['p_cat_title'];


  $get_sell="select * from sell_percent where sell_id='$pro_sell'";
$run_sell=mysqli_query($db,$get_sell);
$row_sell=mysqli_fetch_array($run_sell);
$p_sell_per=$row_sell['sell_per'];


         $new_P_price=$p_price;


    if ($pro_label_id == 2) {
  $new_p=($p_sell_per/100)*$p_price;
  $new_P_price=($p_price - $new_p);
}
}
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
    <a href="cart.php"> Shoping Cart </a> 
    </li>
    <li>
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
<div id="content"><!--content start-->
  <div class="container"><!--container start-->
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li>
          Shope
        </li>
        <li>
          <a href="shop.php?p_cat=<?php echo $p_cat_id;?>"><?php echo $p_cat_title ?></a>
        </li>
        <li>
          <?php echo $p_title?>
        </li>
      </ul>
    </div>
    <div class="col-md-3">
      <?php
      include("includes/sidebar.php")
      ?>
    </div>
    <div class="col-md-9">
      <div class="row" id="productmain">
        <div class="col-sm-6"><!--slider start-->
          <div id="mainimage">
            <div id="mycarousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="mycarousel" data-slide-to="0" class="active"></li>
                <li data-target="mycarousel" data-slide-to="1" ></li>
                <li data-target="mycarousel" data-slide-to="2" ></li>
              </ol>
              <div class="carousel-inner" style="height: 400px;"><!--start-->
                <div class="item active">
                  <center>
                    <img src="admin_area/product_image/<?php echo $p_img1?>" class="img-responsive" style="height: 400px; width: auto;">
                  </center>
                </div>

                 <div class="item">
                  <center>
                    <img src="admin_area/product_image/<?php echo $p_img2?>" class="img-responsive" style="height: 400px; width: auto;">
                  </center>
                </div>

                 <div class="item">
                  <center>
                    <img src="admin_area/product_image/<?php echo $p_img3?>" class="img-responsive" style="height: 400px; width: auto;">
                  </center>
                </div>

              </div><!--stop-->
              <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>

               <a href="#mycarousel" class="right carousel-control" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div><!--slider stop-->
        <div class="col-sm-6">
          <div class="box"><!--box start-->
            <h1 class="text-center"><?php echo $p_title?></h1>
            <?php
            addCart();
              ?>
            <form action="details.php?add_cart= <?php echo $pro_id ?>" method="post" class="form-horizontal">
              <div class="form-group">
                <label class="col-md-5 control-label">Product Quantity</label>
                <div class="col-md-7">
                  <select name="product_qty" class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    
                  </select>
                </div>
              </div>

               <div class="form-group">
                 <label class="col-md-5 control-lable">Product Size</label>
                 <div class="col-md-7">
                   <select name="product_size" class="form-control">
                     <option>Select a Size</option>
                     <option>Small</option>
                     <option>Medium</option>
                     <option>Large</option>
                     <option>Extra Large</option>
                   </select>
                 </div>
               </div>
               <p class="price"style="color: #3333ff;" ><i class='fa fa-rupee' style="color: #ff0000;"></i> <?php echo $new_P_price?></p>
               <p class="pull-left"><s class='text-secondary' style="color: #ff0000;"><?php if($p_sell_per>0){echo "<i class='fa fa-rupee'></i>".$p_price;}?></s></p><p  class="pull-right" style="color: #000080;"><?php if($pro_label_id==2){echo "  ".$p_sell_per  ."%"."Off";}?></p>
              
               <p class="text-center button">
                 <button class="btn btn-primary" type="submit">
                   <i class="fa fa-shopping-cart">Add to cart</i>
                 </button>
               </p>
               
            </form>
          </div><!--box stop-->
          <div class="col-xs-4">
           <a href="#" class="thumb">
            <img src="admin_area/product_image/<?php echo $p_img1?>" class="img-responsive" style="height: 250px;width: 80%;"> 
           </a> 
          </div>

           <div class="col-xs-4">
           <a href="#" class="thumb">
            <img src="admin_area/product_image/<?php echo $p_img2?>" class="img-responsive" style="height: 250px;width: 80%;"> 
           </a> 
          </div>

           <div class="col-xs-4">
           <a href="#" class="thumb">
            <img src="admin_area/product_image/<?php echo $p_img3?>" class="img-responsive"style="height: 250px;width: 80%;"> 
           </a> 
          </div>
        </div>
      </div><!--row end-->
      <div class="box" id="details">
        <h4>Product Details</h4>
        <p><?php echo $p_desc?></p>
        <h4>Size</h4>
        <ul>
          <li>Small</li>
          <li>Medium</li>
          <li>Large</li>
          <li>Extra Large</li>
        </ul>
      </div>
      <div id="row same-height-row">
        <div class="col-md-3 col-sm-6">
          <div class="box same-height headline">
            <h3 class="text-center">You Also Like These Product</h3>
          </div>
        </div>
        <?php  
         $get_product="select * from product order by 1 LIMIT 0, 3";
         $run_product=mysqli_query($con,$get_product);
         while ($row=mysqli_fetch_array($run_product)) {
           $pro_id=$row['product_id'];
           $product_title=$row['product_title'];
           $product_price=$row['product_price'];
           $product_img1=$row['product_img1'];
           echo "
           <div class='center_responsive col-md-3 col-sm-6'>
           <div class='product same-height'>
           <center>
           <a href='details.php?pro_id=$pro_id'>
            <img src='admin_area/product_image/$product_img1'class='img-responsive' style='height: 280px; width: auto;'>
           </a>
           </center>
           <div class='text'>
           <h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
           <p class='price'style='color: #0066cc'><i class='fa fa-rupee' style='color: #ff0000;'></i> $product_price</p>
           </div>
           </div>
           </div>
                
              ";
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