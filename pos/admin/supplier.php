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
                    <li class="breadcrumb-item active">Daily Sales</li>
                </ol>

                <br><br>
                <div class="tables">
                
                <input type="button" class="btn btn-info" value="add supplier" id="showtable">
                <input type="button" class="btn btn-info" value="show data" id="showform"><br><br>
      
                
            </div>
        
               
        <div id="supplierinfo">
                <?php 
    require_once "../config/db.php";
    $selectquery="select * from ospos_people";
    $selectqueryresult= $conn->query($selectquery);
                ?>
   
              
                    <div id="table" style="overflow scroll" class="panel-body">

                        <table class="table table-bordered table-inverse " align="center" cellspacing="5" cellpadding="5" id="suppliertable">

                <tr class="text-center" style="text-align:center">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone number</th>
                    <th>Email</th>
                    <th>Address_1</th>
                    <th>Address_2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Country</th>
                    <th>Comments</th>
                    <th>Person_Id</th>
                           <!--th>Action</th-->
                            </tr>
                            
                            <?php
                            if($selectqueryresult->num_rows>0){
	while($row=$selectqueryresult->fetch_array(MYSQLI_ASSOC)){
        echo "<tr>";
		echo "<td class='tabledata' id='tfirstname'>".$row['first_name']."</td>";
		echo "<td class='tabledata' id='tlastname'>".$row['last_name']."</td>";
		echo "<td class='tabledata' id='tphone'>".$row['phone_number']."</td>";
		echo "<td class='tabledata' id='temail'>".$row['email']."</td>";
		echo "<td class='tabledata' id='taddress_1'>".$row['address_1']."</td>";
		echo "<td class='tabledata' id='taddress_2'>".$row['address_2']."</td>";
        echo "<td class='tabledata' id='tcity'>".$row['city']."</td>";
        echo "<td class='tabledata' id='tstate'>".$row['state']."</td>";
        echo "<td class='tabledata' id='tzip'>".$row['zip']."</td>";
        echo "<td class='tabledata' id='tcountry'>".$row['country']."</td>";
        echo "<td class='tabledata' id='tcomments'>".$row['comments']."</td>";
        echo "<td class='tabledata' id='tperson_id'>".$row['person_id']."</td>";
       
      
                      }
                    }

                ?> 
    </table>
    </div>
                
                </div>  
                
                <!-------people show data------>
                
                <div id="ospos_supplier">
                    <?php
            require_once "../config/db.php";
                    $selectquery="select * from ospos_suppliers";
                    $selectqueryresult= $conn->query($selectquery);
                    ?>
                    <table class="table table-bordered table-inverse " align="center" cellspacing="3" cellpadding="3" id="supplierdatatable">
                    <tr class="text center" style="text-align:center">
                        </tr>
                      <th>person_id</th>
                       <th>Company Name</th>
                       <th>Account Number</th>
                       <th>Deleted</th>
                        
                       
                       <?php
                            if($selectqueryresult->num_rows>0){
	while($row=$selectqueryresult->fetch_array(MYSQLI_ASSOC)){
        echo "<tr>";
		echo "<td class='tabledata' id='person'>".$row['person_id']."</td>";
		echo "<td class='tabledata' id='tcompanyname'>".$row['company_name']."</td>";
		echo "<td class='tabledata' id='taccount'>".$row['account_number']."</td>";
		echo "<td class='tabledata' id='tdeleted'>".$row['deleted']."</td>";
    }
      }
        echo "</tr>";          
    ?>
          
                    </table>
                    
                     <!--insert form-->
                     
               
                   <br><br>
                <h2>Insert Data</h2><br>

                <?php
        $conn=new mysqli("localhost","root","","r33_pointos");
        $myquery="select * from ospos_people";
        $result=$conn->query($myquery);
       if ($result->num_rows >= 0)
{
?>
                <div id="person">
                    <p>
                        <b>Select a Supplier_ID: </b>
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
                        
                          
                      
                            <b>Company Name: </b><input type="text" id="company_name" rows="5" cols="30"><br><br>
                            <b>Account Number: </b><input type="account_number" id="account_number" rows="5" cols="30"><br><br>
                            <b>Deleted:</b><input type="text" id="deleted" rows="5" cols="30">
                        
                        <br><br>
                      
                    <input type="button" class="btn btn-info" value="insert data" id="insert_data">
                             
         
                    
                   
                   
                   
                   
               </div>              
                </div> 
             
   
              
                <!------people end-------- >
               
     <div id="supplierform">
<div class="row">
        <div class="col-md-12">
  <!-- Blog Post -->
          
           <form method="post" enctype="multipart/form-data" id="supplierform" name="form">
            <h1 class="my-4">Supplier information </h1>
                 <div class="form-group col-md-12">
                <label for="first_name">First Name</label>
                <input class="form-control" name="first_name" id="first_name" type="text" />
               </div>
            <div class="form-group col-md-12">
                <label for="last_name">Last Name</label>
                <input class="form-control" name="last_name" id="last_name" type="text" />
            </div>
              <div class="form-group col-md-12">
                <label for="phone_number">Phone Number</label>
                <input class="form-control" name="phone_number" id="phone_number" type="text" />
               </div>
                 <div class="form-group col-md-12">
                <label for="email">Email</label>
                <input class="form-control" name="email" id="email" type="text" />
               </div>
                 <div class="form-group col-md-12">
                <label for="address_1">Address_1</label>
                <input class="form-control" name="address_1" id="address_1" type="text" />
               </div>
                 <div class="form-group col-md-12">
                <label for="address_2">Address_2</label>
                <input class="form-control" name="address_2" id="address_2" type="text" />
               </div>
                <div class="form-group col-md-12">
                <label for="city">City</label>
                <input class="form-control" name="city" id="city" type="text" />
               </div>
                <div class="form-group col-md-12">
                <label for="state">State</label>
                <input class="form-control" name="state" id="state" type="text" />
               </div>
                <div class="form-group col-md-12">
                <label for="zip">Zip</label>
                <input class="form-control" name="zip" id="zip" type="text" />
               </div>
                <div class="form-group col-md-12">
                <label for="country">Country</label>
                <input class="form-control" name="country" id="country" type="text" />
               </div>
                <div class="form-group col-md-12">
                <label for="comments">Comments</label>
                <input class="form-control" name="comments" id="comments" type="text" />
               </div>
                <input name="person_id" id="person_id" type="hidden" />
                <input type="button" class="btn btn-info" value="submit" id="submitform">
              
               
                    </form>
        
        
    </div>
        
        
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
                        <script src="js/supplier.js"></script>
                        

        
            
    </body>

    </html>

                    
