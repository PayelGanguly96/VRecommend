<!DOCTYPE html>
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
table,td,th{
background-color:white;
color:#3498DB  
;
}
table {
width:80%;
}

td{
width:50%;
text-decoration: bold;
}

.button2 {
    background-color: white; 
    color: black; 
    border-radius: 12px;
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: #008CBA;
    color: white;
}

</head>
</style>
<body>

<br/>

<a href="Books.html" ><img src="img/return4.png" width="30" height="30" alt="Back"> </a><font size="5px" weight="600" color="#8A0651"><b>Back</b></font><br/><br/>

<h1>Books - Angst</h1>
<br>
<hr class="style2">
<br>


<?php


echo "<table border='1'>
<tr>
<th>Recommended by</th>
<th>Name of the book</th>
<th>Author</th>
<th>Genre</th>
<th>Review</th>
</tr>";

?>


<a href="default.asp">To Read More->></a>
</body>
<html>


