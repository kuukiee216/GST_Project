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
                    $('#lblRelocation').removeClass();
                    $('#lblRelocation').addClass('font-weight-bold text-success');
                    $('#lblRelocation').text('YES');

                    $('#btnRelocationYes').removeClass('btn-light').addClass('btn-success');
                    $('#btnRelocationNo').removeClass().addClass('btn btn-light');
                }
                else if(decodedResponse.RelocationStatus == 1){
                    $('#lblRelocation').removeClass();
                    $('#lblRelocation').addClass('font-weight-bold text-danger');
                    $('#lblRelocation').text('NO');

                    $('#btnRelocationYes').removeClass().addClass('btn btn-light');
                    $('#btnRelocationNo').removeClass('btn-light').addClass('btn-danger');
                }

                if(decodedResponse.ReadyToWorkStatus == 0){
                    $('#lblReadyToWorkStatus').removeClass();
                    $('#lblReadyToWorkStatus').addClass('font-weight-bold text-success');
                    $('#lblReadyToWorkStatus').text('YES');

                    $('#btnReadyToWorkYes').removeClass('btn-light').addClass('btn-success');
                    $('#btnReadyToWorkNo').removeClass().addClass('btn btn-light');

                }
                else if(decodedResponse.ReadyToWorkStatus == 1){
                    $('#lblReadyToWorkStatus').removeClass();
                    $('#lblReadyToWorkStatus').addClass('font-weight-bold text-danger');
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
function fillPreferredJobTitles(){
    $.ajax({
        url: '../PHPFiles/Applicant/Profile/preferredjobtitlesget.php',
        type: 'GET',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Preferred Job Titles!',
                    message: 'Something went wrong while retrieving preferred job titles. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Preferred Job Titles',
                    message: 'Something went wrong while retrieving preferred job titles. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Preferred Job Titles Found!',
                    message: 'There is no preferred job titles found. Please try and check again later.'
                },{
                    // settings
                    type: 'info'
                });

                var noPrefJobTitle = '<h5><i>No Preferred Job Titles.</i></h5>';
                $('#listJobTitles').html(noPrefJobTitle);
            }
            else{
                $('#listJobTitles').html(response);
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
function fillPreferredLocations(){
    $.ajax({
        url: '../PHPFiles/Applicant/Profile/preferredlocationsget.php',
        type: 'GET',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Preferred Locations!',
                    message: 'Something went wrong while retrieving preferred locations. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Preferred Locations!',
                    message: 'Something went wrong while retrieving preferred locations. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Preferred Locations Found!',
                    message: 'There is no preferred locations found. Please try and check again later.'
                },{
                    // settings
                    type: 'info'
                });

                var noPrefLocation = '<h5><i>No Preferred Locations.</i></h5>';
                $('#listLocations').html(noPrefLocation);
            }
            else{
                $('#listLocations').html(response);
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
function fillResumeList(){
    $.ajax({
        url: '../PHPFiles/Applicant/Profile/resumelistget.php',
        type: 'GET',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Resume List!',
                    message: 'Something went wrong while retrieving resume list. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Resume List!',
                    message: 'Something went wrong while retrieving resume list. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Resume List Found!',
                    message: 'There is no resume list found. Please try and check again later.'
                },{
                    // settings
                    type: 'info'
                });

                var noResume = '<tr><td colspan="3">No Uploaded/Saved Resume.</td></tr>';
                $('#listResumes').html(noResume);
            }
            else{
                $('#listResumes').html(response);
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
function fillLocationCountryOptions(){
    $.ajax({
        url: '../PHPFiles/Applicant/Profile/selectionlocationcountryget.php',
        type: 'GET',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Country Location Options!',
                    message: 'Something went wrong while retrieving country location options. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Country Location Options!',
                    message: 'Something went wrong while retrieving country location options. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Country Location Options Found!',
                    message: 'No Saved Country Location Options. Please try and check again later or kindly contact the administrator.'
                },{
                    // settings
                    type: 'info'
                });
            }
            else{
                $('#cbCountryOption').html(response);
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
function fillLocationProvinceOptions(){

    var cID = $('#cbCountryOption').val();

    $.ajax({
        url: '../PHPFiles/Applicant/Profile/selectionlocationprovinceget.php',
        type: 'POST',
        datatype: 'html',
        data: {
            CountryID: cID
        },
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Province Location Options!',
                    message: 'Something went wrong while retrieving province location options. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Province Location Options!',
                    message: 'Something went wrong while retrieving province location options. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Province Location Options Found!',
                    message: 'No Saved Province Location Options. Please try and check again later or kindly contact the administrator.'
                },{
                    // settings
                    type: 'info'
                });
            }
            else{
                $('#cbProvinceOption').html(response);
                $('#cbProvinceOption').prop('disabled', false);
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
function fillLocationCityOptions(){

    var pID = $('#cbProvinceOption').val();

    $.ajax({
        url: '../PHPFiles/Applicant/Profile/selectionlocationcityget.php',
        type: 'POST',
        datatype: 'html',
        data: {
            ProvinceID: pID
        },
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve City Location Options!',
                    message: 'Something went wrong while retrieving city location options. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve City Location Options!',
                    message: 'Something went wrong while retrieving city location options. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Province City Options Found!',
                    message: 'No Saved Province City Options. Please try and check again later or kindly contact the administrator.'
                },{
                    // settings
                    type: 'info'
                });
            }
            else{
                $('#cbCityOption').html(response);
                $('#cbCityOption').prop('disabled', false);
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

/*
    RESUME LIST
*/
function viewApplicantResume(ID){
    var rID = ID.replace('btnViewResume','');

    $('#'+ID).addClass('is-loading');
    $('#'+ID).prop('disabled', true);
    $('#btnRemoveResume'+rID).prop('disabled', true);

    $.ajax({
        url: '../PHPFiles/Applicant/Profile/resumelistview.php',
        type: 'POST',
        datatype: 'html',
        data: {
            ApplicantDocumentID: rID
        },
        success: function(response){
            if(response == '1'){
                swal({
                    title: 'Failed to Retrieve Resume List!',
                    text: "Something went wrong while retrieving resume list. Data handling failed, please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
                    $('#btnRemoveResume'+rID).prop('disabled', false);
                });
            }
            else if(response == '2'){
                swal({
                    title: 'Failed to Retrieve Resume List!',
                    text: "Something went wrong while retrieving resume list. Please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
                    $('#btnRemoveResume'+rID).prop('disabled', false);
                });
            }
            else if(response == '3'){
                swal({
                    title: 'No Resume Document Found!',
                    text: "Could not find your resume document.",
                    icon: 'info',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
                    $('#btnRemoveResume'+rID).prop('disabled', false);
                });
            }
            else{
                var decodedResponse = JSON.parse(response);
                window.open(decodedResponse.ResumeURL, '_blank');

                $('#'+ID).removeClass('is-loading');
                $('#'+ID).prop('disabled', false);
                $('#btnRemoveResume'+rID).prop('disabled', false);
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
                $('#'+ID).removeClass('is-loading');
                $('#'+ID).prop('disabled', false);
                $('#btnRemoveResume'+rID).prop('disabled', false);
            });
        }
    });
}
function removeApplicantResume(ID){
    var rID = ID.replace('btnRemoveResume','');

    $('#'+ID).addClass('is-loading');
    $('#'+ID).prop('disabled', true);
    $('#btnViewResume'+rID).prop('disabled', true);

    $.ajax({
        type: 'POST',
        url: '../PHPFiles/Applicant/Profile/resumelistremove.php',
        datatype: 'html',
        data: {
            ApplicantDocumentID: rID
        },
        success: function(response){
            if(response == '0'){
                swal({
                    title: 'Resume Removed Successfully!',
                    text: "Your resume has been removed successfully.",
                    icon: 'success',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    fillResumeList();
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
                    $('#btnViewResume'+rID).prop('disabled', false);
                });
            }
            else if(response = '1'){
                swal({
                    title: 'Failed to Remove Resume!',
                    text: "Something went wrong while trying to remove your resume. Data handling failed, please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
                    $('#btnViewResume'+rID).prop('disabled', false);
                });
            }
            else{
                swal({
                    title: 'Failed to Remove Resume!',
                    text: "Something went wrong while trying to remove your resume. Please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
                    $('#btnViewResume'+rID).prop('disabled', false);
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
                $('#'+ID).removeClass('is-loading');
                $('#'+ID).prop('disabled', false);
                $('#btnViewResume'+rID).prop('disabled', false);
            });
        }
    });
}

function uploadResume(){
    
    $('#btnUploadResume').addClass('is-loading');
    $('#btnUploadResume').prop('disabled', true);
    $('#btnCloseUploadResume').prop('disabled', true);
    $('#fdResumeUpload').prop('disabled', true);

    if($('#fdResumeUpload')[0].files.length > 0){
        var fdResume = $('#fdResumeUpload')[0].files[0];

        var formDataQA = new FormData();
        formDataQA.append("ResumeDocument", fdResume);
    
        $.ajax({
            type: 'POST',
            url: '../PHPFiles/Applicant/Profile/resumeupload.php',
            datatype: 'html',
            data: formDataQA,
            contentType: false,
            processData: false,
            success: function(response){
                if(response == '0'){
                    swal({
                        title: 'Resume Uploaded Successfully!',
                        text: "Your resume has been uploaded successfully. This can now be used in your future application.",
                        icon: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#fdResumeUpload').val('');
                        fillResumeList();
    
                        $('#btnUploadResume').removeClass('is-loading');
                        $('#btnUploadResume').prop('disabled', false);
                        $('#btnCloseUploadResume').prop('disabled', false);
                        $('#fdResumeUpload').prop('disabled', false);
    
                        $('#btnCloseUploadResume').click();
                    });
                }
                else if(response == '1'){
                    swal({
                        title: 'Failed to Upload Resume!',
                        text: "Something went wrong while trying to upload your resume. Data handling failed, please try again later.",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#fdResumeUpload').val('');
    
                        $('#btnUploadResume').removeClass('is-loading');
                        $('#btnUploadResume').prop('disabled', false);
                        $('#btnCloseUploadResume').prop('disabled', false);
                        $('#fdResumeUpload').prop('disabled', false);
                    });
                }
                else if(response == '3'){
                    swal({
                        title: 'Invalid Document File Type!',
                        text: "Please make sure that the document you will upload is a PDF file.",
                        icon: 'warning',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#fdResumeUpload').val('');
    
                        $('#btnUploadResume').removeClass('is-loading');
                        $('#btnUploadResume').prop('disabled', false);
                        $('#btnCloseUploadResume').prop('disabled', false);
                        $('#fdResumeUpload').prop('disabled', false);
                    });
                }
                else{
                    swal({
                        title: 'Failed to Upload Resume!',
                        text: "Something went wrong while trying to upload your resume. Please try again later.",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#fdResumeUpload').val('');
    
                        $('#btnUploadResume').removeClass('is-loading');
                        $('#btnUploadResume').prop('disabled', false);
                        $('#btnCloseUploadResume').prop('disabled', false);
                        $('#fdResumeUpload').prop('disabled', false);
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
                    $('#btnUploadResume').removeClass('is-loading');
                    $('#btnUploadResume').prop('disabled', false);
                    $('#btnCloseUploadResume').prop('disabled', false);
                    $('#fdResumeUpload').prop('disabled', false);
                });
            }
        });
    }
    else{
        swal({
            title: 'No File Selected!',
            text: "Please select your resume file document before clicking 'submit'.",
            icon: 'warning',
            buttons : {
                confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                }
            }
        }).then(function(){
            $('#btnUploadResume').removeClass('is-loading');
            $('#btnUploadResume').prop('disabled', false);
            $('#btnCloseUploadResume').prop('disabled', false);
            $('#fdResumeUpload').prop('disabled', false);
        });
    }
}

/*
    JOB TITLE
*/
function savePreferredJobTitles(ID){
    $('#btnAddJobTitle').addClass('is-loading');
    $('#btnAddJobTitle').prop('disabled', true);
    $('#btnCloseJobTitle').prop('disabled', true);
    $('#cbJobTitles').prop('disabled', true);

    var pjtID = $('#cbJobTitles').val();

    $.ajax({
        type: 'POST',
        url: '../PHPFiles/Applicant/Profile/preferredjobtitlesave.php',
        datatype: 'html',
        data: {
            PreferredJobTitleID: pjtID
        },
        success: function(response){
            if(response == '0'){
                swal({
                    title: 'Preferred Job Title Saved Successfully!',
                    text: "Your preferred job title has been saved successfully.",
                    icon: 'success',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#cbJobTitles').prop('selectedIndex', 0);
                    fillJobTitleOptions();
                    fillPreferredJobTitles();
                    $('#btnAddJobTitle').removeClass('is-loading');
                    $('#btnAddJobTitle').prop('disabled', false);
                    $('#btnCloseJobTitle').prop('disabled', false);
                    $('#cbJobTitles').prop('disabled', false);
                    
                    $('#btnCloseJobTitle').click();
                });
            }
            else if(response = '1'){
                swal({
                    title: 'Failed to Save Preferred Job Title!',
                    text: "Something went wrong while trying to save your preferred job title. Data handling failed, please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnAddJobTitle').removeClass('is-loading');
                    $('#btnAddJobTitle').prop('disabled', false);
                    $('#btnCloseJobTitle').prop('disabled', false);
                    $('#cbJobTitles').prop('disabled', false);
                });
            }
            else{
                swal({
                    title: 'Failed to Save Preferred Job Title!',
                    text: "Something went wrong while trying to save your preferred job title. Please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnAddJobTitle').removeClass('is-loading');
                    $('#btnAddJobTitle').prop('disabled', false);
                    $('#btnCloseJobTitle').prop('disabled', false);
                    $('#cbJobTitles').prop('disabled', false);
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
                $('#btnAddJobTitle').removeClass('is-loading');
                $('#btnAddJobTitle').prop('disabled', false);
                $('#btnCloseJobTitle').prop('disabled', false);
                $('#cbJobTitles').prop('disabled', false);
            });
        }
    });
}
function removePreferredJobTitles(ID){
    $('#'+ID).addClass('is-loading');
    $('#'+ID).prop('disabled', true);

    var pjtID = ID.replace('btnRemovePreferredJobTitle','');
    var pjtName = $('#'+ID).text();

    $.ajax({
        type: 'POST',
        url: '../PHPFiles/Applicant/Profile/preferredjobtitleremove.php',
        datatype: 'html',
        data: {
            PreferredJobTitleID: pjtID
        },
        success: function(response){
            if(response == '0'){
                swal({
                    title: 'Preferred Job Title Removed Successfully!',
                    text: "Your preferred job title '"+pjtName+"' has been removed successfully.",
                    icon: 'success',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    fillJobTitleOptions();
                    fillPreferredJobTitles();
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
                });
            }
            else if(response = '1'){
                swal({
                    title: 'Failed to Remove Preferred Job Title!',
                    text: "Something went wrong while trying to remove your preferred job title. Data handling failed, please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
                });
            }
            else{
                swal({
                    title: 'Failed to Remove Preferred Job Title!',
                    text: "Something went wrong while trying to remove your preferred job title. Please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
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
                $('#'+ID).removeClass('is-loading');
                $('#'+ID).prop('disabled', false);
            });
        }
    });
}

/*
    LOCATION
*/
function savePreferredLocation(){   
    $('#btnSavePreferredLocation').addClass('is-loading');
    $('#btnSavePreferredLocation').prop('disabled', true);
    $('#btnClosePreferredLocation').prop('disabled', true);
    $('#cbCountryOption').prop('disabled', true);
    $('#cbProvinceOption').prop('disabled', true);
    $('#cbCityOption').prop('disabled', true);

    var countryID = $('#cbCountryOption').val();
    var provinceID = $('#cbProvinceOption').val();
    var cityID = $('#cbCityOption').val();

    if(countryID > 0){
        if(provinceID > 0){
            if(cityID > 0){
                $.ajax({
                    type: 'POST',
                    url: '../PHPFiles/Applicant/Profile/preferredlocationsave.php',
                    datatype: 'html',
                    data: {
                        CountryID: countryID,
                        ProvinceID: provinceID,
                        CityID: cityID
                    },
                    success: function(response){
                        if(response == '0'){
                            swal({
                                title: 'Preferred Location Saved Successfully!',
                                text: "Your preferred location has been saved successfully.",
                                icon: 'success',
                                buttons : {
                                    confirm: {
                                        text : 'Okay',
                                        className : 'btn btn-success'
                                    }
                                }
                            }).then(function(){
                                $('#btnSavePreferredLocation').removeClass('is-loading');
                                $('#btnSavePreferredLocation').prop('disabled', false);
                                $('#btnClosePreferredLocation').prop('disabled', false);
                                $('#cbCountryOption').prop('disabled', false);
                                $('#cbProvinceOption').prop('disabled', false);
                                $('#cbCityOption').prop('disabled', false);

                                $('#cbCountryOption').prop('selectedIndex', 0);
                                $('#cbProvinceOption').prop('selectedIndex', 0);
                                $('#cbCityOption').prop('selectedIndex', 0);

                                fillPreferredLocations();
                                $('#btnClosePreferredLocation').click();
                            });
                        }
                        else if(response = '1'){
                            swal({
                                title: 'Failed to Save Preferred Location!',
                                text: "Something went wrong while trying to save your preferred location. Data handling failed, please try again later.",
                                icon: 'error',
                                buttons : {
                                    confirm: {
                                        text : 'Okay',
                                        className : 'btn btn-success'
                                    }
                                }
                            }).then(function(){
                                $('#btnSavePreferredLocation').removeClass('is-loading');
                                $('#btnSavePreferredLocation').prop('disabled', false);
                                $('#btnClosePreferredLocation').prop('disabled', false);
                                $('#cbCountryOption').prop('disabled', false);
                                $('#cbProvinceOption').prop('disabled', false);
                                $('#cbCityOption').prop('disabled', false);
                            });
                        }
                        else{
                            swal({
                                title: 'Failed to Save Preferred Location!',
                                text: "Something went wrong while trying to save your preferred location. Please try again later.",
                                icon: 'error',
                                buttons : {
                                    confirm: {
                                        text : 'Okay',
                                        className : 'btn btn-success'
                                    }
                                }
                            }).then(function(){
                                $('#btnSavePreferredLocation').removeClass('is-loading');
                                $('#btnSavePreferredLocation').prop('disabled', false);
                                $('#btnClosePreferredLocation').prop('disabled', false);
                                $('#cbCountryOption').prop('disabled', false);
                                $('#cbProvinceOption').prop('disabled', false);
                                $('#cbCityOption').prop('disabled', false);
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
                            $('#btnSavePreferredLocation').removeClass('is-loading');
                            $('#btnSavePreferredLocation').prop('disabled', false);
                            $('#btnClosePreferredLocation').prop('disabled', false);
                            $('#cbCountryOption').prop('disabled', false);
                            $('#cbProvinceOption').prop('disabled', false);
                            $('#cbCityOption').prop('disabled', false);
                        });
                    }
                });
            }
            else{
                swal({
                    title: 'Invalid City Selection!',
                    text: "Please select a city from the option before saving.",
                    icon: 'success',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnSavePreferredLocation').removeClass('is-loading');
                    $('#btnSavePreferredLocation').prop('disabled', false);
                    $('#btnClosePreferredLocation').prop('disabled', false);
                    $('#cbCountryOption').prop('disabled', false);
                    $('#cbProvinceOption').prop('disabled', false);
                    $('#cbCityOption').prop('disabled', false);
                });
            }
        }
        else{
            swal({
                title: 'Invalid Province Selection!',
                text: "Please select a province from the option before saving.",
                icon: 'success',
                buttons : {
                    confirm: {
                        text : 'Okay',
                        className : 'btn btn-success'
                    }
                }
            }).then(function(){
                $('#btnSavePreferredLocation').removeClass('is-loading');
                $('#btnSavePreferredLocation').prop('disabled', false);
                $('#btnClosePreferredLocation').prop('disabled', false);
                $('#cbCountryOption').prop('disabled', false);
                $('#cbProvinceOption').prop('disabled', false);
                $('#cbCityOption').prop('disabled', false);
            });
        }
    }
    else{
        swal({
            title: 'Invalid Country Selection!',
            text: "Please select a country from the option before saving.",
            icon: 'success',
            buttons : {
                confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                }
            }
        }).then(function(){
            $('#btnSavePreferredLocation').removeClass('is-loading');
            $('#btnSavePreferredLocation').prop('disabled', false);
            $('#btnClosePreferredLocation').prop('disabled', false);
            $('#cbCountryOption').prop('disabled', false);
            $('#cbProvinceOption').prop('disabled', false);
            $('#cbCityOption').prop('disabled', false);
        });
    }
}
function removePreferredLocations(ID){
    $('#'+ID).addClass('is-loading');
    $('#'+ID).prop('disabled', true);

    var plID = ID.replace('btnRemovePreferredLocation','');
    var plName = $('#'+ID).text();

    $.ajax({
        type: 'POST',
        url: '../PHPFiles/Applicant/Profile/preferredlocationremove.php',
        datatype: 'html',
        data: {
            PreferredLocationID: plID
        },
        success: function(response){
            if(response == '0'){
                swal({
                    title: 'Preferred Location Removed Successfully!',
                    text: "Your preferred Location '"+plName+"' has been removed successfully.",
                    icon: 'success',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    fillPreferredLocations();
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
                });
            }
            else if(response = '1'){
                swal({
                    title: 'Failed to Remove Preferred Location!',
                    text: "Something went wrong while trying to remove your preferred location. Data handling failed, please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
                });
            }
            else{
                swal({
                    title: 'Failed to Remove Preferred Location!',
                    text: "Something went wrong while trying to remove your preferred location. Please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
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
                $('#'+ID).removeClass('is-loading');
                $('#'+ID).prop('disabled', false);
            });
        }
    });
}

/*
    SALARY RANGE
*/
function savePreferredSalaryRange(){
    $('#btnSaveSalaryRange').addClass('is-loading');
    $('#btnSaveSalaryRange').prop('disabled', true);
    $('#btnCloseSalaryRange').prop('disabled', true);
    $('#txtMinimumSalaryRange').prop('disabled', true);
    $('#txtMaximumSalaryRange').prop('disabled', true);

    var txtMin = $('#txtMinimumSalaryRange').val();
    var txtMax = $('#txtMaximumSalaryRange').val();

    if(txtMin < txtMax){
        $.ajax({
            type: 'POST',
            url: '../PHPFiles/Applicant/Profile/preferencesalaryrangesave.php',
            datatype: 'html',
            data: {
                MinRange: txtMin,
                MaxRange: txtMax
            },
            success: function(response){
                if(response == '0'){
                    swal({
                        title: 'Preference Saved Successfully!',
                        text: "Your preference on 'Salary Range' has been saved successfully.",
                        icon: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        fillProfileData();

                        $('#txtMinimumSalaryRange').val('0');
                        $('#txtMaximumSalaryRange').val('1000');

                        $('#btnSaveSalaryRange').removeClass('is-loading');
                        $('#btnSaveSalaryRange').prop('disabled', false);
                        $('#btnCloseSalaryRange').prop('disabled', false);
                        $('#txtMinimumSalaryRange').prop('disabled', false);
                        $('#txtMaximumSalaryRange').prop('disabled', false);

                        $('#btnCloseSalaryRange').click();
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
                        $('#btnSaveSalaryRange').removeClass('is-loading');
                        $('#btnSaveSalaryRange').prop('disabled', false);
                        $('#btnCloseSalaryRange').prop('disabled', false);
                        $('#txtMinimumSalaryRange').prop('disabled', false);
                        $('#txtMaximumSalaryRange').prop('disabled', false);
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
                        $('#btnSaveSalaryRange').removeClass('is-loading');
                        $('#btnSaveSalaryRange').prop('disabled', false);
                        $('#btnCloseSalaryRange').prop('disabled', false);
                        $('#txtMinimumSalaryRange').prop('disabled', false);
                        $('#txtMaximumSalaryRange').prop('disabled', false);
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
                    $('#btnSaveSalaryRange').removeClass('is-loading');
                    $('#btnSaveSalaryRange').prop('disabled', false);
                    $('#btnCloseSalaryRange').prop('disabled', false);
                    $('#txtMinimumSalaryRange').prop('disabled', false);
                    $('#txtMaximumSalaryRange').prop('disabled', false);
                });
            }
        });
    }
    else{
        swal({
            title: 'Invalid Salary Range!',
            text: "Minimum salary must be less than the maximum salary. Kindly fix it and try again.",
            icon: 'error',
            buttons : {
                confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                }
            }
        }).then(function(){
            $('#btnSaveSalaryRange').removeClass('is-loading');
            $('#btnSaveSalaryRange').prop('disabled', false);
            $('#btnCloseSalaryRange').prop('disabled', false);
            $('#txtMinimumSalaryRange').prop('disabled', false);
            $('#txtMaximumSalaryRange').prop('disabled', false);
        });
    }
}

/*
    RELOCATION
*/
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
    $('#btnCloseRelocation').prop('disabled', true);
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
                        fillProfileData();

                        $('#btnSaveRelocation').removeClass('is-loading');
                        $('#btnSaveRelocation').prop('disabled', false);
                        $('#btnCloseRelocation').prop('disabled', false);
                        $('#btnRelocationYes').prop('disabled', false);
                        $('#btnRelocationNo').prop('disabled', false);

                        $('#btnCloseRelocation').click();
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

/*
    READY TO WORK
*/
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
                        fillProfileData();

                        $('#btnSaveReadyToWork').removeClass('is-loading');
                        $('#btnSaveReadyToWork').prop('disabled', false);
                        $('#btnCloseReadyToWork').prop('disabled', false);
                        $('#btnReadyToWorkYes').prop('disabled', false);
                        $('#btnReadyToWorkNo').prop('disabled', false);

                        $('#btnCloseReadyToWork').click();
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


function openUploadResume(){
    $('#btnUploadResumeModel').addClass('is-loading');
    $('#btnUploadResumeModel').prop('disabled', true);

    $('#modalUploadResume').modal({
        backdrop: 'static',
        keyboard: false,
        focus: true,
        show: true
    });

    $('#btnUploadResumeModel').removeClass('is-loading');
    $('#btnUploadResumeModel').prop('disabled', false);
}
function openJobTitles(){
    $('#btnEditPreferredJobTitle').addClass('is-loading');
    $('#btnEditPreferredJobTitle').prop('disabled', true);

    $('#modalPreferredJobTitle').modal({
        backdrop: 'static',
        keyboard: false,
        focus: true,
        show: true
    });

    $('#btnEditPreferredJobTitle').removeClass('is-loading');
    $('#btnEditPreferredJobTitle').prop('disabled', false);
}
function openWorkSchedule(){
    $('#modalPreferredWorkSchedule').modal({
        backdrop: 'static',
        keyboard: false,
        focus: true,
        show: true
    });
}
function openLocation(){
    $('#btnEditPreferredLocations').addClass('is-loading');
    $('#btnEditPreferredLocations').prop('disabled', true);

    $('#modalPreferredLocation').modal({
        backdrop: 'static',
        keyboard: false,
        focus: true,
        show: true
    });

    $('#btnEditPreferredLocations').removeClass('is-loading');
    $('#btnEditPreferredLocations').prop('disabled', false);
}
function openSalaryRange(){
    $('#btnEditSalaryRange').addClass('is-loading');
    $('#btnEditSalaryRange').prop('disabled', true);

    $('#modalPreferredSalaryRange').modal({
        backdrop: 'static',
        keyboard: false,
        focus: true,
        show: true
    });

    $('#btnEditSalaryRange').removeClass('is-loading');
    $('#btnEditSalaryRange').prop('disabled', false);
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