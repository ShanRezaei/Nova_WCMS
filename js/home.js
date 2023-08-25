$(document).ready(function () {

    $('#editModalhomeone').on('shown.bs.modal', function (e) {


        //alert("hello");

        var element = $(e.relatedTarget);
        $(this).find("[name='idlogo']").val(element.data("id"));
        $(this).find("[name='logo1']").val(element.data("logo"));
        


    });


    $('#editModalhometwo').on('shown.bs.modal', function (e) {


        //alert("hello");

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='title']").val(element.data("title"));
        $(this).find("[name='text']").val(element.data("text"));
        $(this).find("[name='btitle']").val(element.data("btitle"));
        $(this).find("[name='blink']").val(element.data("blink"));
        $(this).find("[name='vlink']").val(element.data("video"));
        


    });


    $('#editModalhomethree').on('shown.bs.modal', function (e) {


        //alert("hello");

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='fname']").val(element.data("fname"));
        $(this).find("[name='lname']").val(element.data("lname"));
        $(this).find("[name='title']").val(element.data("title"));
        $(this).find("[name='text']").val(element.data("text"));
        $(this).find("[name='imglink1']").val(element.data("img"));
        

        $imagepath = ('Nova/' + $("[name='imglink1']").val());
        $('#imgs').attr('src', $imagepath);

    });


})