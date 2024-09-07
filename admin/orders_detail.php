<?php
include "config.php";
include "top.php";
$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update_order_status'])){
    $update_order_status=$_POST['update_order_status'];
    mysqli_query($con,"update orders set order_status='$update_order_status' where Id='$order_id'");
}

?>
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Orders</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                      <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                        $res=mysqli_query($con,"select distinct(orders_detail.Id), orders_detail.*,product.Image,product.Name,orders.Address,orders.City,orders.Pincode from orders_detail,product ,orders where orders_detail.Order_Id='$order_id' and orders_detail.Product_Id=Product.Id GROUP by orders_detail.Id");
                                        $total_price=0;

                                        $userInfo=mysqli_fetch_assoc(mysqli_query($con,"select orders.*,users.Name from orders,users where orders.Id='$order_id' and orders.User_Id=users.Id"));

                                        $name=$userInfo['Name'];
                                        $email=$userInfo['Email'];
                                        $mobile=$userInfo['Mobile'];
                                        $address=$userInfo['Address'];
                                        $city=$userInfo['City'];
                                        $pincode=$userInfo['Pincode'];
                                        $comment=$userInfo['Comment'];
                                        while($row=mysqli_fetch_assoc($res)){
                                        $total_price=$total_price+($row['Qty']*$row['Price'])
                                    ?>
                                    <tr class=" pb-0">
                                       <td> <img src="../image/<?= $row['Image'] ?>" height="50" width="50" alt=""> <?= $row['Name'] ?> </td>
                                       <td> <?= $row['Qty'] ?> </td>
                                       <td> <?= $row['Price'] ?> </td>
                                       <td> <?= $row['Qty']*$row['Price'] ?> </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td style="text-align: center"; colspan="3"><b>Total</b></td>
                                        <td><b><?= $total_price ?></b></td>
                                    </tr>
                                 </tbody>
                      </table>
                      <div style="color:black"; class="card-header">
                        <h4>Name</h4>
                        <?= $name ?>
                      </div>
                      <div style="color:black"; class="card-header">
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
                      </div>
                      <div style="color:black"; class="card-header">
                        <h4>Note</h4>
                        <?= $comment ?>
                      </div>
                      <div style="color:black"; class="card-header">
                        <h4>Order Status</h4>
                        <?php
                        $order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.Name from order_status,orders where orders.Id='$order_id' and orders.order_status=order_status.Id"));
                        ?>
                        <b style="color:red"><?= $order_status_arr['Name'] ?></b>
                      </div>
                      <form action="" method="post">
                        <div class="card-body card-block">
                          <div class="form-group">
                            <select class="form-control" name="update_order_status">
                              <option>Select Status</option>
                        <?php
                        $select = mysqli_query($con,"select * from order_status");
                        while($row = mysqli_fetch_array($select)){
                          if($row['Id']==$category_id){
                            echo "<option selected value=".$row['Id']."> ".$row['Name']." </option>";
                          }
                          else{
                            echo "<option value=".$row['Id']."> ".$row['Name']." </option>";
                          }
                        }
                        ?>
                            </select>
                          </div>
							            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-primary btn-block">
							            <span id="payment-button-amount">Submit</span>
							            </button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

<?php
include "footer.php";
?>