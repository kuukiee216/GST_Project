function saveEducationalBackground(formID){
    $('#btnSaveEducationalBackground').addClass('is-loading');
    $('#btnSaveEducationalBackground').prop('disabled', true);
    $('#btnCloseEducationalBackground').prop('disabled', true);

    var txtCourseProgram = $('#txtCourseProgram').val();
    var txtSchoolName = $('#txtSchoolName').val();
    var txtSchoolAddress = $('#txtSchoolAddress').val();
    var cbEducationStartYear = $('#cbEducationStartYear').val();
    var cbEducationEndYear = $('#cbEducationEndYear').val();

    if(txtCourseProgram.length > 0){
        $('#divCourseProgram').removeClass('has-error has-feedback');
        $('#errmsgCourseProgram').text('');
        if(txtSchoolName.length > 0){
            $('#divSchoolName').removeClass('has-error has-feedback');
            $('#errmsgSchoolName').text('');
            if(txtSchoolAddress.length > 0){
                $('#divSchoolAddress').removeClass('has-error has-feedback');
                $('#errmsgSchoolAddress').text('');
                if(cbEducationStartYear > 0){
                    $('#divEducationStartYear').removeClass('has-error has-feedback');
                    $('#errmsgEducationStartYear').text('');
                    if(cbEducationEndYear >= cbEducationStartYear || (cbEducationEndYear == 'Present' && cbEducationStartYear > 0)){
                        $('#divEducationStartYear').removeClass('has-error has-feedback');
                        $('#errmsgEducationStartYear').text('');
                        if(cbEducationEndYear > 0 || cbEducationEndYear == 'Present'){
                            $('#divEducationEndYear').removeClass('has-error has-feedback');
                            $('#errmsgEducationEndYear').text('');

                            var mainContainer = document.getElementById('listEducation');
                            var rowCounter = (mainContainer.length + 1).toString();

                            var rowMain = document.createElement('tr');
                            rowMain.id = "rowEducation" + rowCounter;

                            var td1 = document.createElement('td');
                            td1.textContent = txtCourseProgram;
                            td1.id = 'lblCourseProgram' + rowCounter;

                            var td2 = document.createElement('td');
                            td2.textContent = txtSchoolName;
                            td2.id = 'lblSchoolName' + rowCounter;

                            var td3 = document.createElement('td');
                            td3.textContent = txtSchoolAddress;
                            td3.id = 'lblSchoolAddress' + rowCounter;

                            var td4 = document.createElement('td');
                            td4.textContent = cbEducationStartYear + " - " + cbEducationEndYear;
                            td4.id = 'lblEducationYear' + rowCounter;

                            var td5 = document.createElement('td');

                            var btnEdit = document.createElement('button');
                            btnEdit.className = "btn btn-link btn-primary";
                            btnEdit.id = "btnEditEducation" + rowCounter;
                            btnEdit.addEventListener('click', function(){
                                editEducation(this.id);
                            });

                            var iconEdit = document.createElement('i');
                            iconEdit.className = "fas fa-edit fa-lg";

                            var btnRemove = document.createElement('button');
                            btnRemove.className = "btn btn-link btn-danger";
                            btnRemove.id = "btnRemoveEducation" + rowCounter;
                            btnRemove.addEventListener('click', function(){
                                removeEducation(this.id);
                            });

                            var iconRemove = document.createElement('i');
                            iconRemove.className = "fas fa-trash fa-lg";

                            btnEdit.appendChild(iconEdit);
                            btnRemove.appendChild(iconRemove);

                            rowMain.appendChild(td1);
                            rowMain.appendChild(td2);
                            rowMain.appendChild(td3);
                            rowMain.appendChild(td4);

                            td5.appendChild(btnEdit);
                            td5.appendChild(btnRemove);

                            rowMain.appendChild(td5);

                            mainContainer.appendChild(rowMain);

                            $('#txtCourseProgram').val('');
                            $('#txtSchoolName').val('');
                            $('#txtSchoolAddress').val('');
                            $('#cbEducationStartYear').prop('selectedIndex', 0);
                            $('#cbEducationEndYear').val();

                            $('#btnSaveEducationalBackground').removeClass('is-loading');
                            $('#btnSaveEducationalBackground').prop('disabled', false);
                            $('#btnCloseEducationalBackground').prop('disabled', false);
                            $('#btnCloseEducationalBackground').click();
                        }
                        else{
                            $('#divEducationEndYear').addClass('has-error has-feedback');
                            $('#errmsgEducationEndYear').text('Please enter the end year of education.');
                            $('#btnSaveEducationalBackground').removeClass('is-loading');
                            $('#btnSaveEducationalBackground').prop('disabled', false);
                            $('#btnCloseEducationalBackground').prop('disabled', false);
                        }
                    }
                    else{
                        $('#divEducationEndYear').addClass('has-error has-feedback');
                        $('#errmsgEducationEndYear').text('End Year must be earlier or the same with Start Year.');
                        $('#btnSaveEducationalBackground').removeClass('is-loading');
                        $('#btnSaveEducationalBackground').prop('disabled', false);
                        $('#btnCloseEducationalBackground').prop('disabled', false);
                    }
                }
                else{
                    $('#divEducationStartYear').addClass('has-error has-feedback');
                    $('#errmsgEducationStartYear').text('Please enter the start year of education.');
                    $('#btnSaveEducationalBackground').removeClass('is-loading');
                    $('#btnSaveEducationalBackground').prop('disabled', false);
                    $('#btnCloseEducationalBackground').prop('disabled', false);
                }
            }
            else{
                $('#divSchoolAddress').addClass('has-error has-feedback');
                $('#errmsgSchoolAddress').text('Please enter the school address.');
                $('#btnSaveEducationalBackground').removeClass('is-loading');
                $('#btnSaveEducationalBackground').prop('disabled', false);
                $('#btnCloseEducationalBackground').prop('disabled', false);
            }
        }
        else{
            $('#divSchoolName').addClass('has-error has-feedback');
            $('#errmsgSchoolName').text('Please enter the school name.');
            $('#btnSaveEducationalBackground').removeClass('is-loading');
            $('#btnSaveEducationalBackground').prop('disabled', false);
            $('#btnCloseEducationalBackground').prop('disabled', false);
        }
    }
    else{
        $('#divCourseProgram').addClass('has-error has-feedback');
        $('#errmsgCourseProgram').text('Please enter the course/program title.');
        $('#btnSaveEducationalBackground').removeClass('is-loading');
        $('#btnSaveEducationalBackground').prop('disabled', false);
        $('#btnCloseEducationalBackground').prop('disabled', false);
    }
}
function updateEducationalBackground(ID){
    $('#btnSaveEducationalBackground').addClass('is-loading');
    $('#btnSaveEducationalBackground').prop('disabled', true);
    $('#btnCloseEducationalBackground').prop('disabled', true);

    var txtCourseProgram = $('#txtCourseProgram').val();
    var txtSchoolName = $('#txtSchoolName').val();
    var txtSchoolAddress = $('#txtSchoolAddress').val();
    var cbEducationStartYear = $('#cbEducationStartYear').val();
    var cbEducationEndYear = $('#cbEducationEndYear').val();

    if(txtCourseProgram.length > 0){
        $('#divCourseProgram').removeClass('has-error has-feedback');
        $('#errmsgCourseProgram').text('');
        if(txtSchoolName.length > 0){
            $('#divSchoolName').removeClass('has-error has-feedback');
            $('#errmsgSchoolName').text('');
            if(txtSchoolAddress.length > 0){
                $('#divSchoolAddress').removeClass('has-error has-feedback');
                $('#errmsgSchoolAddress').text('');
                if(cbEducationStartYear.length > 0){
                    $('#divEducationStartYear').removeClass('has-error has-feedback');
                    $('#errmsgEducationStartYear').text('');
                    if(cbEducationEndYear.length > 0 || cbEducationEndYear == 'Present'){
                        $('#divEducationEndYear').removeClass('has-error has-feedback');
                        $('#errmsgEducationEndYear').text('');

                        $('#lblCourseProgram'+ID).text(txtCourseProgram);
                        $('#lblSchoolName'+ID).text(txtSchoolName);
                        $('#lblSchoolAddress'+ID).text(txtSchoolAddress);
                        $('#lblEducationYear'+ID).text(cbEducationStartYear + " - " + cbEducationEndYear);

                        document.getElementById('btnSaveEducationalBackground').onclick = function() {
                            saveEducationalBackground('formEducationalBackground');
                        };
                    
                        document.getElementById('btnSaveEducationalBackground').textContent = "Add Education";

                        $('#txtCourseProgram').val('');
                        $('#txtSchoolName').val('');
                        $('#txtSchoolAddress').val('');
                        $('#cbEducationStartYear').prop('selectedIndex', -1);
                        $('#cbEducationEndYear').prop('selectedIndex', -1);

                        $('#btnSaveEducationalBackground').removeClass('is-loading');
                        $('#btnSaveEducationalBackground').prop('disabled', false);
                        $('#btnCloseEducationalBackground').prop('disabled', false);
                        $('#btnCloseEducationalBackground').click();
                    }
                    else{
                        $('#divEducationEndYear').addClass('has-error has-feedback');
                        $('#errmsgEducationEndYear').text('Please enter the end year of education.');
                        $('#btnSaveEducationalBackground').removeClass('is-loading');
                        $('#btnSaveEducationalBackground').prop('disabled', false);
                        $('#btnCloseEducationalBackground').prop('disabled', false);
                    }
                }
                else{
                    $('#divEducationStartYear').addClass('has-error has-feedback');
                    $('#errmsgEducationStartYear').text('Please enter the start year of education.');
                    $('#btnSaveEducationalBackground').removeClass('is-loading');
                    $('#btnSaveEducationalBackground').prop('disabled', false);
                    $('#btnCloseEducationalBackground').prop('disabled', false);
                }
            }
            else{
                $('#divSchoolAddress').addClass('has-error has-feedback');
                $('#errmsgSchoolAddress').text('Please enter the school address.');
                $('#btnSaveEducationalBackground').removeClass('is-loading');
                $('#btnSaveEducationalBackground').prop('disabled', false);
                $('#btnCloseEducationalBackground').prop('disabled', false);
            }
        }
        else{
            $('#divSchoolName').addClass('has-error has-feedback');
            $('#errmsgSchoolName').text('Please enter the school name.');
            $('#btnSaveEducationalBackground').removeClass('is-loading');
            $('#btnSaveEducationalBackground').prop('disabled', false);
            $('#btnCloseEducationalBackground').prop('disabled', false);
        }
    }
    else{
        $('#divCourseProgram').addClass('has-error has-feedback');
        $('#errmsgCourseProgram').text('Please enter the course/program title.');
        $('#btnSaveEducationalBackground').removeClass('is-loading');
        $('#btnSaveEducationalBackground').prop('disabled', false);
        $('#btnCloseEducationalBackground').prop('disabled', false);
    }
}   
function editEducation(ID){

    var rowID = ID.replace('btnEditEducation', '');

    $('#'+ID).addClass('is-loading');
    $('#'+ID).prop('disabled', true);
    $('#btnRemoveEducation'+rowID).prop('disabled', true);

    var lblCourseProgram = document.getElementById('lblCourseProgram'+rowID).textContent;
    var lblSchoolName = document.getElementById('lblSchoolName'+rowID).textContent;
    var lblSchoolAddress = document.getElementById('lblSchoolAddress'+rowID).textContent;
    var lblEducationYear = document.getElementById('lblEducationYear'+rowID).textContent;

    $('#txtCourseProgram').val(lblCourseProgram);
    $('#txtSchoolName').val(lblSchoolName);
    $('#txtSchoolAddress').val(lblSchoolAddress);

    var EducationYear = lblEducationYear.split(' - ');

    $('#cbEducationStartYear').val(EducationYear[0]);
    $('#cbEducationEndYear').val(EducationYear[1]);

    document.getElementById('btnSaveEducationalBackground').onclick = function() {
        updateEducationalBackground(rowID);
    };

    document.getElementById('btnSaveEducationalBackground').textContent = "Save Changes";

    $('#'+ID).removeClass('is-loading');
    $('#'+ID).prop('disabled', false);
    $('#btnRemoveEducation'+rowID).prop('disabled', false);

    $('#modalEducationalAttainment').modal({
        backdrop: 'static',
        keyboard: false,
        focus: true,
        show: true
    });
}
function removeEducation(ID){
    var rowID = ID.replace('btnRemoveEducation', '');

    var parentDiv = document.getElementById('listEducation');
    
    var childToRemove = document.getElementById('rowEducation'+rowID);

    if(childToRemove){
        parentDiv.removeChild(childToRemove);
    }
}

