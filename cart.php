<?php
include 'header.php';
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!=''){
}
else {
    echo "<script>window.location.href='Index.php'</script>";
   die();
}
?>
<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>Cart</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Cart Area Start ##### -->
    <div class="cart-area section-padding-0-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>TOTAL</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
						if(isset($_SESSION['cart'])){
							$cart_total=0;
							foreach($_SESSION['cart'] as $key=>$val){
							$productArr=get_product($con,'','',$key);
							$image=$productArr[0]['Image'];
                            $pname=$productArr[0]['Name'];
							$price=$productArr[0]['Price'];
							$qty=$val['qty'];
                            $cart_total=$cart_total+($price*$qty);
						?>
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="#"><img src="./image/<?= $image ?>" alt="Product"></a>
                                        <h5><?= $pname?></h5>
                                    </td>
                                    <td class="price"><span><?= $qty?></span></td>
                                    <td class="price"><span>$<?= $price?></span></td>
                                    <td class="total_price"><span>$<?= $qty*$price ?></span></td>
                                    <td class="action"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="icon_close"></i></a></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Cart Totals -->
                <div class="col-12 col-lg-6">
                    <div class="cart-totals-area mt-70">
                        <h5 class="title--">Cart Total</h5>
                        <div class="subtotal d-flex justify-content-between">
                            <h5>Subtotal</h5>
                            <h5>$<?= $cart_total ?></h5>
                        </div>
                        <div class="subtotal d-flex justify-content-between">
                            <h5>Shipping</h5>
                            <h5>$<?= round($cart_total*2/100) ?></h5>
                        </div>
                        <div class="total d-flex justify-content-between">
                            <h5>Total</h5>
                            <h5>$<?= round($cart_total * 2 / 100 + $cart_total) ?></h5>
                        </div>
                        <div class="checkout-btn">
                        <?php
                        if(!isset($_SESSION['USER_LOGIN'])){
                            echo '<a href="#myModal" data-toggle="modal" class="btn alazea-btn w-100">PROCEED TO CHECKOUT</a>';
                        }
                        else{
                            echo '<a href="checkout.php" class="btn alazea-btn w-100">PROCEED TO CHECKOUT</a>';
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ##### Cart Area End ##### -->

<?php
include 'footer.php';
?>