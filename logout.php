<?PHP
    SESSION_START();
    SESSION_UNSET();
    SESSION_DESTROY();
    header ("Location: accounts.php");
    exit();
?>