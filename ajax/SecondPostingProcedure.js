
function AddSecond(formID) {

    if (!validateJobAndEmployerID()) {
        swal({
            title: 'Missing Parameters!',
            text: "Job ID or Employer ID is missing from the URL.",
            icon: 'warning',
            buttons: {
                confirm: {
                    text: 'Okay',
                    className: 'btn btn-warning'
                }
            }
        });
        return;
    }

    
    var formData = new FormData();
    var logo = $('#logo').prop('files')[0]; // Get the logo file object
    var video = $('#videoUpload').prop('files')[0]; // Get the video file object
    var description = $('#description').val();
    var search = $('#search').val();
    var jobID = $('#jobID').val();
    var employerID = $('#employerID').val();

    formData.append('logo', logo); // Append logo to FormData
    formData.append('video', video); // Append video to FormData
    formData.append('description', description);
    formData.append('search', search);
    formData.append('jobID', jobID);
    formData.append('employerID', employerID);

    console.log('logo:', logo.name);
    console.log('employerID:', employerID);
    console.log('description:', description);
    console.log('search:', search);
    console.log('jobID:', jobID);
    console.log('video:', video.name);

    $('#btnAddSecond').addClass('is-loading');
    $('#btnAddSecond').prop('disabled', true);
    disableForm(formID);

    $.ajax({
        type: "POST",
        url: "../PHPFiles/Recruiter/AddSecond.php",
        data: formData, 
        processData: false, // Prevent jQuery from automatically processing the data
        contentType: false,
        success: function(response){
            console.log('Server response:', response);  // Log the raw response
            var data = JSON.parse(response);
            console.log(data); // Log the response to the console

            if(data.status == "0"){
                location.href = './create_jobad3.php?jobID=' + data.jobID + '&employerID=' + data.employerID;
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
                    $('#btnAddSecond').removeClass('is-loading');
                    $('#btnAddSecond').prop('disabled', false);
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
                    $('#btnAddSecond').removeClass('is-loading');
                    $('#btnAddSecond').prop('disabled', false);
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
                    $('#btnAddSecond').removeClass('is-loading');
                    $('#btnAddSecond').prop('disabled', false);
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
                    $('#btnAddSecond').removeClass('is-loading');
                    $('#btnAddSecond').prop('disabled', false);
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
                    $('#btnAddSecond').removeClass('is-loading');
                    $('#btnAddSecond').prop('disabled', false);
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
                    $('#btnAddSecond').removeClass('is-loading');
                    $('#btnAddSecond').prop('disabled', false);
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
                    $('#btnAddSecond').removeClass('is-loading');
                    $('#btnAddSecond').prop('disabled', false);
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
                $('#btnAddSecond').removeClass('is-loading');
                    $('#btnAddSecond').prop('disabled', false);
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