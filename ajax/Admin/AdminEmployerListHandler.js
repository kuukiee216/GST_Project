function fillCurrentList(currentList){
    var current_Table = "#tblEmployers";
    
    switch(currentList){
        case 1: 
            current_Table = "#tblEmployers";
            break;
        case 2: 
            current_Table = "#tblCompanies";
            break;
    }

    $.ajax({
        type: "POST",
        datatype: "html",
        data: {
            ActiveTable: currentList
        },
        url: "../PHPFiles/Admin/EmployerList/getEmployersCompaniesList.php",
        success: function(data){
            console.log(data);
            if(data == '1'){

            }else{
                var decodedData = JSON.parse(data);

                if($.fn.DataTable.isDataTable(current_Table)){
                    $(current_Table).DataTable().destroy();
                }
            
                if(currentList == 1){
                    $(current_Table).DataTable({
                        pageLength: 10,
                        data: decodedData,
                        columns: [
                            { data: 'CompanyName' },
                            { data: 'EmployerName' },
                            { data: 'Email' },
                            { data: 'Status' },
                            { data: 'Action' }
                        ]
                    });
                }else if(currentList == 2){
                    $(current_Table).DataTable({
                        pageLength: 10,
                        data: decodedData,
                        columns: [
                            { data: 'CompanyName' },
                            { data: 'ContactNumber1' },
                            { data: 'Location' },
                            { data: 'Action' }
                        ]
                    });
                }
            }
        }
    });

   
   



}

