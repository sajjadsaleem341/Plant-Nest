<?php
require "config.php"; // Include your database connection file

if(isset($_POST['product_id'])){
    $product_id = intval($_POST['product_id']);
    $user_id = $_SESSION['USER_ID'];

    // Delete the item from the wishlist
    $query = "DELETE FROM wishlist WHERE user_id = $user_id AND product_id = $product_id";
    $result = mysqli_query($con, $query);

    if($result){
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
