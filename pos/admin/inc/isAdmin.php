<?php
session_start();
if(isset($_SESSION['validuser']) && $_SESSION['validuser'] == false){
    header("location: login.php");
    exit;
}
else if(!$_SESSION['validuser']){
    header("location: login.php");
    exit;
}
else {}
?>