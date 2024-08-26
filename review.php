<?php
include "header.php";
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!=''){
}
else {
    echo "<script>window.location.href='index.php'</script>";
   die();
}
$order_id = get_safe_value($con, $_GET['order_id']);
$product_id = get_safe_value($con, $_GET['product_id']);

// Fetch product details using the product_id
$res = mysqli_query($con, "SELECT product.Image, product.Name, product.Price FROM product WHERE Id='$product_id'");
$product = mysqli_fetch_assoc($res);
?>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/28.jpg);">
        <h2>Product Review</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-clipboard-list"></i> Orders</a></li>
                        <li class="breadcrumb-item"><a href="#">Order Details</a>
                        <li class="breadcrumb-item active" aria-current="page">Review</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Review Page Layout Start ##### -->
<div class="container mb-5">
    <div class="row">
        <!-- Left Section: Product Details -->
        <div class="col-md-4">
            <div class="card shadow-lg">
                <img src="./image/<?= $product['Image'] ?>" class="card-img-top" alt="Product Image">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $product['Name'] ?></h5>
                    <p class="card-text">$<?= $product['Price'] ?></p>
                </div>
            </div>
        </div>

<!-- Review Form -->
<div class="col-md-8">
    <h4 class="mb-4">Write a Review</h4>
    <br><br>
    <div class="submit_a_review_area">
        <form>
            <div class="row">
                <div class="col-12" style="margin-bottom: 30px;">
                    <div class="form-group d-flex align-items-center">
                        <span class="mr-3">Your Ratings:</span>
                        <div class="stars">
                            <input type="radio" name="star" class="star-1" id="star-1" value="1">
                            <label class="star-1" for="star-1">★</label>
                            <input type="radio" name="star" class="star-2" id="star-2" value="2">
                            <label class="star-2" for="star-2">★</label>
                            <input type="radio" name="star" class="star-3" id="star-3" value="3">
                            <label class="star-3" for="star-3">★</label>
                            <input type="radio" name="star" class="star-4" id="star-4" value="4">
                            <label class="star-4" for="star-4">★</label>
                            <input type="radio" name="star" class="star-5" id="star-5" value="5">
                            <label class="star-5" for="star-5">★</label>
                            <span></span>
                        </div>
                    </div>
                    <p class="help-block text-danger" id="rating_error"></p>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="comments">Comments</label>
                        <textarea class="form-control" name="comments" id="comments" rows="5" data-max-length="150"></textarea>
                    </div>
                    <p class="help-block text-danger" id="comments_error"></p>
                </div>

                <!-- Hidden Fields to Pass Order ID and Product ID -->
                <input type="hidden" name="order_id" value="<?= $order_id ?>">
                <input type="hidden" name="product_id" value="<?= $product_id ?>">

                <div class="col-12">
                    <button type="button" onclick="submit_review()" class="btn alazea-btn mt-15">Submit Your Review</button>
                </div>
            </div>
        </form>
    </div>
</div>


    </div>
</div>

<script>
    function submit_review() {
    var rating = jQuery('input[name="star"]:checked').val();
    var comments = jQuery("#comments").val();
    var order_id = "<?= $order_id ?>";
    var product_id = "<?= $product_id ?>";
    var is_error = '';

    // Client-side validation
    if (rating === undefined) {
        jQuery('#rating_error').html('Please select a rating');
        is_error = 'yes';
    } else {
        jQuery('#rating_error').html('');
    }

    if (comments === "") {
        jQuery('#comments_error').html('Please enter your comments');
        is_error = 'yes';
    } else {
        jQuery('#comments_error').html('');
    }

    // If no errors, submit the form via AJAX
    if (is_error === '') {
        jQuery.ajax({
            url: 'submit_review.php',
            type: 'POST',
            data: {
                rating: rating,
                comments: comments,
                order_id: order_id,
                product_id: product_id
            },
            success: function(result) {
                if (result.trim() === 'ThankYou') {
                    jQuery("#review_submitted").click();
                    // Clear the form fields after submission
                    jQuery('input[name="star"]').prop('checked', false);  // Clear the rating
                    jQuery("#comments").val('');  // Clear the comments field
                } else {
                    alert('Error submitting review. Please try again.');
                }
            }
        });
    }
}

</script>
<!-- ##### Review Page Layout End ##### -->

<style>
    * {
        box-sizing: border-box;
    }

    body {
        overflow-x: hidden; 
    }

    .breadcrumb-area {
        margin-bottom: 30px;
    }

    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        width: 100%;
        height: auto;
    }

    .container {
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .stars input {
        display: none; 
    }

    .stars label {
        font-size: 2em;
        color: #ccc; 
        cursor: pointer;
        margin-right: 5px;
    }

    .stars input:checked ~ label {
        color: #ffcc00; 
    }

    .stars label:hover,
    .stars label:hover ~ label {
        color: #ffcc00; 
    }
</style>

<?php
include "footer.php";
?>
