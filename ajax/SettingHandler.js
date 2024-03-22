
// APPLICANT SETTINGS

function ChangeEmail(formID){
    var email = $('input[name=email]').val();
    var userID = $('input[name=userID]').val();
    $('#btnChangeEmail').addClass('is-loading');
    $('#btnChangeEmail').prop('disabled', true);
    disableForm(formID);

    $.ajax({
        type: "Post",
        dataType: "html",
        data: {
            email: email,
            userID: userID
        },
        url: "../PHPFiles/Applicant/updateEmail.php",
        success: function(data){
            if(data == "0"){
                swal({
                    title: 'Success!',
                    text: "Email Updated Sucessfully!",
                    icon: 'success',
                    buttons : {
                        confirm: {
                            text: 'Okay',
                            className: 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeEmail').removeClass('is-loading');
                    $('#btnChangeEmail').prop('disabled', false);
                    enableForm(formID);
                });

            }
            else if(data == "1"){
                swal({
                    title: 'An Error Occurred!',
                    text: "Error Updating Email.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeEmail').removeClass('is-loading');
                    $('#btnChangeEmail').prop('disabled', false);
                    enableForm(formID);
                });
            }
            else if(data == "2"){
                swal({
                    title: 'Empty Email!',
                    text: "Please enter your email and try again.",
                    icon: 'warning',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeEmail').removeClass('is-loading');
                    $('#btnChangeEmail').prop('disabled', false);
                    enableForm(formID);
                });
            }
            else if(data == "3"){
                swal({
                    title: 'Cannot Process the change email request!',
                    text: "Please check your email",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeEmail').removeClass('is-loading');
                    $('#btnChangeEmail').prop('disabled', false);
                    enableForm(formID);
                });
            }
            else if(data == "4"){
                swal({
                    title: 'Invalid Format!',
                    text: "Please only type valid format!",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeEmail').removeClass('is-loading');
                    $('#btnChangeEmail').prop('disabled', false);
                    enableForm(formID);
                });
            }
            else{
                swal({
                    title: 'An Error Occurred!',
                    text: "Something went wrong. Please try again",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeEmail').removeClass('is-loading');
                    $('#btnChangeEmail').prop('disabled', false);
                    enableForm(formID);
                });
            }
        },
        error: function(xhr, status, error){
            swal({
                title: 'Failed to Connect to Server!',
                text: "Something went wrong while trying to connect to the server. Please",
                icon: 'error',
                buttons : {
                    confirm: {
                        text : 'Okay',
                        className : 'btn btn-success'
                    }
                }
            }).then(function(){
                $('#btnChangeEmail').removeClass('is-loading');
                    $('#btnChangeEmail').prop('disabled', false);
                    enableForm(formID);
            });
        }
    });
}

$("#email").keypress(function (event) {
    if (event.keyCode === 13) {
        $('#btnChangeEmail').click();
    }
});

if (window.history.replaceState){
    window.history.replaceState(null, null, window.location.href);
}

function disableForm(formID){
    var form = document.getElementById(formID);
    var elements = form.elements;
    for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {
        if(elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT'){
            elements[elementCounter].disabled = true;
        }
        else{
            continue;
        }
    }
}
function enableForm(formID){
    var form = document.getElementById(formID);
    var elements = form.elements;
    for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {

        if(elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT'){
            elements[elementCounter].disabled = false;
        }
        else{
            continue;
        }
    }
}