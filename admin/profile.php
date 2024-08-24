<?php
include "config.php";
include "top.php";

$select = "select * from admin_user where admin_user.Id='".$_SESSION['ADMIN_ID']."'";
$res = mysqli_query($con,$select);
$row = mysqli_fetch_array($res);

?>

            <div class="row mt-sm-4">
              <div style="margin:auto;" class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                <div class="card-header">
                    <h4>Profile</h4>
                    <a style="margin-left:auto;" href="manage_profile.php?id=<?= $row['Id'] ?>">Edit Profile</a>
                  </div>
                  <div class="card-body">
                    <div class="author-box-center">
                      <img style="margin-bottom:10px;" alt="image" src="./admin_users_images/<?= $row['Image'] ?>" class="rounded-circle author-box-picture">
                      <div class="author-box-name">
                        <a href="#"><?= $row['Name'] ?></a>
                      </div>
                      <div class="author-box-job"><?= $row['Email'] ?></div>
                      <div class="author-box-job"><?= $row['Mobile'] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php
include "footer.php";
?>