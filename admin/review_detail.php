<?php
include "config.php";
include "top.php";
$review_id = get_safe_value($con, $_GET['id']);

$select = "SELECT * FROM reviews WHERE id = $review_id LIMIT 1";
$result = mysqli_query($con, $select);

$review = mysqli_fetch_assoc($result);

$product_id = 0;

if ($review) {
  $product_id = $review['product_id'];
} else {
  error_log("No review found for id: $review_id");
}


// get the User_Id from the orders table
$query = "SELECT orders.User_Id
  FROM reviews
  JOIN orders ON reviews.order_id = orders.Id
  WHERE reviews.Id = ?
";

$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "i", $review_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$user_id = 0;

if ($row = mysqli_fetch_assoc($result)) {
  $user_id = $row['User_Id'];
  echo "User ID: " . $user_id;
} else {
  echo "No user found for the given review ID.";
}

?>
<style>
  .star {
    font-size: 1.3em;
    color: gold;
  }
</style>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Review Details</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="table-1">
            <thead>
              <tr>
                <th>Product</th>
                <!-- <th>Qty</th> -->
                <th>Rating</th>
                <th>Price</th>
                <!-- <th>Total Price</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              $select = "SELECT product.*, categories.Categories FROM product JOIN categories ON product.Category_Id = categories.Id WHERE product.Id = '$product_id' ORDER BY product.Id DESC;";
              $res = mysqli_query($con, $select);

              $userInfo=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE Id = '$user_id'"));

              $name=$userInfo['Name'];
              $email=$userInfo['Email'];
              $mobile=$userInfo['Mobile'];
              $address=$userInfo['Address'];
              $city=$userInfo['City'];
              $pincode=$userInfo['Pincode'];
              $comment=$userInfo['Comment'];

              $total_price = 0;
              if ($row = mysqli_fetch_assoc($res)) {
                $total_price = $row['Qty'] * $row['Price'];
              ?>
                <tr class="pb-0">
                  <td> <img src="../image/<?= $row['Image'] ?>" height="50" width="50" alt=""> <?= $row['Name'] ?> </td>
                  <td> 
                    <?php for ($i=0; $i < round($review['rating']); $i++) { ?>
                      <span class="star active">★</span>
                    <?php } ?>
                  </td>
                  <td> <?= $row['Price'] ?> </td>
                  <!-- <td> <?= $total_price ?> </td> -->
                </tr>
              <?php
              } else {
                // Handle case where no product is found
                echo "<tr><td colspan='4'>No product found</td></tr>";
              }
              ?>
              <!-- <tr>
                <td style="text-align: center" ; colspan="3"><b>Total</b></td>
                <td><b><?= $total_price ?></b></td>
              </tr> -->
            </tbody>
          </table>

          <div style="color:black" ; class="card-header">
            <h4>Name</h4>
            <?= $name ?>
          </div>
          <!-- <div style="color:black"; class="card-header">
                        <h4>Email</h4>
                        <?= $email ?>
                      </div>
                      <div style="color:black"; class="card-header">
                        <h4>Mobile</h4>
                        <?= $mobile ?>
                      </div>
                      <div style="color:black"; class="card-header">
                        <h4>Address</h4>
                        <?= $address ?>, <?= $city ?>, <?= $pincode ?>
                      </div> -->
          <div style="color:black" ; class="card-header">
            <h4>Review</h4>
            <?= $review['comment'] ?>
          </div>
          <div class="card-footer">
            <a href="orders_detail.php?id=<?= $review['order_id'] ?>" class="btn btn-icon btn-info text-white"><i class="fas fa-box"></i> Order</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include "footer.php";
  ?>