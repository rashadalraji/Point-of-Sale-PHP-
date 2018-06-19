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
                $customar=$_POST['customar'];
                $saletime=$_POST['saletime'];
                $comment=$_POST['comment'];
                $payment=$_POST['payment'];
                $grandtotal=$_POST['grandtotal'];
                $tax=$grandtotal*0.15;
    $finalTotal=$grandtotal+$tax;
    
    $myquery="INSERT INTO `ospos_sales`(`sale_time`, `customer_id`, `employee_id`, `comment`, `sale_id`, `payment_type`) VALUES ('".$saletime."','".$customar."','1','".$comment."','','".$grandtotal."')";
    //logline($myquery);
    //$conn->query($myquery)
    if(!$conn->query($myquery)){
        $commit = false;
    }
    
    $ab=$conn->insert_id;
    //echo $ab;
    //var_dump($ab);
    if($conn->affected_rows){
        //echo "value inserted";
         echo "<table class='table table-bordered table-inverse' align='center'' cellspacing='5' cellpadding='5' id='tableshow'>";
                            
                            echo "<tr>";
                                echo "<th>Product Name</th>";
                                echo "<th>Quantity</th>";
                                echo "<th>Product Price</th>";
                                echo "<th> Taxes (15%) </th>";
                                echo "<th style='text-align:center'>Grand Total</th>";
echo "</tr>";
        
        echo "<tr>";
        echo "<td>".implode("<hr>",$productname)."</td>";
        echo "<td>".implode("<hr>",$quantity)."</td>";
        echo "<td>".implode("<hr>",$total)."</td>";
        echo "<td>".$tax."</td>";
        echo "<td>".$finalTotal."</td>";
        
        echo "</tr>";
        echo "</table>";
        
    }else echo "value not inserted";

    $totalItems = count($itemid);
    //echo $totalItems;
    //exit;
    for($i=0;$i<$totalItems;$i++){
      $mysql="INSERT INTO `ospos_sales_items` (`sale_id`,`item_id`,`description`,`serialnumber`,`line`,`quantity_purchased`,`item_cost_price`,`item_unit_price`,`total`) VALUES ('".$ab."','".$itemid[$i]."', '".$productname[$i]."', '".$serial[$i]."','1','".$quantity[$i]."','".$costprice[$i]."','".$unitprice[$i]."','".$total[$i]."')";
        //logline($mysql);
        //echo $mysql;
        //exit;
       // $conn->query($mysql);
        if(!$conn->query($mysql)){
            $commit = false;
        }
        
        if($mysql){
$query="UPDATE ospos_items set `quantity`=`quantity`-'".$quantity[$i]."' WHERE item_id='".$itemid[$i]."'";
            
            $resul=$conn->query($query);

        }
        
    
    }
    //exit;
    if($commit){
        $conn->commit();
    }else $conn->rollBack();
  
    }
?>
