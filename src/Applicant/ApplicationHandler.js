function proceedApplication(){
    var formType = window.location.hash.replace('#','');

    if (formType.indexOf('&') !== -1) {
        var formPage = formType.split('&');

        if(formPage[2] == 'Form1'){

            $('#lblConfirmFullName').text($('#lblFullName').text());
            $('#lblConfirmContactNumber').text($('#lblContactNumber').text());
            $('#lblConfirmEmailAddress').text($('#lblEmailAddress').text());
            $('#lblConfirmCompleteAddress').text($('#lblCompleteAddress').text());

            $('#Form1').removeClass('show active');
            $('#Form2').addClass('show active');

            $('#btnApplicationBack').text("Back");

            $('#divApplicationProgress').css('width', '35%');

            location.href = "#" + formType.replace('Form1', 'Form2');
        }
        else if(formPage[2] == 'Form2'){

            var ResumeOptions = document.getElementsByName('rbResumeOption');
            var isAnyResumeOptionsChecked = false;

            for (var resumeOptionCounter = 0; resumeOptionCounter < ResumeOptions.length; resumeOptionCounter++) {
                if (ResumeOptions[resumeOptionCounter].checked){
                    if(resumeOptionCounter == 0){
                        if($('#cbExistingResume').val() != '0'){
                            var CBResumeOptions = $('#cbExistingResume');
                            var selectedResumeOption = CBResumeOptions.find(':selected');

                            $('#lblResumeFileName').text(selectedResumeOption.text());
                            isAnyResumeOptionsChecked = true;
                            break;
                        }
                        else{
                            swal({
                                title: 'No Selected Existing Resume Found!',
                                text: "You have selected to use an existing resume of yours. But you have not chosen which resume. Please select an existing resume.",
                                icon: 'warning',
                                buttons : {
                                    confirm: {
                                        text : 'Okay',
                                        className : 'btn btn-success'
                                    }
                                }
                            });
                        }
                    }
                    else if(resumeOptionCounter == 1){
                        if($('#fdResume').val().length > 0){
                            $('#lblResumeFileName').text($('#fdResume')[0].files[0].name);
                            isAnyResumeOptionsChecked = true;
                            break;
                        }
                        else{
                            swal({
                                title: 'No Selected Resume Found!',
                                text: "You have selected to upload a resume of yours. But you have not uploaded any document yet. Please upload a resume.",
                                icon: 'warning',
                                buttons : {
                                    confirm: {
                                        text : 'Okay',
                                        className : 'btn btn-success'
                                    }
                                }
                            });
                        }
                    }
                    else if(resumeOptionCounter == 2){
                        $('#lblResumeFileName').text("You chose to apply without resume.");
                        isAnyResumeOptionsChecked = true;
                        break;
                    }
                }
            }

            var CoverLetterOptions = document.getElementsByName('rbCoverLetterOption');
            var isAnyCoverLetterOptionsChecked = false;

            for (var coverLetterOptionCounter = 0; coverLetterOptionCounter < CoverLetterOptions.length; coverLetterOptionCounter++) {
                if (CoverLetterOptions[coverLetterOptionCounter].checked) {
                    if(coverLetterOptionCounter == 0){
                        if($('#fdCoverLetter').val().length > 0){
                            $('#lblCoverLetter').text($('#fdCoverLetter')[0].files[0].name);
                            isAnyCoverLetterOptionsChecked = true;
                            break;
                        }
                        else{
                            swal({
                                title: 'No Uploaded Cover Letter Found!',
                                text: "You have selected to upload a cover letter of yours. But you have not uploaded any document yet. Please upload a cover letter.",
                                icon: 'warning',
                                buttons : {
                                    confirm: {
                                        text : 'Okay',
                                        className : 'btn btn-success'
                                    }
                                }
                            });
                        }
                    }
                    else if(coverLetterOptionCounter == 1){
                        var totalWords = $('#txtCoverLetter').val().split(' ');
                        if(totalWords.length >= 200){
                            $('#lblCoverLetter').text("You wrote a cover letter for this application.");
                            $('#txtWrittenCoverLetter').text($('#txtCoverLetter').val());
                            isAnyCoverLetterOptionsChecked = true;
                            break;
                        }
                        else{
                            swal({
                                title: 'Invalid Cover Letter Found!',
                                text: "You have selected to write a cover letter, but what you wrote seems to be invalid. Please make sure that it is at least 200 words.",
                                icon: 'warning',
                                buttons : {
                                    confirm: {
                                        text : 'Okay',
                                        className : 'btn btn-success'
                                    }
                                }
                            });
                        }
                    }
                    else if(coverLetterOptionCounter == 2){
                        $('#lblCoverLetter').text("You chose to apply without a cover letter.");
                        isAnyCoverLetterOptionsChecked = true;
                        break;
                    }
                }
            }

            if(isAnyResumeOptionsChecked && isAnyCoverLetterOptionsChecked){
                $('#Form2').removeClass('show active');
                $('#Form3').addClass('show active');
    
                $('#btnApplicationBack').text("Back");
    
                $('#divApplicationProgress').css('width', '70%');
    
                location.href = "#" + formType.replace('Form2', 'Form3');
            }
            else if(isAnyResumeOptionsChecked === false && isAnyCoverLetterOptionsChecked === false){
                swal({
                    title: 'No Selected Resume and Cover Letter Option!',
                    text: "Please make sure that you have selected at least one(1) option for your Resume and Cover Letter.",
                    icon: 'warning',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                });
            }
            else if(isAnyResumeOptionsChecked === false){
                swal({
                    title: 'No Selected Resume Option!',
                    text: "Please make sure that you have selected at least one(1) option for your Resume.",
                    icon: 'warning',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                });
            }
            else if(isAnyCoverLetterOptionsChecked === false){
                swal({
                    title: 'No Selected Cover Letter Option!',
                    text: "Please make sure that you have selected at least one(1) option for your Cover Letter.",
                    icon: 'warning',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                });
            }
        }
        else if(formPage[2] == 'Form3'){
            $('#Form3').removeClass('show active');
            $('#Form4').addClass('show active');

            $('#btnApplicationBack').text("Back");

            $('#divApplicationProgress').css('width', '100%');
            $('#divApplicationProgress').removeClass('bg-primary');
            $('#divApplicationProgress').addClass('bg-success');

            location.href = "#" + formType.replace('Form3', 'Form4');;
        }
    }
    else{
        location.href = "JobSearch.php";
    }    
}

