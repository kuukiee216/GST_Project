function proceedApplication(){
    var formType = window.location.hash.replace('#','');

    if(formType == 'Form1'){
        $('#Form1').removeClass('show active');
        $('#Form2').addClass('show active');

        $('#btnApplicationBack').text("Back");

        $('#divApplicationProgress').css('width', '66%');

        location.href = "#Form2";
    }
    else if(formType == 'Form2'){
        $('#Form2').removeClass('show active');
        $('#Form3').addClass('show active');

        $('#btnApplicationBack').text("Back");

        $('#divApplicationProgress').css('width', '100%');
        $('#divApplicationProgress').removeClass('bg-primary');
        $('#divApplicationProgress').addClass('bg-success');

        location.href = "#Form3";
    }
}

function revertApplication(){
    var formType = window.location.hash.replace('#','');

    if(formType == 'Form3'){
        $('#Form3').removeClass('show active');
        $('#Form2').addClass('show active');

        $('#divApplicationProgress').css('width', '66%');
        $('#divApplicationProgress').removeClass('bg-success');
        $('#divApplicationProgress').addClass('bg-primary');

        location.href = "#Form2";
    }
    else if(formType == 'Form2'){
        $('#Form2').removeClass('show active');
        $('#Form1').addClass('show active');

        $('#btnApplicationBack').text("Cancel");

        $('#divApplicationProgress').css('width', '20%');

        location.href = "#Form1";
    }
    else{
        location.href = "JobSearch.php";
    }
}