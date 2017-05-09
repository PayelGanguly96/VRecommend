<?php

if (!isset($_COOKIE["name"]))
{
	echo "<script>
	alert('Session expired!!');
	window.location.href='loginPage.php';
	</script>";
}
else
{

$current_user= $_COOKIE["name"];
$con = mysql_connect("localhost","root","");
if (!$con)
 {
  die('Could not connect: ' . mysql_error());
 }
mysql_select_db("vrecommend_db", $con);

if(isset($_POST)&!empty($_POST))
{
$pass=$_POST['pass2'];
$query= "UPDATE registration_details SET pwd='$pass' WHERE email='$current_user'";
if($result= mysql_query($query,$con))
{
	echo "<script>
	alert('Password changed successfully!!');
	window.location.href='loginPage.php';
	</script>";
}
}
}

?>