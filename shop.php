<?php
include 'header.php';
// Get the selected sorting option
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : '';

// Define the sorting query
$sort_query = '';
if ($sort_by == 'name_asc') {
    $sort_query = "ORDER BY Name ASC";
} elseif ($sort_by == 'price_asc') {
    $sort_query = "ORDER BY Price ASC";
} elseif ($sort_by == 'price_desc') {
    $sort_query = "ORDER BY Price DESC";
} elseif ($sort_by == 'newest') {
    $sort_query = "ORDER BY Id DESC";
}

// Fetch categories
$sql = "SELECT * FROM categories";
$res = mysqli_query($con, $sql);
$cat_arr = array();
while ($row = mysqli_fetch_assoc($res)) {
    $cat_arr[] = $row;
}

function fetch_products_with_categories($con, $type = '', $limit = '', $cat_id = '', $sort_query = '')
{
    // Fetch product data
    $sql = "SELECT product.*, categories.Categories AS CategoryName 
            FROM product
            JOIN categories ON product.category_id = categories.Id
            WHERE product.status=1";

    if ($cat_id != '') {
        $sql .= " AND product.categories_id=$cat_id";
    }

    // Append the sorting query
    if ($sort_query != '') {
        $sql .= " " . $sort_query;
    }

    if ($limit != '') {
        $sql .= " LIMIT $limit";
    }

    $res = mysqli_query($con, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}
// Fetch products with categories
$products = fetch_products_with_categories($con, '', '', '', $sort_query);

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
                        <p>All Products</p>
                    </div>
                    <!-- Search by Terms -->
                    <div class="search_by_terms">
                        <form action="shop.php" method="get" class="form-inline">
                            <select name="sort_by" class="custom-select widget-title" onchange="this.form.submit()">
                                <option value="">Sort by</option>
                                <option value="name_asc" <?= $sort_by == 'name_asc' ? 'selected' : '' ?>>A-Z</option>
                                <option value="price_asc" <?= $sort_by == 'price_asc' ? 'selected' : '' ?>>Price: Low to High</option>
                                <option value="price_desc" <?= $sort_by == 'price_desc' ? 'selected' : '' ?>>Price: High to Low</option>
                                <option value="newest" <?= $sort_by == 'newest' ? 'selected' : '' ?>>Newest</option>
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
                                <a href="shop.php" style="color:#6c757d"><label class="" for="customCheck2">All Plants</label></a>
                            </div>
                            <?php
                            foreach ($cat_arr as $list) {
                            ?>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <a href="categories.php?id=<?= $list['Id'] ?>" style="color:#6c757d"><label class="" for="customCheck2"><?= $list['Categories'] ?> </label></a>
                                </div>
                            <?php
                            }
                            ?>
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
                        foreach ($products as $list) {
                        ?>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="product.php?id=<?= $list['Id'] ?>"><img src="./image/<?= $list['Image'] ?>"></a>
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
                                        <a href="product.php?id=<?= $list['Id'] ?>">
                                            <p><?= $list['Name'] ?></p>
                                        </a>
                                        <h6>$<?= $list['Price'] ?></h6>
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