function revertApplication(){
    var formType = window.location.hash.replace('#','');

    if (formType.indexOf('&') !== -1) {
        var formPage = formType.split('&');

        if(formPage[2] == 'Form4'){
            $('#Form4').removeClass('show active');
            $('#Form3').addClass('show active');

            $('#divApplicationProgress').css('width', ' 70%');
            $('#divApplicationProgress').removeClass('bg-success');
            $('#divApplicationProgress').addClass('bg-primary');

            location.href = "#" + formType.replace('Form4', 'Form3');
        }
        else if(formPage[2] == 'Form3'){
            $('#Form3').removeClass('show active');
            $('#Form2').addClass('show active');

            $('#divApplicationProgress').css('width', '35%');
            $('#divApplicationProgress').removeClass('bg-success');
            $('#divApplicationProgress').addClass('bg-primary');

            location.href = "#" + formType.replace('Form3', 'Form2');
        }
        else if(formPage[2] == 'Form2'){
            $('#Form2').removeClass('show active');
            $('#Form1').addClass('show active');

            $('#btnApplicationBack').text("Cancel");

            $('#divApplicationProgress').css('width', '5%');

            location.href = "#" + formType.replace('Form2', 'Form1');
        }
        else if(formPage[2] == 'Form1'){
            location.href = "JobSearch.php";
        }
    }
}

