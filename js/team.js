$('#editModal').on('shown.bs.modal', function (e) {


    //alert("hello");

    var element = $(e.relatedTarget);
    $(this).find("[name='id']").val(element.data("id"));
    $(this).find("[name='fname']").val(element.data("fname"));
    $(this).find("[name='lname']").val(element.data("lname"));
    $(this).find("[name='job']").val(element.data("job"));
    $(this).find("[name='imglink1']").val(element.data("img"));


    $imagepath = ('Nova/' + $("[name='imglink1']").val());
    $('#imgs').attr('src', $imagepath);



});