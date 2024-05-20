function fillJobPostList(activeTable){
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
            console.log("Current Data : " + data);
            console.log("Current Table : " + current_Table);
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

    });

    
}

function viewJobPost(JobPostID){

    var JID = JobPostID.replace("btnViewJob", "");

    $.ajax({
        type: "POST",
        dataType: "html",
        data: {
            JobPostID: JID
        },
        url: "../PHPFiles/Admin/jobPostViewContent.php",
        success: function(data){
            var decodedData = JSON.parse(data);

            changeModal(decodedData['Status'], decodedData);

            // WILL GET BACK TO THIS
            // MUST HAVE AN INTERFACE TO PUT THE DATA
            // AND MUST HAVE A LIST OF WHAT DATA TO DISPLAY
            $('#jobTitle').text(decodedData['JobTitle']);
            $('#jobStatus').text(' (' + decodedData['Status'] + ')');
            $('#employerName').text(decodedData['EmployerName']);
            $('#companyName').text(' (' + decodedData['CompanyName'] + ')');
            $('#lbDatePosted').text(decodedData['Date']);
            $('#jobDescription').text(decodedData['Description']);

            $('#modalViewJobPosting').modal({
                backdrop: 'static',
                keyboard: true,
                focus: true,
                show: true
            });

            console.log(data);
        }
        
    });
}

function changeModal(status, decodedData){

    $DateDuration = '20 Days';
    $RejectionReason = 'Pinagpalit sa malapit';

    switch(status){
        case 'Active':
            $('#jobStatus').addClass("text-success font-weight-bold");
            $('#footerSubject').text('Will be Expire in : ');
            $('#remainingTime').text($DateDuration);
            break;
        case 'Inactive':
            $('#jobStatus').removeClass();
            $('#viewFooter').hide();
            break;
        case 'Pending':
            $('#viewFooter').hide();
            break;
        case 'Expired':
            $('#jobStatus').addClass("text-danger font-weight-bold");
            $('#viewFooter').hide();
            break;
        case 'Rejected':
            $('#jobStatus').addClass("text-danger font-weight-bold");
            $('#footerSubject').addClass("text-danger font-weight-bold");
            $('#footerSubject').text('Reason for Rejection : ');
            $('#remainingTime').text($RejectionReason);
            break;
        case 'Pending Deletion':
            $('#jobStatus').addClass("text-danger font-weight-bold");
            $('#footerSubject').addClass("text-danger font-weight-bold");
            $('#footerSubject').text('Will be Deleted in : ');
            $('#remainingTime').text($DateDuration);
            break;
 
            
    }

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
                        fillJobPostList(1);
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
                        fillJobPostList(1);
                    });
                         
                }
            });
        }
        else{
        }
    });

}

function acceptJobPost(JobPostID){

    var JID = JobPostID.replace("btnAcceptJob", "");
    console.log(JID);

    swal({
        title: 'Accept Pending Job?',
        text: "Are you sure you want to Accept Job Post #" + JID + "?",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Accept it!',
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

            // ACCEPT JOB FUNCTION
            $.ajax({
                type: "POST",
                dataType: "html",
                data: {
                    JobPostID: JID
                },
                url: "../PHPFiles/Admin/jobPostRequestAccept.php",
                success: function(data){
                    console.log(data);
                    swal({
                        title: 'Job Post Request Accepted!',
                        text: "Job Post Request has been Accepted! see changes in Active",
                        icon: 'success',
                        type: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        fillJobPostList(3);
                    });
                         
                }
            });
        }
        else{
        }
    });


}

function rejectJobPost(JobPostID){

    var JID = JobPostID.replace("btnRejectJob", "");
    console.log(JID);


                                                    // EDIT THIS
    swal({
        title: 'Reject Pending Job?',
        text: "Are you sure you want to REJECT Job Post #" + JID + "?",
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

            // REJECT FUNCTION
            $.ajax({
                type: "POST",
                dataType: "html",
                data: {
                    JobPostID: JID
                },
                url: "../PHPFiles/Admin/jobPostRequestReject.php",
                success: function(data){
                    console.log(data);
                    swal({
                        title: 'Job Post has been Rejected!',
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
                        fillJobPostList(3);
                    });
                         
                }
            });
        }
        else{
        }
    });

    
}

function repostJobPost(JobPostID){

    var JID = JobPostID.replace("btnRepostJob", "");
    console.log(JID);


    swal({
        title: 'Repost Job Post?',
        text: "Are you sure you want to Repost Job Post #" + JID + "?",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Repost it!',
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

            // REPOST JOB FUNCTION
            $.ajax({
                type: "POST",
                dataType: "html",
                data: {
                    JobPostID: JID
                },
                url: "../PHPFiles/Admin/jobPostRepost.php",
                success: function(data){
                    console.log(data);
                    swal({
                        title: 'Job Post Successfuly Reposted!',
                        text: "Job Post Request has been Reposted! see changes in Active",
                        icon: 'success',
                        type: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        // fillJobPostList(2);
                    });
                         
                }
            });
        }
        else{
        }
    });
    
}

function recoverJobPost(JobPostID){

    var JID = JobPostID.replace("btnRecoverJob", "");
    console.log(JID);

    swal({
        title: 'Recover Job Post?',
        text: "Are you sure you want to Recover Job Post #" + JID + "?",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Recover it!',
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
            
            // Recover JOB FUNCTION
            $.ajax({
                type: "POST",
                dataType: "html",
                data: {
                    JobPostID: JID
                },
                url: "../PHPFiles/Admin/jobPostRecover.php",
                success: function(data){
                    console.log(data);
                    swal({
                        title: 'Job Post Successfuly Recovered!',
                        text: "Job Post Request has been Recovered! see changes in Active",
                        icon: 'success',
                        type: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        fillJobPostList(4);
                    });
                         
                }
            });
        }
        else{
        }
    });
    
}

function closeJobPostView(){

    $('#txtMainClassification').val('');
    $('#txtSubClassification').val('');

    history.replaceState(null, document.title, window.location.pathname + window.location.search);
    $('#btnCloseJobPostView').click();
}

