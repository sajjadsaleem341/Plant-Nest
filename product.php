<?php
include 'header.php';
$product_id = mysqli_real_escape_string($con,$_GET['id']);

if($product_id>0){
    $get_product = get_product($con,'','',$product_id);
}
else{
    echo "<script>window.location.href='index.php'</script>";
}
?>
<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
        style="background-image: url(img/bg-img/24.jpg);">
        <h2>product details</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">product details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area mb-50">
    <div class="produts-details--content mb-50">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-12 col-md-6 col-lg-5">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="product-img" href="img/bg-img/49.jpg" title="Product Image">
                                        <img class="d-block w-100" src="img/bg-img/49.jpg" alt="1">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="single_product_desc">
                        <h4 class="title"><?= $get_product['0']['Name'] ?></h4>
                        <h4 class="price">$<?= $get_product['0']['Price'] ?></h4>
                        <div class="short_overview">
                            <p><?= $get_product['0']['Short_Description'] ?></p>
                        </div>

                        <?php
                $productSoldQtyByProductId=productSoldQtyByProductId($con,$get_product['0']['Id']);
                $cart_show='yes';
                if($get_product['0']['Qty']>$productSoldQtyByProductId){
                    $stock='In Stock';
                }else{
                    $stock='Not in Stock';
                    $cart_show='';
                }
                ?>

                        <div class="products--meta">
                            <p>
                                <span>Availability:</span>
                                <?php
                if($cart_show!=''){
                ?>
                                <span class="mb-4"><?= $stock ?></span>
                                <?php
                }else{
                ?>
                                <span style="color:red;" class="mb-4"><?= $stock ?></span>
                                <?php
                }
                ?>
                            </p>
                        </div>

                        <?php
                if($cart_show!=''){
                ?>

                        <div class="cart--area d-flex flex-wrap align-items-center">
                            <!-- Add to Cart Form -->
                            <form class="cart clearfix d-flex align-items-center" method="post">
                                <div class="quantity">
                                    <span class="qty-minus"
                                        onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) && qty > 1 ) effect.value--;return false;"><i
                                            class="fa fa-minus" aria-hidden="true"></i></span>
                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="12"
                                        name="quantity" value="1">
                                    <span class="qty-plus"
                                        onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                            class="fa fa-plus" aria-hidden="true"></i></span>
                                </div>
                                    <a class="btn alazea-btn ml-15" href="javascript:void(0)" onclick="manage_cart('<?= $get_product['0']['Id']?>','add')"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</a>
                            </form>
                            <!-- Wishlist & Compare -->
                            <div class="wishlist-compare d-flex flex-wrap align-items-center">
                                <a href="#" class="wishlist-btn ml-15"><i class="icon_heart_alt"></i></a>
                            </div>
                        </div>

                        <?php
                }
                ?>

                        <div class="products--meta">
                            <p><span>Category:</span> <span><?= $get_product['0']['Categories'] ?></span></p>
                            <p><span>Tags:</span> <span>plants, green, cactus </span></p>
                            <p>
                                <span>Share on:</span>
                                <span>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </span>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_details_tab clearfix">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                        <li class="nav-item">
                            <a href="#description" class="nav-link active" data-toggle="tab" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Additional
                                Information</a>
                        </li>
                        <li class="nav-item">
                            <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews <span
                                    class="text-muted">(1)</span></a>
                        </li>
                    </ul>
                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="description">
                            <div class="description_area">
                                <p>Sed a facilisis orci. Curabitur magna urna, varius placerat placerat sodales, pretium
                                    vitae orci. Aliquam erat volutpat. Cras sit amet suscipit magna. Quisque turpis
                                    odio, facilisis vel eleifend eu, dignissim ac odio.</p>
                                <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. In scelerisque augue at
                                    the moment mattis. Proin vitae arcu sit amet justo sollicitudin tincidunt sit amet
                                    ut velit.Proin placerat vel augue eget euismod. Phasellus cursus orci eu tellus
                                    vestibulum, vestibulum urna accumsan. Vestibulum ut ullamcorper sapien. Pellentesque
                                    molestie, est ac vestibulum eleifend, lorem ipsum mollis ipsum.</p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="addi-info">
                            <div class="additional_info_area">
                                <p>What should I do if I receive a damaged parcel?
                                    <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                                        impedit similique qui, itaque delectus labore.</span></p>
                                <p>I have received my order but the wrong item was delivered to me.
                                    <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis quam
                                        voluptatum beatae harum tempore, ab?</span></p>
                                <p>Product Receipt and Acceptance Confirmation Process
                                    <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum
                                        ducimus, temporibus soluta impedit minus rerum?</span></p>
                                <p>How do I cancel my order?
                                    <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum eius
                                        eum, minima!</span></p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="reviews">
                            <div class="reviews_area">
                                <ul>
                                    <li>
                                        <div class="single_user_review mb-15">
                                            <div class="review-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <span>for Quality</span>
                                            </div>
                                            <div class="review-details">
                                                <p>by <a href="#">Colorlib</a> on <span>12 Sep 2018</span></p>
                                            </div>
                                        </div>
                                        <div class="single_user_review mb-15">
                                            <div class="review-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <span>for Design</span>
                                            </div>
                                            <div class="review-details">
                                                <p>by <a href="#">Colorlib</a> on <span>12 Sep 2018</span></p>
                                            </div>
                                        </div>
                                        <div class="single_user_review">
                                            <div class="review-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <span>for Value</span>
                                            </div>
                                            <div class="review-details">
                                                <p>by <a href="#">Colorlib</a> on <span>12 Sep 2018</span></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="submit_a_review_area mt-50">
                                <h4>Submit A Review</h4>
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group d-flex align-items-center">
                                                <span class="mr-15">Your Ratings:</span>
                                                <div class="stars">
                                                    <input type="radio" name="star" class="star-1" id="star-1">
                                                    <label class="star-1" for="star-1">1</label>
                                                    <input type="radio" name="star" class="star-2" id="star-2">
                                                    <label class="star-2" for="star-2">2</label>
                                                    <input type="radio" name="star" class="star-3" id="star-3">
                                                    <label class="star-3" for="star-3">3</label>
                                                    <input type="radio" name="star" class="star-4" id="star-4">
                                                    <label class="star-4" for="star-4">4</label>
                                                    <input type="radio" name="star" class="star-5" id="star-5">
                                                    <label class="star-5" for="star-5">5</label>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nickname</label>
                                                <input type="email" class="form-control" id="name" placeholder="Nazrul">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="options">Reason for your rating</label>
                                                <select class="form-control" id="options">
                                                    <option>Quality</option>
                                                    <option>Value</option>
                                                    <option>Design</option>
                                                    <option>Price</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="comments">Comments</label>
                                                <textarea class="form-control" id="comments" rows="5"
                                                    data-max-length="150"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn alazea-btn">Submit Your Review</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Single Product Details Area End ##### -->

