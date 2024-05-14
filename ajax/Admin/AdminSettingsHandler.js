// Classification List Functions
function getJobClassificationList(activeTable){

    var current_Table = "#tblMainClassification";
    
    switch(activeTable){
        case 1:
            current_Table = "#tblMainClassification";
            break;
        case 2:
            current_Table = "#tblSubClassification";
            break;
    }
    changeModal(activeTable);
    
    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ActiveTable: activeTable
        },
        url: "../PHPFiles/Admin/Settings/retrieveJobClassificationList.php",
        success: function(data){
            console.log(data);
            console.log(current_Table);
            if(data != null){
                var decodedData = JSON.parse(data);
                
                if($.fn.DataTable.isDataTable(current_Table)){
                    $(current_Table).DataTable().destroy();
                }

                if(activeTable == 1){
                    $(current_Table).DataTable({
                        pageLength: 10,
                        data: decodedData,
                        columns: [
                            { data: 'ClassificationID' },
                            { data: 'Classification' },
                            { data: 'Action' }
                        ]
                    });
                }else if(activeTable == 2){
                    $(current_Table).DataTable({
                        pageLength: 10,
                        data: decodedData,
                        columns: [
                            { data: 'SubClassificationID' },
                            { data: 'SubClassification' },
                            { data: 'Action' }
                        ]
                    });
                }

                //$('#tblActiveJobPosting').DataTable.destroy();
                //$('#tblexamineelist').html(data);
            }

        }, 
        error: function(data){


        }

    });
}

function changeModal(activeTable){
    if(activeTable == 1){
        $("#txtMainClassification").show();
        $("#txtSubClassification").hide();

        $("#lbMainClassification").show();
        $("#lbSubClassification").hide();

    }else if(activeTable == 2){
        $("#txtMainClassification").hide();
        $("#txtSubClassification").show();

        $("#lbMainClassification").hide();
        $("#lbSubClassification").show();

    }
}

function openJobClassificationForm(){
    $('#modalAddClassification').modal({
        backdrop: 'static',
        keyboard: true,
        focus: true,
        show: true
    });
}

function closeJobClassificationForm(){
    swal({
        title: 'Discard Changes?',
        text: "Are you sure you want to close? Take note that this will erase/remove all your inputs.",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Close it!',
                className : 'btn btn-primary'
            },
            cancel: {
                visible: true,
                text : 'Cancel',
                className: 'btn btn-danger'
            }
        }
    }).then((Cancel) => {
        if (Cancel) {
            $('#txtMainClassification').val('');
            $('#txtSubClassification').val('');

            history.replaceState(null, document.title, window.location.pathname + window.location.search);
            $('#btnCloseAddJobClassification').click();
        }
        else{
            // do nothing
        }
    });
}

function addJobClassification(activeTable){
    $('#btnAddJobClassification').addClass('is-loading');
    // disableForm(formID);     

    var Classification = '';

    if(activeTable == 1)
        Classification = $('#txtMainClassification').val();
    else if(activeTable == 2)
        Classification = $('#txtSubClassification').val();

    if(Classification != ''){
        $.ajax({
            type: "POST",
            datatype: "html",
            data: {
                Classification : Classification,
                ActiveTable : activeTable
            },
            url: "../PHPFiles/Admin/Settings/jobClassificationAdd.php",
            success: function(data){
                alert(data);
                if(data == '1'){
                    swal({
                        title: 'Job Classification Added!',
                        text: "Successfully Added the Job Classification",
                        icon: 'success',
                        type: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                            $('#btnAddJobClassification').removeClass('is-loading');
                            $("#btnCloseAddJobClassification").click();

                        getJobClassificationList();
                    });

                }else if(data == '2'){
                    swal({
                        title: 'An Error Has Occured!',
                        text: "There seems to be trouble when connecting to the server, please try again",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                            $('#btnAddJobClassification').removeClass('is-loading');
                            $("#btnCloseAddJobClassification").click();

                        getJobClassificationList();
                    });
                }else if(data == '3'){
                    swal({
                        title: 'An Error has Occured!',
                        text: "An error occured while processing, please try again",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                            $('#btnAddJobClassification').removeClass('is-loading');
                            $("#btnCloseAddJobClassification").click();

                        getJobClassificationList(activeTable);
                    });
                }else if(data == '4'){
                    swal({
                        title: 'An Error has Occured!',
                        text: "The Classification entered already exists",
                        icon: 'error',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                            $('#btnAddJobClassification').removeClass('is-loading');
                            $("#btnCloseAddJobClassification").click();

                        getJobClassificationList(activeTable);
                    });
                }else{

                }

            }
        });
    }else{
        swal({
            title: 'Please Fill out Inputs!',
            text: "There seems to be inputs that hasn't been filled out",
            icon: 'error',
            buttons : {
                confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                }
            }
        }).then(function(){

        });
    }
}

