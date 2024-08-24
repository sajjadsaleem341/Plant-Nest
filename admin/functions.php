<?php

function pr($arr){
    echo '<pre>';
    print_r($arr);
}

function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
}

function get_safe_value($con,$str){
    if($str!=''){
        $str = trim($str);
        return mysqli_real_escape_string($con,$str);
    }
}

function isAdmin(){
    if(!isset($_SESSION['ADMIN_LOGIN'])){
        echo "<script>window.location.href='login.php'</script>";
    }
    if($_SESSION['ADMIN_ROLE']!='admin'){
        echo "<script>window.location.href='order.php'</script>";
    }
}

function productSoldQtyByProductId($con,$pid){
	$sql="select sum(orders_detail.Qty) as Qty from orders_detail,orders where orders.Id=orders_detail.Order_Id and orders_detail.Product_Id=$pid and orders.Order_Status!=4";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['Qty'];
}

?>