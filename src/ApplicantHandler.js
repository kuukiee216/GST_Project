/*
    Profile
*/
function fillProfileInfo(){

    $.ajax({
        type: "GET",
        dataType: "html",
        url: "../PHPFiles/profile_data_retrieve.php",
        success: function(data){
            var decodedData = JSON.parse(data);
            $('#applicantName').text(decodedData['FullName']);
            $('#pf-email span').text(decodedData['EmailAddress']);
            $('#pf-phone span').text(decodedData['Phone']);
            $('#pf-country span').text(decodedData['Country']);
            
        }

    });


}