function addSkill(){
    var SkillCount = document.getElementsByName('txtSkills');

    var addFlag = true;
    
    SkillCount.forEach(skillElement => {
        if(skillElement.value.length == 0){
            addFlag = false;
        }
    });

    if(addFlag){
        var divID = (SkillCount.length + 1).toString();
        var parentDiv = document.getElementById('listSkills');

        var divFormGroup = document.createElement('div');
        divFormGroup.className = "form-group";
        divFormGroup.id = "divSkill" + divID;

        var divInputGroup = document.createElement('div');
        divInputGroup.className = "input-group";

        var inputSkill = document.createElement('input');
        inputSkill.type = "text";
        inputSkill.className = "form-control";
        inputSkill.id = "txtSkill" + divID;
        inputSkill.name = "txtSkills";
        inputSkill.placeholder = "Enter a Skill";
        inputSkill.setAttribute("aria-label", "Enter a skill description");

        var divInputGroupPrepend = document.createElement('div');
        divInputGroupPrepend.className = "input-group-prepend";

        var btnRemoveSkill = document.createElement('button');
        btnRemoveSkill.className = "btn btn-danger btn-border";
        btnRemoveSkill.type = "button";
        btnRemoveSkill.addEventListener('click', function() {
            removeSkill("divSkill" + divID);
        });

        var iconRemove = document.createElement('i');
        iconRemove.className = "fas fa-trash fa-lg";
        
        btnRemoveSkill.appendChild(iconRemove);
        divInputGroupPrepend.appendChild(btnRemoveSkill);
        divInputGroup.appendChild(inputSkill);
        divInputGroup.appendChild(divInputGroupPrepend);
        divFormGroup.appendChild(divInputGroup);
        
        parentDiv.appendChild(divFormGroup);
    }
    else{
        swal({
            title: 'Empty Skill Input Field Found!',
            text: "Please make that there is no empty input field.",
            icon: 'warning',
            buttons : {
                confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                }
            }
        });
    }
}
function removeSkill(ID){
    var parentDiv = document.getElementById('listSkills');
    
    var childToRemove = document.getElementById(ID);

    if(childToRemove){
        parentDiv.removeChild(childToRemove);
    }
}

