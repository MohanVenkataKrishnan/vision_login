<?php
session_start();
include_once("fb_sdk/facebook.php"); 

$appId = '447578888786070'; 
$appSecret = 'ee7f0e3df6397721bfc35118bdebc9da'; 
$homeurl = 'http://localhost/vision_web/';  
$fbPermissions = 'email';

$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
$fbuser = $facebook->getUser();
?>