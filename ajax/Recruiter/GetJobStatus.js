var openJobTitle = [];
var expiredJobTitle = [];
var draftJobTitle = [];
var candidates = [];

// Fetch open job titles
function GetJobTitles() {
    return $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/OpenJobPosting.php"
    }).then(function(data) {
        if (data && data.length > 0) {
            openJobTitle = data.map(job => ({
                'JobID': job.JobID,
                'JobTitle': job.JobTitle,
                'Status': job.Status,
                'ApplicationCount': job.ApplicationCount
            }));
        } else {
            openJobTitle = [];
        }
    }).fail(function(xhr, status, error) {
        console.log("Error fetching job titles: " + error);
    });
}

// Display open job titles
function displayJobTitles() {
    var jobContainer = $('#openJobContainer');
    jobContainer.empty();

    var headerRowHtml = '<h2 class="pt-3"><b>OPEN</b></h2>' +
        '<div class="card">' +
        '<div class="card-body">' +
        '<div class="row row-cols-5 text-start">' +
        '<div class="col">Status</div>' +
        '<div class="col">Job</div>' +
        '<div class="col">Candidates</div>' +
        '<div class="col">Job Actions</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    jobContainer.append(headerRowHtml);

    if (openJobTitle.length === 0) {
        var noDataHtml = '<div class="card">' +
            '<div class="card-body">' +
            '<div class="row text-start">' +
            '<div class="col-12 text-center">No data available</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        jobContainer.append(noDataHtml);
    } else {
        $.each(openJobTitle, function(index, job) {
            var statusBadgeHtml;
            var applicationCountHtml;
            var jobActionsHtml;

            if (job.Status === 1) {
                statusBadgeHtml = '<span class="badge badge-warning">Pending</span>';
                applicationCountHtml = '-';
                jobActionsHtml = '-';
            } else if (job.Status === 2) {
                statusBadgeHtml = '<span class="badge badge-success">Posted</span>';
                applicationCountHtml = job.ApplicationCount;
                jobActionsHtml = '<i class="fa fa-stop" data-job-id="' + job.JobID + '"></i>';
            } else {
                statusBadgeHtml = '<span class="badge badge-secondary">Unknown</span>';
                applicationCountHtml = '-';
                jobActionsHtml = '-';
            }

            var jobTitleRowHtml = '<div class="card">' +
                '<div class="card-body">' +
                '<div class="row row-cols-5 text-start">' +
                '<div class="col">' + statusBadgeHtml + '</div>' +
                '<div class="col">' +
                '<div class="row">' +
                '<div style="text-decoration: underline;">' + job.JobTitle + '</div><br>' +
                '</div>' +
                '</div>' +
                '<div class="col fw-bold">' + applicationCountHtml + '</div>' +
                '<div class="col fw-bold">' + jobActionsHtml + '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            jobContainer.append(jobTitleRowHtml);
        });

        jobContainer.on('click', '.fa-stop', function() {
            var jobID = $(this).data('job-id');
            confirmStopJobPosting(jobID);
        });
    }
}

// Confirm stop job posting
function confirmStopJobPosting(jobID) {
    swal({
        title: 'Are you sure?',
        text: "Do you really want to stop this job posting?",
        icon: 'warning',
        buttons: {
            cancel: {
                text: "No, keep it",
                value: null,
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "Yes, stop it!",
                value: true,
                visible: true,
                closeModal: true
            }
        }
    }).then((confirmed) => {
        if (confirmed) {
            stopJobPosting(jobID);
        }
    });
}

// Stop job posting
function stopJobPosting(jobID) {
    return $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/StopPosting.php",
        data: { JobID: jobID }
    }).then(function(response) {
        if (response.success) {
            swal({
                title: 'Success!',
                text: 'Job posting stopped successfully.',
                icon: 'success'
            });
            // Optionally refresh the job titles
            window.location.reload();
        } else {
            swal({
                title: 'Error!',
                text: 'Error stopping job posting: ' + response.message,
                icon: 'error'
            });
        }
    }).fail(function(xhr, status, error) {
        swal({
            title: 'Error!',
            text: 'Error stopping job posting: ' + error,
            icon: 'error'
        });
    });
}

