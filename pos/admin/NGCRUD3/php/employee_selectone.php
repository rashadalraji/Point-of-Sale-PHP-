
<?php
include 'employee.php';
$obj=new Employee();
$employee_data=$obj->view_employee_by_employee_id($_GET['employee_id']);
echo json_encode($employee_data);


?>
