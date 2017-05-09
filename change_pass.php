<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="success.php" method="post">
<h2>Reset your password </h2>
<div class="fieldWrapper">
Enter new password:	<input type="password" name="pass1" id="pass1"><br><br>
</div>
<div class="fieldWrapper">
Confirm new password: <input type="password" name="pass2" id="pass2" onkeyup="checkPass(); return false;"><br><br>
<span id="confirmMessage" class="confirmMessage"></span>
</div>
<input type="submit" name="confirm" value="Submit" id="btn" disabled="disabled">
</form>


<script type="text/javascript">
	function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    
    var message = document.getElementById('confirmMessage');
    
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
     
    
    if(pass1.value == pass2.value){ 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
        document.getElementById('btn').disabled=false;
    }else{
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
        

    }
}  
</script>

</body>
</html>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
 {
  die('Could not connect: ' . mysql_error());
 }
mysql_select_db("vrecommend_db", $con);

if(isset($_POST)&!empty($_POST))
{
	$answer = $_POST['answer'];
	$sql = "SELECT answer FROM registration_details WHERE answer = '$answer'";
	$res = mysql_query($sql, $con);
	$row=mysql_fetch_array($res);
	if($answer==$row['answer'])
	{
		echo "<script>
	alert('Correct answer!!');
	</script>";
	}
	else
	{
		echo "<script>
	alert('Incorrect answer!!');
	window.location.href='loginPage.php';
	</script>";
	}
 

}

?>