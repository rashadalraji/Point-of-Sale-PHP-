<?php
require_once "header.php";
?>
 
     <style>
     #add{width:120px;
				font-weight:900; 
		 }
		 h2{
			 margin-left:40%;
			 font-weight:900;}
         .hide{
             display: none;
         }
     </style>

 
  <div class="content-wrapper">
    <div class="container-fluid" id="cont">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        
        <li class="breadcrumb-item active"><input type="button" class="btn btn-dark" id="add" value="Add data"/></li>
        <h2><em>Item Information</em></h2>
      </ol>
     
        <br><br>
        
<?php 
require_once "../../config/db.php";
 $selectquery="select * from items where 1 order by created desc";
 $selectqueryresult= $conn->query($selectquery);
 
 
	?>
 
<div id="table" style="overflow scroll" class="panel-body">    
    
<table class="table table-bordered table-inverse table-responsive" align="center" cellspacing="5" cellpadding="5">

<tr class="text-center">
<th>Name</th>
<th>Details</th>
<th>Category</th>
<th>Cost/Price</th>
<th>Unit_price</th>
<th>Re-order level</th>
<th>receiving quantity</th>
<th>Image</th>
<th>Stock keeping unit</th>
<th>Active</th>
<th>Alt_value</th>
<th colspan="4">Option</th>
</tr>

<?php 
if($selectqueryresult->num_rows){
	while($row=$selectqueryresult->fetch_array(MYSQLI_ASSOC)){
		echo "<tr recordid=".$row['id']."'>";
        echo "<td id='itid' class='hide'>".$row['id']."</td>";
		echo "<td id='tname'>".$row['name']."</td>";
		echo "<td id='tdetails'>".$row['details']."</td>";
		echo "<td id='tcategory'>".$row['category']."</td>";
		echo "<td id='tcost'>".$row['cost_price']."</td>";
		echo "<td id='tunitprice'>".$row['unit_price']."</td>";
		echo "<td id='treorderlevel'>".$row['reorder_level']."</td>";
		echo "<td id='trequantity'>".$row['receiving_quantity']."</td>";
		echo "<td id='timages'><img src='images/".$row['images']." 'width=100px'</td>";
		echo "<td id='tsku'>".$row['sku']."</td>";
		echo "<td id='tactive'>".$row['active']."</td>";
		echo "<td id='taltvalue'>".$row['alt_value']."</td>";
		
		echo "<td><button recordid=".$row['id']."' class='btn btn-primary' id='edit'>Edit</button></td><td id='atpR1'><button    id='btnDelete' class='btn btn-danger' delete-item='".$row['id']."'>Delete</button></td>";
		echo "</tr>";
		
		
		}
	
	}

?>

</table>
</div>
<div id="itemform">
<div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

          

          <!-- Blog Post -->
           <form method="post" enctype="multipart/form-data" id="itemform">
           <h1 class="my-4">Item information </h1>
           
            <input name="itid" id="itid" type="hidden" />
          <div class="form-group col-md-12">
            <label for="name">Name</label>
            <input class="form-control" name="name" id="name" type="text" />
          </div>
         <div class="form-group col-md-12">
            <label for="details">Details</label>
            <input class="form-control" name="details" id="details" type="text" />
          </div>
          
           
         <div class="form-group col-md-12">
            <label for="category">Category</label>
            <input class="form-control" name="category" id="category" type="text" />
          </div>
          
         <div class="form-group col-md-12">
            <label for="cost_price">Cost/Price</label>
            <input class="form-control" name="cost" id="cost" type="text" />
          </div>
          
          <div class="form-group col-md-12">
            <label for="unit_price">Unit_Price</label>
            <input class="form-control" name="unitprice" id="unitprice" type="text" />
          </div>
          <div class="form-group col-md-12">
            <label for="unit_price">Re-order Level</label>
            <input class="form-control" name="reorderlevel" id="reorderlevel" type="text" />
          </div>
          <div class="form-group col-md-12">
            <label for="receiving quantity">Receiving quantity</label>
            <input class="form-control" name="requantity" id="requantity" type="text" />
          </div>
          <div class="form-group col-md-12">
            <label for="images">Images</label>
            <input class="form-control" name="images" id="images" type="file" />
          </div>
          <div class="form-group col-md-12">
            <label for="sku">Stock keeping unit</label>
            <input class="form-control" name="sku" id="sku" type="text" />
          </div>
           
        
         <label for="active">Active:
         <input type="checkbox" name="active[]" id="active" value="1" class="active"/>
       
         </label>
         
     <div class="form-group col-md-12">
            <label for="altvalue">Alt value</label>
            <input class="form-control" name="altvalue" id="altvalue" type="text" />
          </div>
       <br><br>
          <input type="button" value="Add data" name="sub" class="btn btn-primary" id="addbtn"/>
           <input type="button" value="update" name="update" class="btn btn-primary" id="update"/>
           <input type="button" value="close" name="update" class="btn btn-primary" id="formCloseBtn"/>
        </form>
          </div>
           <div class="table-responsive" id="tablecontainer">
            
          </div>
            

</div>
         
        <!-- Blog Post -->
        <div class="row">
        <div class="col-md-12">
        
        
          
 
            
              
          
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
   
    <!-- Bootstrap core JavaScript-->
    
  </div>
            </div>
    </div>
        </div>
      </div>
            </div>
    
 <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <script src="js/pos.js"></script>
   
 
  