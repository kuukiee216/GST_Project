function fillProfileData(){
    $.ajax({
        url: '../PHPFiles/Applicant/Profile/profiledataget.php',
        type: 'GET',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Profile Details!',
                    message: 'Something went wrong while retrieving profile details. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Profile Details!',
                    message: 'Something went wrong while retrieving profile details. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Profile Details Found!',
                    message: 'Could not find your profile details. Please try and check again later.'
                },{
                    // settings
                    type: 'info'
                });
            }
            else{
                var decodedResponse = JSON.parse(response);

                $('#lblName').text(decodedResponse.ApplicantName);
                $('#lblEmailAddress').text(decodedResponse.EmailAddress);
                $('#lblContactNumber').text(decodedResponse.ContactNumber);
                $('#lblAddress').text(decodedResponse.Address);
                $('#lblWorkSchedule').text(decodedResponse.PreferredWorkScheduleName);
                $('#cbWorkSchedule').val(decodedResponse.PreferredWorkSchedule);
                $('#lblSalaryRange').text(decodedResponse.PreferredSalaryRange);

                if(decodedResponse.RelocationStatus == 0){
                    $('#lblRelocation').removeClass('text-muted');
                    $('#lblRelocation').addClass('text-success');
                    $('#lblRelocation').text('YES');

                    $('#btnRelocationYes').removeClass('btn-light').addClass('btn-success');
                    $('#btnRelocationNo').removeClass().addClass('btn btn-light');
                }
                else if(decodedResponse.RelocationStatus == 0){
                    $('#lblRelocation').removeClass('text-muted');
                    $('#lblRelocation').addClass('text-danger');
                    $('#lblRelocation').text('NO');

                    $('#btnRelocationYes').removeClass().addClass('btn btn-light');
                    $('#btnRelocationNo').removeClass('btn-light').addClass('btn-danger');
                }

                if(decodedResponse.ReadyToWorkStatus == 0){
                    $('#lblReadyToWorkStatus').removeClass('text-muted');
                    $('#lblReadyToWorkStatus').addClass('text-success');
                    $('#lblReadyToWorkStatus').text('YES');

                    $('#btnReadyToWorkYes').removeClass('btn-light').addClass('btn-success');
                    $('#btnReadyToWorkNo').removeClass().addClass('btn btn-light');

                }
                else if(decodedResponse.ReadyToWorkStatus == 0){
                    $('#lblReadyToWorkStatus').removeClass('text-muted');
                    $('#lblReadyToWorkStatus').addClass('text-danger');
                    $('#lblReadyToWorkStatus').text('NO');

                    $('#btnReadyToWorkYes').removeClass().addClass('btn btn-light');
                    $('#btnReadyToWorkNo').removeClass('btn-light').addClass('btn-danger');
                }
            }
        },
        error: function(){
            $.notify({
                // options
                icon: 'flaticon-error',
                title: 'Failed to Connect to Server!',
                message: 'Something went wrong while connecting to server. Please try again later.'
            },{
                // settings
                type: 'danger'
            });
        }
    });
}

function fillJobTitleOptions(){
    $.ajax({
        url: '../PHPFiles/Applicant/Profile/selectionjobtitleget.php',
        type: 'GET',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Job Titles!',
                    message: 'Something went wrong while retrieving job titles. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Job Titles!',
                    message: 'Something went wrong while retrieving job titles. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Job Titles Found!',
                    message: 'No Saved Job Titles. Please try and check again later or kindly contact the administrator.'
                },{
                    // settings
                    type: 'info'
                });
            }
            else{
                $('#cbJobTitles').html(response);
            }
        },
        error: function(){
            $.notify({
                // options
                icon: 'flaticon-error',
                title: 'Failed to Connect to Server!',
                message: 'Something went wrong while connecting to server. Please try again later.'
            },{
                // settings
                type: 'danger'
            });
        }
    });
}
function fillWorkScheduleOptions(){
    $.ajax({
        url: '../PHPFiles/Applicant/Profile/selectionworkscheduleget.php',
        type: 'GET',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Work Schedules!',
                    message: 'Something went wrong while retrieving work schedules. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Work Schedules!',
                    message: 'Something went wrong while retrieving work schedules. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Work Schedules Found!',
                    message: 'No Saved Work Schedules. Please try and check again later or kindly contact the administrator.'
                },{
                    // settings
                    type: 'info'
                });
            }
            else{
                $('#cbWorkSchedule').html(response);
            }
        },
        error: function(){
            $.notify({
                // options
                icon: 'flaticon-error',
                title: 'Failed to Connect to Server!',
                message: 'Something went wrong while connecting to server. Please try again later.'
            },{
                // settings
                type: 'danger'
            });
        }
    });
}

