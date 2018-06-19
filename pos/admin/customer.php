<?php
require_once "header.php";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            ul {
                cursor: pointer;
            }
            
            li#abc:hover {
                padding: 4px;
                border-radius: 5px;
                width: 75%;
                background-color: black;
                color: aliceblue;
            }

            #salesform{
                width: 60%;
                float: left;
            }
            #solditems{
                width: 38%;
                min-height: 70px;
                float: left;
                border: 2px solid black;
                background-color: cadetblue;
                color: aliceblue;
                text-align: center;
                line-height: 50px;
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
                        <li class="breadcrumb-item active">Customers</li>
                     </ol>
                     <div class="tables">
                
                <input type="button" class="btn btn-info" value="add new" id="addnew">
            
      
                
            </div>
        
                    
 
  <div id="customertable">
                                           
  <?php
        require_once "../config/db.php";
 $selectquery="select * from ospos_customers";
 $selectqueryresult= $conn->query($selectquery);
       ?>
               <div id="table" style="overflow scroll" class="panel-body">    
    
<table class="table table-bordered table-inverse " align="center" cellspacing="3" cellpadding="3" id="tableshow">

<tr class="text-center" style="text-align:center">
<th>Person Id</th>
<th>Account Number</th>
<th>taxable</th>
<th>Deleted</th> 
<th colspan="4">Option</th>
               
    </tr>
                      <?php
                            if($selectqueryresult->num_rows>0){
	while($row=$selectqueryresult->fetch_array(MYSQLI_ASSOC)){
        echo "<tr>";
		echo "<td class='tabledata' id='tpersonid'>".$row['person_id']."</td>";
        echo "<td class='tabledata' id='taccount'>".$row['account_number']."</td>";
        echo "<td class='tabledata' id='ttax'>".$row['taxable']."</td>";
        echo "<td class='tabledata' id='tdelete'>".$row['deleted']."</td>";
        echo "<td><button recordid='".$row['person_id']."' class='btn btn-success' id='edit'>Edit</button></td>";
		echo "</tr>";
    }
         }
    ?>
                   </table>
             </div>
             </div>
             
    <div id="customerform">
<div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

          

          <!-- Blog Post -->
           <form method="post" enctype="multipart/form-data" id="customerform" name="form">
            <h1 class="my-4">customer information </h1>
               
                   <div class="form-group col-md-12">
             
           <?php
        $conn=new mysqli("localhost","root","","r33_pointos");
        $myquery="select * from ospos_people";
        $result=$conn->query($myquery);
       if ($result->num_rows >= 0)
{
?>
                <div id="person">
                    <p>
                        <b>Select a Person_ID: </b>
                        <select  id="supplier">
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
            
            <div class="form-group mt-5">
                <label for="account_number">Account Number</label>
                <input class="form-control" name="account_number" id="account_number" type="text" />
            </div> 
             <div class="form-group mt-5">
                <label for="taxable">Taxable</label>
                <input class="form-control" name="taxable" id="taxable" type="text" />
            </div>
            <div class="form-group mt-5">
                <label for="taxable">Deleted</label>
                <input class="form-control" name="deleted" id="deleted" type="text" />
            </div>
            <input type="button" id="submited" name="submit" value="submit" class="btn btn-success"/>
           
           
            </div>
            </form>
             
    
        </div> 
             </div>
             </div>        
                
               
              
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
                         <script src="js/customer.js"></script>
                         <script src="js/sales.js"></script>
                        <script src="js/supplier.js"></script>