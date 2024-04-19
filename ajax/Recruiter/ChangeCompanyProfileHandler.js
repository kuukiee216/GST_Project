
// CHANGE COMPANY DETAILS

function ChangeAccountDetails(formID){
    var emailadd = $('input[name=emailadd]').val();
    var address = $('input[name=address]').val();
    $('#btnChangeAcount').addClass('is-loading');
    $('#btnChangeAcount').prop('disabled', true);
    disableForm(formID);

    $.ajax({
        type: "Post",
        dataType: "html",
        data: {
            emailadd: emailadd,
            address: address
        },
        url: "../PHPFiles/Recruiter/editBillingInfo.php",
        success: function(data){
            if(data == "0"){
                swal({
                    title: 'Success!',
                    text: "Account Details Updated Sucessfully!",
                    icon: 'success',
                    buttons : {
                        confirm: {
                            text: 'Okay',
                            className: 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeAcount').removeClass('is-loading');
                    $('#btnChangeAcount').prop('disabled', false);
                    enableForm(formID);

                    location.href = './dashboard_billing.php';
                });

            }
            else if(data == "1"){
                swal({
                    title: 'An Error Occurred!',
                    text: "Error Updating Account Details.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeAcount').removeClass('is-loading');
                    $('#btnChangeAcount').prop('disabled', false);
                    enableForm(formID);
                });
            }
            else if(data == "2"){
                swal({
                    title: 'Empty Billing Address!',
                    text: "Please enter a Billing Address and try again.",
                    icon: 'warning',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeAcount').removeClass('is-loading');
                    $('#btnChangeAcount').prop('disabled', false);
                    enableForm(formID);
                });
            }
            else if(data == "3"){
                swal({
                    title: 'Empty Billing Email!',
                    text: "Your Billing Email is empty!",
                    icon: 'warning',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnChangeAcount').removeClass('is-loading');
                    $('#btnChangeAcount').prop('disabled', false);
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
                    $('#btnChangeAcount').removeClass('is-loading');
                    $('#btnChangeAcount').prop('disabled', false);
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
                    $('#btnChangeAcount').removeClass('is-loading');
                    $('#btnChangeAcount').prop('disabled', false);
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
                $('#btnChangeAcount').removeClass('is-loading');
                    $('#btnChangeAcount').prop('disabled', false);
                    enableForm(formID);
            });
        }
    });
}


$("#businessadd").keypress(function (event) {
    if (event.keyCode === 13) {
        $('#btnChangeAcount').click();
    }
});

$("#address").keypress(function (event) {
    if (event.keyCode === 13) {
        $('#btnChangeAcount').click();
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