function RelocationYes(){
    $('#btnRelocationYes').removeClass('btn-light').addClass('btn-success');
    $('#btnRelocationNo').removeClass().addClass('btn btn-light');
}
function RelocationNo(){
    $('#btnRelocationYes').removeClass().addClass('btn btn-light');
    $('#btnRelocationNo').removeClass('btn-light').addClass('btn-danger');
}
function saveRelocation(){
    $('#btnSaveRelocation').addClass('is-loading');
    $('#btnSaveRelocation').prop('disabled', true);
    $('#btnSCloseRelocation').prop('disabled', true);
    $('#btnRelocationYes').prop('disabled', true);
    $('#btnRelocationNo').prop('disabled', true);

    var flagResult = 2;

    if($("#btnRelocationYes").hasClass("btn-success")){
        flagResult = 0;
    }
    else if($("#btnRelocationNo").hasClass("btn-danger")){
        flagResult = 1;
    }
    else{
        flagResult = 2;
    }

    if(flagResult == 0 || flagResult == 1){
        $.ajax({
            type: 'POST',
            url: '../PHPFiles/Applicant/Profile/preferencerelocationsave.php',
            datatype: 'html',
            data: {
                FlagResult: flagResult
            },
            success: function(response){
                if(response == '0'){
                    swal({
                        title: 'Preference Saved Successfully!',
                        text: "Your preference on 'Relocation' has been saved successfully.",
                        icon: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#btnSaveRelocation').removeClass('is-loading');
                        $('#btnSaveRelocation').prop('disabled', false);
                        $('#btnCloseRelocation').prop('disabled', false);
                        $('#btnRelocationYes').prop('disabled', false);
                        $('#btnRelocationNo').prop('disabled', false);
                    });
                }
                else if(response = '1'){
                    swal({
                        title: 'Failed to Save Preference!',
                        text: "Something went wrong while trying to save your preference. Data handling failed, please try again later.",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#btnSaveRelocation').removeClass('is-loading');
                        $('#btnSaveRelocation').prop('disabled', false);
                        $('#btnCloseRelocation').prop('disabled', false);
                        $('#btnRelocationYes').prop('disabled', false);
                        $('#btnRelocationNo').prop('disabled', false);
                    });
                }
                else{
                    swal({
                        title: 'Failed to Save Preference!',
                        text: "Something went wrong while trying to save your preference. Please try again later.",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#btnSaveRelocation').removeClass('is-loading');
                        $('#btnSaveRelocation').prop('disabled', false);
                        $('#btnCloseRelocation').prop('disabled', false);
                        $('#btnRelocationYes').prop('disabled', false);
                        $('#btnRelocationNo').prop('disabled', false);
                    });
                }
            },
            error: function(){
                swal({
                    title: 'Failed to Connect to Server!',
                    text: "Something went wrong while trying to connect to the server. Please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnSaveRelocation').removeClass('is-loading');
                    $('#btnSaveRelocation').prop('disabled', false);
                    $('#btnCloseRelocation').prop('disabled', false);
                    $('#btnRelocationYes').prop('disabled', false);
                    $('#btnRelocationNo').prop('disabled', false);
                });
            }
        });
    }
    else{
        swal({
            title: 'Invalid Input!',
            text: "You must select between 'YES' or 'NO'.",
            icon: 'warning',
            buttons : {
                confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                }
            }
        }).then(function(){
            $('#btnSaveRelocation').removeClass('is-loading');
            $('#btnSaveRelocation').prop('disabled', false);
            $('#btnCloseRelocation').prop('disabled', false);
            $('#btnRelocationYes').prop('disabled', false);
            $('#btnRelocationNo').prop('disabled', false);
        });
    }
}

