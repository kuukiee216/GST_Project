
function GetInfo() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/getJobTitle.php",
        success: function(data) {
            if (data.error) {
                console.log(data.error);
                return;
            }
            var select = $("#jobtitles"); 
            select.empty(); 
            
            $.each(data, function(index, jobTitle) {
                select.append($("<option>", {
                    value: jobTitle.JobTitleID, 
                    text: jobTitle.JobTItleName
                }));
            });
        },
        error: function(xhr, status, error) {
            console.log("Error fetching data: " + error);
        }
    });
}


function disableForm(formID){
    var form = document.getElementById(formID);
    var elements = form.elements;
    for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {
        if(elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT'){
            elements[elementCounter].disabled = true;
        }
        else{
            continue;
        }
    }
}
function enableForm(formID){
    var form = document.getElementById(formID);
    var elements = form.elements;
    for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {

        if(elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT'){
            elements[elementCounter].disabled = false;
        }
        else{
            continue;
        }
    }
}