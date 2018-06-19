<?php
require_once ("../config/db.php");

if(isset($_POST['items'])){
	$result ="";
	
	$selectquery ="select * from ospos_items where name like '%".$_POST['items']."%'";
	$selectqueryresult =$conn->query($selectquery);
	$result ='<ul class="list-unstyled">';
	if($selectqueryresult->num_rows>0){
		while($row=$selectqueryresult->fetch_array(MYSQLI_ASSOC)){
			
			$result.="<li id='abc' class='listvalue' 
            data-itemid='".$row['item_id']."' 
            data-itemname='".$row['name']."'
            data-itemcategory='".$row['category']."' 
            data-itemnumber='".$row['item_number']."' 
            data-itemdescription='".$row['description']."'
            data-costprice='".$row['cost_price']."'
            data-unitprice='".$row['unit_price']."' 
            data-quantity='".$row['quantity']."'
            data-itemlevel='".$row['reorder_level']."' 
            data-location='".$row['location']."'>".$row['name']."</li>";
			
			}
		
		}
		else {
			
			$result.="<li> Item not found</li>";
		
		}
		$result.="</ul>";
		echo $result;
	}
?>		