<?php
include "header.php";
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
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-list"></i> Order Details</a></li>
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
                <img src="img/bg-img/49.jpg" class="card-img-top" alt="Product Image">
                <div class="card-body text-center">
                    <h5 class="card-title">Product Name 1</h5>
                    <p class="card-text">$250.00</p>
                </div>
            </div>
        </div>

        <!-- Right Section: Review Form -->
        <div class="col-md-8">
            <h4 class="mb-4">Write a Review</h4>
            <div class="submit_a_review_area">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group d-flex align-items-center">
                                <span class="mr-3">Your Ratings:</span>
                                <div class="stars">
                                    <input type="radio" name="star" class="star-1" id="star-1">
                                    <label class="star-1" for="star-1">★</label>
                                    <input type="radio" name="star" class="star-2" id="star-2">
                                    <label class="star-2" for="star-2">★</label>
                                    <input type="radio" name="star" class="star-3" id="star-3">
                                    <label class="star-3" for="star-3">★</label>
                                    <input type="radio" name="star" class="star-4" id="star-4">
                                    <label class="star-4" for="star-4">★</label>
                                    <input type="radio" name="star" class="star-5" id="star-5">
                                    <label class="star-5" for="star-5">★</label>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Nickname</label>
                                <input type="text" class="form-control" id="name" placeholder="Nazrul">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="options">Reason for your rating</label>
                                <select class="form-control" id="options">
                                    <option>Quality</option>
                                    <option>Value</option>
                                    <option>Design</option>
                                    <option>Price</option>
                                    <option>Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="comments">Comments</label>
                                <textarea class="form-control" id="comments" rows="5" data-max-length="150"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn alazea-btn">Submit Your Review</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
