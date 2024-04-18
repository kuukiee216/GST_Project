
// APPLICANT SETTINGS

function GetInfo() {
    $.ajax({
        type: "POST",
        dataType: "json", // Change to JSON
        url: "../PHPFiles/Recruiter/getEmployerInfo.php",
        success: function(data) {
            if (data.error) {
                console.log(data.error);
                return;
            }
            $("#displayUserID").text(data.UserID);
            $("#exampleGivenName1").val(data.FirstName);
            $("#exampleFamilyName").val(data.LastName);
            $("#exampleBusunessName").val(data.CompanyName);
            $("#phone").val(data.ContactNumber1);
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