function viewClassification(ClassificationID){
    console.log('View Function' + ClassificationID);

}

function deleteClassification(ClassificationID){
    console.log('Delete Function' + ClassificationID);

    CID = ClassificationID.replace('btnDeleteClassification', '');


    swal({
        title: 'Delete Job Classification?',
        text: "Are you sure you want to Delete this Job Classification?",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Delete it!',
                className : 'btn btn-primary'
            },
            cancel: {
                visible: true,
                text : 'Cancel',
                className: 'btn btn-danger'
            }
        }
    }).then((Hide) => {
        if (Hide) {

            $.ajax({
                type: "POST",
                datatype: "html",
                data: {
                    ClassificationID: CID
                },
                url: "../PHPFiles/Admin/Settings/jobClassificationDelete.php",  
                success: function(data) {
        
                    console.log(data);
                    if(data == '1'){
                        swal({
                            title: 'Classification Deleted!',
                            text: "Successfully Delete the selected Classification",
                            icon: 'success',
                            type: 'success',
                            buttons : {
                                confirm: {
                                    text : 'Okay',
                                    className : 'btn btn-success'
                                }
                            }
                        }).then(function(){
                            getJobClassificationList();
                        });
                        
                    }else if(data == '2'){
        
                    }else if(data == '3'){
        
                    }  
                }
            });

        }

    });

   

}

// Job Title List Functions
function getJobTitleList(){
    current_Table = '#tblJobTitles';
    
    $.ajax({
        type: "POST",
        datatype: "html",
        url: "../PHPFiles/Admin/Settings/retrieveJobTitleList.php",
        success: function(data) {
            console.log(data);
            if(data == '1'){
                var decodedData = JSON.parse(data);

                if($.fn.DataTable.isDataTable(current_Table)){
                    $(current_Table).DataTable().destroy();
                }

                $(current_Table).DataTable({

                    data: decodedData,
                    columns: [
                        { data: 'JobDescriptiveID' },
                        { data: 'JobTitle' },
                        { data: 'Classification' },
                        { data: 'SubClassification' },
                        { data: 'Action' }
                    ]
                });
                
            }else{
                var decodedData = JSON.parse(data);


                if($.fn.DataTable.isDataTable(current_Table)){
                    $(current_Table).DataTable().destroy();
                }

                $(current_Table).DataTable({

                    data: decodedData,
                    columns: [
                        { data: 'JobDescriptiveID' },
                        { data: 'JobTitle' },
                        { data: 'Classification' },
                        { data: 'SubClassification' },
                        { data: 'Action' }
                    ]
                });

            }
        }

    }); 
    
}

function openAddJobTitleForm(){
    $('#modalAddJobTitle').modal({
        backdrop: 'static',
        keyboard: true,
        focus: true,
        show: true
    });
}

function closeAddJobTitleForm(){
    swal({
        title: 'Discard Changes?',
        text: "Are you sure you want to close? Take note that this will erase/remove all your inputs.",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Close it!',
                className : 'btn btn-primary'
            },
            cancel: {
                visible: true,
                text : 'Cancel',
                className: 'btn btn-danger'
            }
        }
    }).then((Cancel) => {
        if (Cancel) {
            $('#txtJobTitle').val('');
            $('#lstSubClassifications').prop('disabled', true);
            $('#lstMainClassifications').prop('selectedIndex', -1);
            $('#lstSubClassifications').prop('selectedIndex', -1);

            history.replaceState(null, document.title, window.location.pathname + window.location.search);
            $('#btnCloseAddJobTitleForm').click();
        }
        else{
            // do nothing
        }
    });
}