function saveCertificate(formID){
    $('#btnSaveCertificate').addClass('is-loading');
    $('#btnSaveCertificate').prop('disabled', true);
    $('#btnCancelCecrtificate').prop('disabled', true);

    var txtCertTitle = $('#txtCertTitle').val();
    var txtCertIssuer = $('#txtCertIssuer').val();
    var cbCertIssueMonth = $('#cbCertIssueMonth').val();
    var cbCertIssueYear = $('#cbCertIssueYear').val();
    var txtCertDescription = $('#txtCertDescription').val();
    var cbCertExpirationMonth = $('#cbCertExpirationMonth').val();
    var cbCertExpirationYear = $('#cbCertExpirationYear').val();

    if(txtCertTitle.length > 0){
        $('#divCertTitle').removeClass('has-error has-feedback');
        $('#errmsgCertTitle').text('');
        if(txtCertIssuer.length > 0){
            $('#diCertIssuer').removeClass('has-error has-feedback');
            $('#errmsgCertIssuer').text('');
            if(cbCertIssueMonth > 0 && cbCertIssueYear > 0){
                $('#divCertIssueDate').removeClass('has-error has-feedback');
                $('#errmsgCertIssueDate').text('');
                if ((cbCertExpirationMonth > 0 && cbCertExpirationMonth > 0 && cbCertExpirationYear >= cbCertIssueYear) || document.getElementById('chbCertExpiration').checked){
                    $('#divCertExpirationDate').removeClass('has-error has-feedback');
                    $('#errmsgCertExpirationDate').text('');

                    var monthNames = [
                        "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"
                    ];

                    var mainContainer = document.getElementById('listCertificate');
                    var rowCounter = (mainContainer.length + 1).toString();

                    var rowMain = document.createElement('tr');
                    rowMain.id = "rowCertificate" + rowCounter;

                    var td1 = document.createElement('td');
                    td1.textContent = txtCertTitle;
                    td1.id = 'lblCertTitle' + rowCounter;

                    var td2 = document.createElement('td');
                    td2.textContent = txtCertIssuer;
                    td2.id = 'lblCertIssuer' + rowCounter;

                    var td3 = document.createElement('td');
                    td3.textContent = monthNames[cbCertIssueMonth - 1] + " " + cbCertIssueYear;
                    td3.id = 'lblCertDate' + rowCounter;

                    var td4 = document.createElement('td');
                    td4.textContent = txtCertDescription;
                    td4.id = 'lblCertDescription' + rowCounter;

                    if(document.getElementById('chbCertExpiration').checked){
                        var td5 = document.createElement('td');
                        td5.textContent = "No Expiration";
                        td5.id = 'lblCertExpiration' + rowCounter;
                    }
                    else{
                        var td5 = document.createElement('td');
                        td5.textContent = monthNames[cbCertExpirationMonth - 1] + " " + cbCertExpirationYear;
                        td5.id = 'lblCertExpiration' + rowCounter;
                    }

                    var td6 = document.createElement('td');

                    var btnEdit = document.createElement('button');
                    btnEdit.className = "btn btn-link btn-primary";
                    btnEdit.id = "btnEditCertificate" + rowCounter;
                    btnEdit.addEventListener('click', function(){
                        editCertificate(this.id);
                    });

                    var iconEdit = document.createElement('i');
                    iconEdit.className = "fas fa-edit fa-lg";

                    var btnRemove = document.createElement('button');
                    btnRemove.className = "btn btn-link btn-danger";
                    btnRemove.id = "btnRemoveCertificate" + rowCounter;
                    btnRemove.addEventListener('click', function(){
                        removeCertificate(this.id);
                    });

                    var iconRemove = document.createElement('i');
                    iconRemove.className = "fas fa-trash fa-lg";

                    btnEdit.appendChild(iconEdit);
                    btnRemove.appendChild(iconRemove);

                    rowMain.appendChild(td1);
                    rowMain.appendChild(td2);
                    rowMain.appendChild(td3);
                    rowMain.appendChild(td4);
                    rowMain.appendChild(td5);

                    td6.appendChild(btnEdit);
                    td6.appendChild(btnRemove);

                    rowMain.appendChild(td6);

                    mainContainer.appendChild(rowMain);

                    $('#txtCertTitle').val('');
                    $('#txtCertIssuer').val('');
                    $('#cbCertIssueMonth').prop('selectedIndex', 0);
                    $('#cbCertIssueYear').prop('selectedIndex', 0);
                    $('#txtCertDescription').val('');
                    $('#chbCertExpiration').prop('checked', false);
                    $('#cbCertExpirationMonth').prop('selectedIndex', 0);
                    $('#cbCertExpirationYear').prop('selectedIndex', 0);
                    $('#divCertExpirationDate').removeClass('d-none d-sm-none');

                    $('#btnSaveCertificate').removeClass('is-loading');
                    $('#btnSaveCertificate').prop('disabled', false);
                    $('#btnCancelCertificate').prop('disabled', false);
                    $('#btnCancelCertificate').click();
                }
                else{
                    $('#divCertExpirationDate').addClass('has-error has-feedback');
                    $('#errmsgCertExpirationDate').text('Expiration date must be earlier or the same with issueance date.');
                    $('#btnSaveCertificate').removeClass('is-loading');
                    $('#btnSaveCertificate').prop('disabled', false);
                    $('#btnCancelCecrtificate').prop('disabled', false);
                }
            }
            else{
                $('#divCertIssueDate').addClass('has-error has-feedback');
                $('#errmsgCertIssueDate').text('Please enter the issuance date.');
                $('#btnSaveCertificate').removeClass('is-loading');
                $('#btnSaveCertificate').prop('disabled', false);
                $('#btnCancelCecrtificate').prop('disabled', false);
            }
        }
        else{
            $('#divCertIssuer').addClass('has-error has-feedback');
            $('#errmsgCertIssuer').text('Please enter the issuer name.');
            $('#btnSaveCertificate').removeClass('is-loading');
            $('#btnSaveCertificate').prop('disabled', false);
            $('#btnCancelCecrtificate').prop('disabled', false);
        }
    }
    else{
        $('#divCertTitle').addClass('has-error has-feedback');
        $('#errmsgCertTitle').text('Please enter the license/certificate/award title.');
        $('#btnSaveCertificate').removeClass('is-loading');
        $('#btnSaveCertificate').prop('disabled', false);
        $('#btnCancelCecrtificate').prop('disabled', false);
    }
}
function removeCertificate(ID){
    var rowID = ID.replace('btnRemoveCertificate', '');

    var parentDiv = document.getElementById('listCertificate');
    
    var childToRemove = document.getElementById('rowCertificate'+rowID);

    if(childToRemove){
        parentDiv.removeChild(childToRemove);
    }
}
function toggleExpirationCertificate(){
    var chbCertExpiration = document.getElementById('chbCertExpiration');

    if(chbCertExpiration.checked){
        $('#divCertExpirationDate').addClass('d-none d-sm-none');
    }
    else{
        $('#divCertExpirationDate').removeClass('d-none d-sm-none');
    }
}

