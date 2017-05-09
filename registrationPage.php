<html>
<head>
  </head>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

<style>
body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, 
pre, form, fieldset, input, textarea, p, blockquote, th, td { 
  padding:0;
  margin:0;
}

fieldset, img {border:0}

ol, ul, li {list-style:none}

:focus {outline:none}

body,
input,
textarea,
select {
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
  color: #4c4c4c;
}

p {
  font-size: 12px;
  width: 150px;
  display: inline-block;
  margin-left: 18px;
}
h1 {
  font-size: 32px;
  font-weight: 400;
  color: #8A0651;
  text-align: center;
  padding-top: 10px;
  margin-bottom: 10px;
}

html{
  background-image: url("wall.jpg");
}

.testbox {
  margin: 85px auto;
  width: 343px; 
  height: 500px; 
  -webkit-border-radius: 8px/7px; 
  -moz-border-radius: 8px/7px; 
  border-radius: 8px/7px; 
  background-color: #ebebeb; 
  -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  border: solid 1px #cbc9c9;
  opacity: 0.8;
}

/*input[type=radio] {
  visibility: hidden;
}*/

form{
  margin: 0 30px;
}

label.radio {
  cursor: pointer;
  text-indent: 35px;
  overflow: visible;
  display: inline-block;
  position: relative;
  margin-bottom: 15px;
}



hr{
  color: #a9a9a9;
  opacity: 0.3;
}

input[type=text],input[type=email], input[type=password]{
  width: 300px; 
  height: 39px; 
  -webkit-border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
  -moz-border-radius: 0px 4px 4px 0px/0px 0px 4px 4px; 
  border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
  background-color: #fff; 
  -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  border: solid 1px #cbc9c9;
  margin-left: -5px;
  margin-top: 13px; 
  padding-left: 10px;
}

input[type=password]{
  margin-bottom: 25px;
}



a.button {
  font-size: 14px;
  font-weight: 600;
  color: white;
  padding: 6px 25px 0px 20px;
  margin: 10px 8px 20px 0px;
  display: inline-block;
  float: right;
  text-decoration: none;
  width: 50px; height: 27px; 
  -webkit-border-radius: 5px; 
  -moz-border-radius: 5px; 
  border-radius: 5px; 
  background-color: #8A0651; 
  
  
  transition: all 0.1s linear 0s; 
  top: 0px;
  position: relative;
}

a.button:hover {
  top: 3px;
  background-color:#420226;
  -webkit-box-shadow: none; 
  -moz-box-shadow: none; 
  box-shadow: none;
  
}

a{
  font-weight: 800;
  color: #8A0651;
}

.button1 {border-radius: 8px;
background-color:#8A0651;
border: none;
padding: 15px 32px;
text-align: center;
font-size: 16px;
cursor: pointer;
color : #ffffff;

}

</style>
<?php
$email="payel123@gmail.com";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["email"])) 
{
    Print '<script>alert("Email is required");</script>';
  }

   else 
   {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      Print '<script>alert("Write the correct format of email");</script>';
    }
  }

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}





?> 


<body>
  <br/>

<a href="website.php" ><img src="img/return4.png" width="30" height="30" alt="Back"> </a><font size="5px" weight="600" color="#ffffff">Back</font><br/><br/>

<div class="testbox">
  <h1>Registration</h1>

  <form action="registrationPage.php" method="POST" name="form1">
      <hr>
    
  
  <input type="email" name="email" id="email" placeholder="Email" required/>
  
  <input type="text" name="name" id="name" placeholder="Name" required/>
  
  <input type="password" name="pwd" id="pwd" placeholder="Password" required/>
  
   <select name="question" onchange='displayAnswer(this.value);'>
   <option value="0">Select a security question</option>
  <option value="1" >What is your pet's name?</option>
  <option value="2" >What is your favorite color?</option>
</select>


<input type="password" name="answer" id="answer" placeholder="Answer" required style="display: none;">

   <p>By clicking Register, you agree on our <a href="#">terms and condition</a>.</p> <br/> <br/>
   <!--<center> <button class="button1">Register</button> </center> -->
   <input type="submit" name="submit" value="Register" >
  </form>
</div>

</body>




</html>


<script type="text/javascript">
  function displayAnswer(val)
  {
    var element=document.getElementById('answer');
    if(val=='1'||val=='2')
      element.style.display='block';
    else
      element.style.display='none';
  }
</script>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $email = mysql_real_escape_string($_POST['email']);
  $name = mysql_real_escape_string($_POST['name']);
  $pwd =  mysql_real_escape_string($_POST['pwd']) ;
  $answer =  mysql_real_escape_string($_POST['answer']) ;
  $questionNo = mysql_real_escape_string($_POST['question']) ;

echo "$questionNo";

  $bool = true;
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("vrecommend_db") or die("Cannot connect to database"); //Connect to database
  $query = mysql_query("Select * from registration_details"); //Query the users table
  while($row = mysql_fetch_array($query)) //display all rows from query
  {
    $table_users = $row['email']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($email == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Email has been taken!");</script>'; //Prompts the user
      Print '<script>window.location.assign("registrationPage.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    mysql_query("INSERT INTO registration_details (email, name, pwd, questionNo, answer) VALUES ('$email','$name','$pwd','$questionNo' ,'$answer')"); //Inserts the value to table users
    Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
    Print '<script>window.location.assign("registrationPage.php");</script>'; // redirects to register.php
  }
}

?>