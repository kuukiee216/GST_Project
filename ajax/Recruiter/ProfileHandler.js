
// Recruiter retrieve info

function GetInfo() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/getEmployerInfo.php",
        success: function(data) {
            if (data.error) {
                console.log(data.error);
                return;
            }
            var fullName = data.FirstName + " " + data.LastName;

            $("#displayUserID").text(data.UserID);
            $("#exampleGivenName1").val(data.FirstName);
            $("#exampleFamilyName").val(data.LastName);
            $("#exampleBusunessName").val(data.CompanyName);
            $("#phone").val(data.Phone);
            $("#phone1").val(data.ContactNumber1);
            $("#state").val(data.state);
            $("#country").val(data.country);
            $("#city").val(data.city);
            $("#address").val(data.address_line);
            $("#postal").val(data.postal);
            $("#email").text(data.UserID);
            $("#emails").text(data.UserID);
            $("#fullName").text(fullName);
            $("#companyName").text(data.CompanyName);
            $("#phoneNum").text(data.Phone);
            $("#phoneCompany").text(data.ContactNumber1);
            $("#stateText").text(data.state);
            $("#countryText").text(data.country);
            $("#cityText").text(data.city);
            $("#addressText").text(data.address_line);
            $("#postalText").text(data.postal);


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