<?php
//initialize facebook sdk
require 'vendor/autoload.php';
session_start();

$fb = new Facebook\Facebook([
    'app_id' => '404459048885536', // your app id
    'app_secret' => 'be09fa919ed8462836ad82f0c4f5e182', // your app secret
    'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();
if(isset($_GET['code'])){
    if(isset($_SESSION['access_token'])){
        $access_token = $_SESSION['access_token'];
    }else{
        $access_token = $helper->getAccessToken();
        $_SESSION['accecss_token'] = accecss_token;

        $fb->setDefaultAccessToken($_SESSION['access_token']);
    }

    
    $_SESSION['user_name'] = '';
    $_SESSION['user_email_address'] = '';

    $graph_response = $fb->get("/me?fields=name, email", $access_token);
    $facebook_user_info = $graph_response->getGraphUser();

    $_SESSION['user_name'] = $facebook_user_info['name'];
    $_SESSION['user_email_address'] = $facebook_user_info['email'];

    $requrePicture = $fb->get("/me/picture?redirect=false&height=150", $access_token);
    $fbpic = $requestPicture->getGraphUser();

    $_SESSION['user_pic'] = $fbpic;

    /*
    try {
        $session = $helper->getSessionFromRedirect();
    }catch( FacebookRequestException $ex ) {
        // When Facebook returns an error
    }catch( Exception $ex ) {
        // When validation fails or other local issues
    } */
}else{
    $permissions = ['email'];

    $login_url = $helper->getLoginUrl('http://localhost/GST_Project/', $permissions);
}
?>