function ReadyToWorkYes(){
    $('#btnReadyToWorkYes').removeClass('btn-light').addClass('btn-success');
    $('#btnReadyToWorkNo').removeClass().addClass('btn btn-light');
}
function ReadyToWorkNo(){
    $('#btnReadyToWorkYes').removeClass().addClass('btn btn-light');
    $('#btnReadyToWorkNo').removeClass('btn-light').addClass('btn-danger');
}
function saveReadyToWork(){
    $('#btnSaveReadyToWork').addClass('is-loading');
    $('#btnSaveReadyToWork').prop('disabled', true);
    $('#btnCloseReadyToWork').prop('disabled', true);
    $('#btnReadyToWorkYes').prop('disabled', true);
    $('#btnReadyToWorkNo').prop('disabled', true);

    var flagResult = 2;

    if($("#btnReadyToWorkYes").hasClass("btn-success")){
        flagResult = 0;
    }
    else if($("#btnReadyToWorkNo").hasClass("btn-danger")){
        flagResult = 1;
    }
    else{
        flagResult = 2;
    }

    if(flagResult == 0 || flagResult == 1){
        $.ajax({
            type: 'POST',
            url: '../PHPFiles/Applicant/Profile/preferencereadytoworksave.php',
            datatype: 'html',
            data: {
                FlagResult: flagResult
            },
            success: function(response){
                if(response == '0'){
                    swal({
                        title: 'Preference Saved Successfully!',
                        text: "Your preference on 'Ready To Work' has been saved successfully.",
                        icon: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#btnSaveReadyToWork').removeClass('is-loading');
                        $('#btnSaveReadyToWork').prop('disabled', false);
                        $('#btnCloseReadyToWork').prop('disabled', false);
                        $('#btnReadyToWorkYes').prop('disabled', false);
                        $('#btnReadyToWorkNo').prop('disabled', false);
                    });
                }
                else if(response = '1'){
                    swal({
                        title: 'Failed to Save Preference!',
                        text: "Something went wrong while trying to save your preference. Data handling failed, please try again later.",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#btnSaveReadyToWork').removeClass('is-loading');
                        $('#btnSaveReadyToWork').prop('disabled', false);
                        $('#btnCloseReadyToWork').prop('disabled', false);
                        $('#btnReadyToWorkYes').prop('disabled', false);
                        $('#btnReadyToWorkNo').prop('disabled', false);
                    });
                }
                else{
                    swal({
                        title: 'Failed to Save Preference!',
                        text: "Something went wrong while trying to save your preference. Please try again later.",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#btnSaveReadyToWork').removeClass('is-loading');
                        $('#btnSaveReadyToWork').prop('disabled', false);
                        $('#btnCloseReadyToWork').prop('disabled', false);
                        $('#btnReadyToWorkYes').prop('disabled', false);
                        $('#btnReadyToWorkNo').prop('disabled', false);
                    });
                }
            },
            error: function(){
                swal({
                    title: 'Failed to Connect to Server!',
                    text: "Something went wrong while trying to connect to the server. Please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnSaveReadyToWork').removeClass('is-loading');
                    $('#btnSaveReadyToWork').prop('disabled', false);
                    $('#btnCloseReadyToWork').prop('disabled', false);
                    $('#btnReadyToWorkYes').prop('disabled', false);
                    $('#btnReadyToWorkNo').prop('disabled', false);
                });
            }
        });
    }
    else{
        swal({
            title: 'Invalid Input!',
            text: "You must select between 'YES' or 'NO'.",
            icon: 'warning',
            buttons : {
                confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                }
            }
        }).then(function(){
            $('#btnSaveReadyToWork').removeClass('is-loading');
            $('#btnSaveReadyToWork').prop('disabled', false);
            $('#btnCloseReadyToWork').prop('disabled', false);
            $('#btnReadyToWorkYes').prop('disabled', false);
            $('#btnReadyToWorkNo').prop('disabled', false);
        });
    }
}


function openJobTitles(){
    
}
function openWorkSchedule(){
    
}
function openLocation(){
    
}
function openSalaryRange(){
    
}
function openRelocation(){
    $('#btnEditRelocation').addClass('is-loading');
    $('#btnEditRelocation').prop('disabled', true);

    if($('#lblRelocation').text() == 'YES'){
        $('#btnRelocationYes').removeClass('btn-light').addClass('btn btn-success');
        $('#btnRelocationNo').removeClass().addClass('btn btn-light');
    }
    else if($('#lblRelocation').text() == 'NO'){
        $('#btnRelocationYes').removeClass().addClass('btn btn-light');
        $('#btnRelocationNo').removeClass('btn-light').addClass('btn-danger');
    }

    $('#modalPreferredRelocation').modal({
        backdrop: 'static',
        keyboard: false,
        focus: true,
        show: true
    });

    $('#btnEditRelocation').removeClass('is-loading');
    $('#btnEditRelocation').prop('disabled', false);
}
function openReadyToWork(){
    $('#btnEditReadyToWork').addClass('is-loading');
    $('#btnEditReadyToWork').prop('disabled', true);

    if($('#lblReadyToWorkStatus').text() == 'YES'){
        $('#btnReadyToWorkYes').removeClass('btn-light').addClass('btn btn-success');
        $('#btnReadyToWorkNo').removeClass().addClass('btn btn-light');
    }
    else if($('#lblReadyToWorkStatus').text() == 'NO'){
        $('#btnReadyToWorkYes').removeClass().addClass('btn btn-light');
        $('#btnReadyToWorkNo').removeClass('btn-light').addClass('btn-danger');
    }

    $('#modalPreferredReadyToWork').modal({
        backdrop: 'static',
        keyboard: false,
        focus: true,
        show: true
    });

    $('#btnEditReadyToWork').removeClass('is-loading');
    $('#btnEditReadyToWork').prop('disabled', false);
}


