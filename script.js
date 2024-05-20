document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("myForm").addEventListener("submit", function (event) {
    var name = document.getElementById("name").value.trim();
    var email = document.getElementById("email").value.trim();
    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");
    var isValid = true;

    // Reset error messages
    nameError.textContent = "";
    emailError.textContent = "";

    // Validate name field
    if (name === "") {
      nameError.textContent = "Name is required";
      isValid = false;
    }

    // Validate email field
    if (email === "") {
      emailError.textContent = "Email is required";
      isValid = false;
    } else if (!isValidEmail(email)) {
      emailError.textContent = "Invalid email format";
      isValid = false;
    }

    // Prevent form submission if not valid
    if (!isValid) {
      event.preventDefault();
    }
  });

  function isValidEmail(email) {
    // Regular expression for validating email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
});
