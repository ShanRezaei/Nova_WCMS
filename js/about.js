$(document).ready(function () {


    $('#editModalaboutone').on('shown.bs.modal', function (e) {


        //alert("hello");

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='imglink']").val(element.data("img"));


        // ser src of img
        $imagepath = ('Nova/' + $("[name='imglink']").val());
        $('#imgs').attr('src', $imagepath);



    });




    

    $('#editModalaboutthree').on('shown.bs.modal', function (e) {


        //alert("hello");

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='title']").val(element.data("title"));
        $(this).find("[name='text']").val(element.data("text"));
        
        $(this).find("[name='link']").val(element.data("link"));
        $(this).find("[name='linktext']").val(element.data("linktext"));
        


    });


    $('#editModalabouttwo').on('shown.bs.modal', function (e) {


        //alert("hello");

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='ftitle']").val(element.data("titleone"));
        $(this).find("[name='stitle']").val(element.data("titletwo"));
        
        $(this).find("[name='text']").val(element.data("text"));
        
        


    });


})