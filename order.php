<?php
include "header.php";
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!=''){
}
else {
    echo "<script>window.location.href='index.php'</script>";
   die();
}

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
            <p class="text-muted">View the details of your recent orders below. Click on the view icon to see the full order details.</p>
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
                            <th scope="col" class="text-center align-middle">Product</th>
                            <th scope="col" class="text-center align-middle">Tracking Id</th>
                            <th scope="col" class="text-center align-middle">Date</th>
                            <th scope="col" class="text-center align-middle">Total Price</th>
                            <th scope="col" class="text-center align-middle">Status</th>
                            <th scope="col" class="text-center align-middle">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $uid = $_SESSION['USER_ID'];
                        $query = "
                            SELECT 
                                orders.*,
                                order_status.Name AS Order_Status_Str,
                                orders_detail.product_id,
                                orders_detail.qty,
                                product.name AS Product_Name,
                                product.image AS Product_Image,
                                product.Id AS p_id
                            FROM 
                                orders
                            INNER JOIN 
                                order_status ON order_status.Id = orders.order_status
                            INNER JOIN 
                                orders_detail ON orders_detail.order_id = orders.Id
                            INNER JOIN 
                                product ON product.id = orders_detail.product_id
                            WHERE 
                                orders.user_id = '$uid'
                            ORDER BY 
                                orders.Id DESC";
                        $res = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($res)){
                            ?>
                        <tr>
                            <td class="text-center align-middle">
                                <a href="product.php?id=<?= $row['p_id']?>" style="color:#707070; font-size:18px"><img src="./image/<?= $row['Product_Image'] ?>" alt="<?= $row['Product_Name'] ?>" style="width: 50px; height: 50px;">
                                &nbsp;&nbsp;&nbsp;&nbsp;<?= $row['Product_Name'] ?></a>
                            </td>
                            <td class="text-center align-middle">
                                    <?= $row['Tracking_Id'] ?><br>
                                </td>
                            <td class="text-center align-middle"><?= $row['Date'] ?></td>
                            
                            <td class="text-center align-middle">
                            $<?= $row['Total_Price'] ?>
                            </td>
                            <td class="text-center align-middle">
                                <?php
                                          if($row['Order_Status']=='1'){
                                        ?>
                                            <span class='badge badge-warning'> <?= $row['Order_Status_Str'] ?> </sapn>
                                        <?php
                                          }
                                          elseif($row['Order_Status']=='2'){
                                        ?>
                                        <span class='badge badge-info'> <?= $row['Order_Status_Str'] ?> </sapn>
                                        <?php
                                          }elseif($row['Order_Status']=='3'){
                                        ?>
                                          <span class='badge badge-secondary'> <?= $row['Order_Status_Str'] ?> </sapn>
                                        <?php
                                          }elseif($row['Order_Status']=='4'){
                                        ?>
                                          <span class='badge badge-danger'> <?= $row['Order_Status_Str'] ?> </sapn>
                                        <?php
                                          }else{
                                        ?>
                                          <span class='badge badge-success'> <?= $row['Order_Status_Str'] ?> </sapn>
                                        <?php
                                          }
                                        ?></td>
                            <td class="text-center align-middle">
                                <a href="orders_detail.php?id=<?= $row['Id'] ?>" class="details-icon" style="font-size: 24px;"><i class="fa fa-eye"></i></a>
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
