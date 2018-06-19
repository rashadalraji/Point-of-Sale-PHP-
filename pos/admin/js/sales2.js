// JavaScript Document
$(document).ready(function (e) {
    var items="";
    var sl = 1;
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
        var itemname = $(this).data('itemname');
        var itemprice = $(this).data('unitprice');
        var costprice = $(this).data('costprice');
        
         if (itemname==items){
            var a=confirm("This item is alredy added to the list, do you want to add more?");
            if(a){
         $(".itemQuantity").val( newquantity); }  
        }
        var quantitys =$('.itemQuantity').val();
        var newquantity=(parseFloat(quantitys)+1);
        var cellname=$('td.name').text();
        var itemlength=(cellname.length);
        var recentquantity=$(".itemQuantity").val( parseFloat($(".itemQuantity").val())+1);
        //alert(costprice);
        //var productss=$('td.name').html();
        
/*if($('td.name').html()==itemname){
            window.confirm("This item is alredy added to the list, do you want to add more?");
   // alert("hi");
            $(".itemQuantity").val( parseInt($(".itemQuantity").val()) + 1);
           return;
        }*/
        
        //for(var i=0; i<itemlength; i++){
            //if($('td.name').html()[i]==itemname[i]){
            //window.confirm("This item is alredy added to the list, do you want to add more?");
   // alert("hi");
                //alert(productss + " : "+ itemname);
                //alert(cellname);
                //alert(itemlength);
                //recentquantity[i];
               // for (var a=newquantity; a<=recentquantity; a++ ){
                 //$(".itemQuantity").val( parseFloat($(".itemQuantity").val())+1);
                   // recentquantity[a][i];
                    //$('td.total').html(newquantity*itemprice);
                //calc_total();
                   // quantitys[a][i];
                
          // }
                // $('td.total').html(newquantity*itemprice);
                // calc_total();
                   // return false; 
           // }
           // }
              
                // else return true;
             
           

        var tablerow = "<tr><td class='hidden' ID='itemid'>" + itemid + "</td><td class='itemnumber'>" + itemnumber + "</td><td class='serial'>" + sl + "</td><td class='itemcategory'>" + itemcategory + "</td><td class='name' id='name'>" + itemname + "</td>    <td class='price'>" + itemprice + "</td> <td class='hidden' id='costprice'>" + costprice + "</td><td class='quentityprice'><input class='itemQuantity' value='1' type='number' /></td><td class='total'>" + itemprice + "</td><td><button class='removeItem' type='button'>X</button></td></tr><hr>";
        //alert(itemid);
        $("#itemTableItems").append(tablerow);
         
        sl++;
        $("#sales").val("");
        //$("#show").html();
        $("#show").fadeOut();
        calc_total();
        
        
    });
    
    
    //$("submitInsert").click(function(){
       
       
   //});

});

