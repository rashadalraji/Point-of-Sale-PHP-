<?php
require_once "../config/db.php";

if(isset($_POST['action'])){
	$recordDelete=$_POST['datatodelete'];
    //echo "asd ".$recordDelete; 
    //exit;
	$deleteQuery="delete from ospos_items where item_id='".$recordDelete."' limit 1";
    //echo $deleteQuery;
    //exit();
	$conn->query($deleteQuery);
	if($conn->affected_rows==1){
		echo "yes";
		}
    else{echo "no";}
	}

?>