function addLanguage(){
    var LanguageCount = document.getElementsByName('txtLanguages');

    var addFlag = true;
    
    LanguageCount.forEach(languageElement => {
        if(languageElement.value.length == 0){
            addFlag = false;
        }
    });

    if(addFlag){
        var divID = (LanguageCount.length + 1).toString();
        var parentDiv = document.getElementById('listLanguages');

        var divFormGroup = document.createElement('div');
        divFormGroup.className = "form-group";
        divFormGroup.id = "divLanguage" + divID;

        var divInputGroup = document.createElement('div');
        divInputGroup.className = "input-group";

        var inputLanguage = document.createElement('input');
        inputLanguage.type = "text";
        inputLanguage.className = "form-control";
        inputLanguage.id = "txtLanguage" + divID;
        inputLanguage.name = "txtLanguages";
        inputLanguage.placeholder = "Enter a Language";
        inputLanguage.setAttribute("aria-label", "Enter a Language description");

        var divInputGroupPrepend = document.createElement('div');
        divInputGroupPrepend.className = "input-group-prepend";

        var btnRemoveLanguage = document.createElement('button');
        btnRemoveLanguage.className = "btn btn-danger btn-border";
        btnRemoveLanguage.type = "button";
        btnRemoveLanguage.addEventListener('click', function() {
            removeLanguage("divLanguage" + divID);
        });

        var iconRemove = document.createElement('i');
        iconRemove.className = "fas fa-trash fa-lg";
        
        btnRemoveLanguage.appendChild(iconRemove);
        divInputGroupPrepend.appendChild(btnRemoveLanguage);
        divInputGroup.appendChild(inputLanguage);
        divInputGroup.appendChild(divInputGroupPrepend);
        divFormGroup.appendChild(divInputGroup);
        
        parentDiv.appendChild(divFormGroup);
    }
    else{
        swal({
            title: 'Empty Language Input Field Found!',
            text: "Please make that there is no empty input field.",
            icon: 'warning',
            buttons : {
                confirm: {
                    text : 'Okay',
                    className : 'btn btn-success'
                }
            }
        });
    }
}
function removeLanguage(ID){
    var parentDiv = document.getElementById('listLanguages');
    
    var childToRemove = document.getElementById(ID);

    if(childToRemove){
        parentDiv.removeChild(childToRemove);
    }
}

