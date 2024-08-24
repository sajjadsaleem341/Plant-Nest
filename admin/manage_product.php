<?php

include "config.php";
include "top.php";

/* Restrict employee to access this page */
isAdmin();

$msg = '';
$category_id = '';
$name = '';
$price = '';
$qty = '';
$image = '';
$short_description = '';
$description = '';
$image_required = 'required';

if(isset($_GET['id']) && $_GET['id'] !=''){
	$image_required = '';
	$_id = get_safe_value($con,$_GET['id']);
	$res = mysqli_query($con,"select * from product where Id=$_id");
 
	$check = mysqli_num_rows($res);
 
	if($check>0){
	   $row = mysqli_fetch_array($res);
	   $category_id = $row['Category_Id'];
	   $name = $row['Name'];
	   $price = $row['Price'];
	   $qty = $row['Qty'];
	   $short_description = $row['Short_Description'];
	   $description = $row['Description'];
	}
	else{
	   header('Location: product.php');
	   die();
	}
 
 }
 
 if(isset($_REQUEST['submit'])){
	 $category_id = get_safe_value($con,$_REQUEST['categories_id']);
	 $name = get_safe_value($con,$_REQUEST['name']);
	 $price = get_safe_value($con,$_REQUEST['price']);
	 $qty = get_safe_value($con,$_REQUEST['qty']);
	 $short_description = get_safe_value($con,$_REQUEST['short_description']);
	 $description = get_safe_value($con,$_REQUEST['description']);
 
	 $res = mysqli_query($con,"select * from product where Category_Id='$category_id' and Name='$name' and Price='$price' and Qty='$qty' and Short_Description='$short_description' and Description='$description' and Image='$image'");
	
	$check = mysqli_num_rows($res);
 
	if($check>0){
		if(isset($_GET['id']) && $_GET['id'] !=''){
		   $getData = mysqli_fetch_assoc($res);
		   if($_id==$getData['Id']){
            
         }
		   else{
			  $msg = "Product Already Exist";
		   }
		}
		else{
		   $msg = "Product Already Exist";
		}
	 }

	 if($_FILES['image']['type']!='' && ($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg' && $_FILES['image']['type']!='image/gif' && $_FILES['image']['type']!='image/bmp')){
		$msg = "Please select only png, jpg or jpeg format";
	 }

	 if($msg==''){
	   if(isset($_GET['id']) && $_GET['id'] !=''){
		if($_FILES["image"]["name"]!=''){
			$image = $_FILES["image"]["name"];
    		$tempname = $_FILES["image"]["tmp_name"];
    		$folder = "../image/" . $image;
			if (move_uploaded_file($tempname, $folder)) {
				echo "";
			} else {
				echo "<h3>  Failed to upload image!</h3>";
			}
			$p_update = "update product set Category_Id='$category_id',Name='$name',Price='$price',Qty='$qty',Short_Description='$short_description',Description='$description',Image='$image' where Id='$_id'";
		}
		else{
			$p_update = "update product set Category_Id='$category_id',Name='$name',Price='$price',Qty='$qty',Short_Description='$short_description',Description='$description' where Id='$_id'";
		}
		  mysqli_query($con,$p_update);
		}
		else{
			$product_id= $category_id.rand(11111,99999);
			$image = $_FILES["image"]["name"];
    		$tempname = $_FILES["image"]["tmp_name"];
    		$folder = "../image/" . $image;
			if (move_uploaded_file($tempname, $folder)) {
				echo "";
			} else {
				echo "<h3>  Failed to upload image!</h3>";
			}
		  mysqli_query($con,"insert into product (Id,Category_Id,Name,Price,Qty,Short_Description,Description,Status,Image) Value ('$product_id','$category_id','$name','$price','$qty','$short_description','$description','1','$image')");
		}
	
		echo "<script>window.location.href='product.php'</script>";
		die();
	}
	 
 }



?>

<div class="row">
              <div class="col-12">
                <div class="card">
                <div class="card-header">
                  <h4>Products</h4><span>Form</span>
               </div>
               <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
                                    <select class="form-control" name="categories_id">

									<option>Select Category</option>

									<?php

									$select = mysqli_query($con,"select * from categories");

									while($row = mysqli_fetch_array($select)){
										if($row['Id']==$category_id){
											echo "<option selected value=".$row['Id']."> ".$row['Categories']." </option>";
										}
										else{
											echo "<option value=".$row['Id']."> ".$row['Categories']." </option>";
										}
									}

									?>

                                    </select>
                                    
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?= $name ?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Price</label>
									<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?= $price ?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Qty</label>
									<input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?= $qty ?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" <?= $image_required ?> >
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Short Description</label>
									<textarea name="short_description" placeholder="Enter product short description" class="form-control"><?= $short_description ?></textarea>
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="description" placeholder="Enter product description" class="form-control"><?= $description ?></textarea>
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-primary btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div style="color: red; margin-top: 10px;">
                           		<?= $msg ?>
                        		</div>
							</div>
						</form>
                </div>
            </div>

<?php
include "footer.php"
?>