<?php
require_once "header.php";
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Document</title>
<style>

ul{
	cursor:pointer;
	
	}
    li#abc:hover{
		padding:4px;
		border-radius:5px;
        width:75%;
        background-color: black;
        color: aliceblue;
        
    } 
     
     
     </style>     
     
 </head>
 <body>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Daily Sales</li>
      </ol>
     
        <br><br>
          <h2>Sales Information</h2>
                  <!-- Blog Entries Column -->
          
<form action="" method="post">
			<div class"form-group">
            <div class="form-row">
              <div class="col-md-9">                
                <input class="form-control" id="sales" name="sales"/>
              </div>  
              
              <div class="col-md-3">               
                <input type="button" class="btn btn-primary" id="additem" name="additem" value="Add Item"/>             
              </div>
              </div>
              <div id="show"></div>
              <div class="row">
                  <div class="col-sm-12">
                      <table id="itemsTable" class="table table-condensed table-responsive">
                          <thead>
                             <tr>
                              <th>sl</th>
                              <th>Product name</th>
                              <th>Product price</th>
                              <th>Product sku</th>
                              <th>Quantity</th>
                              <th>total</th>
                              <th>action</th>
                          </tr>
                          </thead>
                          <tbody id="itemTableItems">
                              
                          </tbody>
                          <tfoot>
                              <tr><th class="text-right" id="itemSummary" colspan="7">Total</th></tr>
                          </tfoot>
                      </table>
                  </div>
              </div>
               
                </div>
              
</form>
         
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
    <script src="js/sales.js"></script>
  </div>   
 </body>
 </html>
  
