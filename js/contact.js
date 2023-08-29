$(document).ready(function () {

    

    $('#editModalcontacttwo').on('shown.bs.modal', function (e) {


        //alert("hello");

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='name']").val(element.data("title"));
        $(this).find("[name='description']").val(element.data("text"));
        
        
        


    });


    $('#editModalcontactfive').on('shown.bs.modal', function (e) {


        // alert("hello");

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='text']").val(element.data("text"));
        $(this).find("[name='link']").val(element.data("link"));
        
        
        


    });

    $('#editModalcontactfour').on('shown.bs.modal', function (e) {


        // alert("hello");

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='text']").val(element.data("text"));
        $(this).find("[name='link']").val(element.data("link"));
        
        
        


    });

    $('#editModalcontactone').on('shown.bs.modal', function (e) {


         

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='title']").val(element.data("title"));
        $(this).find("[name='description']").val(element.data("text"));
        $(this).find("[name='iconone']").val(element.data("icon"));
        
        $icon = ('bi' + ' ' + $("[name='iconone']").val());
        $('#iconholder').attr('class', $icon);
        
        


    });


    $('#editModalcontactthree').on('shown.bs.modal', function (e) {


         

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='linkname']").val(element.data("link"));
        $(this).find("[name='iconone']").val(element.data("icon"));
        
        $icon = ('bi' + ' ' + $("[name='iconone']").val());
        $('#iconholder').attr('class', $icon);
        
        


    });


    $('#editModalcontactsix').on('shown.bs.modal', function (e) {

       // alert("hello");
         

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='iconsix']").val(element.data("type"));
        $(this).find("[name='inputname']").val(element.data("name"));
        $(this).find("[name='inputnameone']").val(element.data("name"));
        $(this).find("[name='inputholder']").val(element.data("hold"));
        
       
        
        


    });



})