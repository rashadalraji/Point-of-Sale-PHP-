<?php
include 'employee.php';
$obj=new Employee();
$employee_list=$obj->employee_list($_GET['page'],$_GET['search_input']);
echo json_encode($employee_list);
?>