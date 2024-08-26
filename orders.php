<?php
include "header.php";
?>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
        <h2>Orders</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Orders Heading Start ##### -->
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="orders-heading" style="font-weight: bold; color: #333;">Your Orders</h3>
            <p class="text-muted">View the details of your recent orders below. Click on the icon to see the full order details.</p>
        </div>
    </div>
</div>
<!-- ##### Orders Heading End ##### -->

<!-- ##### Orders Table Start ##### -->
<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table orders-table">
                    <thead class="" style="background-color: #70c745; color:white;">
                        <tr>
                            <th scope="col" class="text-center align-middle">Order ID</th>
                            <th scope="col" class="text-center align-middle">Date</th>
                            <th scope="col" class="text-center align-middle">Total Amount</th>
                            <th scope="col" class="text-center align-middle">Status</th>
                            <th scope="col" class="text-center align-middle">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle">#00123</td>
                            <td class="text-center align-middle">2024-08-20</td>
                            <td class="text-center align-middle">$250.00</td>
                            <td class="text-center align-middle"><span class="badge badge-success">Delivered</span></td>
                            <td class="text-center align-middle">
                                <a href="order-details.php?id=00123" class="details-icon" style="font-size: 24px;"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        <!-- Repeat similar rows as needed -->
                        <tr>
                            <td class="text-center align-middle">#00124</td>
                            <td class="text-center align-middle">2024-08-22</td>
                            <td class="text-center align-middle">$150.00</td>
                            <td class="text-center align-middle"><span class="badge badge-warning">Pending</span></td>
                            <td class="text-center align-middle">
                                <a href="order-details.php?id=00124" class="details-icon" style="font-size: 24px;"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
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
    }

    /* Hover effect for the details icon */
    .details-icon:hover {
        color: #70a745; 
    }

    
    .fa-eye {
        font-weight: normal; 
    }
</style>

<?php
include "footer.php";
?>
