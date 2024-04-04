document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    
    // Validate form data
    let test1 = document.getElementById('test1').value.trim();
    let test2 = document.getElementById('test2').value.trim();
    let test3 = document.getElementById('test3').value.trim();
    let test4 = document.getElementById('test4').value.trim();
    let test5 = document.getElementById('test5').value.trim();
    let test6 = document.getElementById('test6').value.trim();
    let test7 = document.getElementById('test7').value.trim();
    
    
    if (test1 === '' || test2 === '' || test3 === '' || test4 === '' || test5 === '' || test6 === '' || test7 === '') {
      // Display SweetAlert for validation message
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Please fill out all fields!',
      });
    }
    else {
      // Submit the form if validation passes
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'Form submitted successfully.',
      });
      // You can also submit the form using AJAX here
    }
    });
  