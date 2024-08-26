<?php
include "config.php"; // Include your database connection file
session_start(); // Start the session

// Check if 'id' is set in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user_id = intval($_GET['id']); // Convert the ID to an integer for safety

    // Prepare SQL query to delete the user
    $sql = "DELETE FROM users WHERE id = ?";
    
    // Prepare the statement
    if ($stmt = $con->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("i", $user_id);

        // Execute the statement
        if ($stmt->execute()) {
            // Success: delete session variables and redirect
            unset($_SESSION['USER_LOGIN']);
            unset($_SESSION['USER_ID']);
            unset($_SESSION['USER_NAME']);
            
            // Redirect to index page
            header("Location: Index.php");
            exit();
        } else {
            echo "Error deleting user: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $con->error;
    }

    // Close the connection
    $con->close();
} else {
    echo "No user ID provided.";
}
