<?php
include "header.php";
?>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
        <h2>Order Details</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-list"></i> Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Order Details Heading Start ##### -->
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="orders-heading" style="font-weight: bold; color: #333;">Order Details</h3>
            <p class="text-muted">Below are the details of your order. Review the items purchased and leave a review for each product.</p>
        </div>
    </div>

    <!-- Order ID and Date Section in One Row -->
    <div class="row mt-4">
        <div class="col-12 text-center">
            <p><strong>Order ID:</strong> #00123 &nbsp;&nbsp;|&nbsp;&nbsp; <strong>Order Date:</strong> August 26, 2024</p> <!-- Replace static content with dynamic PHP variables if needed -->
        </div>
    </div>
</div>
<!-- ##### Order Details Heading End ##### -->

<!-- ##### Orders Table Start ##### -->
<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table orders-table">
                    <thead style="background-color: #70c745; color:white;">
                        <tr>
                            <th scope="col" class="text-center align-middle">Product ID</th>
                            <th scope="col" class="text-center align-middle">Image</th>
                            <th scope="col" class="text-center align-middle">Name</th>
                            <th scope="col" class="text-center align-middle">Quantity</th>
                            <th scope="col" class="text-center align-middle">Price</th>
                            <th scope="col" class="text-center align-middle">Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle">#00123</td>
                            <td class="text-center align-middle"><img src="img/product-1.jpg" alt="Product 1" style="width: 50px; height: auto;"></td>
                            <td class="text-center align-middle">Product Name 1</td>
                            <td class="text-center align-middle">2</td>
                            <td class="text-center align-middle">$250.00</td>
                            <td class="text-center align-middle">
                                <a href="review.php?id=00123" class="details-icon" style="font-size: 16px;">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Write a review
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle">#00124</td>
                            <td class="text-center align-middle"><img src="img/product-2.jpg" alt="Product 2" style="width: 50px; height: auto;"></td>
                            <td class="text-center align-middle">Product Name 2</td>
                            <td class="text-center align-middle">1</td>
                            <td class="text-center align-middle">$150.00</td>
                            <td class="text-center align-middle">
                                <a href="review.php?id=00124" class="details-icon" style="font-size: 16px;">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Write a review
                                </a>
                            </td>
                        </tr>
                        <!-- Repeat similar rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- ##### Orders Table End ##### -->

<style>
    .orders-table {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .orders-table thead {
        background-color: #70c745;
        color: white;
        border-bottom: 2px solid #dee2e6;
    }

    .orders-table tbody tr {
        border-bottom: 1px solid #dee2e6;
        transition: background-color 0.3s ease;
    }

    .orders-table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .orders-table th,
    .orders-table td {
        vertical-align: middle;
        border-top: none;
        border-bottom: none;
    }

    /* Style for the details icon */
    .details-icon {
        color: #70c745;
        text-decoration: none;
        font-weight: normal;
        transition: color 0.3s ease;
        font-size: 15px;
        padding: 0;
        margin: 0;
    }

    /* Hover effect for the details icon */
    .details-icon:hover {
        color: #70a745;
        text-decoration: none;
        font-size: 15px;
    }
</style>

<?php
include "footer.php";
?>