function disableForm(formID){
    var form = document.getElementById(formID);
    var elements = form.elements;
    for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {
        if(elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT'|| elements[elementCounter].tagName == 'BUTTON'|| elements[elementCounter].tagName == 'TEXTAREA'){
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

        if(elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT'|| elements[elementCounter].tagName == 'BUTTON'|| elements[elementCounter].tagName == 'TEXTAREA'){
            elements[elementCounter].disabled = false;
        }
        else{
            continue;
        }
    }
}

function fillStartYear(){
    var currentYear = new Date().getFullYear();

    // Get the select element
    var selectElement = document.getElementById("cbEducationStartYear");

    // Populate options for the past 50 years and the next 50 years
    for (var i = currentYear; i >= currentYear - 50; i--) {
        var option = document.createElement("option");
        option.text = i;
        option.value = i;
        selectElement.add(option);
    }
}
function fillEndYear(){
    var currentYear = new Date().getFullYear();

    var selectElement = document.getElementById("cbEducationEndYear");

    // Populate options for the past 50 years and the next 50 years
    for (var i = currentYear - 50; i <= currentYear + 50; i++) {
        var option = document.createElement("option");
        option.text = i;
        option.value = i;
        selectElement.add(option);
    }

    $('#cbEducationEndYear').prop('disabled', false);
}

window.jsPDF = window.jspdf.jsPDF;
function generateResumePDF(){

    let locX = 20;
    let locY = 20;
    
    const doc = new jsPDF();

    var aName = $('#lblCResumeName').text();
    var aContact = $('#lblCResumeContactNumber').text();
    var aEmail = $('#lblCResumeEmail').text();
    var aAddress = $('#lblCResumeAddress').text();

    // TITLE

    doc.setFont("Helvetica", "normal");
    doc.setFontSize(16);

    doc.text(aName, locX, locY);

    doc.setFont("Helvetica", "normal");
    doc.setFontSize(11);

    doc.text(aAddress, locX, locY += 8);
    doc.text(aContact, locX, locY += 5);
    doc.text(aEmail, locX, locY += 5);

    // SUMMARY TITLE

    doc.setFont("Helvetica", "bold");
    doc.setFontSize(12);

    doc.text("Summary", locX, locY += 10);

    // SUMMARY TEXT

    var aPersonalSummary = $('#txtPersonalSummary').val();

    doc.setFont("Helvetica", "normal");
    doc.setFontSize(11);

    var textLines = doc.splitTextToSize(aPersonalSummary, 170); // Adjust width as necessary
    doc.text(textLines, locX + 5, locY += 8);

    locY += textLines.length * 5;
    
    // EXPERIENCE TITLE

    doc.setFont("Helvetica", "bold");
    doc.setFontSize(12);

    doc.text("Experience", locX, locY);

    // EXPERIENCE TEXT


    // EDUCATION TITLE

    doc.setFont("Helvetica", "bold");
    doc.setFontSize(12);

    doc.text("Education", locX, locY += 10);

    // EDUCATION TEXT
    locY = locY + 3;
    doc.setFontSize(11);

    // Get the main container element
    var mainContainer = document.getElementById('listEducation');

    // Select all rows within the container whose ID starts with "rowEducation"
    var educationRows = mainContainer.querySelectorAll('tr');

    // Convert the NodeList to an array if you need to manipulate it like an array
    var educationRowsArray = Array.from(educationRows);

    // Loop through the rows and do something with them
    educationRowsArray.forEach(function(row) {
        // Access individual cells within the row
        var courseProgram = row.querySelector('[id^="lblCourseProgram"]').textContent;
        var schoolName = row.querySelector('[id^="lblSchoolName"]').textContent;
        var educationYear = row.querySelector('[id^="lblEducationYear"]').textContent;

        doc.setFont("Helvetica", "bold");

        doc.text(schoolName, locX + 5, locY += 5);

        doc.setFont("Helvetica", "normal");

        doc.text(courseProgram, locX + 5, locY += 5);

        doc.text(educationYear, locX + 5, locY += 5);
    });

    // SKILLS TITLE

    doc.setFont("Helvetica", "bold");
    doc.setFontSize(12);

    doc.text("Skills", locX, locY += 10);

    doc.setFont("Helvetica", "normal");
    doc.setFontSize(11);

    // SKILLS TEXT

    var mainContainer = document.getElementById('listSkills'); // Get the main container element
    var skillElements = mainContainer.querySelectorAll('input[type="text"]'); // Select all input text elements within the container

    var skillsArray = Array.from(skillElements); // Convert the NodeList to an array if you need to manipulate it like an array

    var skillsList = "";

    // Loop through the input text elements and do something with them
    skillsArray.forEach(function(input, index) {
        skillsList = skillsList + input.value;

        if(index < skillsArray.length - 1){
            skillsList += "  •  ";
        }
    });

    var textLinesSkills = doc.splitTextToSize(skillsList, 170); // Adjust width as necessary

    doc.text(textLinesSkills, locX + 5, locY += 5);

    locY += textLinesSkills.length * 5;

    // AWARDS CERT TITLE

    doc.setFont("Helvetica", "bold");
    doc.setFontSize(12);

    doc.text("Awards, Certificate, and Licenses", locX, locY += 10);

    // AWARDS CERT TEXT
    locY = locY + 3;
    doc.setFontSize(11);

    // Get the main container element
    var mainContainer = document.getElementById('listCertificate');

    var certificateRows = mainContainer.querySelectorAll('tr');

    // Convert the NodeList to an array if you need to manipulate it like an array
    var certificateArray = Array.from(certificateRows);

    // Loop through the rows and do something with them
    certificateArray.forEach(function(row) {
        // Access individual cells within the row
        var certTitle = row.querySelector('[id^="lblCertTitle"]').textContent;
        var certIssuer = row.querySelector('[id^="lblCertIssuer"]').textContent;
        var certDate = row.querySelector('[id^="lblCertDate"]').textContent;
        var certDescription = row.querySelector('[id^="lblCertDescription"]').textContent;
        var certExpiration = row.querySelector('[id^="lblCertExpiration"]').textContent;

        doc.setFont("Helvetica", "bold");

        doc.text(certTitle, locX + 5, locY += 5);

        doc.setFont("Helvetica", "normal");

        doc.text(certIssuer, locX + 5, locY += 5);

        doc.text(certDate + " - " + certExpiration, locX + 5, locY += 5);

        doc.text(certDescription, locX + 5, locY += 5);
    });

    // LANGUAGE TITLE

    doc.setFont("Helvetica", "bold");
    doc.setFontSize(12);

    doc.text("Languages", locX, locY += 10);

    doc.setFont("Helvetica", "normal");
    doc.setFontSize(11);

    // LANGUAGE TEXT

    var mainContainerLanguages = document.getElementById('listLanguages'); // Get the main container element
    var languageElements = mainContainerLanguages.querySelectorAll('input[type="text"]'); // Select all input text elements within the container

    var languageArray = Array.from(languageElements); // Convert the NodeList to an array if you need to manipulate it like an array

    var languagesList = "";

    // Loop through the input text elements and do something with them
    languageArray.forEach(function(input, index) {
        languagesList = languagesList + input.value;

        if(index < languageArray.length - 1){
            languagesList += "  •  ";
        }
    });

    var textLinesLanguages = doc.splitTextToSize(languagesList, 170); // Adjust width as necessary

    doc.text(languagesList, locX + 5, locY += 5);

    locY += textLinesLanguages.length * 5;



    doc.save("CreatedResume.pdf");

    //doc.text("Hello Tech Area", locX, locY); // Left, Top

    //locY = locY + 5;

    //doc.text("This is a paragraph", locX, locY);

    //doc.setTextColor(255,0,0);
    //doc.addImage("image/natural.jpeg","JPEG",10,30,80,80); //Left, Top, Width, Height
}