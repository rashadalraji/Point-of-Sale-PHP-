 var itemnumbers = $("#reporttable tr#textrow").length;
    //alert(itemnumbers);
    var pagelimit = 30;
    $("#reporttable tr#textrow:gt(" + (pagelimit - 1) + ")").hide();
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
            $("#reporttable tr#textrow").hide();
            var grandtotalpages = pagelimit * activepage;

            for (var a = grandtotalpages - pagelimit; a < grandtotalpages; a++) {
                //console.log(a);
                $("#reporttable tr#textrow:eq(" + a + ")").show();
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
            $("#reporttable tr#textrow").hide();
            var grandtotalpages = pagelimit * clickedpage;
            for (var a = grandtotalpages - pagelimit; a < grandtotalpages; a++) {
                $("#reporttable tr#textrow:eq(" + a + ")").show();
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
            $("#reporttable tr#textrow").hide();
            var grandtotalpages = pagelimit * clickedpage;
            for (var a = grandtotalpages - pagelimit; a < grandtotalpages; a++) {
                $("#reporttable tr#textrow:eq(" + a + ")").show();
            }
            $(".pagination li.lists:eq(" + (clickedpage - 1) + ")").addClass("active");
        }


    });
