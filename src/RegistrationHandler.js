function readyFillUpForm(){

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "../PHPFiles/profile_data_retrieve.php",

    });

    $('#email').prop("disabled", true);

}