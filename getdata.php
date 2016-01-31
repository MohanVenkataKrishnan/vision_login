<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','vision_fb_db');
 
$con = mysqli_connect(HOST,USER,PASS,DB);
 
$sql = "select * from users";
 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
array('email'=>$row[2]
));
}
 
echo json_encode(array("email_id"=>$result));
 
mysqli_close($con);
 
?>