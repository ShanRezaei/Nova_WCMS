$(document).ready(function () {

    var fname = $("input[name ='name']");
    var email = $("input[name ='email']");
    var subject = $("input[name='subject']");
    var textArea = $("#text");


    // on submit
    $("#form_register").submit(function () {

        var isValidate = true;


        if ($(fname).val().length == 0) {
            $(fname).next().text("Enter your name!");
            $(fname).next().show("slow");

            isValidate = false;
        }

        // email
        if ($(email).val().length == 0) {
            $(".error1").text("Enter email!");
            $(".error1").show("slow");

            isValidate = false;
        }



        //subject
        if ($(subject).val().length == 0) {
            $(subject).next().text("Enter subject!");
            $(subject).next().show("slow");

            isValidate = false;
        }

        //text area
        if (!$.trim($(textArea).val())) {
            // textarea is empty or contains only white-space

            $(".error2").text("Enter message!");
            $(".error2").show("slow");

            isValidate = false;
        }

        ///////if there is no error/////
        if (isValidate) {
            alert("Thank you, we will respond very soon.");
        }
    });



});




