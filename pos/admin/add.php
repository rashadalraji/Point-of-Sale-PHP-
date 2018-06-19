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
   $insertquery="INSERT INTO `ospos_items` (`name`, `category`, `supplier_id`, `item_number`, `description`, `cost_price`, `unit_price`, `quantity`, `reorder_level`, `location`, `item_id`, `allow_alt_description`, `is_serialized`, `deleted`) VALUES ('$name', '$category', '$supplier', '$item_number', '$description', '$cost_price', '$unit_price', '$quantity', '$reorder_level', '$location', '', '$allow_alt_description', '$is_serialized', '$deleted')";
//$insertquery ="INSERT INTO `ospos_items` VALUES ('".$name."', '".$category."', '".$supplier."', '".$item_number."', '".$description."', '".$cost_price."', '".$unit_price."', '".$quantity."', '".$reorder_level."', '".$location."',  '".$allow_alt_description."', '".$is_serialized."', '".$deleted."')";
//echo $insertquery;
  //exit;

$insertqueryresult =$conn->query($insertquery);
if($conn->affected_rows){
	echo json_encode(["success"=>true,"message"=>"1"]);
    //echo ("value inserted");
	}
else    
	echo json_encode(["success"=>false,"message"=>"0"]);
    //echo ("value not inserted");
	}