// Fetch expired job titles
function GetExpiredJobTitles() {
    return $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/ExpiredJobPosting.php"
    }).then(function(data) {
        if (data && data.length > 0) {
            expiredJobTitle = data.map(job => ({
                'JobID': job.JobID,
                'JobTitle': job.JobTitle,
                'Status': job.Status,
                'ApplicationCount': job.ApplicationCount
            }));
        } else {
            expiredJobTitle = [];
        }
    }).fail(function(xhr, status, error) {
        console.log("Error fetching job titles: " + error);
    });
}

// Display expired job titles
function displayExpiredJobTitles() {
    var jobContainer = $('#expiredJobContainer');
    jobContainer.empty();

    var headerRowHtml = '<h2 class="pt-3"><b>Expired</b></h2>' +
        '<div class="card">' +
        '<div class="card-body">' +
        '<div class="row row-cols-5 text-start">' +
        '<div class="col">Status</div>' +
        '<div class="col">Job</div>' +
        '<div class="col">Candidates</div>' +
        '<div class="col">Job Actions</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    jobContainer.append(headerRowHtml);

    if (expiredJobTitle.length === 0) {
        var noDataHtml = '<div class="card">' +
            '<div class="card-body">' +
            '<div class="row text-start">' +
            '<div class="col-12 text-center">No data available</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        jobContainer.append(noDataHtml);
    } else {
        $.each(expiredJobTitle, function(index, job) {
            var statusBadgeHtml = job.Status === 3 ? '<span class="badge badge-danger">Expired</span>' : '';

            var jobTitleRowHtml = '<div class="card">' +
                '<div class="card-body">' +
                '<div class="row row-cols-5 text-start">' +
                '<div class="col">' + statusBadgeHtml + '</div>' +
                '<div class="col">' +
                '<div class="row">' +
                '<div style="text-decoration: underline;">' + job.JobTitle + '</div><br>' +
                '</div>' +
                '</div>' +
                '<div class="col fw-bold">' + job.ApplicationCount + '</div>' +
                '<div class="col fw-bold">' + '<i class="fa fa-redo" data-job-id="' + job.JobID + '"></i>' + '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            jobContainer.append(jobTitleRowHtml);
        });

        jobContainer.on('click', '.fa-redo', function() {
            var jobID = $(this).data('job-id');
            confirmRedoJobPosting(jobID);
        });
    }
}

// Confirm redo job posting
function confirmRedoJobPosting(jobID) {
    swal({
        title: 'Are you sure?',
        text: "Do you want to reopen this job posting?",
        icon: 'warning',
        buttons: {
            cancel: {
                text: "No, keep it expired",
                value: null,
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "Yes, reopen it!",
                value: true,
                visible: true,
                closeModal: true
            }
        }
    }).then((confirmed) => {
        if (confirmed) {
            redoJobPosting(jobID);
        }
    });
}

// Redo job posting
function redoJobPosting(jobID) {
    return $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/RedoPosting.php", 
        data: { JobID: jobID }
    }).then(function(response) {
        if (response.success) {
            swal({
                title: 'Success!',
                text: 'Job posting reopened successfully.',
                icon: 'success'
            });
            // Optionally refresh the job titles
            window.location.reload();
        } else {
            swal({
                title: 'Error!',
                text: 'Error reopening job posting: ' + response.message,
                icon: 'error'
            });
        }
    }).fail(function(xhr, status, error) {
        swal({
            title: 'Error!',
            text: 'Error reopening job posting: ' + error,
            icon: 'error'
        });
    });
}

