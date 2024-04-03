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