function fillJobPostDetails(){
    var formType = window.location.hash.replace('#','');

    if (formType.indexOf('&') !== -1) {
        var IDs = formType.split('&');

        $.ajax({
            type: 'POST',
            url: '../PHPFiles/Applicant/Application/jobpostingdetailsget.php',
            datatype: 'html',
            data: {
                JobPostingID: IDs[0].replace('PostID=','')
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
                        location.href = "JobSearch.php";
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
                        location.href = "JobSearch.php";
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
                        location.href = "JobSearch.php";
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
                    location.href = "JobSearch.php";
                });
            }
        });
    }
    else{
        location.href = "JobSearch.php";
    }    
}
function fillResumeOption(){
    $.ajax({
        type: 'GET',
        url: '../PHPFiles/Applicant/Application/applicantresumeget.php',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                swal({
                    title: 'Failed to Retrieve Existing Resume!',
                    text: "Something went wrong while retrieving your existing resume. Data handling failed, please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    location.href = "JobSearch.php";
                });
            }
            else if(response == '2'){
                swal({
                    title: 'Failed to Retrieve Existing Resume!',
                    text: "Something went wrong while retrieving your existing resume. Please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    location.href = "JobSearch.php";
                });
            }
            else if(response == '3'){
                swal({
                    title: 'No Existing Resume Found!',
                    text: "There is no existing resume found. Please try again later.",
                    icon: 'info',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    location.href = "JobSearch.php";
                });
            }
            else{
                $('#cbExistingResume').html(response);
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
                location.href = "JobSearch.php";
            });
        }
    });
}
function fillPersonalInformation(){
    $.ajax({
        type: 'GET',
        url: '../PHPFiles/Applicant/Application/applicantinfoget.php',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                swal({
                    title: 'Failed to Retrieve Personal Information!',
                    text: "Something went wrong while retrieving your personal information. Data handling failed, please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    location.href = "JobSearch.php";
                });
            }
            else if(response == '2'){
                swal({
                    title: 'Failed to Retrieve Personal Information!',
                    text: "Something went wrong while retrieving your personal information. Please try again later.",
                    icon: 'error',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    location.href = "JobSearch.php";
                });
            }
            else if(response == '3'){
                swal({
                    title: 'No Personal Information Found!',
                    text: "Could not find your personal information. Please try again later.",
                    icon: 'info',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    location.href = "JobSearch.php";
                });
            }
            else{
                var decodedResponse = JSON.parse(response);

                $('#lblFullName').text(decodedResponse.FullName);
                $('#lblContactNumber').text(decodedResponse.ContactNumber);
                $('#lblEmailAddress').text(decodedResponse.EmailAddress);
                $('#lblCompleteAddress').text(decodedResponse.CompleteAddress);

                var formType = window.location.hash.replace('#','');

                if (formType.indexOf('&') !== -1) {
                    var formPage = formType.split('&');

                    if(formPage[2] !== 'Form1'){

                        $('#lblConfirmFullName').text($('#lblFullName').text());
                        $('#lblConfirmContactNumber').text($('#lblContactNumber').text());
                        $('#lblConfirmEmailAddress').text($('#lblEmailAddress').text());
                        $('#lblConfirmCompleteAddress').text($('#lblCompleteAddress').text());
                    }
                }
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
                location.href = "JobSearch.php";
            });
        }
    });
}

