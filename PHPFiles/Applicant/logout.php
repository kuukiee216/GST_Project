<?PHP
    SESSION_START();
    SESSION_UNSET();
    SESSION_DESTROY();
    header ("Location: ../../applicant/login.php");
    exit();
?>  