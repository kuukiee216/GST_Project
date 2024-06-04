
// application.php
function getApplicationsList(){
    console.log('worked');
    var current_Table = "#tblApplications";

    $.ajax({
        type: "POST",
        datatype: "html",
        url: "../PHPFiles/Admin/Applications/getApplicationList.php",
        success: function(data){
            console.log(data);
            if(data != null){
                var decodedData = JSON.parse(data);
                
                if($.fn.DataTable.isDataTable(current_Table)){
                    $(current_Table).DataTable().destroy();
                }

                $(current_Table).DataTable({
                    pageLength: 10,
                    data: decodedData,
                    columns: [
                        { data: 'ApplicationID' },
                        { data: 'ApplicantName' },
                        { data: 'ApplicationReview' },
                        { data: 'SubmittedDate' },
                        { data: 'Status' }
                    ]
                });


                //$('#tblActiveJobPosting').DataTable.destroy();
                //$('#tblexamineelist').html(data);
            }else{
                var decodedData = JSON.parse(data);
                
                if($.fn.DataTable.isDataTable(current_Table)){
                    $(current_Table).DataTable().destroy();
                }

                $(current_Table).DataTable({
                    pageLength: 10,
                    data: decodedData,
                    columns: [
                        { data: '#' },
                        { data: 'Applicant Name' },
                        { data: 'Application Review' },
                        { data: 'Submitted Date' },
                        { data: 'Status' }
                    ]
                });
            }

        }, 
        error: function(data){


        }

    });

}


// application_2.php
function getApplicationContents(){
    getApplicationDetails();
    getApplicantInfo();
    getApplicantResume();
    getQuestionsAnswers();
    setCountQA();
}

function  getApplicationDetails(){

    var AID = window.location.hash.replace('#','');

    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ApplicationID: AID
        },
        url: "../PHPFiles/Admin/Applications/applicationGetDetails.php",
        success: function(data){
            console.log("Current Data : " +  data);
            if(data == '1'){

            }else{
                var decodedData = JSON.parse(data);

                $('#app-jobTitle span').text(decodedData['JobTitle']);
                $('#app-jobLocation span').text(decodedData['Location']);
                $('#app-companyName').text(decodedData['CompanyName']);
                $('#app-jobSalary span').text(decodedData['Salary']);

                if(decodedData['Status'] == 1 || decodedData['Status'] == 2){
                    $('#btnApplicationApprove').hide();
                    $('#btnApplicationReject').hide();
                }
            }

        }, 
        error: function(data){
                

        }

    });

}

function getApplicantInfo(){
    var AID = window.location.hash.replace('#','');

    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ApplicationID: AID
        },
        url: "../PHPFiles/Admin/Applications/applicationGetApplicantInfo.php",
        success: function(data){
            console.log(data);
            if(data == '1'){

            }else{
                var decodedData = JSON.parse(data);

                $('#app-aiName span').text(decodedData['ApplicantName']);
                $('#app-aiEmail span').text(decodedData['EmailAddress']);
                $('#app-aiLocation').text(decodedData['Location']);
                $('#app-aiPhone span').text(decodedData['Phone']);

            }

        }, 
        error: function(data){
            

        }

    });
}

function getApplicantResume(){

    var AID = window.location.hash.replace('#','');

    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ApplicationID: AID
        },
        url: "../PHPFiles/Admin/Applications/applicationGetDocument.php",
        success: function(data){
            if(data == '1'){

            }else{
                var decodedData = JSON.parse(data);
                var filePath = '';

                if(decodedData['Location'] == null){
                    $('#documentName').text('Applicant has not yet submitted a Resume');
                }else{
                    filePath = decodedData['Location'];
                    var parts = filePath.split('/');
                    var filename = parts[parts.length - 1];
                    
                    $('#documentName').text(filename);
                }
            }   
        }

    });
}

function showApplicantResume(){

    var AID = window.location.hash.replace('#','');

    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ApplicationID: AID
        },
        url: "../PHPFiles/Admin/Applications/applicationGetDocument.php",
        success: function(data){
            console.log("Current Data : " +  data);
            if(data == '1'){

            }else{
                var decodedData = JSON.parse(data);
                var filePath = '';

                if(decodedData['Location'] == null){
                    $('#documentName').text('Applicant has not yet submitted a Resume');
                }else{
                    filePath = decodedData['Location'];
                    window.open(filePath, '_blank');
                }
                
            }   

        }, 
        error: function(data){
                

        }

    });
}

