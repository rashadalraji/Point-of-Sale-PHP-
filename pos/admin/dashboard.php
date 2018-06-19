<?php
require_once "header.php";
?>
 
     <title>Document</title>
     <style>
         h2{
             margin-left: 300%;
             font-weight: 900;
             font-family: cursive;
         }
     #sales{
         background-color:deepskyblue;
             color: aliceblue;
        width:30%; 
	    height:200px;
		font-size:36px;
		font-weight:900;
		text-align:center;
		line-height:200px;
		 }
		 
        
         #customer{
             background-color: cadetblue;
             color: aliceblue;
		width:30%; 
	    height:200px;
		font-size:36px;
		font-weight:900;
		text-align:center;
		line-height:200px;
		 }
		 
         #purchase{
              background-color:cornflowerblue;
             color: aliceblue;
		width:30%; 
	    height:200px;
		font-size:36px;
		font-weight:900;
		text-align:center;
		line-height:200px;
         }
		  #supplier{
              background-color:darkblue;
             color: aliceblue;
		width:30%; 
	    height:200px;
		font-size:36px;
		font-weight:900;
		text-align:center;
		line-height:200px;
		 }
          
         #item{
              background-color:dimgray;
             color: aliceblue;
		width:30%; 
	    height:200px;
		font-size:36px;
		font-weight:900;
		text-align:center;
		line-height:200px;
		 }
         #report{
        background-color:darkolivegreen;
        color: aliceblue;
		width:30%; 
	    height:200px;
		font-size:36px;
		font-weight:900;
		text-align:center;
		line-height:200px;
             
         }
         
         #report:hover{
             background-color: black;
             transition: 2s;
             transform:rotateY(200deg);
         }
         .btn btn-primary:hover{
           background-color: black; 
             transition: 2s;
             transform:rotateY(200deg);
         }
          #sales:hover{
             
            background-color: black;
              transition: 2s;
             transform:rotateY(200deg);
         }
         #customer:hover{
             
            background-color: black;
             transition: 2s;
             transform:rotateY(200deg);
         }
         
          #purchase:hover{
             
            background-color: black;
              transition:ease-in-out 2s;
             transform:rotateY(200deg);
         }
         #supplier:hover{
             
            background-color: black;
             transition: 2s;
             transform:rotateY(200deg);
         }
     
          #item:hover{
             
            background-color: black;
              transition: 2s;
             transform:rotateY(200deg);
         }
          
     </style>
 

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <h2><em>Dashboard</em></h2>
        
      </ol>
     
        <br><br>
         <div class="container">
<a type="button" class="btn" href="sales.php" id="sales">Sales</a>
<a type="button" class="btn" href="Customer.php" id="customer">Customer</a>
<a type="button" class="btn" href="purchase.php" id="purchase">Purchase</a>
<br><br>
<a type="button" class="btn" href="supplier.php" id="supplier">Supplier</a>
<a type="button" class="btn" href="item.php" id="item">Item</a>
<!--a type="button" class="btn" href="NGCRUD3/index.html" id="employee">Employee Data</a-->
<a type="button" class="btn" href="report_sales.php" id="report">Report</a>

         
        <!-- Blog Post -->
          
          
             
          
            
              
          
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>

   
 