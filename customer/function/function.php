<?php
$db=mysqli_connect("localhost","root","","ecom");
function getPro(){
	global $db;
	$get_product ="select * from product order by 1 DESC LIMIT 0,6";
	$run_product=mysqli_query($db,$get_product);
	while ($row_product=mysqli_fetch_array($run_product)) {
		$pro_id=$row_product['product_id'];
		$pro_title=$row_product['product_title'];
		$pro_price=$row_product['product_price'];
		$pro_imag1=$row_product['product_img1'];

		echo "<div class='col-md-4 col-sm-6'>
              <div class='product'>
               <a href='details.php?pro_id=$pro_id'>
               <img src='admin_area/product_image/$pro_imag1'class='img-responsive'>
               </a>
               <div class='text'>
                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                <p class='price'>INR $pro_price</p>
                <p class='button'><a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                 <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shoppinng-cart'></i>Add to Cart</a> 
                </p> 
               </div>
              </div>    
              
		      </div>";
	}
}
?>