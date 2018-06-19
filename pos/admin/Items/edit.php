<?php
require_once "../../config/db.php";
if(isset($_FILES['images'])){
$tmp_name=$_FILES['images']['tmp_name'];
if(is_uploaded_file($tmp_name)){
$filename =rand(10000,99999)."_".$_FILES['images']['name'];
$location ='images/';	

move_uploaded_file($tmp_name,$location.$filename);	
}
}
else{
    $filename = "";
}
$name =$_POST['name'];
$details =$_POST['details'];
$category =$_POST['category'];
$costprice =$_POST['cost'];
$unitprice =$_POST['unitprice'];
$reorderlevel =$_POST['reorderlevel'];
$rquantity =$_POST['requantity'];
$images =$filename;
$sku =$_POST['sku'];
$active =$_POST['active'];
//$active=$_POST['active'];
$altvalue =$_POST['altvalue'];
//$arrtostr =implode(",",$active);
$updatequery="update items set
name = '".$name."',
details = '".$details."',
category = '".$category."',
cost_price = '".$costprice."',
unit_price = '".$unitprice."',
reorder_level = '".$reorderlevel."',
receiving_quantity = '".$rquantity."',
images = '".$images."',
sku = '".$sku."',
active='".$active."',
alt_value = '".$altvalue."'
where id='".$_POST['id']."' limit 1";
//echo $updatequery;
//exit;


$updatequeryresult =$conn->query($updatequery);
if($conn->affected_rows==1){
	echo "Data Updated";
    
	}else echo "not updated";
	

?>