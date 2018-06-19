// JavaScript Document
$(document).ready(function (e) {
 var edit_id;
    $("#itemform").hide();
    //$("#editform").hide();
    $("#add").click(function (e) {

        $("#table").hide(2000);
        $("#pagination").hide();
        $("#update").hide();
        $("#formCloseBtn").hide();
        $("#itemform").show(2000);
        $("#add").hide();


    });


    $("#submit").click(function (e) {
        e.preventDefault();
        
        var a=$("#description").val();
        //alert(a);



        //var addbtn=$("#name").val();
        //alert(addbtn);
        //formdata
       var formData = new FormData();
        formData.append('name', $("#name").val());
        formData.append('category', $("#category").val());
        formData.append('supplier', $("#supplier").val());
        formData.append('item_number', $("#item_number").val());
        formData.append('description', $("#description").val());
        formData.append('cost_price', $("#cost_price").val());
        formData.append('unit_price', $("#unit_price").val());
        formData.append('quantity', $("#quantity").val());
        formData.append('reorder_level', $("#reorder_level").val());
        formData.append('location', $("#location").val());     
        formData.append('allow_alt_description', $("#allow_alt_description").val());
        formData.append('is_serialized', $("#is_serialized").val());
        formData.append('deleted', $("#deleted").val());



        //ajax
       /*$.ajax({
            url: 'add.php',
            data: formData,

            type: "POST", //ADDED THIS LINE
            //dataType: "json",
            // THIS MUST BE DONE FOR FILE UPLOADING
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                if (data.success) {
                    alert(data.message);
                    location.reload();
                } else alert(data.message);
                //location.reload();
                //showtable(1);
                //clearform();

            },
            error: function () {
                alert(data);
            }
        });*/
          $.post(
            'add.php',
            {name:$("#name").val(),
             category:$("#category").val(),
             supplier:$("#supplier").val(),
             item_number:$("#item_number").val(),
             description:$("#description").val(),
             cost_price:$("#cost_price").val(),
             unit_price:$("#unit_price").val(),
             quantity:$("#quantity").val(),
             reorder_level:$("#reorder_level").val(),
             location:$("#location").val(),
             
             allow_alt_description:$("#allow_alt_description").val(),
              is_serialized:$("#is_serialized").val(),
             deleted:$("#deleted").val()
              
            },
            function(data){
                alert(data);if(data){
                    location.reload();
                }
              
                //location.reload();
            }
            
            
        );

    });




    //pagination start

    var itemnumbers = $("#tableshow tr#textrow").length;
    //alert(itemnumbers);
    var pagelimit = 5;
    $("#tableshow tr#textrow:gt(" + (pagelimit - 1) + ")").hide();
    var totalpages = Math.ceil(itemnumbers / pagelimit);
    //alert(totalpages);
    $(".pagination").append('<li class="lists active"><a href="javascript:void(0)">' + 1 + '</a></li>');

    for (var i = 2; i <= totalpages; i++) {
        $(".pagination").append('<li class="lists"><a href="javascript:void(0)">' + i + '</a></li>');
    }

    $(".pagination").append('<li id="nextbtn"><a href="javascript:void(0)">Next</a></li>');

    $(".pagination li.lists").on("click", function () {
        if ($(this).hasClass("active")) {
            return false;
        } else {
            var activepage = $(this).index();
            //alert("user clicked on" + activepage);
            $(".pagination li.lists").removeClass("active");
            $(this).addClass("active");
            //alert(activepage);
            $("#tableshow tr#textrow").hide();
            var grandtotalpages = pagelimit * activepage;

            for (var a = grandtotalpages - pagelimit; a < grandtotalpages; a++) {
                //console.log(a);
                $("#tableshow tr#textrow:eq(" + a + ")").show();
            }
        }
    });

    //Next button start
    $("#nextbtn").on("click", function () {
        //alert("clicked on next");
        var clickedpage = $(".pagination li.active").index();
        //alert(clickedpage);
        if (clickedpage === totalpages) {
            return false;
        } else {
            clickedpage++;
            $(".pagination li.lists").removeClass("active");
            //$(".pagination li.lists").addClass("active");
            $("#tableshow tr#textrow").hide();
            var grandtotalpages = pagelimit * clickedpage;
            for (var a = grandtotalpages - pagelimit; a < grandtotalpages; a++) {
                $("#tableshow tr#textrow:eq(" + a + ")").show();
            }
            $(".pagination li.lists:eq(" + (clickedpage - 1) + ")").addClass("active");
        }
    });

    //Previous button start

    $("#prevbtn").on("click", function () {
        var clickedpage = $(".pagination li.active").index();
        //alert(clickedpage);
        if (clickedpage === 1) {
            return false;
        } else {
            clickedpage--;
            $(".pagination li.lists").removeClass("active");
            //$(".pagination li.lists").addClass("active");
            $("#tableshow tr#textrow").hide();
            var grandtotalpages = pagelimit * clickedpage;
            for (var a = grandtotalpages - pagelimit; a < grandtotalpages; a++) {
                $("#tableshow tr#textrow:eq(" + a + ")").show();
            }
            $(".pagination li.lists:eq(" + (clickedpage - 1) + ")").addClass("active");
        }


    });

    //delete start

    /*$('#table').on("click", "#btnDelete", function (event) {
        event.preventDefault();
        //alert('hi');
        var del_id = $(this).attr('delete-item');
        alert(del_id);
        //var ele = $(this).parent().parent().find();
        $.ajax({
            type: 'POST',
            url: 'delete.php',
            data: {

                datatodelete: del_id
            },
            success: function (data) {
                alert(data);
                /*if (data == "yes") {
                    location.reload();
                } else {
                    alert("can't delete the row");
                }
            }

        });
    });*/
    
    
    $('#table').on("click","#btnDelete",function(event){
            event.preventDefault();
           //alert('hi');
            var del_id= $(this).attr('delete-item');
            //alert(del_id);
            //var ele = $(this).parent().parent().find();
            $.ajax({
                url:'delete.php',  
                type:'POST',
                              
                data:{
                    'action':'delete',
                    'datatodelete':del_id  
                },
                success: function(data){
                    alert(data);
                    if(data=="yes"){
                        location.reload();
                        }else{
                            alert("can't delete the row");
                            }
                    }

                });
            });

    //end

    //edit start selete

    $("#table").on("click", "#edit", function (event) {
         //edit_id = $(this).attr('recordid');
        edit_id=$(this).closest("tr").children("td#itid").text();
        //alert(edit_id);
        
        $("#pagination").hide();
        
        event.preventDefault();
        $('#table').hide();
        $("#itemform").show(2000);


        //alert('ATPR1');

       
        var name = $(this).closest("tr").children("td#tname").text();
       //alert(name);
        var category = $(this).closest("tr").children("td#tcategory").text();
        //alert(tname);
        var supplier = $(this).closest("tr").children("td#tsupplier").text();
        var item_number = $(this).closest("tr").children("td#titem_number").text();
        var description = $(this).closest("tr").children("td#tdescription").text();
        var cost_price = $(this).closest("tr").children("td#tcost_price").text();
        var unit_price = $(this).closest("tr").children("td#tunit_price").text();
        var quantity = $(this).closest("tr").children("td#tquantity").text();
        var reorder_level = $(this).closest("tr").children("td#treorder_level").text();
        var location = $(this).closest("tr").children("td#tlocation").text();
        var item_id = $(this).closest("tr").children("td#titem_id").text();
        var allow_alt_description = $(this).closest("tr").children("td#tallow_alt_description").text();
        var is_serialized = $(this).closest("tr").children("td#tis_serialized").text();
        var deleted = $(this).closest("tr").children("td#tdeleted").text();
        $('#name').val(name);
        $('#category').val(category);
        $('#supplier').val(supplier);
        $('#item_number').val(item_number);
        $('#description').val(description);
        $('#cost_price').val(cost_price);
        $('#unit_price').val(unit_price);
        $('#quantity').val(quantity);
        $('#reorder_level').val(reorder_level);
        $('#location').val(location);
        $('#item_id').val(item_id);
        $('#allow_alt_description').val(allow_alt_description);
        $('#is_serialized').val(is_serialized);
         $('#deleted').val(deleted);
        $("#itid").val(edit_id);

        $('#submit').hide();
        $('#update').show();
        //$('#addbtnbtn').hide();
        $('#formCloseBtn').hide();

    });
   

    // Edit item     
    $("#update").on("click",function () {
     //edit_id =$("#edit").attr('recordid');
        //update_id=edit_it;
        //console.log(edit_id);
        //alert(edit_id);
       //alert(5);
        
        //var active=$(".active").is(":checked")?"1":"0";
        //alert(active);


       /*var update = $("#update").val();
        //alert(update);
        //formdata
        var formData = new FormData();
        formData.append('name', $("#name").val());
        formData.append('category', $("#category").val());
        formData.append('supplier', $("#supplier").val());
        formData.append('item_number', $("#item_number").val());
        formData.append('description', $("#description").val());
        formData.append('cost_price', $("#cost_price").val());
        formData.append('unit_price', $("#unit_price").val());
        formData.append('quantity', $("#quantity").val());
        formData.append('reorder_level', $("#reorder_level").val());
        formData.append('location', $("#location").val());
        formData.append('item_id', $("#item_id").val());
        formData.append('allow_alt_description', $("#allow_alt_description").val());
        formData.append('is_serialized', $("#is_serialized").val());
        formData.append('deleted', $("#deleted").val());*/
        //ajax



        /*$.post(
            'edit.php',
            {
             name:$("#name").val(),
             category:$("#category").val(),
             supplier:$("#supplier").val(),
             item_number:$("#item_number").val(),
             description:$("#description").val(),
             cost_price:$("#cost_price").val(),
             unit_price:$("#unit_price").val(),
             quantity:$("#quantity").val(),
             reorder_level:$("#reorder_level").val(),
             location:$("#location").val(),
             allow_alt_description:$("#allow_alt_description").val(),
              is_serialized:$("#is_serialized").val(),
             deleted:$("#deleted").val(),
             edit_id :edit_id     
            },
            function(data){
                if(data){
                  location.reload();
                   alert(data);
                }
               
               
            }
            
            
        );*/
        
        $.ajax({
            url:'edit.php',
            method:'post',
            data:{
            name:$("#name").val(),
             category:$("#category").val(),
             supplier:$("#supplier").val(),
             item_number:$("#item_number").val(),
             description:$("#description").val(),
             cost_price:$("#cost_price").val(),
             unit_price:$("#unit_price").val(),
             quantity:$("#quantity").val(),
             reorder_level:$("#reorder_level").val(),
             location:$("#location").val(),
             allow_alt_description:$("#allow_alt_description").val(),
              is_serialized:$("#is_serialized").val(),
             deleted:$("#deleted").val(),
             edit_id :edit_id
                
            },
            action:'update',
            success:function(data){
                //alert(edit_id);
                alert(data);
                location.reload();
            }
            
        });

    });
    //end



});


//end