function populateMainClassificationSelect(){

    var Main_Classifications = [];

    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            MainClassification : '1'
        },
        url: "../PHPFiles/Admin/Settings/retrieveJobClassificationList.php",
        success: function(data){
            console.log(data);
            if(data == '1'){
                
            }else{
                var decodedData = JSON.parse(data);

                for (var i = 0; i < decodedData.length; i++) {
                    var jobClassifications = decodedData[i];

                    Main_Classifications.push(jobClassifications.Classification);
                }
                // Get the datalist element
                var datalist = document.getElementById("lstMainClassifications");
                console.log(Main_Classifications);

                // Populate the datalist with options
                Main_Classifications.forEach(function(main_classification) {
                    var option = document.createElement('option');
                    option.value = main_classification;
                    option.textContent = main_classification; 
                    datalist.appendChild(option);
                });
            }
        }
    });

}

function populateSubClassificationSelect(){
    var Sub_Classifications = [];

    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            SubClassification : '1'
        },
        url: "../PHPFiles/Admin/Settings/retrieveJobClassificationList.php",
        success: function(data){
            console.log(data);
            if(data == '1'){
                
            }else{
                var decodedData = JSON.parse(data);

                for (var i = 0; i < decodedData.length; i++) {
                    var jobClassifications = decodedData[i];

                    Sub_Classifications.push(jobClassifications.SubClassification);
                }
                // Get the datalist element
                var datalist = document.getElementById("lstSubClassifications");
                console.log(Sub_Classifications);

                // Populate the datalist with options
                Sub_Classifications.forEach(function(main_classification) {
                    var option = document.createElement('option');
                    option.value = main_classification;
                    option.textContent = main_classification; 
                    datalist.appendChild(option);
                });
            }
        }
    });
}

function submitJobTitle(){

    var JobTitle = $('#txtJobTitle').val();
    var MainClassification = $('#lstMainClassifications').val();
    var SubClassification = $('#lstSubClassifications').val();

    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            JobTitle : JobTitle,
            MainClassification : MainClassification,
            SubClassification : SubClassification
        },
        url: "../PHPFiles/Admin/Settings/jobTitleSubmit.php",
        success: function(data){
            alert(data);

        }
    });

}

function viewJobTitle(JobID){

}

function deleteJobTitle(JobID){

}


// Location Settings
function getLocations(){
    
}

function openAddLocationsForm(){
    $('#modalAddLocation').modal({
        backdrop: 'static',
        keyboard: true,
        focus: true,
        show: true
    });
}

function closeAddLocationsForm(){
    swal({
        title: 'Discard Changes?',
        text: "Are you sure you want to close? Take note that this will erase/remove all your inputs.",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Close it!',
                className : 'btn btn-primary'
            },
            cancel: {
                visible: true,
                text : 'Cancel',
                className: 'btn btn-danger'
            }
        }
    }).then((Cancel) => {
        if (Cancel) {
            // $('#txtJobTitle').val('');
            // $('#lstSubClassifications').prop('disabled', true);
            // $('#lstMainClassifications').prop('selectedIndex', -1);
            // $('#lstSubClassifications').prop('selectedIndex', -1);

            $('#selectCountry').prop('selectedIndex', 1);

            history.replaceState(null, document.title, window.location.pathname + window.location.search);
            $('#btnCloseAddLocationForm').click();
        }
        else{
            // do nothing
        }
    });
}


// POSTING FEE
function openAdTypes(){
    $('#modalAddAdTypes').modal({
        backdrop: 'static',
        keyboard: true,
        focus: true,
        show: true
    });
}

function openPromoCode(){
    $('#modalAddPromoCode').modal({
        backdrop: 'static',
        keyboard: true,
        focus: true,
        show: true
    });
}

