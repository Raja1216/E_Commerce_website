<?php
$db=mysqli_connect("localhost","root","","ecom");
//FOR GATTING USER IP START
function getUserIP()
{
  switch (true) {
    case (!empty($_SERVER['HTTP_X_REAL_IP'])):return $_SERVER['HTTP_X_REAL_IP'];
    case (!empty($_SERVER['HTTP_CLIENT_IP'])):return $_SERVER['HTTP_CLIENT_IP'];
    case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):return $_SERVER['HTTP_X_FORWARDED_FOR'];
    default : return $_SERVER['REMOTE_ADDR'];   
  }
}
//FOR GATTING USER IP Stop
function addCart(){
  global $db;
  if (isset($_GET['add_cart'])) {
    $ip_add =getUserIP();
    $p_id=$_GET['add_cart'];
    $product_qty=$_POST['product_qty']; 
    $product_size=$_POST['product_size'];
    $check_product="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
    $run_check=mysqli_query($db,$check_product);
    if (mysqli_num_rows( $run_check)>0) {
       echo "<script>alert('this product is alredy added in cart')</script>";
       echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
       
     } 
     else{
      $query="insert into cart(p_id,ip_add,qty,size) values('$p_id','$ip_add','$product_qty','$product_size')";
      $run_query=mysqli_query($db,$query);
      echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
     }
  }
}


//item count start
function item()
{
  global $db;
  $ip_add=getUserIP();
  $get_items="select * from cart where ip_add='$ip_add'";
  $run_item=mysqli_query($db,$get_items);
  $count=mysqli_num_rows($run_item);
  echo "$count";
}



//item count stop

//total price count start

function totalPrice()
{
  global $db;
  $ip_add=getUserIP();
  $total=0;
  $select_cat="select * from cart where ip_add='$ip_add'";
  $run_cart=mysqli_query($db,$select_cat);
  while ($record=mysqli_fetch_array($run_cart)) {
    $pro_id=$record['p_id'];
    $pro_qty=$record['qty'];
    $get_price="select * from product where product_id='$pro_id'";
    $run_price=mysqli_query($db,$get_price);
    while ($row=mysqli_fetch_array($run_price)) {
     $sub_total=$row['product_price']*$pro_qty;
     $total += $sub_total;
    }
  }
  echo $total;
}

//total price count stop

function getPro(){
	global $db;
	$get_product ="select * from product order by 1 DESC LIMIT 0,6";
	$run_product=mysqli_query($db,$get_product);
	while ($row_product=mysqli_fetch_array($run_product)) {
		$pro_id=$row_product['product_id'];
		$pro_title=$row_product['product_title'];
		$pro_price=$row_product['product_price'];
		$pro_imag1=$row_product['product_img1'];
    $pro_label_id=$row_product['product_label_id'];
        $pro_sell=$row_product['sell_id'];


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
$run_label=mysqli_query($db,$get_label);
$row_label=mysqli_fetch_array($run_label);
$p_label_title=$row_label['p_label_title'];

		echo "<div class='col-md-4 col-sm-6'>
              <div class='product'>
               <a href='details.php?pro_id=$pro_id'>
               <center>
               <img src='admin_area/product_image/$pro_imag1'class='img-responsive' style='height: 300px; width: auto;'>
               </center>
               </a>
               <span class='product-label'>  $p_label_title"; ?><?php if($pro_label_id==2){echo "  ".$p_sell_per  ."%";}
               echo " </span>
               <div class='text'>
                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a>
                <p style='color:#ffba00'; ><i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star-o'></i></p>
                <p><small><s class='text-secondary'> "?><?php if($p_sell_per>0){echo "<i class='fa fa-rupee'></i>".$pro_price;}
                else
                {
                	echo " <br>";
                }
                 echo "</s></small></p></h3>
     
                <p class='price'><i class='fa fa-rupee'></i>  $new_P_price</p>
                <p class='button'><a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                 <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shoppinng-cart'></i>Add to Cart</a> 
                </p> 
               </div>
              </div>  

              
		      </div>";
	}
}
/*product categories*/
function getpCats(){
  global $db;
  $get_p_cats="select * from product_categories";
  $run_p_cats=mysqli_query($db, $get_p_cats);
  while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
    $p_cat_id=$row_p_cats['p_cat_id'];
    $p_cat_title=$row_p_cats['p_cat_title'];
    echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
  }
}


/*categories*/
function getCats(){
  global $db;
  $get_cats="select * from categories";
  $run_cats=mysqli_query($db, $get_cats);
  while ($row_cats=mysqli_fetch_array($run_cats)) {
    $cat_id=$row_cats['cat_id'];
    $cat_title=$row_cats['cat_title'];
    echo "<li><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>";
  }
}


