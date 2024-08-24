<?php
session_start();
$con = mysqli_connect("localhost","root","","plantnest");

// Display error if failed to connect  
if ($con->connect_errno) {  
    printf("Connect failed: %s\n", $con->connect_error);  
    exit();  
}