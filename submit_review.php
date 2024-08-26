<?php
require "config.php";
require "functions.php";

// Ensure the user is logged in
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] != '') {
    $rating = get_safe_value($con, $_POST['rating']);
    $comments = get_safe_value($con, $_POST['comments']);
    $order_id = get_safe_value($con, $_POST['order_id']);
    $product_id = get_safe_value($con, $_POST['product_id']);

    // Insert the review into the database
    $query = "INSERT INTO reviews (product_id, order_id, rating, comment) 
              VALUES ('$product_id', '$order_id', '$rating', '$comments')";
    mysqli_query($con, $query);

    echo "ThankYou";
} else {
    echo "error";
}
?>
