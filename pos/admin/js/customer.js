$(document).ready(function(){
   
    $("#customertable").show();
    $("#customerform").hide();
    $("#addnew").click(function(){
       $("#customerform").show();
         $("#customertable").hide();
         $("#addnew").hide();
        
 });
    $("#submited").click(function(){
      $("#customerform").hide(); 
        $("#customertable").show();
        $("#addnew").show();
    
    });
    $("#submited").click(function(){
        
        $person=$("#supplier").val();
        $account=$("#account_number").val();
        $tax=$("#taxable").val();
        $delet=$("#deleted").val();
        //alert($person+$account+$tax+$delet);
        
       
    $.post(
          'customer_insert.php',
          {personid:$person,
          account:$account,
          tax:$tax,
          delete:$delet
            },
            
                 function(data){
                    location.reload();
                  }
      
              );
        
  
        
            });
});
