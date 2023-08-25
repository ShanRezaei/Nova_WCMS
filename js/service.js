$(document).ready(function () {

    

    $('#editModalservice').on('shown.bs.modal', function (e) {


         

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='title1']").val(element.data("title"));
        $(this).find("[name='description1']").val(element.data("text"));
        $(this).find("[name='icons']").val(element.data("icon"));
        
        $icon = ('bi' + ' ' + $("[name='icons']").val());
        $('#iconholder1').attr('class', $icon);
        
        


    });

    $('#editModalservicecard').on('shown.bs.modal', function (e) {


       

        var element = $(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='titlecard1']").val(element.data("title"));
        $(this).find("[name='textcard1']").val(element.data("text"));
        $(this).find("[name='imglink1']").val(element.data("img"));
        
        $imagepath = ('Nova/' + $("[name='imglink1']").val());
    $('#imgs').attr('src', $imagepath);
        


    });




})