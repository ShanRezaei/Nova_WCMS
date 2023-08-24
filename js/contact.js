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



})