function addPromoCode(formAddPromoCode){
    var PromoName = $('#txtPromoName').val();
    var PromoCode = $('#txtPromoCode').val();
    var Discount = $('#txtPromoDiscount').val();
    var Description = $('#txtPromoDescription').val();


    $.ajax({
        type: 'POST',
        datatype: 'html',
        data: {
            PromoName : PromoName,
            PromoCode : PromoCode,
            Discount : Discount,
            Description : Description
        },
        url: '../PHPFiles/Admin/Settings/promoAdd.php',
        success:function(data){
            if(data == '1'){
                swal({
                    title: 'Promo Code has been Added!',
                    text: "Successfully Added the Promo Code.",
                    icon: 'success',
                    type: 'success',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    fillAdTypeList();
                });
            }else{
                alert(data);
            } 
        }
    })
}

function addAdType(formAddAdType){
    var AdType = $('#txtAdType').val();
    var Price = $('#txtAdPrice').val();
    var Discount = $('#txtAdDiscount').val();
    var Description = $('#txtAdDescription').val();

    alert(AdType + ' ' + Price + ' ' + Discount + ' ' + Description);

    $.ajax({
        type: 'POST',
        datatype: 'html',
        data: {
            AdType : AdType,
            Price : Price,
            Discount : Discount,
            Description : Description
        },
        url: '../PHPFiles/Admin/Settings/adTypeAdd.php',
        success:function(data){
            if(data == '1'){
                swal({
                    title: 'Ad Type has been Added!',
                    text: "Successfully Added the Ad Type.",
                    icon: 'success',
                    type: 'success',
                    buttons : {
                        confirm: {
                            text : 'Okay',
                            className : 'btn btn-success'
                        }
                    }
                }).then(function(){
                    fillAdTypeList();
                });
            }else{
                alert(data);
            } 
        }
    })

}

function closeAdTypes(){
    swal({
        title: 'Discard Changes?',
        text: "Are you sure you want to close? Take note that this will erase/remove all your inputs.",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Close it!',
                className : 'btn btn-primary'
            },
            cancel: {
                visible: true,
                text : 'Cancel',
                className: 'btn btn-danger'
            }
        }
    }).then((Cancel) => {
        if (Cancel) {
            // $('#txtJobTitle').val('');
            // $('#lstSubClassifications').prop('disabled', true);
            // $('#lstMainClassifications').prop('selectedIndex', -1);
            // $('#lstSubClassifications').prop('selectedIndex', -1);

            history.replaceState(null, document.title, window.location.pathname + window.location.search);
            $('#btnCloseAdTypes').click();
        }
        else{
            // do nothing
        }
    });
}

function closePromoCode(){
    swal({
        title: 'Discard Changes?',
        text: "Are you sure you want to close? Take note that this will erase/remove all your inputs.",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Close it!',
                className : 'btn btn-primary'
            },
            cancel: {
                visible: true,
                text : 'Cancel',
                className: 'btn btn-danger'
            }
        }
    }).then((Cancel) => {
        if (Cancel) {
            // $('#txtJobTitle').val('');
            // $('#lstSubClassifications').prop('disabled', true);
            // $('#lstMainClassifications').prop('selectedIndex', -1);
            // $('#lstSubClassifications').prop('selectedIndex', -1);

            history.replaceState(null, document.title, window.location.pathname + window.location.search);
            $('#btnClosePromoCode').click();
        }
        else{
            // do nothing
        }
    });
}

function fillAdTypeList(){
    var current_Table = '#tblAdTypes';
    
    $.ajax({
        type: "POST",
        datatype: "html",
        url: "../PHPFiles/Admin/Settings/retrieveAdTypesList.php",
        success: function(data) {
            if(data == '1'){

                var decodedData = JSON.parse(data);


                if($.fn.DataTable.isDataTable(current_Table)){
                    $(current_Table).DataTable().destroy();
                }

                $(current_Table).DataTable({
                    pageLength: 10,
                    data: decodedData,
                    columns: [
                        { data: 'AdType' },
                        { data: 'Price' },
                        { data: 'Discount' },
                        { data: 'Description' },
                        { data: 'Action' }
                    ]
                });
                
            }else{
                var decodedData = JSON.parse(data);


                if($.fn.DataTable.isDataTable(current_Table)){
                    $(current_Table).DataTable().destroy();
                }

                $(current_Table).DataTable({
                    pageLength: 10,
                    data: decodedData,
                    columns: [
                        { data: 'AdType' },
                        { data: 'Price' },
                        { data: 'Discount' },
                        { data: 'Description' },
                        { data: 'Action' }
                    ]
                });

            }
        }

    }); 
}

