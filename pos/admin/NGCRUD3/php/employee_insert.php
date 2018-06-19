<?php 
include 'employee.php';
$obj=new Employee();
$data = json_decode(file_get_contents("php://input"));
//var_dump($data);
//exit;
$result=$obj->create_employee_info($data);
$message['message']=$result;
echo json_encode($message);  
?>