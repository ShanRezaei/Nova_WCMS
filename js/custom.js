 $(document).ready(function () {
    
    $('#editModal' ).on('shown.bs.modal',function(e){


        //alert("hello");

        var element=$(e.relatedTarget);
        $(this).find("[name='id']").val(element.data("id"));
        $(this).find("[name='name1']").val(element.data("name"));
        $(this).find("[name='description1']").val(element.data("text"));
        $(this).find("[name='avatar2']").val(element.data("img"));


        $imagepath =('Nova/'+$("[name='avatar2']").val()) ;
        $('#imgs').attr('src',  $imagepath);

        

    });

    
    










})

// document.getElementById('#editModal').addEventListener('show.bs.modal', (e) => {
//     alert("hello");

// })