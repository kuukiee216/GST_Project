<?php
$nameErr = $emailErr = "";
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  // Validate email
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  // Redirect back to the form if there are errors
  if (!empty($nameErr) || !empty($emailErr)) {
    header("Location: test2.php#myModal");
    exit();
  }

  // If no errors, continue processing the form data (e.g., saving to database)
  // For demonstration purposes, let's just print the received data
  echo "Name: " . $name . "<br>";
  echo "Email: " . $email;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
