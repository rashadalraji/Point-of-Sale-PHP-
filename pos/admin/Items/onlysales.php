<?php
require_once ("../../config/db.php");

if(isset($_POST['items'])){
	$result ="";
	
	$selectquery ="select * from items where name like '%".$_POST['items']."%'";
	$selectqueryresult =$conn->query($selectquery);
	$result ='<ul class="list-unstyled">';
	if($selectqueryresult->num_rows>0){
		while($row=$selectqueryresult->fetch_array(MYSQLI_ASSOC)){
			
			$result.="<li id='abc' class='listvalue' data-itemid='".$row['id']."' data-itemprice='".$row['unit_price']."' data-itemsku='".$row['sku']."'>".$row['name']."</li>";
			
			}
		
		}
		else {
			
			$result.="<li> Item not found</li>";
		
		}
		$result.="</ul>";
		echo $result;
	}
?>