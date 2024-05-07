<?PHP
    SESSION_START();
    SESSION_UNSET();
    SESSION_DESTROY();
    header ("Location: ../../recruiter/login.php");
    exit();
?>  