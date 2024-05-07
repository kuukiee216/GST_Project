

function ChangeEmployerProfile(formID){
    var fname = $('input[name=fname]').val();
    var lname = $('input[name=lname]').val();
    var number = $('input[name=number]').val();
    var email = $('input[name=email]').val();
    $('#btnChangeEmployerProfile').addClass('is-loading');
    $('#btnChangeEmployerProfile').prop('disabled', true);
    disableForm(formID);

    $.ajax({
        type: "Post",
        dataType: "html",
        data: {
            fname: fname,
            lname: lname,
            number: number,
            email: email,
        },
        url: "../PHPFiles/Recruiter/editEmployer.php",
        success: function(data){
            if(data == "0"){
                swal({
                    title: 'Success!',
                    text: "Profile Updated Sucessfully!",
                    icon: 'success',
                    buttons : {
                        confirm: {
                            text: 'Okay',
                            className: 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeEmployerProfile').removeClass('is-loading');
                    $('#btnChangeEmployerProfile').prop('disabled', false);
                    enableForm(formID);

                    location.href = './dashboard_myaccount.php';
                });

            }
            else if(data == "1"){
                swal({
                    title: 'An Error Occurred!',
                    text: "Error Updating Profile.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeEmployerProfile').removeClass('is-loading');
                    $('#btnChangeEmployerProfile').prop('disabled', false);
                    enableForm(formID);
                });
            }
            else if(data == "2"){
                swal({
                    title: 'Empty Profile!',
                    text: "Please enter a Profile and try again.",
                    icon: 'warning',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeEmployerProfile').removeClass('is-loading');
                    $('#btnChangeEmployerProfile').prop('disabled', false);
                    enableForm(formID);
                });
            }
            else if(data == "3"){
                swal({
                    title: 'Empty Confirmation Profile!',
                    text: "Your confirmation Profile is empty!",
                    icon: 'warning',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeEmployerProfile').removeClass('is-loading');
                    $('#btnChangeEmployerProfile').prop('disabled', false);
                    enableForm(formID);
                });
            }

            else if(data == "4"){
                swal({
                    title: 'Profile not match!',
                    text: "Confirmation Profile and Profile isn`t matched!",
                    icon: 'warning',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeEmployerProfile').removeClass('is-loading');
                    $('#btnChangeEmployerProfile').prop('disabled', false);
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
                    $('#btnChangeEmployerProfile').removeClass('is-loading');
                    $('#btnChangeEmployerProfile').prop('disabled', false);
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
                    $('#btnChangeEmployerProfile').removeClass('is-loading');
                    $('#btnChangeEmployerProfile').prop('disabled', false);
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
                    $('#btnChangeEmployerProfile').removeClass('is-loading');
                    $('#btnChangeEmployerProfile').prop('disabled', false);
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
                $('#btnChangeEmployerProfile').removeClass('is-loading');
                    $('#btnChangeEmployerProfile').prop('disabled', false);
                    enableForm(formID);
            });
        }
    });
}


$("#pass").keypress(function (event) {
    if (event.keyCode === 13) {
        $('#btnChangeEmployerProfile').click();
    }
});

$("#rpass").keypress(function (event) {
    if (event.keyCode === 13) {
        $('#btnChangeEmployerProfile').click();
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