<?php
function get_safe_value($con,$str){
    if($str!=''){
        $str = trim($str);
        return mysqli_real_escape_string($con,$str);
    }
}

function get_product($con,$limit='',$cat_id='',$product_id='',$search_str='', bool $getQuery=false){
    $sql = "select product.*,categories.Categories from product,categories where product.Status=1";
    if($cat_id !== "") {
        $sql.= " and Category_Id=$cat_id ";
    }
    if($product_id !== "") {
        $sql.= " and product.Id=$product_id";
    }
    
    $sql.= " and product.Category_Id=categories.Id ";

    if($search_str !== "") {
        $sql.= " and (product.Name like '%$search_str%' or product.Description like '%$search_str%' or categories.Categories like '%$search_str%')";
    }

    $sql.= " order by product.Id desc ";

    if($limit !== '') {
		$sql.=" limit $limit";
	}

    if ($getQuery) {
        return $sql;
    }

    $res=mysqli_query($con,$sql);
    $data=array();
    while($row=mysqli_fetch_assoc($res)){
        $data[]=$row;
    }
    return $data;
}

function get_category($con, $limit='', $cat_id='', $search_str='', bool $getQuery=false) {
    $sql = "SELECT * FROM categories WHERE Status=1";  // where 1=1 added to add more WHERE querie below

    if (!empty($cat_id)) {
        $sql .= " AND id = '".mysqli_real_escape_string($con, $cat_id)."'";
    }

    if (!empty($search_str)) {
        $search_str = mysqli_real_escape_string($con, $search_str);
        $sql .= " AND (name LIKE '%$search_str%' OR Categories LIKE '%$search_str%')";
    }

    if (!empty($limit)) {
        $sql .= " LIMIT $limit";
    }

    if ($getQuery) {
        return $sql;
    }

    $res = mysqli_query($con, $sql);

    $categories = [];
    while ($row=mysqli_fetch_assoc($res)) {
        $categories[] = $row;
    }

    return $categories;
}

function productSoldQtyByProductId($con,$pid){
	$sql="select sum(orders_detail.Qty) as Qty from orders_detail,orders where orders.Id=orders_detail.Order_Id and orders_detail.Product_Id=$pid and orders.Order_Status!=4";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['Qty'];
}

function productQty($con,$pid){
	$sql="select Qty from product where Id='$pid'";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['Qty'];
}
