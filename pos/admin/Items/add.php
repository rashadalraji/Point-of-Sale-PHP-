<?php
require_once "../../config/db.php";
if(isset($_POST['action'])){
$filename =rand(10000,99999)."_".$_FILES['images']['name'];
$tmp_name=$_FILES['images']['tmp_name'];
$location ='images/';	
move_uploaded_file($tmp_name,$location.$filename);	
$name =$_POST['name'];
$details =$_POST['details'];
$category =$_POST['category'];
$costprice =$_POST['cost'];
$unitprice =$_POST['unitprice'];
$reorderlevel =$_POST['reorderlevel'];
$rquantity =$_POST['requantity'];
$images =$filename;
$sku =$_POST['sku'];
$active=$_POST['active'];
$altvalue =$_POST['altvalue'];
//$arrtostr =implode($active);

$insertquery ="insert into items values(NULL,'".$name."','".$details."','".$category."','".$costprice."','".$unitprice."','".$reorderlevel."','".$rquantity."','".$images."','".$sku."','".$active."','".$altvalue."','','','','','','','','','','',CURRENT_TIMESTAMP,'')";

$insertqueryresult =$conn->query($insertquery);
if($conn->affected_rows==1){
	echo json_encode(["success"=>true,"message"=>"1"]);
	}
else    
	echo json_encode(["success"=>false,"message"=>"0"]);
	}
?>