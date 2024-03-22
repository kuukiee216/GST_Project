function readyFillUpForm(token){

    var Token = token;

    $.ajax({
        type: "POST",
        dataType: "html",
        data: {
          Token: Token
        },
        url: "../PHPFiles/getApplicantEmail.php",
        success: function(data){
          $('#email').val(data);
          $('#email').prop("disabled", true);
        }
    });
}

function AccountSubmit(formID){

    /* - email
      - fname
      - lname
      - phone*/
 
    var UserEmail = $("input[name=email]").val();
    var UserFname = $("input[name=fname]").val();
    var UserLname = $("input[name=lname]").val();
    var UserPhone = $("input[name=phone]").val();
    var UserCountry = "test";
    
    $.ajax({
      type: "POST",
      dataType: "html",
      data: {
        UserEmail: UserEmail,
        UserFname: UserFname,
        UserLname: UserLname,
        UserPhone: UserPhone,
        UserCountry: UserCountry 
      },
      url: "../PHPFiles/applicant_info_save.php",
      success: function(data){
        alert(data);
        if(data == "0"){
          // $('#btnSubmit').removeClass('is-loading');
          // $('#btnLogin').prop('disabled', false);
          // enableForm(formID);
          location.href = "applicant_profile.php";
        }
        else if(data == "1"){
          swal({
            title: 'An Error Occurred!',
            text: "Something went wrong while trying to login. Please try again.",
            icon: 'error',
            buttons : {
              confirm: {
                text : 'Okay',
                className : 'btn btn-success'
              }
            }
          }).then(function(){
            $('#btnLogin').removeClass('is-loading');
            $('#btnLogin').prop('disabled', false);
            enableForm(formID);
          });
        }
        else if(data == "2"){
          swal({
            title: 'Email Missing!',
            text: "Please Enter Email",
            icon: 'warning',
            buttons : {
              confirm: {
                text : 'Okay',
                className : 'btn btn-success'
              }
            }
          }).then(function(){
            $('#btnLogin').removeClass('is-loading');
            $('#btnLogin').prop('disabled', false);
            enableForm(formID);
          });
        }
        else if(data == "3"){
          swal({
            title: 'First Name Missing!',
            text: "Please Enter your First Name.",
            icon: 'warning',
            buttons : {
              confirm: {
                text : 'Okay',
                className : 'btn btn-success'
              }
            }
          }).then(function(){
            $('#btnLogin').removeClass('is-loading');
            $('#btnLogin').prop('disabled', false);
            enableForm(formID);
          });
        }else if(data == "4"){
          swal({
            title: 'Last Name Missing!',
            text: "Please Enter your Last Name",
            icon: 'error',
            buttons : {
              confirm: {
                text : 'Okay',
                className : 'btn btn-success'
              }
            }
          }).then(function(){
            $('#btnLogin').removeClass('is-loading');
            $('#btnLogin').prop('disabled', false);
            enableForm(formID);
          });
        }
        else if(data == "5"){
          swal({
            title: 'Invalid Phone Number!',
            text: "Please Enter your Phone Number",
            icon: 'error',
            buttons : {
              confirm: {
                text : 'Okay',
                className : 'btn btn-success'
              }
            }
          }).then(function(){
            $('#btnLogin').removeClass('is-loading');
            $('#btnLogin').prop('disabled', false);
            enableForm(formID);
          });
        }
        else if(data == "6"){
          swal({
            title: 'What Country is this?',
            text: "What Country is this?",
            icon: 'error',
            buttons : {
              confirm: {
                text : 'Okay',
                className : 'btn btn-success'
              }
            }
          }).then(function(){
            $('#btnLogin').removeClass('is-loading');
            $('#btnLogin').prop('disabled', false);
            enableForm(formID);
          });
        }
        else if(data == "7"){
          swal({
            title: 'PDO Exception',
            text: "PDO Exception",
            icon: 'error',
            buttons : {
              confirm: {
                text : 'Okay',
                className : 'btn btn-success'
              }
            }
          }).then(function(){
            $('#btnLogin').removeClass('is-loading');
            $('#btnLogin').prop('disabled', false);
            enableForm(formID);
          });
        }
        else{
          swal({
            title: 'An Error Occurred!',
            text: "Something went wrong while trying to login. Please try again.",
            icon: 'error',
            buttons : {
              confirm: {
                text : 'Okay',
                className : 'btn btn-success'
              }
            }
          }).then(function(){
            $('#btnLogin').removeClass('is-loading');
            $('#btnLogin').prop('disabled', false);
            enableForm(formID);
          });
        }
      },
      error: function(xhr, status, error){
        swal({
          title: 'Failed to Connect to Server!',
          text: "Something went wrong while trying to connect to the server. Please",
          icon: 'error',
          buttons : {
            confirm: {
              text : 'Okay',
              className : 'btn btn-success'
            }
          }
        }).then(function(){
          $('#btnLogin').removeClass('is-loading');
            $('#btnLogin').prop('disabled', false);
            enableForm(formID);
        });
      
      } 
    }); 
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

function getCountries(){
  // Sample list of names (replace this with your actual list)

  var dropdownMenu = document.getElementById("dropdownMenu");

  fetch("https://restcountries.com/v3.1/all")
    .then(response => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then(data => {

        // Extract only the names of the countries
      const countryNames = data.map(country => country.name.common);

      // Sort the country names alphabetically
      countryNames.sort((a, b) => a.localeCompare(b));

      countryNames.forEach(country =>{
        output = country;

        console.log(output);
        // Create a new anchor element for each name
        var anchor = document.createElement("a");
        anchor.classList.add("dropdown-item");
        anchor.href = "#"; 
        anchor.textContent = output; 

        dropdownMenu.appendChild(anchor);
      })

    })
    .catch(error => {
      console.error("There was a problem fetching the data:", error);
    });

  var names = ["Name 1", "Name 2", "Name 3"];

  // Get the dropdown menu element
  

  // Loop through the list of names and create dropdown items
  names.forEach(function(name) {
      
  });
}
