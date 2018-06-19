$(document).ready(function(){
   $("#supplierform").hide();
     $("#ospos_supplier").hide();
    $("#supplierinfo").show();
    $("#showtable").click(function(){
         $("#ospos_supplier").hide();
        $("#supplierinfo").hide(1000);
        $("#supplierform").show(1000);
       
        
    });
$("#submitform").click(function(){
    $("#supplierform").hide(1000);
    $("#supplierinfo").show(1000);
});
    
    
    $("#submitform").click(function(){
        
        $fname=$("#first_name").val();
        $lname=$("#last_name").val();
        $phonenumber=$("#phone_number").val();
        $email=$("#email").val();
        $address1=$("#address_1").val();
        $address2=$("#address_2").val();
        $city=$("#city").val();
        $state=$("#state").val();
        $zip=$("#zip").val();
        $country=$("#country").val();
        $comment=$("#comments").val();
       
    //alert($fname+$lname+$phonenumber+$email+$address1+$address2+$city+$zip+$country+$comment);
        $.post(
        'supplier_insert.php',
            {fname: $fname,
            lname:$lname,
            phnum:$phonenumber,
            email: $email,
            address1:$address1,
            address2:$address2,
            city:$city,
            state:$state,
            zip:$zip,
            country: $country,
            comment:$comment
            },
            function(data){
                console.log(data);
            }
            
        );
    });
   $("#ospos_supplier").hide();
    $("#showform").click(function(){
        $("#supplierform").hide(1000);
    $("#supplierinfo").hide(1000);
        $("#ospos_supplier").show(1000);
        
    });

   $("#insert_data").click(function(){
       $supplier_id=$("#supplier").val();
        $company_name=$("#company_name").val();
        $account_number=$("#account_number").val();
        $deleted=$("#deleted").val();
        alert($supplier_id +$company_name+$account_number+$deleted);
        
    $.post(
        'supplier_insert.php',
        
        { supplier_id: $supplier_id,
            company:$company_name,
         account:$account_number,
         delet:$deleted
            
        },
        function(data){
            if (data) {
                    alert(data);
                    location.reload();
                } else alert(data);
        }
    );    
    });
   
});

			 