function showCoverLetter(){
    var AID = window.location.hash.replace('#','');

    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ApplicationID: AID
        },
        url: "../PHPFiles/Admin/Applications/applicationGetCoverLetter.php",
        success: function(data){
            if(data == '1'){

            }else{
                var decodedData = JSON.parse(data);
                var filePath = '';
                var isExist = 0;

                console.log(decodedData);

                if(!(decodedData['Location'] == null && decodedData['CoverLetter'] == null)){
                    if(decodedData['Location'] != null){
                        setCoverLetter(0, decodedData);
                    }else if(decodedData['CoverLetter'] != null){
                        setCoverLetter(1, decodedData);
                    }
                }else{
                   
                }

            }   

        }, 
        error: function(data){
                

        }

    });
}

function setCoverLetter(inSet, decodedData){

    if(inSet == 0){
        var filePath = decodedData['Location'];
        window.open(filePath, '_blank');
    }else if(inSet == 1){
        $('#txtCoverLetter').text(decodedData['CoverLetter']);
        showModalCoverLetter();
    }
}

function showModalCoverLetter(){
    $('#modalCoverLetter').modal({
        backdrop: 'static',
        keyboard: true,
        focus: true,
        show: true
    });
}

function closeCoverLetter(){
    $('#txtCoverLetter').text('');

    history.replaceState(null, document.title, window.location.pathname + window.location.search);
    $('#btnCloseCoverLetter').click();
}

function approveApplication(){

    var AID = window.location.hash.replace('#','');

    swal({
        title: 'Approve Application?',
        text: "Are you sure you want to Approve this Application?",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Approve it!',
                className : 'btn btn-primary'
            },
            cancel: {
                visible: true,
                text : 'Cancel',
                className: 'btn btn-danger'
            }
        }
    }).then((Toggle) => {
        if (Toggle) {

            $.ajax({
                type: "POST",
                dataType: "html",
                data: {
                    ApplicationID: AID
                },
                //Change this
                url: "../PHPFiles/Admin/Applications/applicationApprove.php",
                success: function(data){
                    console.log(data);

                if(data == '1'){ 
                    swal({
                        title: 'Application Approved!',
                        text: "Successfully Approved the Applicant's Application.",
                        icon: 'success',
                        type: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        location.href = '../admin/application.php';
                    });
                         
                }else{
                
                }
            }
            });
        }
        else{
        }
    });


}

function rejectApplication(){

    var AID = window.location.hash.replace('#','');

    swal({
        title: 'Reject Application?',
        text: "Are you sure you want to Reject this Application?",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Reject it!',
                className : 'btn btn-primary'
            },
            cancel: {
                visible: true,
                text : 'Cancel',
                className: 'btn btn-danger'
            }
        }
    }).then((Toggle) => {
        if (Toggle) {

            $.ajax({
                type: "POST",
                dataType: "html",
                data: {
                    ApplicationID: AID
                },
                //Change this
                url: "../PHPFiles/Admin/Applications/applicationReject.php",
                success: function(data){
                    console.log(data);

                if(data == '1'){ 
                    swal({
                        title: 'Application Rejectd!',
                        text: "Successfully Rejectd the Applicant's Application.",
                        icon: 'success',
                        type: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        location.href = '../admin/application.php';
                    });
                         
                }else{
                
                }
            }
            });
        }
        else{
        }
    });



}

function getQuestionsAnswers(){
    var AID = window.location.hash.replace('#','');

    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ApplicationID: AID
        },
        url: "../PHPFiles/Admin/Applications/applicationGetQA.php",
        success: function(data){
            if(data == '1'){

            }else{
                var decodedData = JSON.parse(data);
                setApplicationQA(decodedData);
            }

        }, 
        error: function(data){
                

        }

    });
}

function setApplicationQA(decodedData){

    for (var i = 0; i < decodedData.length; i++) {

        var newLi = $("<li>").append(
            $("<span>").attr("id", "employerQ1-1").text(decodedData[i].Question),
            $("<br>"),
            "Answer : ",
            $("<span>").attr("id", "applicationA1").text(decodedData[i].Answer),
            $("<br>"),
            $("<br>")
        );

        $("#holderQA").append(newLi);
        console.log("Question:", decodedData[i].Question);
        console.log("Answer:", decodedData[i].Answer);
    }

    

    // Append the new list item to the ul element
    
}

function setCountQA(){
    var AID = window.location.hash.replace('#','');

    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ApplicationID: AID
        },
        url: "../PHPFiles/Admin/Applications/applicationGetQACount.php",
        success: function(data){
            if(data == '1'){

            }else{
                var decodedData = JSON.parse(data);

                $('#answersCount').text(decodedData['AnswerCount']);
                $('#questionsCount').text(decodedData['QuestionCount']);
            }

        }, 
        error: function(data){
                

        }

    });
}

