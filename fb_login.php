<html>
<link rel="stylesheet" type="text/css" href="styles.css">
<body>
<?php

include_once("config.php");
include_once("db_store/store.php");


if(!$fbuser){
	$fbuser = null;
	$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
	$output = '<a href="'.$loginUrl.'" >
				<img id="fb_button" src="images/login_fb.png">
				</a>'; 	
}
else{
	$user_profile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
	$user = new Users();
	$user_data = $user->checkUser('facebook',$user_profile['id'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['email'],$user_profile['gender'],$user_profile['locale'],$user_profile['picture']['data']['url']);
	if(!empty($user_data)){
		$output = '<h1 class="fb_details">User Profile Details </h1>';
		$output .= '<img id="fb_prof_pic" src="'.$user_data['picture'].'">';
        $output .= '<br/><p class="fb_details"/>Facebook ID : ' . $user_data['oauth_uid'];
        $output .= '<br/><p class="fb_details"/>Name : ' . $user_data['fname'].' '.$user_data['lname'];
        $output .= '<br/><p class="fb_details"/>Email : ' . $user_data['email'];
        $output .= '<br/><p class="fb_details"/>Gender : ' . $user_data['gender'];
        $output .= '<br/><p class="fb_details"/>Logout from <a href="logout.php?logout">Facebook</a>'; 
	}
	else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}
}
?>
</body>
</html>