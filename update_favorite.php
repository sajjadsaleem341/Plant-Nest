<?php
require_once "config.php";
require "functions.php";

$response = array();

if (isset($_SESSION['USER_LOGIN']) && isset($_POST['user_id']) && isset($_POST['product_id'])) {
    $user_id = get_safe_value($con,$_POST['user_id']);
    $product_id = get_safe_value($con,$_POST['product_id']);

    $sql_check = mysqli_query($con, "SELECT * FROM wishlist WHERE user_id = $user_id AND product_id = $product_id");
    if (mysqli_num_rows($sql_check) > 0) {
        // Product is favorited, remove from favorites
        mysqli_query($con, "DELETE FROM wishlist WHERE user_id = $user_id AND product_id = $product_id");
        $response['is_favorited'] = false;
    } else {
        // Product is not favorited, add to favorites
        mysqli_query($con, "INSERT INTO wishlist (user_id, product_id) VALUES ($user_id, $product_id)");
        $response['is_favorited'] = true;
    }
}

echo json_encode($response);
