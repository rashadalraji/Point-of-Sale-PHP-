<?php 
$conn=new mysqli("localhost","root","","charttest");
$conn->set_charset("utf8");

$select="select * from yearlychart";
$selectquery=$conn->query($select);

$chart_data='';
while($row=$selectquery->fetch_array(MYSQLI_ASSOC)){
    
    //echo implode($row);
    //exit;
    
    $chart_data.="{year:'".$row['year']."', profit:'".$row['Profit']."',purchase:'".$row['purchase']."',sale:".$row['Sale']."}, ";
    
}
$chart_data=substr($chart_data,0,-2);
//echo $chart_data;
//exit;
?>



<!doctype html>
<head>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="../morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
  <script src="lib/example.js"></script>
  <link rel="stylesheet" href="lib/example.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
  <link rel="stylesheet" href="../morris.css">
</head>
<body>
<h1>Formatting Dates YYYY</h1>
<div id="graph"></div>
<pre id="code" class="prettyprint linenums">
/* data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type 
var year_data = [
  {"period": "2012", "licensed": 3407, "sorned": 660},
  {"period": "2011", "licensed": 3351, "sorned": 629},
  {"period": "2010", "licensed": 3269, "sorned": 618},
  {"period": "2009", "licensed": 3246, "sorned": 661},
  {"period": "2008", "licensed": 3257, "sorned": 667},
  {"period": "2007", "licensed": 3248, "sorned": 627},
  {"period": "2006", "licensed": 3171, "sorned": 660},
  {"period": "2005", "licensed": 3171, "sorned": 676},
  {"period": "2004", "licensed": 3201, "sorned": 656},
  {"period": "2003", "licensed": 3215, "sorned": 622}
];
Morris.Bar({
  element: 'graph',
  data: year_data,
  xkey: 'period',
  ykeys: ['licensed', 'sorned'],
  labels: ['Licensed', 'SORN']
});
*/
</pre>
</body>
<script>
Morris.Line({
   element:'chart',
    data:[<?php echo $chart_data; ?>] ,
    xkeys:'year',
    ykeys:['profit','purchase','sale'],
    labels:['profit','purchase','sale'],
    hideHover:'auto'
    
});
      

</script>
