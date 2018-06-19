<?php
class Employee
{
    private $conn;
    function __construct() {
    session_start();
    $servername = "localhost";
    $dbname = "r33_pointos";
    $username = "root";
    $password = "";
  

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
       }else{
        $this->conn=$conn;  
       }

    }


    
    public function employee_list($page=1,$search_input=''){
       $perpage=10;
       $page=($page-1)*$perpage;
       
       $search='';
       if($search_input!=''){
         $search="WHERE ( employee_name LIKE '%$search_input%' OR email_address like '%$search_input%' OR contact like '%$search_input%' OR gender like '$search_input%' OR country like '%$search_input%',designation like '%$search_input%'  )";  
       }
      
     
       $sql = "SELECT * FROM employee_data $search ORDER BY employee_id desc LIMIT $page,$perpage";
     
       $query=  $this->conn->query($sql);
       $employee=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $employee['employee_data'][]= $row;
       }
       }
       
       
    $count_sql = "SELECT COUNT(*) FROM employee_data $search";
    $query=  $this->conn->query($count_sql);
    $total = mysqli_fetch_row($query);
    $employee['total'][]= $total;
       
       
    return $employee;  
    }
    
    public function create_employee_info($post_data=array()){
         
    
       $employee_name='';
       if(isset($post_data->employee_name)){
       $employee_name= mysqli_real_escape_string($this->conn,trim($post_data->employee_name));
       }
       $email_address='';
       if(isset($post_data->email_address)){
       $email_address= mysqli_real_escape_string($this->conn,trim($post_data->email_address));
       }
       
        $gender='';
       if(isset($post_data->gender)){
       $gender= mysqli_real_escape_string($this->conn,trim($post_data->gender));
       }       
       
       $contact='';
       if(isset($post_data->contact)){
       $contact= mysqli_real_escape_string($this->conn,trim($post_data->contact));
       }
        $country='';
       if(isset($post_data->country)){
       $country= mysqli_real_escape_string($this->conn,trim($post_data->country));
       }
         $designation='';
       if(isset($post_data->designation)){
       $designation= mysqli_real_escape_string($this->conn,trim($post_data->designation));
       }
       
      
     
       $sql="INSERT INTO employee_data (employee_name, email_address, contact,gender,country,designation) VALUES ('$employee_name', '$email_address', '$contact','$country','$gender',' $designation')";
        $fh=fopen("sql.txt","at");
        fwrite($fh,$sql."\n");
        fclose($fh);
        
        $result=  $this->conn->query($sql);
        
        if($result){
          return 'Succefully Created Employee Info';     
        }else{
           return 'An error occurred while inserting data';     
        }
        
    }
    
    public function view_employee_by_employee_id($id){
       if(isset($id)){
       $employee_id= mysqli_real_escape_string($this->conn,trim($id));
      
       $sql="Select * from employee_data where employee_id='$employee_id'";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    
    
    public function update_employee_info($post_data=array()){
       if( isset($post_data->employee_id)){
       $employee_id=mysqli_real_escape_string($this->conn,trim($post_data->employee_id));
           
       $employee_name='';
       if(isset($post_data->employee_name)){
       $employee_name= mysqli_real_escape_string($this->conn,trim($post_data->employee_name));
       }
       $email_address='';
       if(isset($post_data->email_address)){
       $email_address= mysqli_real_escape_string($this->conn,trim($post_data->email_address));
       }
       
        $gender='';
       if(isset($post_data->gender)){
       $gender= mysqli_real_escape_string($this->conn,trim($post_data->gender));
       }
       
       
       $contact='';
       if(isset($post_data->contact)){
       $contact= mysqli_real_escape_string($this->conn,trim($post_data->contact));
       }
        $country='';
       if(isset($post_data->country)){
       $country= mysqli_real_escape_string($this->conn,trim($post_data->country));
       }
        $designation='';
       if(isset($post_data->designation)){
       $designation= mysqli_real_escape_string($this->conn,trim($post_data->designation));
       }
       

       $sql="UPDATE employee_data SET employee_name='$employee_name',email_address='$email_address',contact='$contact',gender='$gender',country='$country',designation='$designation' WHERE employee_id =$employee_id";
     
        $result=  $this->conn->query($sql);
        
         
         unset($post_data->employee_id); 
         if($result){
          return 'Succefully Updated Employee Info';     
        }else{
         return 'An error occurred while inserting data';     
        }
          
           
           
      
       }   
    }
    
    public function delete_employee_info_by_id($id){
        
       if(isset($id)){
       $employee_id= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  employee_data  WHERE employee_id =$employee_id";
        $result=  $this->conn->query($sql);
        
         if($result){
          return 'Successfully Deleted Employee Info';     
        }else{
         return 'An error occurred while inserting data';     
        }
          
        
           
       }
        
    }
    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>