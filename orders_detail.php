<?php
include "header.php";
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!=''){
}
else {
    echo "<script>window.location.href='index.php'</script>";
   die();
}
$order_id=get_safe_value($con,$_GET['id']);
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
                        <li class="breadcrumb-item"><a href="#"></i> Orders</a></li>
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
                            <th scope="col" class="text-center align-middle">Product</th>
                            <th scope="col" class="text-center align-middle">Address</th>
                            <th scope="col" class="text-center align-middle">Quantity</th>
                            <th scope="col" class="text-center align-middle">Price</th>
                            <th scope="col" class="text-center align-middle">Total Price</th>
                            <th scope="col" class="text-center align-middle">Review</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $uid=$_SESSION['USER_ID'];
                        $res=mysqli_query($con, "SELECT DISTINCT(orders_detail.Id), 
                               orders_detail.*, 
                               product.Image, 
                               product.Name, 
                               product.Id AS p_id, 
                               orders.Address, 
                               orders.City, 
                               orders.Pincode,
                               orders.id AS o_id
                        FROM orders_detail
                        INNER JOIN product ON product.Id = orders_detail.Product_Id
                        INNER JOIN orders ON orders.Id = orders_detail.Order_Id
                        WHERE orders_detail.Order_Id = '$order_id' 
                          AND orders.User_Id = '$uid'
                    ");
                        $total_price=0;
                        while($row=mysqli_fetch_assoc($res)){
                            $total_price=$total_price+($row['Qty']*$row['Price'])
                    ?>
                        <tr>
                            <td class="text-center align-middle"><a href="product.php?id=<?= $row['p_id']?>" style="color:#707070; font-size:18px"><img src="./image/<?= $row['Image'] ?>" alt="Product 1" style="width: 50px; height: auto;">&nbsp;&nbsp;&nbsp;&nbsp;<?= $row['Name'] ?></a></td>
                            <td class="text-center align-middle">
                                <?= $row['Address'] ?><br>
                                <?= $row['City'] ?><br>
                                <?= $row['Pincode'] ?></td>
                            <td class="text-center align-middle"><?= $row['Qty'] ?></td>
                            <td class="text-center align-middle">$<?= $row['Price'] ?></td>
                            <td class="text-center align-middle"><?= $row['Qty']*$row['Price'] ?></td>
                            <td class="text-center align-middle">
                                <a href="review.php?order_id=<?= $row['o_id'] ?>&product_id=<?= $row['p_id'] ?>" class="details-icon" style="font-size: 16px;">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Write a review
                                </a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
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
