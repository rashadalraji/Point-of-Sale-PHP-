<?php
require_once "header.php";
?>
<!--link href="vendor/bootstrap/css/bootstrap.min2.css" rel="stylesheet" type="text/css"/-->
     <style>
     #add{
         width:120px;
         margin-top: 9px;
         font-weight:900;
         font-size: 16px;
		 }
         #add:hover{
             
             color:#fff;
         }
		 h2{
			 margin-left:35%;
			 font-weight:900;}
         .hide{
             display: none;
         }
		  .paginationList{
             text-align: right;
         }
         
         /*#pagination{
             list-style-type: none;
             border-right:1px solid #000;
			 
             }  
			  
         .lists{
             display: inline-block;
		 
             border-left: 1px solid #000;
			 border-bottom:1px solid #000;
			 border-top:1px solid #000;
			 border-right:0px;
             margin: 0px;
             padding: 0px 5px 0px 5px;
         }
		*/
     </style>

 
  <div class="content-wrapper">
    <div class="container-fluid" id="cont">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        
        <li class="breadcrumb-item active"><input type="button" class="btn btn-dark" id="add" value="Add Item"/></li>
        <h2><em>Item Information</em></h2>
      </ol>
     
        <br><br>
        
<?php 
require_once "../config/db.php";
 $selectquery="select * from ospos_items";
 $selectqueryresult= $conn->query($selectquery);
 
 
	?>
 <div class="scroll">
<div id="table" style="overflow scroll" class="panel-body">    
    
<table class="table table-bordered table-inverse " align="center" cellspacing="5" cellpadding="5" id="tableshow">

<tr class="text-center" style="text-align:center">
<th>Name</th>
<th>category</th>
<th>supplier_id</th>
<th>item_number</th>
<th>description</th>
<th>cost_price</th>
<th>unit_price</th>
<th>quantity</th>
<th>reorder_level</th>
<th>location</th>
<th>allow_alt_description</th>
<th>is_serialized</th>
<th>deleted</th>
<th colspan="4">Option</th>
</tr>

<?php 
if($selectqueryresult->num_rows>0){
	while($row=$selectqueryresult->fetch_array(MYSQLI_ASSOC)){
        echo "<tr id='textrow'>";
		echo "<td id='itid' class='hide'>".$row['item_id']."</td>";
		echo "<td class='tabledata' id='tname'>".$row['name']."</td>";
		echo "<td class='tabledata' id='tcategory'>".$row['category']."</td>";
		echo "<td class='tabledata' id='tsupplier'>".$row['supplier_id']."</td>";
		echo "<td class='tabledata' id='titem_number'>".$row['item_number']."</td>";
		echo "<td class='tabledata' id='tdescription'>".$row['description']."</td>";
		echo "<td class='tabledata' id='tcost_price'>".$row['cost_price']."</td>";
		echo "<td class='tabledata' id='tunit_price'>".$row['unit_price']."</td>";
		echo "<td class='tabledata' id='tquantity'>".$row['quantity']."</td>";
		echo "<td class='tabledata' id='treorder_level'>".$row['reorder_level']."</td>";
		echo "<td class='tabledata' id='tlocation'>".$row['location']."</td>";
         echo "<td class='tabledata' id='tallow_alt_description'>".$row['allow_alt_description']."</td>";
         echo "<td class='tabledata' id='tis_serialized'>".$row['is_serialized']."</td>";
        echo "<td class='tabledata' id='tdeleted'>".$row['deleted']."</td>";

		
		echo "<td><button recordid='".$row['item_id']."' class='btn btn-success' id='edit'>Edit</button></td><td id='atpR1'><button    id='btnDelete' class='btn btn-danger' delete-item='".$row['item_id']."'>Delete</button></td>";
		echo "</tr>";
		
		}
	
	}

?>

</table>

 
</div>
</div>

<div class="paginationList">
   <ul class="pagination" id="pagination">
    <li><a href="javascript:void(0)" id="prevbtn">Previous</a></li>
  </ul>
</div>


<div id="itemform">
<div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

          

          <!-- Blog Post -->
           <form method="post" enctype="multipart/form-data" id="itemform" name="form">
            <h1 class="my-4">Item information </h1>

            <input name="itid" id="itid" type="hidden" />
            <div class="form-group col-md-12">
                <label for="name">Name</label>
                <input class="form-control" name="name" id="name" type="text" />
            </div>
            <div class="form-group col-md-12">
                <label for="category">category</label>
                <input class="form-control" name="category" id="category" type="text" />
            </div>
            <div class="form-group col-md-12">
                 <?php
        $conn=new mysqli("localhost","root","","r33_pointos");
        $myquery="select * from  ospos_suppliers";
        $result=$conn->query($myquery);
       if ($result->num_rows >= 0)
{
?>
                <div id="salesform">
                    <p>
                        <b>Select a supplier_ID: </b>
                        <select id="supplier">
                        <option value="">select</option>
<?php
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
?>
<option value="<?php echo $row['person_id']; ?>"><?php echo $row['person_id']; ?></option>
<?php
}
?>
</select>
                    </p>

                    <?php
       } 
      
        ?>
            </div>
            <div class="form-group col-md-12">
                <label for="item_number">item_number</label>
                <input class="form-control" name="item_number" id="item_number" type="text" />
            </div>
            <div class="form-group col-md-12">
                <label for="description">description</label>
                <input class="form-control" name="description" id="description" type="text" />
            </div>
            <div class="form-group col-md-12">
                <label for="cost_price">cost_price</label>
                <input class="form-control" name="cost_price" id="cost_price" type="text" />
            </div>
            <div class="form-group col-md-12">
                <label for="unit_price">unit_price</label>
                <input class="form-control" name="unit_price" id="unit_price" type="text" />
            </div>
            <div class="form-group col-md-12">
                <label for="quantity">quantity</label>
                <input class="form-control" name="quantity" id="quantity" type="text" />
            </div>
            <div class="form-group col-md-12">
                <label for="reorder_level">reorder_level</label>
                <input class="form-control" name="reorder_level" id="reorder_level" type="text" />
            </div>
            <div class="form-group col-md-12">
                <label for="location">location</label>
                <input class="form-control" name="location" id="location" type="text" />
            </div>
            <div class="form-group col-md-12">
                
                <input class="form-control hidden" name="item_id" id="item_id" type="text" />
            </div>
             <div class="form-group col-md-12">
                <label for="is_serialized">allow_alt_description</label>
                <input class="form-control" name="allow_alt_description" id="allow_alt_description" type="text" />
            </div>
             <div class="form-group col-md-12">
                <label for="is_serialized">is_serialized</label>
                <input class="form-control" name="is_serialized" id="is_serialized" type="text" />
            </div>
            <div class="form-group col-md-12">
                <label for="deleted">deleted</label>
                <input class="form-control" name="deleted" id="deleted" type="text" />
            </div>

           <input type="button" id="submit" name="submit" value="submit" class="btn btn-success">
           
           <input type="button" value="update" name="update" class="btn btn-primary" id="update"/>
           <input type="button" value="close" name="update" class="btn btn-primary" id="formCloseBtn"/>
        </form>
          </div>
          

          
           <div class="table-responsive" id="tablecontainer">
            
          </div>
            </div>
              </div> 
         
        <!-- Blog Post -->
        <div class="row">
        <div class="col-md-12">
        
              
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <!--footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
      
    </footer-->
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
    
    
 <!--script src="vendor/jquery/jquery.min.js"></script-->
 <script src="vendor/bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <script src="js/pos.js"></script>
   
 
  