
function AddFirst(formID){
    var payType = $('input[name=optionsRadios]:checked').val();
    var currency = $('#currencySelect').val();
    var minPay = $('#min').val();
    var maxPay = $('#max').val();
    var hideSalary = $('input[name=hideSalary]').is(':checked') ? 0 : 1;
    var advertisePrivately = $('input[name=advertisePrivately]').is(':checked') ? 0 : 1;
    var advertisePrivately = $('input[name=advertisePrivately]').is(':checked') ? 0 : 1;
    var jobTitle = $('#jobtitles').val();

    $('#btnAddFirst').addClass('is-loading');
    $('#btnAddFirst').prop('disabled', true);
    disableForm(formID);

    $.ajax({
        type: "POST",
        url: "../PHPFiles/Recruiter/AddFirst.php",
        data: {
            payType: payType,
            currency: currency,
            minPay: minPay,
            maxPay: maxPay,
            hideSalary: hideSalary,
            advertisePrivately: advertisePrivately,
            jobTitle: jobTitle
        },
        success: function(response){
            var data = JSON.parse(response);
            if(data.status == "0"){
                location.href = './create_jobad2.php?jobID=' + data.jobID + '&employerID=' + data.employerID;
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
                    $('#btnAddFirst').removeClass('is-loading');
                    $('#btnAddFirst').prop('disabled', false);
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
                    $('#btnAddFirst').removeClass('is-loading');
                    $('#btnAddFirst').prop('disabled', false);
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
                    $('#btnAddFirst').removeClass('is-loading');
                    $('#btnAddFirst').prop('disabled', false);
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
                    $('#btnAddFirst').removeClass('is-loading');
                    $('#btnAddFirst').prop('disabled', false);
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
                    $('#btnAddFirst').removeClass('is-loading');
                    $('#btnAddFirst').prop('disabled', false);
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
                    $('#btnAddFirst').removeClass('is-loading');
                    $('#btnAddFirst').prop('disabled', false);
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
                    $('#btnAddFirst').removeClass('is-loading');
                    $('#btnAddFirst').prop('disabled', false);
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
                $('#btnAddFirst').removeClass('is-loading');
                    $('#btnAddFirst').prop('disabled', false);
                    enableForm(formID);
            });
        }
    });
}

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