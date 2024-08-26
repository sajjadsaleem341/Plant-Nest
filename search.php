<?php
include 'header.php';
$msg = 'Data Not Found';

$str = mysqli_real_escape_string($con,$_GET['str']);
if($str!=''){
    $get_product = get_product($con,'','','',$str);
}
else{
    echo "<script>window.location.href='index.php'</script>";
    
}
$sql = "select * from categories";
$res = mysqli_query($con,$sql);
$cat_arr=array();
while($row=mysqli_fetch_assoc($res)){
    $cat_arr[]=$row;
}
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
                        <p>Searched Items</p>
                    </div>
                    <!-- Search by Terms -->
                    <div class="search_by_terms">
                        <form action="#" method="post" class="form-inline">
                            <select class="custom-select widget-title">
                                <option selected>Sort By Newest</option>
                                <option value="1">Short by A-Z</option>
                                <option value="2">Short by Sales</option>
                                <option value="3">Short by Ratings</option>
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
                            <a href="shop.php" style="color:#6c757d" ><label class="" for="customCheck2">All Plants <span
                            class="text-muted">(20)</span></label></a>
                            </div>
                            <?php
                        foreach($cat_arr as $list){
                        ?>
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <a href="categories.php?id=<?= $list['Id']?>" style="color:#6c757d"><label class="" for="customCheck2"><?= $list['Categories']?> <span
                                class="text-muted">(20)</span></label></a>
                            </div>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- All Products Area -->
            <?php
        if(count($get_product)>0){
        ?>
            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop-products-area">
                    <div class="row">

                        <!-- Single Product Area -->
                        <?php
                    $get_product=get_product($con,'','','',$str);
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
                                    <div class="product-meta d-flex">
                                        <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                        <a href="" class="add-to-cart-btn">Add to cart</a>
                                        <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
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
            <?php
            }
            else{
            ?>
                <div class="col-12" style="text-align:center; font-size:25px;color:red;">
                     <?= $msg ?>
                  </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- ##### Shop Area End ##### -->
<?php
include 'footer.php';
?>