/*Get product categories product*/
function getPcatPro(){
  global $db;
  if (isset($_GET['p_cat'])) {
    $p_cat_id=$_GET['p_cat'];
    $get_p_cats="select * from product_categories where p_cat_id='$p_cat_id'";
    $run_p_cat=mysqli_query($db,$get_p_cats);
    $row_p_cat=mysqli_fetch_array($run_p_cat);
    $p_cat_title=$row_p_cat['p_cat_title'];
    $p_cat_desc=$row_p_cat['p_cat_desc'];



    $get_product="select *from product where p_cat_id='$p_cat_id'";
    $run_product=mysqli_query($db,$get_product);
    $count=mysqli_num_rows($run_product);
    if ($count==0) {
     echo "
         <div class='box'>
           <h1>No product found in this product categori</h1>
         </div>
          ";
    }
    else{
    echo"
        <div class='box'>
          <h1> $p_cat_title</h1>
          <p>$p_cat_desc</p>
        </div>
        ";
  }
  while ($row_products=mysqli_fetch_array($run_product)) {
    $pro_id =$row_products['product_id'];
    $pro_title =$row_products['product_title'];
    $pro_price =$row_products['product_price'];
    $pro_imag1 =$row_products['product_img1'];
     $pro_label_id=$row_products['product_label_id'];
        $pro_sell=$row_products['sell_id'];


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
$run_label=mysqli_query($db,$get_label);
$row_label=mysqli_fetch_array($run_label);
$p_label_title=$row_label['p_label_title'];



    echo "<div class='col-md-4 col-sm-6'>
              <div class='product'>
              <center>
               <a href='details.php?pro_id=$pro_id'>
               <img src='admin_area/product_image/$pro_imag1'class='img-responsive' style='height: 300px; width: auto;'>
               </a>
               </center>
               <span class='product-label' >$p_label_title"; ?><?php if($pro_label_id==2){echo "  ".$p_sell_per  ."%";}
               echo " </span>
               <div class='text'>
                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a>
                <p style='color:#ffba00'; ><i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star-o'></i></p>
                <p><small><s class='text-secondary'> "?><?php if($p_sell_per>0){echo "<i class='fa fa-rupee'></i>".$pro_price;}
                else
                {
                	echo " <br>";
                }
                 echo "</s></small></p></h3>
                <p class='price'><i class='fa fa-rupee'></i>  $new_P_price</p>
                <p class='button'><a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                 <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shoppinng-cart'></i>Add to Cart</a> 
                </p> 
               </div>
              </div>    
              
          </div>";
  }
  }
}
//Get Categories
function getCatPro(){
   global $db;
  if (isset($_GET['cat_id'])) {
   $cat_id=$_GET['cat_id'];
    $get_cat="select * from categories where cat_id='$cat_id'";
    $run_cats=mysqli_query($db,$get_cat);
    $row_cat=mysqli_fetch_array($run_cats);
    $cat_title=$row_cat['cat_title'];
    $cat_desc=$row_cat['cat_desc'];
     $get_product="select *from product where cat_id='$cat_id'";
    $run_product=mysqli_query($db,$get_product);
    $count=mysqli_num_rows($run_product);
    if ($count==0) {
     echo "
         <div class='box'>
           <h1>No product found in this  categorie</h1>
         </div>
          ";
    }
    else{
    echo"
        <div class='box'>
          <h1> $cat_title</h1>
          <p>$cat_desc</p>
        </div>
        ";
  }
 while ($row_products=mysqli_fetch_array($run_product)) {
    $pro_id =$row_products['product_id'];
    $pro_title =$row_products['product_title'];
    $pro_price =$row_products['product_price'];
    $pro_imag1 =$row_products['product_img1'];
      $pro_label_id=$row_products['product_label_id'];
        $pro_sell=$row_products['sell_id'];


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
$run_label=mysqli_query($db,$get_label);
$row_label=mysqli_fetch_array($run_label);
$p_label_title=$row_label['p_label_title'];



    echo "<div class='col-md-4 col-sm-6'>
              <div class='product'>
              <center>
               <a href='details.php?pro_id=$pro_id'>
               <img src='admin_area/product_image/$pro_imag1'class='img-responsive' style='height: 300px; width: auto;'>
               </a>
               </center>
               <span class='product-label' >$p_label_title"; ?><?php if($pro_label_id==2){echo "  ".$p_sell_per  ."%";}
               echo " </span>
               <div class='text'>
                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a>
                <p style='color:#ffba00'; ><i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star-o'></i></p>
                <p><small><s class='text-secondary'> "?><?php if($p_sell_per>0){echo "<i class='fa fa-rupee'></i>".$pro_price;}
                else
                {
                	echo " <br>";
                }
                 echo "</s></small></p></h3>
                <p class='price'><i class='fa fa-rupee'></i>  $new_P_price</p>
                <p class='button'><a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                 <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shoppinng-cart'></i>Add to Cart</a> 
                </p> 
               </div>
              </div>    
              
          </div>";
  }
  }
}

?>























