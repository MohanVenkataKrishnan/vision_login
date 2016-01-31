<?php
	$host='localhost';
	$uname='root';
	$pwd='';
	$db="vision_fb_db";

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	
	$id=$_REQUEST['id'];
	$name=$_REQUEST['name'];
	$gender=$_REQUEST['gender']; 
	$email=$_REQUEST['email'];

	$flag['code']=0;

	if($r=mysql_query("insert into users (fname, email, gender,oauth_uid) 
             VALUES('$name','$email','$gender','$id') ",$con))
	{
		$flag['code']=1;
	}

	echo(json_encode($flag));
	mysql_close($con);
?>
