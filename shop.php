<?php
include 'header.php';
?>
<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
        style="background-image: url(img/bg-img/24.jpg);">
        <h2>Shop</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Shop Area Start ##### -->
<section class="shop-page section-padding-0-100">
    <div class="container">
        <div class="row">
            <!-- Shop Sorting Data -->
            <div class="col-12">
                <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                    <!-- Shop Page Count -->
                    <div class="shop-page-count">
                        <p>Showing 1–9 of 72 results</p>
                    </div>
                    <!-- Search by Terms -->
                    <div class="search_by_terms">
                        <form action="#" method="post" class="form-inline">
                            <select class="custom-select widget-title">
                                <option selected>Short by Popularity</option>
                                <option value="1">Short by Newest</option>
                                <option value="2">Short by Sales</option>
                                <option value="3">Short by Ratings</option>
                            </select>
                            <select class="custom-select widget-title">
                                <option selected>Show: 9</option>
                                <option value="1">12</option>
                                <option value="2">18</option>
                                <option value="3">24</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Sidebar Area -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop-sidebar-area">

                    <!-- Shop Widget -->
                    <div class="shop-widget catagory mb-50">
                        <h4 class="widget-title">Categories</h4>
                        <div class="widget-desc">
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">All plants <span
                                        class="text-muted">(72)</span></label>
                            </div>
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">Outdoor plants <span
                                        class="text-muted">(20)</span></label>
                            </div>
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                <label class="custom-control-label" for="customCheck3">Indoor plants <span
                                        class="text-muted">(15)</span></label>
                            </div>
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                <label class="custom-control-label" for="customCheck4">Office Plants <span
                                        class="text-muted">(20)</span></label>
                            </div>
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck5">
                                <label class="custom-control-label" for="customCheck5">Potted <span
                                        class="text-muted">(15)</span></label>
                            </div>
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck6">
                                <label class="custom-control-label" for="customCheck6">Others <span
                                        class="text-muted">(2)</span></label>
                            </div>
                        </div>
                    </div>

                    <!-- Shop Widget -->
                    <div class="shop-widget sort-by mb-50">
                        <h4 class="widget-title">Sort by</h4>
                        <div class="widget-desc">
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck7">
                                <label class="custom-control-label" for="customCheck7">New arrivals</label>
                            </div>
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck8">
                                <label class="custom-control-label" for="customCheck8">Alphabetically, A-Z</label>
                            </div>
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck9">
                                <label class="custom-control-label" for="customCheck9">Alphabetically, Z-A</label>
                            </div>
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck10">
                                <label class="custom-control-label" for="customCheck10">Price: low to high</label>
                            </div>
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center">
                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                <label class="custom-control-label" for="customCheck11">Price: high to low</label>
                            </div>
                        </div>
                    </div>

                    <!-- Shop Widget -->
                    <div class="shop-widget best-seller mb-50">
                        <h4 class="widget-title">Best Seller</h4>
                        <div class="widget-desc">

                            <!-- Single Best Seller Products -->
                            <div class="single-best-seller-product d-flex align-items-center">
                                <div class="product-thumbnail">
                                    <a href="product.php"><img src="img/bg-img/4.jpg" alt=""></a>
                                </div>
                                <div class="product-info">
                                    <a href="product.php">Cactus Flower</a>
                                    <p>$10.99</p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Best Seller Products -->
                            <div class="single-best-seller-product d-flex align-items-center">
                                <div class="product-thumbnail">
                                    <a href="product.php"><img src="img/bg-img/5.jpg" alt=""></a>
                                </div>
                                <div class="product-info">
                                    <a href="product.php">Tulip Flower</a>
                                    <p>$11.99</p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Best Seller Products -->
                            <div class="single-best-seller-product d-flex align-items-center">
                                <div class="product-thumbnail">
                                    <a href="product.php"><img src="img/bg-img/34.jpg" alt=""></a>
                                </div>
                                <div class="product-info">
                                    <a href="product.php">Recuerdos Plant</a>
                                    <p>$9.99</p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- All Products Area -->
            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop-products-area">
                    <div class="row">

                        <!-- Single Product Area -->
                        <?php
                    $get_product=get_product($con,'','','');
                    foreach($get_product as $list){
                    ?>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="single-product-area mb-50">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <a href="product.php?id=<?= $list['Id']?>"><img src="./image/<?= $list['Image'] ?>"></a>
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
                                    <a href="product.php?id=<?= $list['Id']?>">
                                        <p><?= $list['Name']?></p>
                                    </a>
                                    <h6>$<?= $list['Price']?></h6>
                                </div>
                            </div>
                        </div>

                        <?php
                        }
                    ?>

                        
                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Shop Area End ##### -->
<?php
include 'footer.php';
?>