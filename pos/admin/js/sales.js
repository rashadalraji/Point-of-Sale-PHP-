// JavaScript Document
$(document).ready(function (e) {
        var sl = 1;
    var edit=true;
    $("#sales").keyup(function () {
        items = $(this).val();
        
        if (items.length > 0) {
            $.ajax({
                url: "onlysales.php",
                method: "post",
                data: {
                    items: items
                },
                success: function (data) {
                    $("#show").fadeIn();
                    $("#show").html(data);

                },

                dataType: "text"
            });
        }
        

    });
    /*
    <tr>
                              <th>sl</th>
                              <th>Product name</th>
                              <th>Product price</th>
                              <th>Product sku</th>
                              <th>Quantity</th>
                              <th>total</th>
                              <th>action</th>
                          </tr>
    */
    //calculation code//

    $(document).on('change', '.itemQuantity', function () {
        //$(".pricequentity").change(function(){
        var x = $(this).val();
        //alert(x);
        var y = $(this).parent().parent().find('td.price').html();
        //console.log(y);
        var a = $(this).parent().parent().find('td.total').html(x * y);
        calc_total();
        
        
               
    });

   var calc_total = function(){
        var $totals = $("td.total", $("#itemTableItems"));
        //alert($totals.length);
        var grandtotal = 0;
        $totals.each(function(){
            //console.log($(this).html());
            grandtotal += parseFloat($(this).html());
            $("#itemSummary").html(/*"Total: " + */grandtotal);
            
            
        });
    
        if(($totals.length)==0){
            //alert($totals.length);
            //grandtotal=0;
            //console.log(grandtotal);
            $("#itemSummary").html("Total");
        }
    }
    //end//

    //delete

    $(document).on('click', '.removeItem', function () {
        $(this).parent().parent().remove();
        calc_total();


    });

    //end

    //submit insert

    $("#submitInsert").click(function () {

        var itemid = [];
        var productname = [];
        var serial = [];
        var quantity = [];
        var costprice = [];
        var unitprice = [];
        var total = [];
        var customar=$("#customar option:selected").text();
        var saletime=$("#saletime").val();
        var comment=$("#comment").val();
        var payment=$("#payment option:selected").text();
        var grandtotal=$("#itemSummary").html();
       
        $.each($('td#itemid'), function (){
            itemid.push($(this).html());

        });
        $.each($('td.serial'), function (){
            serial.push($(this).html());
        });

        $.each($('td.name'), function (){
            productname.push($(this).html());                                                                                                            
        });
        
        $.each($('input.itemQuantity'), function (){
            quantity.push($(this).val());

        });

        $.each($('td.price'), function (){
            unitprice.push($(this).html());

        });
        $.each($('td#costprice'), function (){
            costprice.push($(this).html());

        });
        $.each($('td.total'), function (){
            total.push($(this).html());

        });
        //alert(payment+comment+saletime+customar);

        //alert(itemid +"#"+ productname +"#"+ serial +"#"+ quantity +"#"+ costprice +"#"+ unitprice +"#"+ total);
        $.ajax({
            url: 'salesInsert.php',
            data: {
                itemid : itemid,
                productname :productname,
                serial : serial,
                quantity : quantity,
                costprice : costprice,
                unitprice : unitprice,
                total : total,
                customar:customar,
                saletime:saletime,
                comment:comment,
                payment:payment,
                grandtotal:grandtotal
            },
            type:'POST',
             beforeSend:function(){
               return confirm("Do you want to confirm and proceed?");
            },
            success:function(data){
                //console.log(data);
                //$("#display").html("product name: "+productname+"<br>"+"product quantity:" +quantity+"<br>"+"product price: "+total+"<br>"+"grandtotal: "+grandtotal);
                $("#display").html(data);
                //location.reload();
            }

        });
        

    });
    
   
    //////end////


    $(document).on('click', 'li.listvalue', function () {

        var itemid = $(this).data('itemid');
        //alert(itemid);
        var itemnumber = $(this).data('itemnumber');
        var itemcategory = $(this).data('itemcategory');
        var itemname = $.trim($(this).data('itemname'));
        //alert(itemname);
        var itemprice = $(this).data('unitprice');
        var costprice = $(this).data('costprice');
        var cellname=$('td.name');
        console.log(cellname);
       //var quantitys =$('.itemQuantity').val();
        // console.log(quantitys);
        //var newquantity=(parseFloat(quantitys)+1);
       // console.log(newquantity);
       
        $('td.name').each(function (){
           // alert("hi");
         var checkName=  $.trim($(this).text()); 
            //alert(checkName);
           if (checkName==itemname){
            var a=confirm("This item is alredy added to the list, do you want to add more?");
            if(a){ 
             var check=$(this).next().next().next().find('input.itemQuantity').val();
                //console.log(check);
                check=parseInt(check)+1;
                $(this).next().next().next().find('input.itemQuantity').val(check);
                
               // $.each($('input.itemQuantity'),function(){
                   // var itemssquantity=$('.itemQuantity').val();
                    //$('td.total').html(check*itemprice);
                    //calc_total();
                //});
                
                //alert(check);
         //$(".itemQuantity").val( newquantity);  
              $('.itemQuantity').trigger("change"); 
                edit=false;
                return false;
            }else{edit=false;}  
        }else{edit=true;}
        });
        //var abc = $('td.total').html(check*itemprice);
                //alert(itemprice + " : quantity- " +check);
         
        if(edit){
        var tablerow = "<tr><td class='hidden' ID='itemid'>" + itemid + "</td><td class='itemnumber'>" + itemnumber + "</td><td class='serial'>" + sl + "</td><td class='itemcategory'>" + itemcategory + "</td><td class='name' >" + itemname + "</td>    <td class='price'>" + itemprice + "</td> <td class='hidden' id='costprice'>" + costprice + "</td><td class='quentityprice'><input class='itemQuantity' value='1' type='number' /></td><td class='total'>" + itemprice + "</td><td><button class='removeItem' type='button'>X</button></td></tr><hr>";
        //alert(itemid);
        $("#itemTableItems").append(tablerow);
         
        sl++;
        $("#sales").val("");
        //$("#show").html();
        $("#show").fadeOut();
        calc_total();
        
        }
    });
    
    
    //$("submitInsert").click(function(){
       
       
   //});

});

