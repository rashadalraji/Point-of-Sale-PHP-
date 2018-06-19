$(document).ready(function(){
 
    $("#submit1").click(function(){
       $value=$("#item option:selected").val();
        //lert($value);
        if($value !=''){
         $.post(
        'report.php',
            {result:$value},
            function(data){
                $("#report_result").html(data); 
                
            }      
        ); 
             }else{
           alert("please select product item");
       }
        
    });
    
    
    $("#submit").click(function(){
        $item=$("#category option:selected").val();
        //alert($item);
        if($item !='' ){
        $.post(
        'report_category.php',
            {category:$item,
            action:"category"},
            function(data){
                
                    $("#report_result").html(data); 
                
                 
               
            }      
        ); 
             }else{
           alert("please select product category");
       }
          
        
    });
   
   $("#filter").click(function(){
    var $val=$("#form_data").val();
       var $val1=$("#to_data").val();
       //alert($val+$val1);
       if($val !='' && $val1 !=''){
          
            $.post(
        'report_date.php',
            {formdata:$val, todata:$val1},
            
            function(data){
                //alert(data);
                $("#report_result").html(data); 
                //console.log(data);
                
            }      
        ); 
           
           
       }else{
           alert("please select date");
       }
   });
    $("#submit").click(function(){
        $("#report").hide(1000);
        $("#report_result").show(1000);
        
    });
    $("#report_result").click('#close',function(){
        $("#report").show(1000);
         $("#report_result").hide(1000);
        
    });
            $("#submit1").click(function(){
        $("#report").hide(1000);
        $("#report_result").show(1000);
        
    });
    $("#report_result").click('#close',function(){
        $("#report").show(1000);
         $("#report_result").hide(1000);
        
    });
            $("#filter").click(function(){
        $("#report").hide(1000);
        $("#report_result").show(1000);
        
    });
    $("#report_result").click('#close',function(){
        $("#report").show(1000);
         $("#report_result").hide(1000);
        
    });
    $("#viewmonth").click('#close1',function(){
        $("#report").hide(1000);
        $("#report_result").show(1000);
        
    });
   
    $("#viewmonth").click(function(){
      var yearMonth=$("#month").val();
        var monthArr=yearMonth.split('-');
        console.log(monthArr);
        var year=monthArr[0];
        var month=monthArr[1];
        //alert(month);
        $.post(
        'report_month.php',
            {mmonth:month,
            yyear:year},
            
            function(data){
                //alert(data);
                //
                $("#report_result").html(data); 
                //console.log(data);
                
            }      
        ); 
        
        
    });
    $("#customer").click(function(){
       $.ajax({
          url:'payment_report.php',
           method:"GET",
           success:function(data){
         $("#report_result").html(data); 
           }
       }); 
    });
    
    
    //all sales report//
   
     
  $("#report").hide();
    $(".payment").hide();
    $("#sales").click(function(){
        $("#report_show").hide(1000);
        $("#report").show(1000);
        
    });
    $("#close_table").click(function(){
         $("#report_show").show(1000);
          $("#report").hide(1000);
        
    });
    $("#item1").click(function(){
        $("#report_show").hide(1000);
      
        $("#report").show(1000);
        
    });
    $("#customer").click(function(){
        $("#report_show").hide(1000);     
        $("#report").hide(1000); 
          $(".payment").show();
        
        
    });
   $("#report_result").click('#close',function(){
        $("#report_show").show(1000);     
        $("#report").hide(1000); 
          $(".payment").hide();
       
   });
     

   
    //pagination start

   
    
        
    });
   
                                
   
   
    
