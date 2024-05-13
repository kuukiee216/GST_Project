
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
            console.log("Current Data : " +  data);
            if(data == '1'){

            }else{
                var decodedData = JSON.parse(data);
                

                var filePath = "../Documents/Parungao_Ron Henrick_Cadang_Resume(2).pdf";

                window.open(filePath, '_blank');
            }   

        }, 
        error: function(data){
                

        }

    });
}


