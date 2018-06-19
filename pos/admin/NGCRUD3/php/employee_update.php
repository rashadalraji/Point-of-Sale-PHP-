<?php 
include 'employee.php';
$obj=new Employee();
$data = json_decode(file_get_contents("php://input"));
$result=$obj->update_employee_info($data);
$message['message']=$result;
echo json_encode($message);
?>