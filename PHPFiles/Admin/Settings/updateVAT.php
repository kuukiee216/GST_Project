<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();
$DateTime = date('Y-m-d H:i:s');
$AccountID = $_SESSION['AccountID'];
$Area = 'VAT';
$Action = 'update';


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}


if(isset($_POST['VAT'])){

    $VAT = $_POST['VAT'];

    

}else{

}


?>