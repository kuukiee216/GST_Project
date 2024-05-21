function GetQuestions() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/getQuestion.php",
        success: function (data) {
            if (data.error) {
                console.log(data.error);
                return;
            }
            var questionContainer = $("#question-container");
            questionContainer.empty();

            $.each(data, function (index, question) {
                var questionHtml = `
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="${question.QuestionnaireID}">
                        <h5 class="form-check-sign">${question.Question}</h5>
                    </label>
                `;
                questionContainer.append(questionHtml);
            });
        },
        error: function (xhr, status, error) {
            console.log("Error fetching data: " + error);
        }
    });
}

function SearchQuestions(searchQuery) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../PHPFiles/Recruiter/SearchQuestion.php",
        data: {
            searchQuery: searchQuery
        },
        success: function (data) {
            if (data.error) {
                console.log(data.error);
                return;
            }
            var questionContainer = $("#question-container");
            questionContainer.empty();

            $.each(data, function (index, question) {
                var questionHtml = `
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="${question.QuestionnaireID}">
                        <h5 class="form-check-sign">${question.Question}</h5>
                    </label>
                `;
                questionContainer.append(questionHtml);
            });
        },
        error: function (xhr, status, error) {
            console.log("Error fetching data: " + error);
        }
    });
}

function AddQuestion(formID) {
    var question = $('#new-question-text').val().trim(); // Trim whitespace

    if (question === "") {
        showAlert('Empty Question!', 'Please enter a question and try again.', 'warning', formID);
        return;
    }

    $('#add-question').addClass('is-loading');
    $('#add-question').prop('disabled', true);
    disableForm(formID);

    $.ajax({
        type: "POST",
        url: "../PHPFiles/Recruiter/AddQuestion.php",
        data: {
            question: question
        },
        success: function(response) {
            if (response === "0") {
                showAlert('Successful!', 'The question was added successfully.', 'success', formID);
                GetQuestions();
                $('#new-question-text').val('');
            } else {
                showAlert('An Error Occurred!', 'Something went wrong. Please try again.', 'error', formID);
            }
            $('#add-question').removeClass('is-loading');
            $('#add-question').prop('disabled', false);
            enableForm(formID);
        },
        error: function(xhr, status, error) {
            showAlert('Failed to Connect to Server!', 'Something went wrong while trying to connect to the server. Please try again.', 'error', formID);
            $('#add-question').removeClass('is-loading');
            $('#add-question').prop('disabled', false);
            enableForm(formID);
        }
    });
}

function AddQuestionDatabases(formID) {
    var selectedQuestions = [];
    
    // Iterate over selected questions
    $('#question-container .form-check-input:checked').each(function() {
        var questionID = $(this).val();
        var answer = $(this).parent().find('.form-group input').val().trim(); // Get the associated answer
        var requirementStatus = answer === "" ? 0 : 1; // Determine requirement status

        selectedQuestions.push({
            QuestionnaireID: questionID,
            answer: answer,
            RequirementStatus: requirementStatus
        });
    });

    var jobID = $('#jobID').val();
    var employerID = $('#employerID').val();

    // Check if selectedQuestions is empty
    if (selectedQuestions.length === 0) {
        // If no questions are selected, redirect to the next page
        location.href = './create_jobad4.php?jobID=' + jobID + '&employerID=' + employerID;
    } else {
        // If questions are selected, proceed with the AJAX request
        $.ajax({
            type: "POST",
            url: "../PHPFiles/Recruiter/AddQuestionDatabase.php",
            data: {
                selectedQuestions: selectedQuestions,
                JobID: jobID, // Assuming jobID is available as a hidden input field or global variable
                EmployerID: employerID // Assuming employerID is available as a hidden input field or global variable
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === "0") {
                    location.href = './create_jobad4.php?jobID=' + data.jobID + '&employerID=' + data.employerID;
                } else {
                    showAlert('An Error Occurred!', 'Something went wrong. Please try again.', 'error', formID);
                }
            },
            error: function(xhr, status, error) {
                showAlert('Failed to Connect to Server!', 'Something went wrong while trying to connect to the server. Please try again.', 'error', formID);
            }
        });
    }
}


function showAlert(title, text, icon, formID) {
    swal({
        title: title,
        text: text,
        icon: icon,
        buttons: {
            confirm: {
                text: 'Okay',
                className: 'btn btn-success'
            }
        }
    }).then(function(){
        $('#add-question').removeClass('is-loading');
        $('#add-question').prop('disabled', false);
        enableForm(formID);
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
    }
}

function enableForm(formID){
    var form = document.getElementById(formID);
    var elements = form.elements;
    for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {
        if(elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT'){
            elements[elementCounter].disabled = false;
        }
    }
}

