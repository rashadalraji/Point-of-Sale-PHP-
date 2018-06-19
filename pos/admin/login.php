<?php
session_start();
if(!isset($_SESSION['validuser'])){
    $_SESSION['validuser'] = false;
}
else if($_SESSION['validuser']==true){
    //header("location: index.php");
}
else {}
?>

<?php
if(isset($_POST['login'])){
    //echo "<h1>login</h1>"; exit;
    require_once ("../config/db.php");
    $username = htmlentities(strip_tags($_POST['username']),ENT_QUOTES);
    $userpass = sha1($_POST['userpass']);
    //sql query
    $selectquery = "select * from employees where username='$username' and password='$userpass'";
    //echo $selectquery;
    $selectqueryResult =  $conn->query($selectquery);
    //if($selectqueryResult->num_rows == 1)
    while($row=$selectqueryResult->fetch_array(MYSQLI_ASSOC)){
    if($row['username']==$username && $row['password']==$userpass &&$username=='admin'){
        
        //echo "You are valid user";
        $_SESSION['validuser'] = true;
        $_SESSION['user'] = $username;
        $_SESSION['userid'] =$row['id'];
        header("location: dashboard.php");
    }
        else if($row['username']==$username && $row['password']==$userpass && $username!='admin'){
        $_SESSION['validuser'] = true;
        $_SESSION['user'] = $username;
        $_SESSION['userid'] =$row['id'];
            header("location: dashboard2.php");
            
        }
        else {
        $message = "<div class=\"alert alert-success alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
  <strong>Error!!</strong> username or password not valid.</div>";
        echo $message;
    
    
}
    

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <label for="inputName">User Name</label>
            <input class="form-control" name="username" id="inputName" type="text" aria-describedby="nameHelp" placeholder="Enter user name">
          </div>
          <div class="form-group">
            <label for="inputPassword1">Password</label>
            <input class="form-control" name="userpass" id="inputPassword1" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
            <input type="submit" value="Login" name="login"/>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
