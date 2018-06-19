<?php
require_once "../config/db.php";
//$conn=new mysqli("localhost","root","","r33_pointos");
$commit = true;
$conn->autocommit(false);
if(isset($_POST['itemid'])){
                $itemid =$_POST['itemid'];
    //var_dump($itemid);
    //exit;
             
                $productname =$_POST['productname'];
                $serial =$_POST['serial'];
                $quantity =$_POST['quantity'];
                $costprice =$_POST['costprice'];
                $unitprice =$_POST['unitprice'];
                $total =$_POST['total'];
                $supplier=$_POST['supplier'];
                $purchasetime=$_POST['purchasetime'];
                $comment=$_POST['comment'];
                $payment=$_POST['payment'];
                $grandtotal=$_POST['grandtotal'];
    
    $myquery="INSERT INTO `ospos_receivings`(`receiving_time`, `supplier_id`, `employee_id`, `comment`, `receiving_id`, `payment_type`) VALUES ('".$purchasetime."','".$supplier."','1','".$comment."','','".$payment."''".$grandtotal."')";
    //logline($myquery);
    //$conn->query($myquery);
    if(!$conn->query($myquery)){
        $commit = false;
    }
    
    $ab=$conn->insert_id;
    //echo $ab;
    //var_dump($ab);
    
   
    
    if($conn->affected_rows){
       
       echo "<table class='table table-bordered table-inverse' align='center'' cellspacing='5' cellpadding='5' id='tableshow'>";
                            
                            echo "<tr>";
                                echo "<th>Product Name</th>";
                                echo "<th>Quantity</th>";
                                echo "<th>Product Price</th>";
                                echo "<th style='text-align:center'>Grand Total</th>";
echo "</tr>";
        
        echo "<tr>";
        echo "<td>".implode("<hr>",$productname)."</td>";
        echo "<td>".implode("<hr>",$quantity)."</td>";
        echo "<td>".implode("<hr>",$total)."</td>";
        echo "<td>".$grandtotal."</td>";
        
        echo "</tr>";
        echo "</table>";
                       
                          
                            
      
        
       
         //echo "<tr>";
        //echo "<td>".implode("+",$productname)."</td>";
        //echo "Quantity: ".implode("+",$quantity)."<br>";
        //echo "Item Price: ".implode("+",$total)."<br>";
        //echo "Grand ".$grandtotal;
    }//else echo "value not inserted";

    $totalItems = count($itemid);
    //echo $totalItems;
    //exit;
    for($i=0;$i<$totalItems;$i++){
      $mysql="INSERT INTO `ospos_receivings_items` (`receiving_id`,`item_id`,`description`,`serialnumber`,`line`,`quantity_purchased`,`item_cost_price`,`item_unit_price`,`total`) VALUES ('".$ab."','".$itemid[$i]."', '".$productname[$i]."', '".$serial[$i]."','1','".$quantity[$i]."','".$costprice[$i]."','".$unitprice[$i]."','".$total[$i]."')";
        //logline($mysql);
        //echo $mysql;
        //exit;
        //$conn->query($mysql);
        if(!$conn->query($mysql)){
            $commit = false;
        }
        
        if($mysql){
$query="UPDATE ospos_items set `quantity`=`quantity`+'".$quantity[$i]."' WHERE item_id='".$itemid[$i]."'";
            
            $resul=$conn->query($query);

        }
        
    
    }
    //exit;
    if($commit){
        $conn->commit();
    }else $conn->rollBack();
  
    }

?>
        