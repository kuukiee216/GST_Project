
// APPLICANT CONTACTS

console.log("contact")

function GetContactInfo() {
    $.ajax({
        type: "GET",
        url: "../PHPFiles/Applicant/getContactInfo.php",
        success: function(data) {
            var contactInfo = JSON.parse(data);

            $('#Fname').val(contactInfo.FirstName);
            $('#Lname').val(contactInfo.LastName);
            $('#street').val(contactInfo.StreetAddress);
            $('#country').val(contactInfo.Country);
            $('#city').val(contactInfo.City);
            $('#Pnum').val(contactInfo.Phone);
            $('#state').val(contactInfo.Province);
            $('#postal').val(contactInfo.ZipCode);
        },
        error: function(xhr, status, error) {
            console.log("Error fetching contact information:", error);
        }
    });
}

function updateContactInfo() {
    var firstName = $('#Fname').val();
    var lastName = $('#Lname').val();
    var phoneNumber = $('#Pnum').val();

    $.ajax({
        type: "POST",
        url: "updateContactInfo.php", 
        data: {
            firstName: firstName,
            lastName: lastName,
            phoneNumber: phoneNumber
        },
        success: function(response) {
            console.log("Contact information updated successfully:", response);
        },
        error: function(xhr, status, error) {
            console.log("Error updating contact information:", error);
        }
    });
}

if (window.history.replaceState){
    window.history.replaceState(null, null, window.location.href);
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