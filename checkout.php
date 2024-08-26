<?php
include "header.php";

// $msg='';

if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!=''){
}
else {
    echo "<script>window.location.href='Index.php'</script>";
   die();
}

if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
    // echo $msg;
    echo "<script>window.location.href='shop.php'</script>";
}

$cart_total=0;

foreach($_SESSION['cart'] as $key=>$val){
	$productArr=get_product($con,'','',$key);
	$price=$productArr[0]['Price'];
	$qty=$val['qty'];
    $cart_total=$cart_total+($price*$qty);
}

if(isset($_POST['submit'])){
    $user_id=$_SESSION['USER_ID'];
    $address=get_safe_value($con,$_POST['address']);
    $email=get_safe_value($con,$_POST['email']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $city=get_safe_value($con,$_POST['city']);
    $area=get_safe_value($con,$_POST['area']);
    $pincode=get_safe_value($con,$_POST['pincode']);
    $comment=get_safe_value($con,$_POST['comment']);
    $total_price=$cart_total;
    $order_status='1';
    $date=date('y-m-d h:m:s');
    $tracking_id= "#".rand(1111111,9999999);

    mysqli_query($con,"insert into orders (Tracking_Id,User_Id,Email,Mobile,Address,City,Area,Pincode,Comment,Total_Price,Order_Status,Date) values('$tracking_id','$user_id','$email','$mobile','$address','$city','$area','$pincode','$comment','$total_price','$order_status','$date')");

    $order_id=mysqli_insert_id($con);

    foreach($_SESSION['cart'] as $key=>$val){
        $productArr=get_product($con,'','',$key);
        $price=$productArr[0]['Price'];
        $qty=$val['qty'];

        mysqli_query($con,"insert into orders_detail (Order_Id,Product_Id,Qty,Price) values('$order_id','$key','$qty','$price')");
    }
    unset($_SESSION['cart']);
    echo "<script>window.location.href='thankyou.php'</script>";
}

?>
<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>Checkout</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area mb-100">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-7">
                    <div class="checkout_details_area clearfix">
                        <h5>Billing Details</h5>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address *</label>
                                    <input type="email" class="form-control" id="email_address" name="email" value="" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="phone_number">Phone Number *</label>
                                    <input type="number" class="form-control" id="phone_number" name="mobile" min="0" value="" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="company">Address *</label>
                                    <input type="text" class="form-control" id="address" name="address" value="" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="city">Town/City *</label>
                                    <input type="text" class="form-control" id="city" name="city" value="" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="state">Area *</label>
                                    <input type="text" class="form-control" id="state" name="area" value="" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="postcode">Postcode/Zip</label>
                                    <input type="text" class="form-control" id="postcode" name="pincode" value="" required>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="order-notes">Order Notes</label>
                                    <textarea class="form-control" id="order-notes" name="comment" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="checkout-content">
                        <h5 class="title--">Your Order</h5>
                        <div class="products">
                            <div class="products-data">
                                <h5>Products:</h5>
                                <?php
                            $cart_total=0;
							foreach($_SESSION['cart'] as $key=>$val){
							$productArr=get_product($con,'','',$key);
							$price=$productArr[0]['Price'];
							$qty=$val['qty'];
                            $cart_total=$cart_total+($price*$qty);}
						?>
                            </div>
                        </div>
                        <div class="subtotal d-flex justify-content-between align-items-center">
                            <h5>Subtotal</h5>
                            <h5>$<?= $cart_total ?></h5>
                        </div>
                        <div class="shipping d-flex justify-content-between align-items-center">
                            <h5>Shipping</h5>
                            <h5>$<?= round($cart_total*2/100) ?></h5>
                        </div>
                        <div class="order-total d-flex justify-content-between align-items-center">
                            <h5>Order Total</h5>
                            <h5>$<?= round($cart_total*2/100+$cart_total) ?></h5>
                        </div>
                        <div class="checkout-btn mt-30">
                            <input type="submit" name="submit" class="btn alazea-btn w-100" value="Place Order">
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
<?php
include 'footer.php';
?>