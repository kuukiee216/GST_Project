function populateJobs(id, jobDescription){
   
    var divJob = document.createElement("div");
    var jobDescription = jobDescription;

    
    divJob.innerHTML = jobDescription;
    divJob.className = "col pt-3 pb-5";
    divJob.id = id;
    
    var jobspace = document.getElementById("jobspace");

    if(jobspace){
        jobspace.appendChild(divJob)
    } else{
        alert("didn't work");
    }

}

// Have a way to make it Dynamic

// Split every content of description and turn it to a function?

// use this function for getting data from database
function getListOfJobs(){

    var jobDescription = "";

    

    $.ajax({
            type: "POST",
            dataType: "html",
            url: "../PHPFiles/getJobList.php",
            success: function(data) {
                var jobDetails = JSON.parse(data);

                jobDetails.forEach(function(job) {

                    var jobTitle = job.JobTitle;
                    var description = job.Description;
                    var summary = job.Summary;
                    
                    alert(jobTitle);

                    jobDescription = `
                    <div class="card" style="width: 25rem;">
                        <div class="card-body">
                            <h8 class="card-title">`+ jobTitle + `</h8>
                
                            <div class="container mt-4">
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                    </svg>
                                    <span class="mr-2"><i class="bi bi-geo-alt-fill"></i></span>Osaka, Japan
                                </p>
                            </div>
                
                            <div class="container mt-4">
                                <p>
                                    <span class="mr-2"><i class="fa fa-clone"></i></span>Information and Communication Technology
                                </p>
                            </div>
                
                            <div class="container mt-4">
                                <p>
                                    <span><i class="fa fa-database"></i></span>60,000 Yen-100,000 Yen
                                </p>
                            </div>
                
                            <div class="container mt-4">
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    </svg>
                                    <i class="bi bi-clock-fill"></i>Full Time</p>
                            </div>
                
                            <div>
                                <ul>
                                    <li>
                                        <p>Description 1</p>
                                    </li>
                
                                    <li>
                                        <p>Description 2</p>
                                    </li>
                
                                    <li>
                                        <p>Description 3</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    `;
                    populateJobs("job-2", jobDescription);

                });
                  
            },
            error: function(xhr, status, error) {
                reject(error);
            }
        });

       
}