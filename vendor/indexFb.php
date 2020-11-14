<?php
session_start();
require_once  'vendor/autoload.php'; 
$fb = new Facebook\Facebook([
  'app_id' => '666911400856618',
  'app_secret' => 'b70da036c420f26b07fac524b4dbfa1c',
  'default_graph_version' => 'v3.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$redirectURL = "https://".$_SERVER['SERVER_NAME']."/fb-callback.php";
$loginUrl = $helper->getLoginUrl($redirectURL, $permissions);
echo '<a href="' . $loginUrl . '">Log in con Facebook!</a>';

 ?>