<!-- ##### Related Product Area Start ##### -->
<div class="related-products-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-product-area mb-100">
                    <!-- Product Image -->
                    <div class="product-img">
                        <a href="product.php"><img src="img/bg-img/40.png" alt=""></a>
                        <!-- Product Tag -->
                        <div class="product-tag">
                            <a href="#">Hot</a>
                        </div>
                        <div class="product-meta d-flex justify-content-center">
                            <a href="cart.php" class="add-to-cart-btn">Add to cart</a>
                            <!-- <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a> -->
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="product-info mt-15 text-center">
                        <a href="product.php">
                            <p>Cactus Flower</p>
                        </a>
                        <h6>$10.99</h6>
                    </div>
                </div>
            </div>

            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-product-area mb-100">
                    <!-- Product Image -->
                    <div class="product-img">
                        <a href="product.php"><img src="img/bg-img/41.png" alt=""></a>
                        <div class="product-meta d-flex">
                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                            <a href="cart.php" class="add-to-cart-btn">Add to cart</a>
                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="product-info mt-15 text-center">
                        <a href="product.php">
                            <p>Cactus Flower</p>
                        </a>
                        <h6>$10.99</h6>
                    </div>
                </div>
            </div>

            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-product-area mb-100">
                    <!-- Product Image -->
                    <div class="product-img">
                        <a href="product.php"><img src="img/bg-img/42.png" alt=""></a>
                        <div class="product-meta d-flex">
                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                            <a href="cart.php" class="add-to-cart-btn">Add to cart</a>
                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="product-info mt-15 text-center">
                        <a href="product.php">
                            <p>Cactus Flower</p>
                        </a>
                        <h6>$10.99</h6>
                    </div>
                </div>
            </div>

            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-product-area mb-100">
                    <!-- Product Image -->
                    <div class="product-img">
                        <a href="product.php"><img src="img/bg-img/43.png" alt=""></a>
                        <!-- Product Tag -->
                        <div class="product-tag sale-tag">
                            <a href="#">Hot</a>
                        </div>
                        <div class="product-meta d-flex">
                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                            <a href="cart.php" class="add-to-cart-btn">Add to cart</a>
                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="product-info mt-15 text-center">
                        <a href="product.php">
                            <p>Cactus Flower</p>
                        </a>
                        <h6>$10.99</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ##### Related Product Area End ##### -->
<?php
include 'footer.php';
?>