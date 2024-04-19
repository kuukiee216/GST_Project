
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
            
            // input type
            $("input[name='name']").val(fullName);
            $("input[name='fname']").val(data.FirstName);
            $("input[name='lname']").val(data.LastName);
            $("input[name='email']").val(data.UserID);
            $("input[name='number']").val(data.Phone);
            $("#exampleBusunessName").val(data.CompanyName);
            $("input[name='telephone']").val(data.ContactNumber1);
            $("input[name='state']").val(data.state);
            $("input[name='country']").val(data.country);
            $("input[name='city']").val(data.city);
            $("input[name='address']").val(data.address_line);
            $("input[name='postal']").val(data.postal);

            // Para sa not input type
            $("#email").text(data.UserID);
            $("#emails").text(data.UserID);
            $("#companyEmail").text(data.EmailAddress);
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