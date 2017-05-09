<html>
<head> 



<style>

body {
background-color:#3498DB  ;
     }
h1
     {
font-size:50px;
font-family: "Trebuchet MS";
color:#ffffff;
text-align:center;
padding:5px;
 text-shadow: -2px 0 black, 0 2px black, 2px 0 black, 0 -2px black;
     }


     hr.style2 {
	height: 10px;
	border: 0;
	box-shadow: 0 10px 10px -10px #000000 inset;}



/* unvisited link */
a:link {
    color:white ;
}

/* visited link */
a:visited {
    color: white;
}

th{
color: #000000;
border: 1px solid #000000;
background-color:white;
}

table,td{
background-color:white;
color:#3498DB  ;
border: 1px solid #000000;
;
}
table {
width:90%;

}

td{
width:20%;
text-decoration: bold;
}

.button2 {
    background-color: white; 
    color: black; 
    border-radius: 12px;
    padding : 5px;
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: #008CBA;
    color: white;
}

</style>

</head>
<body>

<br/>

<a href="Books.html" ><img src="img/return4.png" width="30" height="30" alt="Back"> </a><font size="5px" weight="600" color="#8A0651"><b>Back</b></font><br/><br/>

<h1>Books</h1>
<br>
<hr class="style2">
<br>

<form action='BooksComments.php'>
<td><button class='button button2'>Show Comments</button></td>
</form>






</body>

<?php


 session_start(); //starts the session
   
   if($_SESSION['user'])
   { // checks if the user is logged in  

$user = $_SESSION['user'];

    $con = mysql_connect("localhost","root","");
if (!$con)
 {
  die('Could not connect: ' . mysql_error());
 }
mysql_select_db("vrecommend_db", $con);
$one=$_POST['book'];
$two=$_POST['author'];
$three=$_POST['genre'];
$four=$_POST['reviews'];




   


$insert_sql="INSERT into books_recommend (Recommended_by,Name_of_the_book,Author,Genre,Review) values ('$user','$one','$two','$three','$four')";

$retval=mysql_query($insert_sql,$con);
if(!$retval )
{ 
  die('Could not enter data: ' . mysql_error());
}

 Print '<script>alert("Your review is recorded successfully ! ");</script>';



$display_all = mysql_query("SELECT * FROM books_recommend");

echo "<table align='center'>
<tr>
<th>Recommended by</th>
<th>Name of the book</th>
<th>Author</th>
<th>Genre</th>
<th>Review</th>

</tr>";
 
while($row = mysql_fetch_array($display_all))
{
 echo "<tr>";
 echo "<td>" . $row['Recommended_by'] . "</td>";
 echo "<td>" . $row['Name_of_the_book'] . "</td>";
 echo "<td>" . $row['Author'] . "</td>";
 echo "<td>" . $row['Genre'] . "</td>";
 echo "<td>" . $row['Review'] . "</td>";

 

 echo "</tr>";
}


echo "</table>";



 
mysql_close($con);
   }


   else
   {
      //header("location: website.php"); // redirects if user is not logged in
     //Print '<script>alert("Your must login to post recommendations!");</script>';
     //header("location: website.php");

    echo "<script>
    alert('You must login to post recommendations !!');
    window.location.href='website.php';
    </script>";

   }
    //assigns user value




?>



</html>