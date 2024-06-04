var jobTitlesArray = [];

function GetJobTitles() {
    return $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/OpenJobPosting.php"
    }).then(function(data) {
        if (data && data.length > 0) {
            jobTitlesArray = [];

            $.each(data, function(index, job) {
                jobTitlesArray.push({ 
                    'JobTitle': job.JobTitle,
                    'Status': job.Status,
                    'ViewCount': job.ViewCount,
                    'ApplicationCount': job.ApplicationCount
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
    var jobContainer = $('#jobContainer');

    var headerRowHtml = '<h2 class="pt-3"><b>My Recent Job Ads</b></h2>' +
        '<div class="card">' +
        '<div class="card-body">' +
        '<div class="row row-cols-5 text-start">' +
        '<div class="col">Status</div>' +
        '<div class="col">Job </div>' +
        '<div class="col">Candidates</div>' +
        '<div class="col">Reach</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    jobContainer.append(headerRowHtml);

    $.each(jobTitlesArray, function(index, job) {
        var statusBadgeHtml;
var applicationCountHtml;
var viewCountHtml;

if (job.Status === 1) {
    statusBadgeHtml = '<span class="badge badge-warning">Pending</span>';
    applicationCountHtml = '-';
    viewCountHtml = '-';
} else if (job.Status === 2) {
    statusBadgeHtml = '<span class="badge badge-success">Posted</span>';
    applicationCountHtml = job.ApplicationCount;
    viewCountHtml = job.ViewCount;
} else {
    statusBadgeHtml = '<span class="badge badge-secondary">Unknown</span>';
    applicationCountHtml = '-';
    viewCountHtml = '-';
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
    '<div class="col fw-bold">' + viewCountHtml + '</div>' +
    '</div>' +
    '</div>' +
    '</div>';

        jobContainer.append(jobTitleRowHtml);
    });
    
    
}
