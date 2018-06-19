<?php
require_once "header.php";
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>

<style>
    span{
       padding:10px;
        margin: 15px;
    }
    .category{
        height: 100px;
        width: 100%;
        border-style: solid;
    border-width: 1px;
         box-shadow: 5px 10px #888888;
        padding: 15px;
        margin: 10px;
        font-size: 18px;
        color: darkblue;
        font-weight: bold;
      
    }
    .item{
        height: 100px;
        width: 100%;
        border-style: solid;
    border-width: 1px;
         box-shadow: 5px 10px #888888;
        padding: 15px;
        margin: 10px;
        font-size: 18px;
         color: darkblue;
        font-weight: bold;
     
    }
   #timedate{
        height: 100px;
        width: 100%;
        border-style: solid;
    border-width: 1px;
         box-shadow: 5px 10px #888888;
       padding: 15px;
       margin: 10px;
       font-size: 18px;
        color: darkblue;
       font-weight: bold;
      
    }
   
    .text{
        text-align: center;
        font-weight: bold;
    }
    input{
         padding:  15px;
       margin: 10px;
      
        
    }
    .monthly{
        height: 100px;
        width: 100%;
        border-style: solid;
    border-width: 1px;
         box-shadow: 5px 10px #888888;
       padding: 15px;
       margin: 10px;
       font-size: 18px;
        color: darkblue;
       font-weight: bold;
        
    }
  
         h2{
             margin-left: 300%;
             font-weight: 900;
             font-family: cursive;
         }
     #sales{
         background-color:darkgreen;
             color:aliceblue;
        width:30%; 
	    height:150px;
		font-size:28px;
		font-weight:900;
		text-align:center;
		
		 }
		 
        
         #customer{
             background-color: darkgoldenrod;
             color:aliceblue;
		width:30%; 
	    height:150px;
		font-size:28px;
		font-weight:900;
		text-align:center;
		
		 }
		 
         #purchase{
              background-color:chocolate;
             color:aliceblue;
		width:30%; 
	    height:150px;
		font-size:28px;
		font-weight:900;
		text-align:center;
	
         }
		  #suplier{
              background-color:deepskyblue;
             color: aliceblue;
		width:30%; 
	    height:150px;
		font-size:28px;
		font-weight:bold;
		text-align:center;
		
		 }
          
         #item1{
              background-color:cornflowerblue;
             color:aliceblue;
		width:30%; 
	    height:150px;
		font-size:28px;
		font-weight:900;
		text-align:center;
             padding: 10px;
		
		 }
    #charts{
        
        margin-bottom: -50px;
        width: 100%;
        height: 500px;
        
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
                <div class="container">
                 <!--input type="button" class="btn btn-danger" value="All sales report" id="showreport"-->
                 <h2 class="text">Product sales report</h2>
                 
                  
                    
         
         
        <!-- Blog Post -->
         

       <div class="container">  
          
        <div id="charts">
             
            <?php 
 require_once("iindex.php");
          ?> 
                    </div>
              </div>
                      
                       <!----category---->   
                    <div id="report">
                  
           
              <div class="category">
                 <span> product category: </span>
             
       <?php
        $conn=new mysqli("localhost","root","","r33_pointos");
        $myquery="select distinct(category) from   ospos_items";
                    
        $result=$conn->query($myquery);
                   
                    
       if ($result->num_rows >= 0)
{
?>
                      
                            
                            <select id="category">
                        <option value="">select</option>
<?php
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
?>
<option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
<?php
}
?>
</select>
                   

                        <?php
       } 
      
        ?>
         <input type="button" class="btn btn-danger" id="submit" value="view report">
        </div>  
        <!----end---->
         <!-----item--->
         <div class="item">
        <span> product item: </span>
                    <?php
        $conn=new mysqli("localhost","root","","r33_pointos");
        $myquery="select * from   ospos_items";
                    
        $result=$conn->query($myquery);
                   
       if ($result->num_rows >= 0)
{
?>
                      
                       
                        <span>
                           
                            <select id="item">
                        <option value="">select</option>
<?php
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
?>
<option value="<?php echo $row['item_id']; ?>"><?php echo $row['name']; ?></option>
<?php
}
?>
</select>
                    </span>

                        <?php
       } 
      
        ?>
        <input type="button" class="btn btn-danger" id="submit1" value="view report">
        
        </div>
        <!-----end----->
        
        <!--<span>sales time date
      <input type="date" name="date" id="time_date"><br>
        </span>-->
<div class="row" id="timedate">
   
   <span>Report period:</span>
 
<div class="col-md-3">
   <label>Form date: </label>
   <input type="date" name="form_data" id="form_data" class="form-control">
</div>
<div class="col-md-3">
    <label>To date:</label>
    <input type="date" name="to_data" id="to_data" class="form-control">
</div>
  <div class="col-md-2">
   <input type="button" name="filter" id="filter" value="view report" class="btn btn-danger"> 
   </div>
                    </div>
                    <div class="monthly">
             Monthly sales:<input type="month" id="month">
             <input type="button" class="btn btn-danger" id="viewmonth" value="view report">
             
         </div>
<input type="button" class="btn btn-danger" id="close_table" value=" close">
                    </div>
                    <div class="payment">
                        
                        <h2>All product payment</h2>
                        <div class="monthly_payment">
             Monthly payment:<input type="month" id="month">
             <input type="button" class="btn btn-danger" id="viewmonth" value="view report">
             
         </div>
                    </div>
                    
                    <!------all sales------>
                    <div id="report_show">
              <a type="button" class="btn"  id="sales">All total sales</a>
                      
<a type="button" class="btn"  id="customer">All total payment</a>
<a type="button" class="btn"  id="purchase">All total Purchase</a>
<br><br>

<a type="button" class="btn" id="item1">Monthly sales</a>
        <a type="button" class="btn" id="suplier">Monthly payment</a>
         <a type="button" class="btn" id="item1">Monthly Purchase</a>
        </div>
      
         
         <!-------End sales------>
  
<br><br><br><br>

               
                    
<div id="report_result">
    
</div>


 </div>
 


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
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin.min.js"></script>
                <script src="js/sales.js"></script>
                <script src="js/report.js"></script>
                
                <script src="js/line_graph.js"></script>
                
      
                
            </div>
        </div>
    </body>
        
    </html>
<script>
  //jQuery.ready(function(){ 

// });
</script>