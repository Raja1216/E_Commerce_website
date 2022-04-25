
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


      <?php
    $i=0;
    $get_product='select * from product';
    $run_product=mysqli_query($con,$get_product);
    while ($row_product=mysqli_fetch_array($run_product)) {
    	$pro_id=$row_product['product_id'];
    	$pro_title=$row_product['product_title'];
    	$pro_img1=$row_product['product_img1'];
    	$pro_price=$row_product['product_price'];
    	$pro_keyword=$row_product['product_keyword'];
    	$pro_date=$row_product['date'];
    	$i++;
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


           $get_label="select * from product_label where p_label_id='$pro_label_id'";
           $run_label=mysqli_query($con,$get_label);
           $row_label=mysqli_fetch_array($run_label);
          $p_label_title=$row_label['p_label_title'];




             
             echo "
                <div class='panel-body>
<div class=table-responsive'>
<table class='table table-bordered table-hover table-striped'>
<thead>
<tr>
<th>Product Id</th>	
<th>Product Title</th>	
<th>Product Image</th>	
<th>Product price</th>		
<th>Product Keyword</th>
<th>Product Date</th>
<th>Product Delete</th>			
<th>Product Edit</th>	
</tr>	
</thead>
<tbody>
<tr>
<td><?php echo $i ?></td>
<td><?php echo $pro_title ?></td>
<td><img src='product_image/<?php echo $pro_img1 ?>' class='img-responsive' width='80' height='90'></td>
<td><?php echo $pro_price ?></td>
<td><?php echo $pro_keyword ?></td>
<td><?php echo $pro_date ?></td>
<td>
<a href='index_admin.php?delete_product=<?php echo $pro_id?>'><i class='fa fa-trash-o'></i>Delete</a>
 </td>
<td>
<a href='index_admin.php?edit_product=<?php echo $pro_id?>'><i class='fa fa-pencil'></i>Edit</a>
</td>	
</tr>
<?php  } ?>	
</tbody>	
</table>	
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