// Fetch draft job titles
function GetDraftJobTitles() {
    return $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/DraftJobPosting.php"
    }).then(function(data) {
        if (data && data.length > 0) {
            draftJobTitle = data.map(job => ({
                'JobID': job.JobID,
                'JobTitle': job.JobTitle,
                'Status': job.Status,
                'ApplicationCount': job.ApplicationCount
            }));
        } else {
            draftJobTitle = [];
        }
    }).fail(function(xhr, status, error) {
        console.log("Error fetching job titles: " + error);
    });
}

// Display draft job titles
function displayDraftJobTitles() {
    var jobContainer = $('#draftJobContainer');
    jobContainer.empty();

    var headerRowHtml = '<h2 class="pt-3"><b>Draft</b></h2>' +
        '<div class="card">' +
        '<div class="card-body">' +
        '<div class="row row-cols-5 text-start">' +
        '<div class="col">Job</div>' +
        '<div class="col">Job Actions</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    jobContainer.append(headerRowHtml);

    if (draftJobTitle.length === 0) {
        var noDataHtml = '<div class="card">' +
            '<div class="card-body">' +
            '<div class="row text-start">' +
            '<div class="col-12 text-center">No data available</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        jobContainer.append(noDataHtml);
    } else {
        $.each(draftJobTitle, function(index, job) {

            var jobTitleRowHtml = '<div class="card">' +
                '<div class="card-body">' +
                '<div class="row row-cols-5 text-start">' +
                '<div class="col">' +
                '<div class="row">' +
                '<div style="text-decoration: underline;">' + job.JobTitle + '</div><br>' +
                '</div>' +
                '</div>' +
                '<div class="col fw-bold">' + '<i class="fa fa-edit" data-job-id="' + job.JobID + '"></i>' + '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            jobContainer.append(jobTitleRowHtml);
        });

        jobContainer.on('click', '.fa-edit', function() {
            var jobID = $(this).data('job-id');
            confirmEditJobPosting(jobID);
        });
    }
}

// Confirm edit job posting
function confirmEditJobPosting(jobID) {
    swal({
        title: 'Are you sure?',
        text: "Do you want to edit this job posting?",
        icon: 'warning',
        buttons: {
            cancel: {
                text: "No, keep it as draft",
                value: null,
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "Yes, edit it!",
                value: true,
                visible: true,
                closeModal: true
            }
        }
    }).then((confirmed) => {
        if (confirmed) {
            editJobPosting(jobID);
        }
    });
}

// Edit job posting
function editJobPosting(jobID) {
    window.location.href = 'create_jobad.php?JobID=' + jobID;
}

// Fetch candidates
function GetCandidate() {
    return $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/Candidate.php"
    }).then(function(data) {
        if (data && data.length > 0) {
            candidates = [];

            $.each(data, function(index, candidate) {
                console.log("candidate: ", candidate);
                candidates.push({ 
                    'ApplicantID': candidate.ApplicantID,
                    'ApplicantName': candidate.ApplicantName,
                    'Status': candidate.Status,
                    'MostRecentDate': candidate.MostRecentDate,
                    'SecondMostRecentDate': candidate.SecondMostRecentDate || 'N/A',
                    'ApplicationID': candidate.ApplicationID,
                });
            });
            displayCandidate();
        } else {
            console.log("No candidates found.");
        }
    }).fail(function(xhr, status, error) {
        console.log("Error fetching candidates: " + error);
    });
}

