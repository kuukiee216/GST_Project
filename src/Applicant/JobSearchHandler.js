/*

    JOB SEARCH

*/
function triggerFilter(){
    var divFilter = $('#divFilter').attr('class'); //variable name (id or class)

    if(divFilter == 'container-fluid mt-3'){ //variablename = class
        $('#divFilter').addClass('d-none d-sm-none');
    }
    else{
        $('#divFilter').removeClass('d-none d-sm-none');
    }
}

function viewJobPostDetails(ID){
    $('#'+ID).addClass('is-loading');
    $('#'+ID).prop('disabled', true);

    var jpID = ID.replace('btnViewJobPosting','');
    
    location.href = "#"+jpID;

    $.ajax({
        type: 'POST',
        url: '../PHPFiles/Applicant/JobSearch/jobpostingdetailsget.php',
        datatype: 'html',
        data: {
            JobPostingID: jpID
        },
        success: function(response){
            if(response == '1'){
                swal({
                    title: 'Failed Retrieve Job Posting Details!',
                    text: "Something went wrong while retrieving job posting details. Data handling failed, please try again.",
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
            else if(response == '2'){
                swal({
                    title: 'Failed Retrieve Job Posting Details!',
                    text: "Something went wrong while retrieving job posting details. Please try again.",
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
            else if(response == '3'){
                swal({
                    title: 'No Job Posting Details Found!',
                    text: "There is no details regarding the job posting you selected. Please try again later, or contact the administrator for assistance.",
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
                });
            }
            else{
                var decodedResponse = JSON.parse(response);

                $('#lblJobTitle').text(decodedResponse.JobTitle);
                $('#lblCompanyName').text(decodedResponse.CompanyName);
                $('#lblLocation').text(decodedResponse.Location);
                $('#lblClassification').text(decodedResponse.Classification);
                $('#lblSubClassification').text(decodedResponse.SubClassification.replace(',', ', '));
                $('#lblJobSalary').text(decodedResponse.Salary);
                $('#lblJobSummary').text(decodedResponse.Summary);
                $('#listQualifications').html(decodedResponse.Qualifications);
                $('#listEducationExperiences').html(decodedResponse.Requirements);
                $('#listQuestionnaires').html(decodedResponse.Questionnaires);

                $('#divPostingList').addClass('d-none d-sm-none');
                $('#divPost').removeClass('d-none d-sm-none');

                $('#'+ID).removeClass('is-loading');
                $('#'+ID).prop('disabled', false);
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
function backToPostingList(){

    if (window.location.hash) {
        // Replace the hash with an empty string
        history.replaceState(null, null, ' ');
    }

    $('#divPostingList').removeClass('d-none d-sm-none');
    $('#divPost').addClass('d-none d-sm-none');
}

function BookmarkJobPosting(){
    $('#btnBookmarkJobPosting').addClass('is-loading');
    $('#btnBookmarkJobPosting').prop('disabled', true);

    var jpID = window.location.hash.replace('#','');

    $.ajax({
        type: 'POST',
        url: '../PHPFiles/Applicant/JobSearch/bookmarkjobposting.php',
        datatype: 'html',
        data: {
            JobPostingID: jpID
        },
        success: function(response){
            if(response == '0'){
                swal({
                    title: 'Job Posting Bookmarked Successfully!',
                    text: "The job posting has been saved and bookmarked. You can get back to it through your profile.",
                    icon: 'success',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnBookmarkJobPosting').removeClass('is-loading');
                    $('#btnBookmarkJobPosting').prop('disabled', false);
                });
            }
            else if(response == '1'){
                swal({
                    title: 'Failed to Retrieve Save Job Posting!',
                    text: "Something went wrong while saving job posting. Data handling failed, please try again.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnBookmarkJobPosting').removeClass('is-loading');
                    $('#btnBookmarkJobPosting').prop('disabled', false);
                });
            }
            else{
                swal({
                    title: 'Failed to Retrieve Save Job Posting!',
                    text: "Something went wrong while saving job posting. Please try again.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnBookmarkJobPosting').removeClass('is-loading');
                    $('#btnBookmarkJobPosting').prop('disabled', false);
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
                $('#btnBookmarkJobPosting').removeClass('is-loading');
                $('#btnBookmarkJobPosting').prop('disabled', false);
            });
        }
    });
}
function ReportJobPosting(){

}

function fillJobPostingList(){
    $.ajax({
        type: 'GET',
        url: '../PHPFiles/Applicant/JobSearch/jobpostinglistget.php',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Job Posting List!',
                    message: 'Something went wrong while retrieving job postings. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Job Posting List!',
                    message: 'Something went wrong while retrieving job postings. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Job Posting Found!',
                    message: 'Currently, there are no posted job hiring. Please try and check again later.'
                },{
                    // settings
                    type: 'info'
                });
            }
            else{
                $('#divJobPostList').html(response);
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

function searchJobPosting(){

    $('#btnSearchJobPosting').addClass('is-loading');
    $('#btnSearchJobPosting').prop('disabled', true);
    $('#btnSearchFilterJobPosting').addClass('is-Loading');
    $('#btnSearchFilterJobPosting').prop('disabled', true);

    var txtJobTitle = $('#txtSearchJobTitle').val();
    var txtLocation = $('#txtSearchLocation').val();

    if(txtJobTitle.length > 0 || txtLocation.length > 0){
        $.ajax({
            type: 'POST',
            url: '../PHPFiles/Applicant/JobSearch/jobpostingsearch.php',
            datatype: 'html',
            data: {
                JobTitle: txtJobTitle,
                Location: txtLocation
            },
            success: function(response){
                if(response == '1'){
                    swal({
                        title: 'Failed to Search Job Posting!',
                        text: "Something went wrong while trying to search job posting. Data handling failed, please try again.",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#btnSearchJobPosting').removeClass('is-loading');
                        $('#btnSearchJobPosting').prop('disabled', false);
                        $('#btnSearchFilterJobPosting').removeClass('is-Loading');
                        $('#btnSearchFilterJobPosting').prop('disabled', false);
                    });
                }
                else if(response == '2'){
                    swal({
                        title: 'Failed to Search Job Posting!',
                        text: "Something went wrong while trying to search job posting. Please try again later.",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#btnSearchJobPosting').removeClass('is-loading');
                        $('#btnSearchJobPosting').prop('disabled', false);
                        $('#btnSearchFilterJobPosting').removeClass('is-Loading');
                        $('#btnSearchFilterJobPosting').prop('disabled', false);
                    });
                }
                else if(response == '3'){
                    swal({
                        title: 'No Job Posting Found!',
                        text: "There is no job posting that contains what you tried to search.",
                        icon: 'info',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#btnSearchJobPosting').removeClass('is-loading');
                        $('#btnSearchJobPosting').prop('disabled', false);
                        $('#btnSearchFilterJobPosting').removeClass('is-Loading');
                        $('#btnSearchFilterJobPosting').prop('disabled', false);
                    });
                }
                else{
                    $('#divJobPostList').html(response);
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
                    $('#btnSearchJobPosting').removeClass('is-loading');
                    $('#btnSearchJobPosting').prop('disabled', false);
                    $('#btnSearchFilterJobPosting').removeClass('is-Loading');
                    $('#btnSearchFilterJobPosting').prop('disabled', false);
                });
            }
        });
    }
    else{
        swal({
            title: 'Empty Search Box and Filters!',
            text: "Please enter keywords or location on the input field. Note that you can also filter the results.",
            icon: 'warning',
            buttons : {
                confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                }
            }
        }).then(function(){
            $('#btnSearchJobPosting').removeClass('is-loading');
            $('#btnSearchJobPosting').prop('disabled', false);
            $('#btnSearchFilterJobPosting').removeClass('is-Loading');
            $('#btnSearchFilterJobPosting').prop('disabled', false);
        });
    }
}

function fileApplication(){
    $('#btnFileApplication').addClass('is-loading');
    $('#btnFileApplication').prop('disabled', true);

    var jpID = window.location.hash.replace('#','');

    $.ajax({
        type: 'POST',
        url: '../PHPFiles/Applicant/Application/applicationfiling.php',
        datatype: 'html',
        data: {
            JobPostingID: jpID
        },
        success: function(response){
            if(response == '1'){
                swal({
                    title: 'Failed to File an Application!',
                    text: "Something went wrong while filing an application. Data handling failed, please try again.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnFileApplication').removeClass('is-loading');
                    $('#btnFileApplication').prop('disabled', false);
                });
            }
            else if(response == '2'){
                swal({
                    title: 'Failed to Retrieve Save Job Posting!',
                    text: "Something went wrong while filing an application. Please try again.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#btnFileApplication').removeClass('is-loading');
                    $('#btnFileApplication').prop('disabled', false);
                });
            }
            else{
                var decodedResponse = JSON.parse(response);
                
                var AID = decodedResponse.ApplicationID;
                location.href = "ApplicationForm.php#PostID="+jpID+"&ApplicationID="+AID+"&Form1";
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
                $('#btnFileApplication').removeClass('is-loading');
                $('#btnFileApplication').prop('disabled', false);
            });
        }
    });
}

var txtSearchJobTitle = $('#txtSearchJobTitle');
txtSearchJobTitle.on('keypress', function(event){
    if(event.key === "Enter"){
        searchJobPosting();
    }
});

var txtSearchLocation = $('#txtSearchLocation');
txtSearchLocation.on('keypress', function(event){
    if(event.key === "Enter"){
        searchJobPosting();
    }
});

/*

    MY SAVED JOBS

*/
function fillSavedJobPosting(){
    $.ajax({
        type: 'GET',
        url: '../PHPFiles/Applicant/JobSearch/myjobsavedlistget.php',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Saved Job List!',
                    message: 'Something went wrong while retrieving saved job postings. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Saved Job List!',
                    message: 'Something went wrong while retrieving saved job postings. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Saved Job Posting Found!',
                    message: 'Currently, there are no saved job hiring. Please try and check again later.'
                },{
                    // settings
                    type: 'info'
                });
            }
            else{
                $('#listSavedJobs').html(response);
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
function viewSavedJobPostDetails(ID){
    var jpID = ID.replace('btnViewSavedJobPosting','');
    location.href = 'JobSearch.php#'+jpID;
}
function removeSavedJobPosting(ID){
    $('#'+ID).addClass('is-loading');
    $('#'+ID).prop('disabled', true);

    var bID = ID.replace('removeSavedJobPosting','');

    $.ajax({
        type: 'POST',
        url: '../PHPFiles/Applicant/JobSearch/myjobsavedlistremove.php',
        datatype: 'html',
        data: {
            BookmarkID: bID
        },
        success: function(response){
            if(response == '0'){
                swal({
                    title: 'Removed Saved Job Posting!',
                    text: "The saved job posting has been removed successfully.",
                    icon: 'success',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    fillSavedJobPosting();
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
                });
            }
            else if(response == '1'){
                swal({
                    title: 'Failed to Remove Save Job Posting!',
                    text: "Something went wrong while removing saved job posting. Data handling failed, please try again.",
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
                    title: 'Failed to Remove Save Job Posting!',
                    text: "Something went wrong while removing saved job posting. Please try again.",
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

    MY APPLIED JOBS

*/
function fillAppliedJobPosting(){
    $.ajax({
        type: 'GET',
        url: '../PHPFiles/Applicant/Application/myjobappliedlistget.php',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Applied Job List!',
                    message: 'Something went wrong while retrieving applied job postings. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Applied Job List!',
                    message: 'Something went wrong while retrieving applied job postings. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Applied Job Posting Found!',
                    message: 'Currently, there are no applied job hiring. Please try and check again later.'
                },{
                    // settings
                    type: 'info'
                });
            }
            else{
                $('#listAppliedJobs').html(response);
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

function cancelAppliedJobPosting(ID){
    var aID = ID.replace('btnCancelAppliedJobPosting','');

    $('#'+ID).addClass('is-loading');
    $('#'+ID).prop('disabled', true);
    $('#btnViewAppliedJobPosting'+aID).prop('disabled', true);

    $.ajax({
        type: 'POST',
        url: '../PHPFiles/Applicant/Application/myjobappliedcancel.php',
        datatype: 'html',
        data: {
            ApplicationID: aID
        },
        success: function(response){
            if(response == '0'){
                swal({
                    title: 'Application Cancelled Successfully!',
                    text: "Your application has been cancelled successfully.",
                    icon: 'success',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    $('#'+ID).removeClass('is-loading');
                    $('#'+ID).prop('disabled', false);
                    $('#btnViewAppliedJobPosting'+aID).prop('disabled', false);
                    
                    fillAppliedJobPosting();
                });
            }
            else if(response == '1'){
                swal({
                    title: 'Failed to Cancel Application!',
                    text: "Something went wrong while cancelling your application. Data handling failed, please try again.",
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
                    $('#btnViewAppliedJobPosting'+aID).prop('disabled', false);
                });
            }
            else{
                swal({
                    title: 'Failed to Cancel Application!',
                    text: "Something went wrong while cancelling your application. Please try again.",
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
                    $('#btnViewAppliedJobPosting'+aID).prop('disabled', false);
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
                $('#btnViewAppliedJobPosting'+aID).prop('disabled', false);
            });
        }
    });
}
function continueAppliedJobPosting(ID){
    var IDs = ID.replace('btnContinueAppliedJobPosting','').split(':');

    location.href = "ApplicationForm.php#PostID=" + IDs[1] + "&ApplicationID=" + IDs[0] + "&Form1";
}
function viewAppliedJobPosting(ID){
    var aID = ID.replace('btnViewAppliedJobPosting','');

    $('#'+ID).addClass('is-loading');
    $('#'+ID).prop('disabled', true);
    $('#btnCancelAppliedJobPosting'+aID).prop('disabled', true);

    $.ajax({
        type: 'POST',
        url: '../PHPFiles/Applicant/Application/myjobappliedview.php',
        datatype: 'html',
        data: {
            ApplicationID: aID
        },
        success: function(response){
            if(response == '1'){
                swal({
                    title: 'Failed to Retrieve Application Details!',
                    text: "Something went wrong while retrieving your application details. Data handling failed, please try again.",
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
                    $('#btnCancelAppliedJobPosting'+aID).prop('disabled', false);
                });
            }
            else if(response == '2'){
                swal({
                    title: 'Failed to Retrieve Application Details!',
                    text: "Something went wrong while retrieving your application details. Please try again.",
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
                    $('#btnCancelAppliedJobPosting'+aID).prop('disabled', false);
                });
            }
            else if(response == '3'){
                swal({
                    title: 'No Application Details Found!',
                    text: "There is no application details found. Please try again or contact the administrator.",
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
                    $('#btnCancelAppliedJobPosting'+aID).prop('disabled', false);
                });
            }
            else{
                var decodedResponse = JSON.parse(response);

                $('#lblJobTitle').text(decodedResponse.JobTitle);
                $('#lblCompanyName').text(decodedResponse.CompanyName);
                $('#lblJobLocation').text(decodedResponse.JobLocation);
                $('#lblClassification').text(decodedResponse.Classification);
                $('#lblJobSalary').text(decodedResponse.JobSalary);
                $('#lblResumeLocation').text(decodedResponse.ResumeLocation);
                

                if(decodedResponse.CoverLetterLocation.length > 0){
                    $('#lblCoverLetter').text(decodedResponse.CoverLetterLocation);
                }
                else if(decodedResponse.CoverLetter.length == null || decodedResponse.CoverLetter.length > 0){
                    $('#lblCoverLetter').text(decodedResponse.CoverLetter);
                }
                else{
                    $('#lblCoverLetter').text("You chose to apply without a cover letter.");
                }

                if(decodedResponse.QAs.length > 0){
                    $('#divQuestionsAnswers').html(decodedResponse.QAs);
                }
                
                $('#modalViewApplication').modal({
                    backdrop: 'static',
                    keyboard: false,
                    focus: true,
                    show: true
                });

                $('#'+ID).removeClass('is-loading');
                $('#'+ID).prop('disabled', false);
                $('#btnCancelAppliedJobPosting'+aID).prop('disabled', false);
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
                $('#btnCancelAppliedJobPosting'+aID).prop('disabled', false);
            });
        }
    });
}


/*

    MY RECOMMENDED JOBS

*/
function fillRecommendedJobPosting(){
    
}