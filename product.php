<?php
include 'header.php';
$product_id = mysqli_real_escape_string($con,$_GET['id']);

if($product_id>0){
    $get_product = get_product($con,'','',$product_id);
}
else{
    echo "<script>window.location.href='index.php'</script>";
}
// Check if the content is favorited by the user
$is_favorited = false;
if (isset($_SESSION['USER_LOGIN'])) {
    $user_id = $_SESSION['USER_ID'];
    $sql_check_favorite = mysqli_query($con, "SELECT * FROM wishlist WHERE user_id = $user_id AND product_id = $product_id");
    if (mysqli_num_rows($sql_check_favorite) > 0) {
        $is_favorited = true;
    }
}
?>
<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
        style="background-image: url(img/bg-img/24.jpg);">
        <h2>Product Details</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="/shop.php">Shop</a></li>
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
                                <img class="d-block w-100" src="./image/<?= $get_product['0']['Image'] ?>" alt="1">
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
                                    <a class="btn alazea-btn ml-15" href="javascript:void(0)" onclick="manage_cart('<?= $get_product['0']['Id']?>','add'); "><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</a>
                            </form>
                            <!-- Wishlist -->
                            <div class="wishlist-compare d-flex flex-wrap align-items-center">
                                <button style="border:none; color:#70c745" class="wishlist-btn ml-15" id="favorite-button">
                                <i class="fa <?= $is_favorited ? 'fa-heart' : 'fa-heart-o' ?>"></i>
                            </button>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const favoriteButton = document.getElementById('favorite-button');
                                <?php if (isset($_SESSION['USER_LOGIN'])) { ?>
                                    favoriteButton.addEventListener('click', function() {
                                        // Send AJAX request to update favorite status
                                        const xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                // Parse the response to get favorited status
                                                const response = JSON.parse(xhr.responseText);
                                                const isFavorited = response.is_favorited;

                                                // Toggle the heart icon
                                                favoriteButton.querySelector('i').classList.toggle('fa-heart', isFavorited);
                                                favoriteButton.querySelector('i').classList.toggle('fa-heart-o', !isFavorited);
                                            }
                                        };
                                        xhr.open('POST', 'update_favorite.php', true);
                                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                        xhr.send('user_id=<?= $user_id ?>&product_id=<?= $product_id ?>');
                                    });
                                <?php } ?>
                            });
                        </script>

                        <?php
                }
                ?>

                        <div class="products--meta">
                            <p><span>Category:</span> <span><?= $get_product['0']['Categories'] ?></span></p>
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
                        <!-- <li class="nav-item">
                            <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews <span
                                    class="text-muted">(1)</span></a>
                        </li> -->
                    </ul>
                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="description">
                            <div class="description_area">
                                <?php
                                    echo $get_product['0']['Description'];
                                ?>
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

                            <!-- <div class="submit_a_review_area mt-50">
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
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Single Product Details Area End ##### -->


<?php
    $relatedProducts = get_product($con, 4, $get_product['0']['Category_Id']);
?>

<!-- ##### Related Product Area Start ##### -->
<div class="related-products-area <?php if (count($relatedProducts) <= 0) echo 'd-none'; ?>">
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
            <?php foreach($relatedProducts as $product) { ?>
                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-100">
                        <!-- Product Image -->
                        <div class="product-img">
                            <a href="product.php?id=<?= $product['Id'] ?>"><img src="./image/<?= $product['Image'] ?>" alt=""></a>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="product.php?id=<?= $product['Id'] ?>">
                                <p><?= $product['Name'] ?></p>
                            </a>
                            <h6>$<?= $product['Price'] ?></h6>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- ##### Related Product Area End ##### -->
<?php
include 'footer.php';
?>