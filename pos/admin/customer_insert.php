<?php
require_once "../config/db.php";
      if(isset($_POST['personid'])){
    $personid=$_POST['personid'];
    $account=$_POST['account'];
    $tax=$_POST['tax'];
    $delete=$_POST['delete'];
          
        $insertquery="INSERT INTO `ospos_customers` (`person_id`, `account_number`, `taxable`, `deleted`) VALUES ('$personid', '$account', '$tax', '$delete')";
          $insertqueryresult=$conn->query($insertquery);
            if($conn->affected_rows){
              echo "value inserted";
          }
          else echo "value not inserted";
      }
?>
