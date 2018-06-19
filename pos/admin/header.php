<?php
require_once "inc/isAdmin.php";
//session_start();
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
    <!--link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/-->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/bootstrap/css/bootstrap.min2.css" rel="stylesheet" type="text/css"/>
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Page level plugin CSS-->
<!--    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">-->
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet"/>
    
    <style>
        #page-top{
            padding: 0px;
            
        }
    
    
    </style>
	
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="dashboard.php">Admin Panel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
	<?php 
	//if($_SESSION['emplyeeName'] == "admin" ||$_SESSION['emplyeeName'] == "rashad" ||$_SESSION['emplyeeName'] == "sraboni" || $_SESSION['emplyeeName'] == "ripa"){
	require_once "adminpages/adminmenu.php";
	//header("location: http://www.google.com");
	//}
	//else {
	//require_once "usermenu.php";	
	//}	
	?>
</nav>
</body>
</html>