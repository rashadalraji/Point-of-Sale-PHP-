<?php
require_once "../config/db.php";
if(isset($_POST['action']) && $_POST['action']=="category"){    
$myquerysir="select ospos_items.name,ospos_sales_items.*,ospos_sales.sale_time from ospos_items,ospos_sales_items,ospos_sales where ospos_sales_items.item_id=ospos_items.item_id and ospos_sales.sale_id=ospos_sales_items.sale_id and ospos_items.category='".$_POST['category']."'";
 $result=$conn->query($myquerysir);
 // echo "hi";
 //   exit;
      echo '<table id="reporttable" class="table table-bordered table-inverse " align="center" cellspacing="5" cellpadding="5">';
                        echo '<tr id="textrow">'; 
                    
                    echo '<th>sale date and time</th>';
                    echo '<th>name</th>';
                    echo '<th>item_cost_price</th>';
                    echo '<th>item_unit_price</th>';
                    echo '<th>quantity_purchased</th>';
                    echo '<th>total</th>';
                   
                   echo '</tr>';
           $total_cost=0;
    $total_price=0;
    $total_quantity=0;
    $total_grand=0;
      while($row=$result->fetch_array(MYSQLI_ASSOC)){  
      
     echo '<tr class="report" id="textrow">';
        echo '<td>'.$row['sale_time'].'</td>';
        echo '<td>'.$row['name'].'</td>';
          echo '<td class="total-cost">'.$row['item_cost_price'].'</td>';
        $total_cost+=$row['item_cost_price'];
          echo '<td class="total-price">'.$row['item_unit_price'].'</td>';
        $total_price+=$row['item_unit_price'];
         echo '<td class="total-quantity">'.$row['quantity_purchased'].'</td>';
        $total_quantity+=$row['quantity_purchased'];
          echo '<td class="grand-total">'.$row['total'].'</td>';
        $total_grand+=$row['total'];
        echo '</tr>';
        
      
      }
       echo "<tr><th></th><th></th><th>Total cost price:".$total_cost."</th><th>Total unit price:".$total_price."</th><th>Total quantity:".$total_quantity."</th><th>Total grandtotal:".$total_grand."</th></tr>";
     echo '</table>';
         echo "<input type='button' class='btn btn-danger' value='close' id='close'>";
        
        
 

} 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<script src="js/pagination.js"></script>
</head>

<body>
    <div class="paginationList">
   <ul class="pagination" id="pagination">
    <li><a href="javascript:void(0)" id="prevbtn">Previous</a></li>
  </ul>
</div>
    
    </body>
</html>


