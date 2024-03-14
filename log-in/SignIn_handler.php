<?php

# Dummy 
$emails = ['brix.arenas@gmail.com', 'prestigedsinon@gmail.com'];
$passwords = ['12341234', '12341234'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    # Default Sign-In Inputs

    $si_email = htmlspecialchars($_POST["si_email"]);
    $si_password = htmlspecialchars($_POST["si_password"]);

    # Find if email is registered
    $found = false;
    $i = 0;
    for($i = 0; $i < count($emails); $i++){
        if($emails[$i] == $si_email){
            $found = true;
            if($passwords[$i] == $si_password){
                header("Location: ../FILES-Applicant Side/index.php");
            }else{
                echo "<script>alert('Incorrect Password');</script>";
                header("Location: ../FILES-Applicant Side/SignIn.php");
                exit();
            }
        }
    }
    if(!$found){
        echo "<script>alert('Incorrect Password');</script>";
        header("Location: SignIn.php");
        exit();
    }

}



?>