function submitAddEmployer(){
    var RepCompany = $('#selectCompany').val();
    var RepFName = $('#txtEmployerFname').val().trim();
    var RepMName = $('#txtEmployerMname').val().trim();
    var RepLName = $('#txtEmployerLname').val().trim();
    var RepEmail = $('#txtEmployerEmail').val().trim();
    var RepContact = $('#txtEmployerContact').val().trim();

    $.ajax({
        type: 'POST',
        url: '../PHPFiles/Admin/EmployerList/employerListAdd.php',
        data: {
            RepFName: RepFName,
            RepMName: RepMName,
            RepLName: RepLName,
            RepEmail: RepEmail,
            RepContact: RepContact,
            RepCompany: RepCompany
        },
        success: function(data) {
            console.log(data);
            if(data == '1'){
                swal({
                    title: "Employer Submitted!",
                    text: "The employer's account has been created",
                    icon: "success",
                    buttons: {
                        confirm: {
                            text: "Okay",
                            value: true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                }).then(function(){
                    location.reload();
                });
            }else if(data == '4'){
                swal({
                    title: "Email invalid for use",
                    text: "Employer's Submitted Email is already being used",
                    icon: "info",
                    buttons: {
                        confirm: {
                            text: "Okay",
                            value: true,
                            visible: true,
                            className: "btn btn-primary",
                            closeModal: true
                        }
                    }
                }).then(function(){
                   
                });
            }else if(data == '5'){
                swal({
                    title: "Missing Inputs",
                    text: "Please Fill-up the missing form inputs",
                    icon: "info",
                    buttons: {
                        confirm: {
                            text: "Okay",
                            value: true,
                            visible: true,
                            className: "btn btn-primary",
                            closeModal: true
                        }
                    }
                }).then(function(){
                   
                });
            }else{
                alert("Employer Account has been created");
                location.reload();
            }
        },
        error: function(error) {
            alert('An error occurred while adding the employer');
        }
    });
}

function submitAddCompany(){
    var CompanyName = $('#txtCompanyName').val();
    var CompanyEmail = $('#txtCompanyEmail').val();
    var CompanyNumber = $('#txtCompanyContact').val();
    var CompanySite = $('#txtCompanyWebsite').val();

    var LocationCountry = $('#selectCountry').val();
    var LocationState = $('#selectState').val();
    var LocationCity = $('#selectCity').val();

    $.ajax({
        type: 'POST',
        url: '../PHPFiles/Admin/EmployerList/employerListAddCompany.php',
        data: {
            CompanyName: CompanyName,
            CompanyEmail: CompanyEmail,
            CompanyNumber: CompanyNumber,
            CompanySite: CompanySite,
            LocationCountry: LocationCountry,
            LocationState: LocationState,
            LocationCity: LocationCity
        },
        success: function(data) {
            console.log(data);
            if(data == '1'){
                swal({
                    title: "Company Added!",
                    text: "The company has been submitted and added",
                    icon: "success",
                    buttons: {
                        confirm: {
                            text: "Okay",
                            value: true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                }).then(function(){
                    location.reload();
                });
            }else if(data == '4'){
                swal({
                    title: "Email invalid for use",
                    text: "Company's Submitted Email is already being used",
                    icon: "info",
                    buttons: {
                        confirm: {
                            text: "Okay",
                            value: true,
                            visible: true,
                            className: "btn btn-primary",
                            closeModal: true
                        }
                    }
                }).then(function(){
                   
                });
            }else if(data == '5'){
                swal({
                    title: "Missing Inputs",
                    text: "Please Fill-up the missing form inputs",
                    icon: "info",
                    buttons: {
                        confirm: {
                            text: "Okay",
                            value: true,
                            visible: true,
                            className: "btn btn-primary",
                            closeModal: true
                        }
                    }
                }).then(function(){
                   
                });
            }else{
                
            }
        },
        error: function(error) {
            alert('An error occurred while adding the employer');
        }
    });
}

function showAddModal(){
        $('#addEmployerModal').modal({
            backdrop: 'static',
            keyboard: true,
            focus: true,
            show: true
        });
}

function closeAddEmployer(){
    $('#txtCompanyName').val('');
    $('#txtCompanyEmail').val('');
    $('#txtCompanyContact').val('');

    $('#txtEmployerFname').val('');
    $('#txtEmployerMname').val('');
    $('#txtEmployerLname').val('');
    $('#txtEmployerEmail').val('');

    history.replaceState(null, document.title, window.location.pathname + window.location.search);
    $('#btnCloseAddEmployer').click();
}


function changeInterface(btnName, btnModals){
    $('add-employer-btn').text(btnName);

    if(btnModals == 'Companies'){
        // Reveal Inputs from Companies
        $('#btnName').text('Companies');
        $('#btnSubmitAddCompany').show();
        $('#btnSubmitAddEmployer').hide();

        $('#divFormCompanyInfo').show();
        $('#divFormEmployerInfo').hide();

    }
    else if(btnModals == 'Employers'){
        // Reveal Inputs from Employers
        $('#btnName').text('Employer Accounts');
        $('#btnSubmitAddCompany').hide();
        $('#btnSubmitAddEmployer').show();

        $('#divFormCompanyInfo').hide();
        $('#divFormEmployerInfo').show();
    }
}

function ViewEmployer(EmployerID){
    var EID = EmployerID.replace('btnViewEmployer', '');
    
    window.location.href = "employer_list_2.php#" + EID;
}

function setEmployerInfo(){
    var EID = window.location.hash.replace('#','');

    $.ajax({
        type: "POST",
        datatype: "html",
        data: {
            EmployerID: EID
        },
        url: "../PHPFiles/Admin/EmployerList/getEmployerInfoContent.php",
        success:function(data){
            console.log(data);
            if(data == '1'){

            }else{
                var decodedData = JSON.parse(data);

                $(document).ready(function() {
                    $("#EmployerName").text(decodedData['EmployerName']);
                    $("#EmployerPassword").text("jiaxin impact");
                    $("#EmployerEmail").text(decodedData['EmailAddress']);
                    $("#EmployerPhone").text(decodedData['Phone']);


                    $("#CompanyName").text(decodedData['CompanyName']);
                    $("#CompanyCountry").text(decodedData['CompanyCountry']);
                    $("#CompanyStateCity").text(decodedData['CompanyCity'] + ", " + decodedData['CompanyState']);
                });
            }
        }
    })
}

function setEmployerCompanyJobs(){
    var EID = window.location.hash.replace('#','');
    $.ajax({
        type: "POST",
        datatype: "html",
        data: {
            EmployerID: EID
        },
        url: "../PHPFiles/Admin/EmployerList/getCompanyEmployerJobs.php",
        success:function(data){
            console.log(data);
            if(data == '1'){

            }else{
                var decodedData = JSON.parse(data);

                $(document).ready(function() {
                    $.each(decodedData, function(index, value) {
                        $("#jobHolder").append(value.JobCard);
                    });
                });
            }
            
        }
    });
}

function DeleteEmployer(EmployerID){
    var EID = EmployerID.replace('btnDeleteEmployer', '');
    

    $.ajax({
        type: "POST",
        datatype: "html",
        data: {
            EmployerID: EID
        },
        url: "../PHPFiles/Admin/EmployerList/deleteEmployer.php",
        success:function(data){
            console.log(data);
            if(data == '1'){
                swal({
                    title: "Employer has been set to Delete!",
                    text: "The employer's account and info will be deleted in 15 days",
                    icon: "success",
                    buttons: {
                        confirm: {
                            text: "Okay",
                            value: true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                }).then(function(){
                    location.reload();
                });
            }else if(data == '2'){

            }else if(data == '3'){
                
            }else if(data == '4'){
                
            }else{
                
            }
        }
    })
}

function ViewCompany(CompanyID){
    var CID = CompanyID.replace('btnViewCompany', '');
}

function DeleteCompany(CompanyID){
    var CID = CompanyID.replace('btnDeleteCompany', '');
}