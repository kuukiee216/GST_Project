<?php include 'fbconfig.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        if(isset($login_url)){
            include "SignIn.php";
        }else{
            echo '<img src="../reimu.gif" />'; 
        }
    ?>

</body>
</html>