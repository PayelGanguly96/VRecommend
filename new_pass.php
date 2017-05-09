
<!DOCTYPE html>
<html>
	<head>
		<style>

         .button1 {border-radius: 8px;
background-color:#8A0651;
border: none;
padding: 12px 30px;
text-align: center;
font-size: 15px;
cursor: pointer;
color : #ffffff;

}


		</style>
	</head>
	<body bgcolor= "#d1a1bc">

<?php

$con = mysql_connect("localhost","root","");
if (!$con)
 {
  die('Could not connect: ' . mysql_error());
 }
mysql_select_db("vrecommend_db", $con);

if(isset($_POST)&!empty($_POST))
{
	$email = $_POST['email'];
	$sql = "SELECT email FROM registration_details WHERE email = '$email'";
	$res = mysql_query($sql, $con);
	$count = mysql_num_rows($res);
	if($count == 1){
		echo "<h2>"."<i>"."Email exists!"."<br>"."Answer the security question."."</i>"."</h2>"."<br>";
	}else{
		echo "<script>
	alert('Incorrect username!!');
	window.location.href='loginPage.php';
	</script>";
	}

}

setcookie("name", "$email", time()+120, "/","", 0);

$result = mysql_query("SELECT questionNo FROM registration_details where email='$email'");
$storeArray = Array();
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $storeArray =  $row['questionNo'];  
}


if($storeArray=='1')
	echo "<h2>"."<center>"."What is your pet's name? "."</center>"."</h2>";
elseif ($storeArray=='2') {
	echo "<h2>"."<center>"."What is your favorite color?"."</center>"."</h2>";
}
?>

<form action="change_pass.php" method="post">
<center>	<input type="password" name="answer" >
	<button class="button1">Submit</button>  </center>
</form>
</body>

</html>



	