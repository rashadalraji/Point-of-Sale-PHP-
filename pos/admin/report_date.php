<?php
require_once "../config/db.php";

if(isset($_POST['formdata'])){
    $formdata=$_POST['formdata'];
    $todata=$_POST['todata'];

  //$myquery="select  ospos_sales.*,ospos_sales_items.* from ospos_sales,ospos_sales_items where ospos_sales.sale_id=ospos_sales_items.sale_id and ospos_sales.sale_time='".$_POST['formdata']."' BETWEEN '".$_POST['todata']."'";
    $myquery="select ospos_items.name, ospos_sales.*,ospos_sales_items.* from  ospos_items, ospos_sales,ospos_sales_items where sale_time between '".$_POST['formdata']."' and '".$_POST['todata']."'";
    //echo $myquery;
    //exit;
 $result=$conn->query($myquery);
 
      echo '<table id="reporttable" class="table table-bordered table-inverse " align="center" cellspacing="5" cellpadding="5">';
                        echo '<tr>'; 
                    
                    echo '<th>sale date and time</th>';
                   echo '<th>sale_id</th>';
    echo '<th>product name</th>';
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
          echo '<td>'.$row['sale_id'].'</td>';
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
       echo "<tr><th></th><th></th><th></th><th style='color:red';>Total cost price:".$total_cost."</th><th style='color:red';>Total unit price:".$total_price."</th><th style='color:red';>Total quantity:".$total_quantity."</th><th style='color:red';>Total grandtotal:".$total_grand."</th></tr>";
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
