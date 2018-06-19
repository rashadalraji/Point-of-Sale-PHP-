<?php
include 'employee.php';
$obj=new Employee();
$result=$obj->delete_employee_info_by_id($_GET['employee_id']);
$message['message']=$result;
echo json_encode($message);






?>