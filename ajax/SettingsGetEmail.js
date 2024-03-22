
// APPLICANT SETTINGS

function GetEmail() {
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "../PHPFiles/Applicant/getEmail.php",
        success: function(data) {
            $("#displayEmail").text(data);
        },
        error: function(xhr, status, error) {
            console.log("Error fetching email");
        }
    });
}


$("#email").keypress(function (event) {
    if (event.keyCode === 13) {
        $('#btnChangeEmail').click();
    }
});

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