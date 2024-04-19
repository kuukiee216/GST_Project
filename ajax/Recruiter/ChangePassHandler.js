
// CHANGE PASSWORD

function ChangePass(formID){
    var pass = $('input[name=pass]').val();
    var rpass = $('input[name=rpass]').val();
    $('#btnChangePass').addClass('is-loading');
    $('#btnChangePass').prop('disabled', true);
    disableForm(formID);

    $.ajax({
        type: "Post",
        dataType: "html",
        data: {
            pass: pass,
            rpass: rpass
        },
        url: "../PHPFiles/Applicant/changePass.php",
        success: function(data){
            if(data == "0"){
                swal({
                    title: 'Success!',
                    text: "Password Updated Sucessfully!",
                    icon: 'success',
                    buttons : {
                        confirm: {
                            text: 'Okay',
                            className: 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangePass').removeClass('is-loading');
                    $('#btnChangePass').prop('disabled', false);
                    enableForm(formID);

                    location.href = './dashboard_myaccount.php';
                });

            }
            else if(data == "1"){
                swal({
                    title: 'An Error Occurred!',
                    text: "Error Updating Password.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangePass').removeClass('is-loading');
                    $('#btnChangePass').prop('disabled', false);
                    enableForm(formID);
                });
            }
            else if(data == "2"){
                swal({
                    title: 'Empty Password!',
                    text: "Please enter a password and try again.",
                    icon: 'warning',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangePass').removeClass('is-loading');
                    $('#btnChangePass').prop('disabled', false);
                    enableForm(formID);
                });
            }
            else if(data == "3"){
                swal({
                    title: 'Empty Confirmation Password!',
                    text: "Your confirmation password is empty!",
                    icon: 'warning',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangePass').removeClass('is-loading');
                    $('#btnChangePass').prop('disabled', false);
                    enableForm(formID);
                });
            }

            else if(data == "4"){
                swal({
                    title: 'Password not match!',
                    text: "Confirmation password and Password isn`t matched!",
                    icon: 'warning',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangePass').removeClass('is-loading');
                    $('#btnChangePass').prop('disabled', false);
                    enableForm(formID);
                });
            }
            else if(data == "5"){
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
                    $('#btnChangePass').removeClass('is-loading');
                    $('#btnChangePass').prop('disabled', false);
                    enableForm(formID);
                });
            }
            else if(data == "6"){
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
                    $('#btnChangePass').removeClass('is-loading');
                    $('#btnChangePass').prop('disabled', false);
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
                    $('#btnChangePass').removeClass('is-loading');
                    $('#btnChangePass').prop('disabled', false);
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
                $('#btnChangePass').removeClass('is-loading');
                    $('#btnChangePass').prop('disabled', false);
                    enableForm(formID);
            });
        }
    });
}


$("#pass").keypress(function (event) {
    if (event.keyCode === 13) {
        $('#btnChangePass').click();
    }
});

$("#rpass").keypress(function (event) {
    if (event.keyCode === 13) {
        $('#btnChangePass').click();
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