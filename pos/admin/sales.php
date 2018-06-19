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
                <h2>Sales Information</h2><br>

                <?php
        $conn=new mysqli("localhost","root","","r33_pointos");
        $myquery="select * from ospos_customers";
        $result=$conn->query($myquery);
       if ($result->num_rows >= 0)
{
?>
                <div id="salesform">
                    <p>
                        <b>Select a customar_ID: </b>
                        <select id="customar">
                        <option value="">select</option>
<?php
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
?>
<option value="<?php echo $row['account_number']; ?>"><?php echo $row['person_id']; ?></option>
<?php
}
?>
</select>
                    </p>

                    <?php
       } 
      
        ?>
                        <form>
                            <b>payment type: </b>
                            <select id="payment">
                          <option value="">cash</option>
                           <option value="">check</option>
                            <option value="">Debit Card</option>
                             <option value="">Direct Bill</option>
                          
                      </select>
                            <b>comment: </b><textarea id="comment" rows="2" cols="15"></textarea>
                            <b>sale time: </b><input type="date" id="saletime">

                        </form>
                        <br><br>
                        <!-- Blog Entries Column -->


                        <form action="" method="post">
                            <div class "form-group">
                                <div class="form-row">
                                    <div class="col-md-9">
                                        <input class="form-control" id="sales" name="sales" />
                                    </div>

                                    <div class="col-md-3">
                                        <!--input type="button" class="btn btn-primary" id="additem" name="additem" value="Add item" /-->
                                    </div>
                                </div>
                                <div id="show"></div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="itemsTable" class="table table-condensed table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Item number</th>
                                                    <th>sl</th>
                                                    <th>category</th>
                                                    <th>Product name</th>
                                                    <th>Product price</th>
                                                    <th>Quantity</th>

                                                    <th>total</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itemTableItems">

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-right" id="itemSummary" colspan="7">Total</th>
                                                    <th> <input type="button" class="btn btn-success" id="submitInsert" value="submit" colspan="7"></th>

                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                <div id="solditems">
                    <h2>Sold Items</h2>
                        <div id="display">
                            
                            
                        </div>
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
            </div>
        </div>
    </body>

    </html>
