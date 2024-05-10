var openJobTitle = [];
var expiredJobTitle = [];
var draftJobTitle = [];

//open
function GetJobTitles() {
    return $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/OpenJobPosting.php"
    }).then(function(data) {
        if (data && data.length > 0) {
            openJobTitle = [];

            $.each(data, function(index, job) {
                openJobTitle.push({ 
                    'JobTitle': job.JobTitle,
                    'Status': job.Status
                });
            });
        } else {
            console.log("No job titles found.");
        }
    }).fail(function(xhr, status, error) {
        console.log("Error fetching job titles: " + error);
    });
}

function displayJobTitles() {
    var jobContainer = $('#openJobContainer');

    var headerRowHtml = '<h2 class="pt-3"><b>OPEN</b></h2>' +
        '<div class="card">' +
        '<div class="card-body">' +
        '<div class="row row-cols-5 text-start">' +
        '<div class="col">Status</div>' +
        '<div class="col">Job </div>' +
        '<div class="col">Candidates</div>' +
        '<div class="col">Performance</div>' +
        '<div class="col">Job Actions</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    jobContainer.append(headerRowHtml);

    $.each(openJobTitle, function(index, job) {
        var statusBadgeHtml;
        
        if (job.Status === 1) {
            statusBadgeHtml = '<span class="badge badge-warning">Pending</span>';
        } else if (job.Status === 2) {
            statusBadgeHtml = '<span class="badge badge-success">Posted</span>';
        } else {
            statusBadgeHtml = '<span class="badge badge-secondary">Unknown</span>';
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
            '<div class="col fw-bold">-</div>' +
            '<div class="col fw-bold">-</div>' +
            '<div class="col fw-bold">-</div>' +
            '</div>' +
            '</div>' +
            '</div>';
    
        jobContainer.append(jobTitleRowHtml);
    });
    
    
}

//expired

function GetExpiredJobTitles() {
    return $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/ExpiredJobPosting.php"
    }).then(function(data) {
        if (data && data.length > 0) {
            expiredJobTitle = [];

            $.each(data, function(index, job) {
                expiredJobTitle.push({ 
                    'JobTitle': job.JobTitle,
                    'Status': job.Status
                });
            });
        } else {
            console.log("No job titles found.");
        }
    }).fail(function(xhr, status, error) {
        console.log("Error fetching job titles: " + error);
    });
}

function displayExpiredJobTitles() {
    var jobContainer = $('#expiredJobContainer');

    var headerRowHtml = '<h2 class="pt-3"><b>Expired</b></h2>' +
        '<div class="card">' +
        '<div class="card-body">' +
        '<div class="row row-cols-5 text-start">' +
        '<div class="col">Status</div>' +
        '<div class="col">Job </div>' +
        '<div class="col">Candidates</div>' +
        '<div class="col">Performance</div>' +
        '<div class="col">Job Actions</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    jobContainer.append(headerRowHtml);

    $.each(expiredJobTitle, function(index, job) {
        var statusBadgeHtml;
        
        if (job.Status === 3) {
            statusBadgeHtml = '<span class="badge badge-danger">Expired</span>';
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
            '<div class="col fw-bold">-</div>' +
            '<div class="col fw-bold">-</div>' +
            '<div class="col fw-bold">-</div>' +
            '</div>' +
            '</div>' +
            '</div>';
    
        jobContainer.append(jobTitleRowHtml);
    });
    
    
}

//draft

function GetDraftJobTitles() {
    return $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/DraftJobPosting.php"
    }).then(function(data) {
        if (data && data.length > 0) {
            draftJobTitle = [];

            $.each(data, function(index, job) {
                draftJobTitle.push({ 
                    'JobTitle': job.JobTitle,
                    'Status': job.Status
                });
            });
        } else {
            console.log("No job titles found.");
        }
    }).fail(function(xhr, status, error) {
        console.log("Error fetching job titles: " + error);
    });
}

function displayDraftJobTitles() {
    var jobContainer = $('#draftJobContainer');

    var headerRowHtml = '<h2 class="pt-3"><b>Draft</b></h2>' +
        '<div class="card">' +
        '<div class="card-body">' +
        '<div class="row row-cols-5 text-start">' +
        '<div class="col">Status</div>' +
        '<div class="col">Job </div>' +
        '<div class="col">Candidates</div>' +
        '<div class="col">Performance</div>' +
        '<div class="col">Job Actions</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    jobContainer.append(headerRowHtml);

    $.each(draftJobTitle, function(index, job) {
        var statusBadgeHtml;
        
        if (job.Status === 4) {
            statusBadgeHtml = '<span class="badge badge-primary">Draft</span>';
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
            '<div class="col fw-bold">-</div>' +
            '<div class="col fw-bold">-</div>' +
            '<div class="col fw-bold">-</div>' +
            '</div>' +
            '</div>' +
            '</div>';
    
        jobContainer.append(jobTitleRowHtml);
    });
    
    
}

// Candidate
