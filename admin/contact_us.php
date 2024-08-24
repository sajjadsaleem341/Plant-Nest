<?php
include "config.php";
include "top.php";

/* Restrict employee to access this page */
isAdmin();


$select = "select * from contact_us order by Id desc";
$res = mysqli_query($con,$select);

?>

<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Contact Us</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                      <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Subject</th>
                                       <th>Message</th>
                                       <th>Date</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <?php
                                 if(mysqli_num_rows($res) > 0){
                                 ?>
                                 <tbody>
                                    <?php
                                    while($row = mysqli_fetch_array($res)){
                                    ?>
                                    <tr class=" pb-0">
                                       <td> <?= $row['Id'] ?> </td>
                                       <td> <?= $row['Name'] ?> </td>
                                       <td style="text-transform: none"> <?= $row['Email'] ?> </td>
                                       <td> <?= $row['Subject'] ?> </td>
                                       <td> <?= $row['Message'] ?> </td>
                                       <td> <?= $row['Date'] ?> </td>
                                       <td>
                                       <a href="contact_delete.php?id=<?= $row['Id'] ?>" class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i></a>
                                       </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                 </tbody>
                                 <?php
                                 }
                                 ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

<?php
include "footer.php";
?>