function fillApplicantList(activeTable){
    var current_Table = "#tblActiveJobPosting";

    switch(activeTable){
        case 1:
            current_Table = "#tblActiveJobPosting";
            break;
        case 2:
            current_Table = "#tblInactiveJobPosting";
            break;
        case 3:
            current_Table = "#tblRequestJobPosting";
            break;
        case 4:
            current_Table = "#tblExpiredJobPosting";
            break;
    }

    
    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ActiveTable: activeTable
        },
        url: "../PHPFiles/Admin/getJobPostingList.php",
        success: function(data){
            console.log(data);
            console.log(current_Table);
            if(data != null){
                var decodedData = JSON.parse(data);
                
                if($.fn.DataTable.isDataTable(current_Table)){
                    $(current_Table).DataTable().destroy();
                }

                $(current_Table).DataTable({
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

function archiveJobPost(JobPostID){


    var JID = JobPostID.replace("btnHideJob", "");
    console.log(JID);

    swal({
        title: 'Hide the Posted Job?',
        text: "Are you sure you want to HIDE Job Post #" + JID + "?",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Hide it!',
                className : 'btn btn-primary'
            },
            cancel: {
                visible: true,
                text : 'Cancel',
                className: 'btn btn-danger'
            }
        }
    }).then((Hide) => {
        if (Hide) {

            // ARCHIVE FUNCTION
            $.ajax({
                type: "POST",
                dataType: "html",
                data: {
                    JobPostID: JID
                },
                url: "../PHPFiles/Admin/jobPostArchive.php",
                success: function(data){

                    swal({
                        title: 'Job Post #' + JID + 'has Successfully been Hidden!',
                        text: "Successfully Archived Job Post, You may see it in the Archives Table",
                        icon: 'success',
                        type: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        fillApplicantList(1);
                    });
                         
                }
            });
        }
        else{

        }
    });
    
    
}

function deleteJobPost(JobPostID){
    var JID = JobPostID.replace("btnDeleteJob", "");
    console.log(JID);

    swal({
        title: 'Delete the Posted Job?',
        text: "Are you sure you want to DELETE Job Post #" + JID + "?",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Delete it!',
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

            // ARCHIVE FUNCTION
            $.ajax({
                type: "POST",
                dataType: "html",
                data: {
                    JobPostID: JID
                },
                url: "../PHPFiles/Admin/jobPostDelete.php",
                success: function(data){
                    console.log(data);
                    swal({
                        title: 'Job Post #' + JID + 'has Successfully been Deleted!',
                        text: "Successfully Deleted Job Post #" + JID + ".",
                        icon: 'success',
                        type: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        fillApplicantList(1);
                    });
                         
                }
            });
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

