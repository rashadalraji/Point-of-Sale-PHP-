
    <?php
require_once "../config/db.php";
if(isset($_POST['mmonth'])){
    $month=$_POST['mmonth'];
    $year=$_POST['yyear'];
     //$time=date('d M Y H:i:s');
    //$query="select sale_id,payment_type,sale_time,month(sale_time) from ospos_sales where sale_time='".$month."' ";
    $query="select  ospos_items.name, ospos_sales_items.*,ospos_sales.sale_time from ospos_items, ospos_sales_items,ospos_sales where ospos_sales.sale_id= ospos_sales_items.sale_id and MONTH(ospos_sales.sale_time)='$month' and YEAR(ospos_sales.sale_time)='$year'";
    //echo $query;
    //exit;
    $result=$conn->query($query);
    echo '<table id="reporttable" class="table table-bordered table-inverse " align="center" cellspacing="5" cellpadding="5">';
                        echo '<tr id="textrow">'; 
    echo '<th>product name</th>';
                    echo '<th>sale date and time</th>';
                   echo '<th>sale_id</th>';
    echo '<th>item_cost_price</th>';
                    echo '<th>item_unit_price</th>';
                    echo '<th>quantity_purchased</th>';
                    echo '<th> total payment</th>';   
                   echo '</tr>'; 
      $total_cost=0;
    $total_price=0;
    $total_quantity=0;
    $total=0;
}
while($row=$result->fetch_array(MYSQLI_ASSOC)){
    echo '<tr id="textrow">';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['sale_time'].'</td>';
    echo '<td>'.$row['sale_id'].'</td>';
    echo '<td class="total-cost">'.$row['item_cost_price'].'</td>';
        $total_cost+=$row['item_cost_price'];
          echo '<td class="total-price">'.$row['item_unit_price'].'</td>';
        $total_price+=$row['item_unit_price'];
         echo '<td class="total-quantity">'.$row['quantity_purchased'].'</td>';
        $total_quantity+=$row['quantity_purchased'];
    echo '<td>'.$row['total'].'</td>';
     $total+=$row['total'];
    echo '</tr>';
}
echo "<tr><th></th><th></th><th></th><th>Total cost price:".$total_cost."</th><th>Total unit price:".$total_price."</th><th>Total quantity:".$total_quantity."</th><th>Total grandtotal:".$total."</th></tr>";
echo '</table>';

 echo "<input type='button' class='btn btn-danger' value='close' id='close1'>";

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
