function proceedApplication(){
    var formType = window.location.hash.replace('#','');

    if (formType.indexOf('&') !== -1) {
        var formPage = formType.split('&');

        if(formPage[1] == 'Form1'){
            $('#Form1').removeClass('show active');
            $('#Form2').addClass('show active');

            $('#btnApplicationBack').text("Back");

            $('#divApplicationProgress').css('width', '66%');

            location.href = "#" + formType.replace('Form1', 'Form2');
        }
        else if(formPage[1] == 'Form2'){
            $('#Form2').removeClass('show active');
            $('#Form3').addClass('show active');

            $('#btnApplicationBack').text("Back");

            $('#divApplicationProgress').css('width', '100%');
            $('#divApplicationProgress').removeClass('bg-primary');
            $('#divApplicationProgress').addClass('bg-success');

            location.href = "#" + formType.replace('Form2', 'Form3');;
        }
    }     
}

function revertApplication(){
    var formType = window.location.hash.replace('#','');

    if (formType.indexOf('&') !== -1) {
        var formPage = formType.split('&');

        if(formPage[1] == 'Form3'){
            $('#Form3').removeClass('show active');
            $('#Form2').addClass('show active');

            $('#divApplicationProgress').css('width', '66%');
            $('#divApplicationProgress').removeClass('bg-success');
            $('#divApplicationProgress').addClass('bg-primary');

            location.href = "#" + formType.replace('Form3', 'Form2');
        }
        else if(formPage[1] == 'Form2'){
            $('#Form2').removeClass('show active');
            $('#Form1').addClass('show active');

            $('#btnApplicationBack').text("Cancel");

            $('#divApplicationProgress').css('width', '20%');

            location.href = "#" + formType.replace('Form2', 'Form1');
        }
        else{
            location.href = "JobSearch.php";
        }
    }
}