function fillPromoCodeList(){
    var current_Table = '#tblPromoCodes';
    
    $.ajax({
        type: "POST",
        datatype: "html",
        url: "../PHPFiles/Admin/Settings/retrievePromoList.php",
        success: function(data) {
            console.log(data);
            if(data == '1'){
                var decodedData = JSON.parse(data);
                
                if($.fn.DataTable.isDataTable(current_Table)){
                    $(current_Table).DataTable().destroy();
                }

                $(current_Table).DataTable({
                    pageLength: 10,
                    data: decodedData,
                    columns: [
                        { data: 'PromoName'},
                        { data: 'PromoCode' },
                        { data: 'Discount' },
                        { data: 'Description' },
                        { data: 'Action' }
                    ]
                });
                
            }else{
                var decodedData = JSON.parse(data);


                if($.fn.DataTable.isDataTable(current_Table)){
                    $(current_Table).DataTable().destroy();
                }

                $(current_Table).DataTable({
                    pageLength: 10,
                    data: decodedData,
                    columns: [
                        { data: 'PromoName'},
                        { data: 'PromoCode' },
                        { data: 'Discount' },
                        { data: 'Description' },
                        { data: 'Action' }
                    ]
                });

            }
        }

    });
}

function deleteAdType(AdTypeID){
    var AID = AdTypeID.replace("btnDeleteAdType", "");
    console.log(AID);

    swal({
        title: 'Delete the Ad Type?',
        text: "Are you sure you want to DELETE Ad Type #" + AID + "?",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Delete it!',
                className : 'btn btn-primary'
            },
            cancel: {
                visible: true,
                text : 'Cancel',
                className: 'btn btn-danger'
            }
        }
    }).then((Toggle) => {
        if (Toggle) {

            $.ajax({
                type: "POST",
                dataType: "html",
                data: {
                    AdTypeID: AID
                },
                url: "../PHPFiles/Admin/Settings/adTypeDelete.php",
                success: function(data){
                    console.log(data);

                if(data == '1'){ 
                    swal({
                        title: 'Ad Type #' + AID + 'has Successfully been Deleted!',
                        text: "Successfully Deleted Ad Type #" + AID + ".",
                        icon: 'success',
                        type: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        fillAdTypeList();
                    });
                         
                }else{
                    swal({
                        title: 'Ad Type #' + AID + 'has Successfully been Deleted!',
                        text: "Successfully Deleted Ad Type #" + AID + ".",
                        icon: 'success',
                        type: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        fillAdTypeList();
                    });
                }
            }
            });
        }
        else{
        }
    });
}

function deletePromoCode(PromoID){
    var PID = PromoID.replace("btnDeletePromo", "");
    console.log(PID);

    swal({
        title: 'Delete the Promo Code?',
        text: "Are you sure you want to DELETE Promo Code #" + PID + "?",
        icon: 'warning',
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, Delete it!',
                className : 'btn btn-primary'
            },
            cancel: {
                visible: true,
                text : 'Cancel',
                className: 'btn btn-danger'
            }
        }
    }).then((Toggle) => {
        if (Toggle) {

            $.ajax({
                type: "POST",
                dataType: "html",
                data: {
                    PromoID: PID
                },
                url: "../PHPFiles/Admin/Settings/promoDelete.php",
                success: function(data){
                    console.log(data);

                if(data == '1'){ 
                    swal({
                        title: 'Promo Code #' + PID + 'has Successfully been Deleted!',
                        text: "Successfully Deleted Promo Code #" + PID + ".",
                        icon: 'success',
                        type: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        fillPromoCodeList();
                    });
                         
                }else{
                    swal({
                        title: 'Promo Code #' + PID + 'has Successfully been Deleted!',
                        text: "Successfully Deleted Promo Code #" + PID + ".",
                        icon: 'success',
                        type: 'success',
                        buttons : {
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        }
                    }).then(function(){
                        fillPromoCodeList();
                    });
                }
            }
            });
        }
        else{
        }
    });
}

// General Functions