/*
    Profile
*/
function fillProfileInfo(){
    $.ajax({
        type: "GET",
        dataType: "html",
        url: "../PHPFiles/profile_data_retrieve.php",
        success: function(data){
            var decodedData = JSON.parse(data);
            $('#applicantName').text(decodedData['FullName']);
            $('#pf-email span').text(decodedData['EmailAddress']);
            $('#pf-phone span').text(decodedData['Phone']);
            $('#pf-country span').text(decodedData['Country']);

            // For now, hide the file input when webpage loaded
            var resumeInput = document.getElementById('resumeUploader');
            resumeInput.style.display = 'none'; // Hide the file input

        }
    });

}

/*
    - BUTTON THAT EXIST THAT WILL SHOW THE RESUME INPUT
    - IF RESUME ALREADY EXISTS, THEN ASKS IF THE APPLICANT WANTS TO REPLACE THE FILE
    - BOTH SCENARIOS WILL LEAD TO RESUME INPUT UNHIDING
    - BUTTON WILL HIDE 
    - IF FILE SUBMITTION IS FINISHED, HIDE FILE INPUT AND SHOW THE BUTTON AGAIN
*/


function uploadResume(){

    /*
        - IF EXISTING RESUME FOUND
        - DISPLAY IN INPUT
        - IF USER CLICKS UPLOAD, WARN THERE IS RESUME
        - IF USER WANTS TO REUPLOAD A RESUME, SHOW 
    */

    // resumeUpload
    if(isResumeExist){ // Check if user has an existing Resume already
        swal({
            title: "Existing Resume Found!",
            text: "Your Account already has an existing Resume, Would you like to replace it with another?",
            icon: "warning",
            buttons: {
                confirm: {
                  text: 'Yes, i have a new resume!',
                  value: true,
                  visible: true,
                  className: 'btn-primary',
                },
                cancel: {
                  text: 'Cancel',
                  value: false,
                  visible: true,
                  className: 'btn-danger',
                }
              }
          }).then((result) => {
            if (result) {

                console.log("confirmed");
                var resumeInput = document.getElementById('resumeUploader');
                var btnUpload = document.getElementById('submitResume');

                resumeInput.style.display = 'block'; 
                btnUpload.style.display = 'none';  // Hide the btn for uploadng
            }
          });
    }else{
        var resumeInput = document.getElementById('resumeUploader');
        var btnUpload = document.getElementById('submitResume');

        resumeInput.style.display = 'block'; 
        btnUpload.style.display = 'none';  // Hide the btn for uploading
    }
}
// when button is clicked
function verifyUploadResume(){

    // Ask first if they want to Upload the resume
    swal({
        title: 'Are you sure?',
        text: "Do you want to upload this file?",
        icon: 'warning',
        buttons: {
          confirm: {
            text: 'Yes, upload it!',
            value: true,
            visible: true,
            className: 'btn-primary',
          },
          cancel: {
            text: 'Cancel',
            value: false,
            visible: true,
            className: 'btn-danger',
          }
        }
      }).then((value) => {
        if (value) {
            process_uploadResume();
        } else {
          // Handle cancel action here
          
        }
      });

}

function process_uploadResume(){
    var resumeFile = $('#resumeUploader')[0].files[0];

    

    var formDataQA = new FormData();
    formDataQA.append("ResumeFile", resumeFile);


    $.ajax({
        type: "POST",
        dataType: "html",
        data: formDataQA,
        url: "../PHPFiles/Applicant/submitResume.php",
        contentType: false,
        processData: false,
        success: function(data){
            console.log(data);
            if(data == 0){
                swal({
                    title: 'Resume Submitted!',
                    text: "Resume has been saved",
                    icon: 'success',
                    buttons : {
                    confirm: {
                        text : 'Okay',
                        className : 'btn btn-success'
                    }
                    }
                }).then(function(){
                    var resumeInput = document.getElementById('resumeUploader');
                    var btnUpload = document.getElementById('submitResume');

                    resumeInput.style.display = 'none';
                    btnUpload.style.display = 'block';  // Hide the btn for uploading
                });
            }
            else if(data == 2){
                alert(data);
            }
            else if(data == 3){
                alert(data);
            }
            else{
                alert(data);
            }
        }
    });
}

function isResumeExist(){
    var resume_exists = false;

    $.ajax({
        type: "POST",
        dataType: "html",
        data: formDataQA,
        url: "../PHPFiles/Applicant/submitResume.php",
        contentType: false,
        processData: false,
        success: function(data){
            if(data != null){
                alert("file found");
                resume_exists = true;
            }
        }
    });

    return resume_exists;
}