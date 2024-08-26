<?php
include "header.php";
?>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/23.jpg);">
        <h2>Wishlist</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Wishlist Heading Start ##### -->
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="wishlist-heading" style="font-weight: bold; color: #333;">Your Favorite Products</h3>
            <p class="text-muted">Here are the items you've added to your wishlist. Keep an eye on them and add them to your cart when you're ready to purchase!</p>
        </div>
    </div>
</div>
<!-- ##### Wishlist Heading End ##### -->

<!-- ##### Wishlist Table Start ##### -->
<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table wishlist-table">
                    <thead class="" style="background-color: #70c745; color:white;">
                        <tr>
                            <th scope="col" class="text-center align-middle">Product Image</th>
                            <th scope="col" class="text-center align-middle">Product Name</th>
                            <th scope="col" class="text-center align-middle">Price</th>
                            <th scope="col" class="text-center align-middle">Add to Cart</th>
                            <th scope="col" class="text-center align-middle">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle"><img src="img/product1.jpg" alt="Product Image" class="img-fluid rounded" style="width: 100px;"></td>
                            <td class="text-center align-middle">Product 1</td>
                            <td class="text-center align-middle">$100</td>
                            <td class="text-center align-middle">
                                <a href="#" class="text-success" style="font-size: 24px;"><i class="fa fa-shopping-cart"></i></a>
                            </td>
                            <td class="text-center align-middle">
                                <a href="#" class="remove-icon" style="font-size: 24px;"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <!-- Repeat similar rows as needed -->
                        <tr>
                            <td class="text-center align-middle"><img src="img/product2.jpg" alt="Product Image" class="img-fluid rounded" style="width: 100px;"></td>
                            <td class="text-center align-middle">Product 2</td>
                            <td class="text-center align-middle">$150</td>
                            <td class="text-center align-middle">
                                <a href="#" class="text-success" style="font-size: 24px;"><i class="fa fa-shopping-cart"></i></a>
                            </td>
                            <td class="text-center align-middle">
                                <a href="#" class="remove-icon" style="font-size: 24px;"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- ##### Wishlist Table End ##### -->

<style>
    .wishlist-table {
        border: none;
        border-radius: 10px; 
        overflow: hidden; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        background-color: #fff; 
    }

    .wishlist-table thead {
        background-color: #f8f9fa; 
        border-bottom: 2px solid #dee2e6; 
    }

    .wishlist-table tbody tr {
        border-bottom: 1px solid #dee2e6; 
        transition: background-color 0.3s ease; 
    }

    .wishlist-table tbody tr:hover {
        background-color: #f1f1f1; 
    }

    .wishlist-table th,
    .wishlist-table td {
        vertical-align: middle;
        border-top: none;
        border-bottom: none;
    }

    /* Style for the remove icon */
    .remove-icon {
        color: grey; 
        text-decoration: none;
        font-weight: normal; 
        transition: color 0.3s ease; 
    }

    /* Hover effect for the remove icon */
    .remove-icon:hover {
        color: red; 
    }

    /* Make Font Awesome icons less bold by adjusting the font weight */
    .fa-times, .fa-shopping-cart {
        font-weight: normal;
    }
</style>

<?php
include "footer.php";
?>
