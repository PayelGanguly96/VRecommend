<?php
	session_start();

	$email = mysql_real_escape_string($_POST['email']);
	//$name = mysql_real_escape_string($_POST['name']);
	$pwd = mysql_real_escape_string($_POST['pwd']);

	mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	mysql_select_db("vrecommend_db") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("SELECT * from registration_details WHERE email='$email'"); //Query the registrations_details table if there are matching rows equal to $email
	$exists = mysql_num_rows($query); //Checks if email exists

	$table_useremail = "";
	//$table_users = "";
	$table_password = "";

	if($exists > 0) //IF there are no returning rows or no existing username
	{
		while($row = mysql_fetch_assoc($query)) //display all rows from query
		{
			$table_useremail = $row['email']; 
			//$table_users = $row['name']; // the first username row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['pwd']; // the first password row is passed on to $table_users, and so on until the query is finished
		}
		if(($email == $table_useremail) && ($pwd == $table_password)) // checks if there are any matching fields
		{
				if($pwd == $table_password)
				{
					$_SESSION['user'] = $email; //set the username in a session. This serves as a global variable
					header("location: LoggedIn.php"); // redirects the user to the authenticated home page
				}
				
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
			Print '<script>window.location.assign("loginPage.php");</script>'; // redirects to login.php
		}
	}
	else
	{
		Print '<script>alert("Incorrect Email!");</script>'; //Prompts the user
		Print '<script>window.location.assign("loginPage.php");</script>'; // redirects to login.php
	}
?>