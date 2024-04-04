function fillApplicantList(activeTable){
    
    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ActiveTable: activeTable
        },
        url: "../PHPFiles/Admin/getJobPostingList.php",
        success: function(data){
            console.log(data);
            if(data != null){
                var decodedData = JSON.parse(data);
                
                if($.fn.DataTable.isDataTable('#tblActiveJobPosting')){
                    $('#tblActiveJobPosting').DataTable().destroy();
                }

                $('#tblActiveJobPosting').DataTable({
                    pageLength: 10,
                    data: decodedData,
                    columns: [
                        { data: 'JobID' },
                        { data: 'JobTitle' },
                        { data: 'EmployerName' },
                        { data: 'Status' },
                        { data: 'Date' },
                        { data: 'Action' }
                    ]
                });

                //$('#tblActiveJobPosting').DataTable.destroy();
                //$('#tblexamineelist').html(data);
            }

        }, 
        error: function(data){


        }

    })

    
}

function viewJobPost(JobPostID){
    console.log(JobPostID);

    var JID = JobPostID.replace("btnViewJob", "");
    console.log(JID);   


    $.ajax({
        type: "POST",
        dataType: "html",
        data: {
            JobPostID: JID
        },
        url: "../PHPFiles/Admin/jobPostViewContent.php",
        success: function(data){
            // WILL GET BACK TO THIS
            // MUST HAVE AN INTERFACE TO PUT THE DATA
            // AND MUST HAVE A LIST OF WHAT DATA TO DISPLAY

    
            console.log(data);
        }
        
    });


}


function toggleJobPostVisibility(JobPostID){

    // Check first what status of visiblity does the Job have

    var JID = JobPostID.replace("btnViewJob", "");
    console.log(JID);

    



    swal({
        title: 'Disable Examination Confirmation',
        text: "Are you sure you want to DISABLE Examination of Application #" + ApplicationID.replace("btnToggleApplicationExamination", "") + "?",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Disable it!',
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

        }
        else{

        }
    });
    
    
}

function rejectJobPost(JobPostID){
    console.log(JobPostID);

    var JID = JobPostID.replace("btnViewJob", "");
    console.log(JID);

    
}

function requestJobPost(JobPostID){
    console.log(JobPostID);

    var JID = JobPostID.replace("btnViewJob", "");
    console.log(JID);

    
}