// Display candidates
function displayCandidate() {
    var jobContainer = $('#candidate');
    jobContainer.empty(); 

    var headerRowHtml = '<h2 class="pt-3"><b>Candidate</b></h2>' +
        '<div class="card">' +
        '<div class="card-body">' +
        '<div class="row row-cols-5 text-start">' +
        '<div class="col">Name</div>' +
        '<div class="col">Status</div>' +
        '<div class="col">Most Recent Application</div>' +
        '<div class="col">Previous Application</div>' +
        '<div class="col">Job Action</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    jobContainer.append(headerRowHtml);

    if (candidates.length === 0) {
        var noDataHtml = '<div class="card">' +
            '<div class="card-body">' +
            '<div class="row text-start">' +
            '<div class="col-12">No data available</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        jobContainer.append(noDataHtml);
    } else {
        $.each(candidates, function(index, candidate) {
            var statusBadgeHtml;
            switch (candidate.Status) {
                case 0:
                    statusBadgeHtml = '<span class="badge badge-warning">Pending</span>';
                    break;
                case 1:
                    statusBadgeHtml = '<span class="badge badge-success">Hired</span>';
                    break;
                case 2:
                    statusBadgeHtml = '<span class="badge badge-danger">Rejected</span>';
                    break;
                default:
                    statusBadgeHtml = '<span class="badge badge-secondary">Unknown</span>';
            }

            var candidateRowHtml = '<div class="card">' +
                '<div class="card-body">' +
                '<div class="row row-cols-5 text-start">' +
                '<div class="col">' + candidate.ApplicantName + '</div>' +
                '<div class="col">' + statusBadgeHtml + '</div>' +
                '<div class="col">' + candidate.MostRecentDate + '</div>' +
                '<div class="col">' + candidate.SecondMostRecentDate + '</div>' +
                '<div class="col">' +
                '<i class="fa fa-eye" title="View Details" style="margin-right: 10px" data-applicant-id="' + candidate.ApplicantID + '"></i>&nbsp;' +
                '<select class="status-select" data-application-id="' + candidate.ApplicationID + '">' +
                '<option value="" >Select Status</option>' +
                '<option value="1"' + (candidate.Status === 1 ? ' selected' : '') + '>Hired</option>' +
                '<option value="2"' + (candidate.Status === 2 ? ' selected' : '') + '>Rejected</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            jobContainer.append(candidateRowHtml);
        });
    }

    // Event handler for changing status
    $('.status-select').on('change', function() {
        var applicationID = $(this).data('application-id');
        var newStatus = $(this).val();
        changeCandidateStatus(applicationID, newStatus);
    });
}



function changeCandidateStatus(applicationID, newStatus) {
    swal({
        title: 'Are you sure?',
        text: "Do you want to change the status of this candidate?",
        icon: 'warning',
        buttons: {
            cancel: {
                text: "No, keep it",
                value: null,
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "Yes, change it!",
                value: true,
                visible: true,
                closeModal: true
            }
        }
    }).then((confirmed) => {
        if (confirmed) {
            // If confirmed, proceed with the status change
            $.ajax({
                type: "POST",
                url: "../PHPFiles/Recruiter/Status.php",
                data: { applicationID: applicationID, status: newStatus },
                success: function(response) {
                    console.log('Status updated successfully for application ID: ' + applicationID);
                    GetCandidate(); // Refresh the candidates list
                },
                error: function(xhr, status, error) {
                    console.log('Error updating status for application ID: ' + applicationID + ' - ' + error);
                }
            });
        }
    });
}

$(document).on('click', '.fa-eye', function() {
    var applicantID = $(this).data('applicant-id');
    
    // AJAX call to fetch the PDF file path
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/GetResume.php",
        data: { applicantID: applicantID },
        success: function(data) {
            // Set the PDF file path in the iframe source
            $('#pdfViewer').attr('src', '../' + data.filePath);
            $('#resumeModal').modal('show'); // Show the modal
        },
        error: function(xhr, status, error) {
            console.log('Error fetching resume: ' + error);
            // You can display an error message or handle it as required
        }
    });
});




$(document).ready(function() {
    GetJobTitles().then(displayJobTitles);
    GetExpiredJobTitles().then(displayExpiredJobTitles);
    GetDraftJobTitles().then(displayDraftJobTitles);
    GetCandidate().then(displayCandidate);
});