function updateApplicationResume(ID){
    $('#rbResumeOption1').addClass('is-loading');
    $('#rbResumeOption1').prop('disabled', true);
    $('#rbResumeOption2').prop('disabled', true);
    $('#rbResumeOption3').prop('disabled', true);

    $('#btnContinueApplication').prop('disabled', true);

    var formType = window.location.hash.replace('#','');

    if (formType.indexOf('&') !== -1) {
        var IDs = formType.split('&');

        var dID = ID;

        $.ajax({
            type: 'POST',
            url: '../PHPFiles/Applicant/Application/applicationresumeupdate.php',
            datatype: 'html',
            data: {
                DocumentID: dID,
                ApplicationID: IDs[1].replace('ApplicationID=','')
            },
            success: function(response){
                if(response == '0'){
                    $('#rbResumeOption1').removeClass('is-loading');
                    $('#rbResumeOption1').prop('disabled', false);
                    $('#rbResumeOption2').prop('disabled', false);
                    $('#rbResumeOption3').prop('disabled', false);

                    $('#btnContinueApplication').prop('disabled', false);
                }
                else if(response = '1'){
                    swal({
                        title: 'Failed to Update Application Resume!',
                        text: "Something went wrong while trying to update your application's resume. Data handling failed, please try again later.",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#cbExistingResume').prop('selectedIndex', 0);

                        $('#rbResumeOption1').removeClass('is-loading');
                        $('#rbResumeOption1').prop('disabled', false);
                        $('#rbResumeOption2').prop('disabled', false);
                        $('#rbResumeOption3').prop('disabled', false);
    
                        $('#btnContinueApplication').prop('disabled', false);
                    });
                }
                else{
                    swal({
                        title: 'Failed to Update Application Resume!',
                        text: "Something went wrong while trying to update your application's resume. Please try again later.",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#cbExistingResume').prop('selectedIndex', 0);

                        $('#rbResumeOption1').removeClass('is-loading');
                        $('#rbResumeOption1').prop('disabled', false);
                        $('#rbResumeOption2').prop('disabled', false);
                        $('#rbResumeOption3').prop('disabled', false);
    
                        $('#btnContinueApplication').prop('disabled', false);
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
                    $('#rbResumeOption1').removeClass('is-loading');
                    $('#rbResumeOption1').prop('disabled', false);
                    $('#rbResumeOption2').prop('disabled', false);
                    $('#rbResumeOption3').prop('disabled', false);

                    $('#btnContinueApplication').prop('disabled', false);
                });
            }
        });
    }
    else{
        location.href = "JobSearch.php";
    }
}
function updateApplicationResumeUpload(){
    $('#rbResumeOption2').addClass('is-loading');
    $('#rbResumeOption1').prop('disabled', true);
    $('#rbResumeOption2').prop('disabled', true);
    $('#rbResumeOption3').prop('disabled', true);

    $('#btnContinueApplication').prop('disabled', true);

    var formType = window.location.hash.replace('#','');

    if (formType.indexOf('&') !== -1) {
        var IDs = formType.split('&');

        var fileResume = $('#fdResume')[0].files[0];

        var formDataQA = new FormData();
        formDataQA.append("ApplicationID", IDs[1].replace('ApplicationID=',''));
        formDataQA.append("ResumeDocument", fileResume);

        $.ajax({
            type: 'POST',
            url: '../PHPFiles/Applicant/Application/applicationresumeupload.php',
            datatype: 'html',
            data: formDataQA,
            contentType: false,
            processData: false,
            success: function(response){
                if(response == '0'){
                    $('#rbResumeOption2').removeClass('is-loading');
                    $('#rbResumeOption1').prop('disabled', false);
                    $('#rbResumeOption2').prop('disabled', false);
                    $('#rbResumeOption3').prop('disabled', false);

                    $('#btnContinueApplication').prop('disabled', false);
                }
                else if(response == '1'){
                    swal({
                        title: 'Failed to Upload Application Resume!',
                        text: "Something went wrong while trying to upload your application's resume. Data handling failed, please try again later.",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#fdResume').val('');

                        $('#rbResumeOption2').removeClass('is-loading');
                        $('#rbResumeOption1').prop('disabled', false);
                        $('#rbResumeOption2').prop('disabled', false);
                        $('#rbResumeOption3').prop('disabled', false);
    
                        $('#btnContinueApplication').prop('disabled', false);
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
                        $('#fdResume').val('');

                        $('#rbResumeOption2').removeClass('is-loading');
                        $('#rbResumeOption1').prop('disabled', false);
                        $('#rbResumeOption2').prop('disabled', false);
                        $('#rbResumeOption3').prop('disabled', false);
    
                        $('#btnContinueApplication').prop('disabled', false);
                    });
                }
                else{
                    swal({
                        title: 'Failed to Upload Application Resume!',
                        text: "Something went wrong while trying to upload your application's resume. Please try again later.",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        $('#fdResume').val('');

                        $('#rbResumeOption2').removeClass('is-loading');
                        $('#rbResumeOption1').prop('disabled', false);
                        $('#rbResumeOption2').prop('disabled', false);
                        $('#rbResumeOption3').prop('disabled', false);
    
                        $('#btnContinueApplication').prop('disabled', false);
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
                    $('#rbResumeOption2').removeClass('is-loading');
                    $('#rbResumeOption1').prop('disabled', false);
                    $('#rbResumeOption2').prop('disabled', false);
                    $('#rbResumeOption3').prop('disabled', false);

                    $('#btnContinueApplication').prop('disabled', false);
                });
            }
        });
    }
    else{
        location.href = "JobSearch.php";
    }
}

function onchangeResumeOption(ID) {
    if(ID == "rbResumeOption1"){
        $('#cbExistingResume').prop('disabled', false);

        $('#fdResume').val('');
        $('#fdResume').prop('disabled', true);
    }
    else if(ID == "rbResumeOption2"){
        $('#cbExistingResume').prop('selectedIndex', 0);
        $('#cbExistingResume').prop('disabled', true);

        $('#fdResume').prop('disabled', false);
    }
    else{
        $('#cbExistingResume').prop('selectedIndex', 0);
        $('#cbExistingResume').prop('disabled', true);
        
        $('#fdResume').val('');
        $('#fdResume').prop('disabled', true);
    }
}
function onchangeCoverLetterOption(ID) {
    if(ID == "rbCoverLetterOption1"){
        $('#fdCoverLetter').prop('disabled', false);

        $('#txtCoverLetter').val('');
        $('#txtCoverLetter').prop('disabled', true);
    }
    else if(ID == "rbCoverLetterOption2"){
        $('#fdCoverLetter').val('');
        $('#fdCoverLetter').prop('disabled', true);

        $('#txtCoverLetter').prop('disabled', false);
    }
    else{
        $('#fdCoverLetter').val('');
        $('#fdCoverLetter').prop('disabled', true);
        
        $('#txtCoverLetter').val('');
        $('#txtCoverLetter').prop('disabled', true);
    }
}

function editResumeCoverLetterForm(){
    var locationURL = window.location.hash.replace('Form4','Form2');
    location.href = locationURL;
    refreshForm();
}
function editQuestionnaireInputForm(){
    var locationURL = window.location.hash.replace('Form4','Form3');
    location.href = locationURL;
    refreshForm();
}

function refreshForm(){
    var formType = window.location.hash.replace('#','');

        if (formType.indexOf('&') !== -1) {
          var formPage = formType.split('&');

          if(formPage[2] == 'Form1'){
            $('#Form1').addClass('show active');
            $('#Form2').removeClass('show active');
            $('#Form3').removeClass('show active');
            $('#Form4').removeClass('show active');

            $('#divApplicationProgress').css('width', '5%');
            $('#divApplicationProgress').removeClass('bg-success');
            $('#divApplicationProgress').addClass('bg-primary');

            $('#btnApplicationBack').text("Cancel");
          }
          else if(formPage[2]  == 'Form2'){
            $('#Form1').removeClass('show active');
            $('#Form2').addClass('show active');
            $('#Form3').removeClass('show active');
            $('#Form4').removeClass('show active');

            $('#divApplicationProgress').css('width', '35%');

            $('#btnApplicationBack').text("Back");
          }
          else if(formPage[2] == 'Form3'){
            $('#Form1').removeClass('show active');
            $('#Form2').removeClass('show active');
            $('#Form3').addClass('show active');
            $('#Form4').removeClass('show active');

            $('#divApplicationProgress').css('width', '70%');
            $('#divApplicationProgress').removeClass('bg-primary');
            $('#divApplicationProgress').addClass('bg-success');

            $('#btnApplicationBack').text("Back");
          }
          else if(formPage[2] == 'Form4'){
            $('#Form1').removeClass('show active');
            $('#Form2').removeClass('show active');
            $('#Form3').removeClass('show active');
            $('#Form4').addClass('show active');

            $('#divApplicationProgress').css('width', '100%');
            $('#divApplicationProgress').removeClass('bg-primary');
            $('#divApplicationProgress').addClass('bg-success');

            $('#btnApplicationBack').text("Back");
          }
        }
        else{
          location.href = "JobSearch.php";
        }
}