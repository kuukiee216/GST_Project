
// APPLICANT CONTACTS

console.log("contact")

function GetContactInfo() {
    $.ajax({
        type: "GET",
        url: "../PHPFiles/Applicant/getContactInfo.php",
        success: function(data) {
            var contactInfo = JSON.parse(data);

            $('#Fname').val(contactInfo.FirstName);
            $('#Lname').val(contactInfo.LastName);
            $('#street').val(contactInfo.StreetAddress);
            $('#country').val(contactInfo.Country);
            $('#city').val(contactInfo.City);
            $('#Pnum').val(contactInfo.Phone);
            $('#state').val(contactInfo.Province);
            $('#postal').val(contactInfo.ZipCode);
        },
        error: function(xhr, status, error) {
            console.log("Error fetching contact information:", error);
        }
    });
}

function UpdateContactInfo(formID){
    var firstName = $('#Fname').val();
    var lastName = $('#Lname').val();
    var phoneNumber = $('#Pnum').val();
    var country = $('#country').val();
    var street = $('#street').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var postal = $('#postal').val();

    $('#btnEditProfle').addClass('is-loading');
    $('#btnEditProfle').prop('disabled', true);
    disableForm(formID);

    $.ajax({
        type: "Post",
        dataType: "html",
        data: {
            firstName: firstName,
            lastName: lastName,
            phoneNumber: phoneNumber,
            country: country,
            street: street,
            city: city,
            state: state,
            postal: postal,
        },
        url: "../PHPFiles/Applicant/updateContactInfo.php",
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
                    $('#btnEditProfle').removeClass('is-loading');
                    $('#btnEditProfle').prop('disabled', false);
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
                    $('#btnEditProfle').removeClass('is-loading');
                    $('#btnEditProfle').prop('disabled', false);
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
                    $('#btnEditProfle').removeClass('is-loading');
                    $('#btnEditProfle').prop('disabled', false);
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
                    $('#btnEditProfle').removeClass('is-loading');
                    $('#btnEditProfle').prop('disabled', false);
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
                    $('#btnEditProfle').removeClass('is-loading');
                    $('#btnEditProfle').prop('disabled', false);
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
                    $('#btnEditProfle').removeClass('is-loading');
                    $('#btnEditProfle').prop('disabled', false);
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
                $('#btnEditProfle').removeClass('is-loading');
                    $('#btnEditProfle').prop('disabled', false);
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