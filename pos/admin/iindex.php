<?php 
$conn=new mysqli("localhost","root","","r33_pointos");
$conn->set_charset("utf8");

$select="select * from chart";
$selectquery=$conn->query($select);

$chart_data='';
while($row=$selectquery->fetch_array(MYSQLI_ASSOC)){
    
    //echo implode($row);
    //exit;
    
    $chart_data.="{Month:'".$row['Month']."', Profit:'".$row['Profit']."',Purchase:'".$row['Purchase']."',Sale:".$row['Sale']."}, ";
    
}
$chart_data=substr($chart_data,0,-2);
//echo $chart_data;
//exit;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Basic file</title>
<link rel="stylesheet" href="morris.js/morris.js-0.5.1/morris.css"/>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="morris.js/morris.js-0.5.1/raphael-min.js"></script>
<script src="morris.js/morris.js-0.5.1/prettify.min.js"></script>
<script src="morris.js/morris.js-0.5.1/morris.js"></script>
    
 <style>
     #chart{
         margin-top: 0px !important;
        
        width: 1000px;
         
       
         
     }
    
    
    </style>   

</head>

<body>
    
<div id="chart">
   
    
    </div>
</body>
</html>
<script>
  //jQuery.ready(function(){ 
Morris.Bar({
   element:'chart',
    data:[<?php echo $chart_data; ?>] ,
    xkey:'Month',
    ykeys:['Profit','Purchase','Sale'],
    labels:['Profit','Purchase','Sale'],
    hideHover:'auto'
    
});
      
// });
</script>

