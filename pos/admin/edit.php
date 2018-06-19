<?php
require_once "../config/db.php";
if(isset($_POST['name'])){	
$name =$_POST['name'];
$category =$_POST['category'];
$supplier =$_POST['supplier'];
$item_number =$_POST['item_number'];
$description =$_POST['description'];
$cost_price =$_POST['cost_price'];
$unit_price =$_POST['unit_price'];
$quantity =$_POST['quantity'];
$reorder_level=$_POST['reorder_level'];
$location =$_POST['location'];
$allow_alt_description =$_POST['allow_alt_description'];
$is_serialized=$_POST['is_serialized'];
$deleted =$_POST['deleted'];
$updatequery="update  ospos_items set
name = '".$name."',
category = '".$category."',
supplier_id = '".$supplier."',
item_number = ".$item_number.",
description = '".$description."',
cost_price = ".$cost_price.",
unit_price = ".$unit_price.",
quantity = ".$quantity.",
reorder_level = ".$reorder_level.",
location='".$location."',
allow_alt_description = ".$allow_alt_description.",
is_serialized = ".$is_serialized.",
deleted = ".$deleted." where item_id= '".$_POST['edit_id']."'";
//echo $updatequery;
//exit;
$updatequeryresult =$conn->query($updatequery);
if($conn->affected_rows>0){
	echo "Data Updated";
    
	}else echo "not updated";
}
?>
