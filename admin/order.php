<?php
include "config.php";
include "top.php";

$select = "select * from users order by Id desc";
$res = mysqli_query($con,$select);

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
                                       <th>Tracking Id</th>
                                       <th>User Id</th>
                                       <th>Order Date</th>
                                       <th>Address</th>
                                       <th>Order Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $res=mysqli_query($con,"select orders.*,order_status.Name as Order_Status_Str from orders,order_status where order_status.Id=orders.order_status order by orders.Date desc");
                                    while($row=mysqli_fetch_assoc($res)){
                                    ?>
                                    <tr class=" pb-0">
                                       <td> <a href="orders_detail.php?id=<?= $row['Id'] ?>"><?= $row['Tracking_Id'] ?></a> </td>
                                       <td> <?= $row['User_Id'] ?> </td>
                                       <td> <?= $row['Date'] ?> </td>
                                       <td style="text-transform: none">
                                       <?= $row['Address'] ?>
                                       <?= $row['City'] ?>
                                       <?= $row['Pincode'] ?>
                                       </td>
                                       <td>
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
                                        ?>
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

<?php
include "footer.php";
?>