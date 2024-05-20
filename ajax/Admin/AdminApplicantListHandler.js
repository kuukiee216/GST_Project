function fillApplicantList(current_Table){

    $.ajax({
        type: "POST",
        datatype: "html",
        url: "../PHPFiles/Admin/getApplicantList.php",
        success: function(data){
            console.log(data);
            console.log(current_Table);
            if(data != null){
                var decodedData = JSON.parse(data);
                
                if($.fn.DataTable.isDataTable(current_Table)){
                    $(current_Table).DataTable().destroy();
                }

                $(current_Table).DataTable({
                    pageLength: 10,
                    data: decodedData,
                    columns: [
                        { data: 'ApplicantID' },
                        { data: 'ApplicantName' },
                        { data: 'Email' },
                        { data: 'RegistrationDate' },
                        { data: 'Action' }
                    ]
                });


                //$('#tblActiveJobPosting').DataTable.destroy();
                //$('#tblexamineelist').html(data);
            }

        }, 
        error: function(data){


        }

    });
   

}

function viewApplicant(ApplicantID){

    var AID = ApplicantID.replace('btnViewApplicant', '');
    console.log(AID);

    location.href = "applicant_list_2.php#" + AID;
}

function getApplicantContent(){

    var AID = window.location.hash.replace('#','');
    console.log(AID);

    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ApplicantID: AID
        },
        url: "../PHPFiles/Admin/getApplicantInfo.php",
        success: function(data){
            console.log(data);
            
            if(data == '1'){

            }
            else if(data == '2'){

            }
            else{
                var decodedData = JSON.parse(data);

                $('#pf-name span').text(decodedData['ApplicantName']);
                $('#pf-contact-number span').text(decodedData['Phone']);
                $('#pf-email span').text(decodedData['EmailAddress']);
                $('#pf-country span').text(decodedData['CountryName']);
                $('#pf-city span').text(decodedData['CityName']);
                $('#pf-state span').text(decodedData['ProvinceName']);
                $('#pf-registration-date span').text(decodedData['RegistrationDate']);
            }

        }
    });
}

function getApplicationHistory(){

    var AID = window.location.hash.replace('#','');
    console.log(AID);

    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ApplicantID: AID
        },
        url: "../PHPFiles/Admin/getApplicantHistory.php",
        success: function(data){
            console.log(data);
            if(data == '1'){
                console.log('No Application History Found');
            }
            else{
                var encodedData = JSON.parse(data);

                encodedData.forEach(function(dataRow) {
                    $('#applicationHistory').append(dataRow['Application']);
                });
            }
        }

    });

}