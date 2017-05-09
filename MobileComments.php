<html>
    <head>
        
    </head>
    
    

<!---add to database -->
<?php


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $con = mysqli_connect("localhost", "root","") or die(mysqli_error()); //Connect to server
    mysqli_select_db($con, "vrecommend_db") or die("Cannot connect to database"); //Connect to database

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $comment = mysqli_real_escape_string($con, $_POST['comment']);
    
    mysqli_query($con, "INSERT INTO comment_mobilephones (name, comment) VALUES ('$name','$comment')"); //Inserts the value to table users


        Print '<script>alert("Your comment has been recorded successfully");</script>'; // Prompts the user
       //Print '<script>window.location.assign("register.php");</script>';

}   
   
?>

<!--display -->


       
           <?php
               $conn = mysqli_connect("localhost", "root","") or die(mysqli_error()); //Connect to server
               mysqli_select_db($conn, "vrecommend_db") or die("Cannot connect to database"); //connect to database

               $c = mysqli_query($conn, "Select * from comment_mobilephones");
               $count = mysqli_num_rows($c);
               echo "<font face='comic sans ms' color='brown' size = '5.5' weight='bold'>COMMENTS($count)</font>";
               echo "<hr height='4' width='100%' color='orange'>";
              $query = mysqli_query($conn, "SELECT * FROM comment_mobilephones"); // SQL Query

               while($row = mysqli_fetch_array($query))
               {
                   
                       echo "<br>"."<style=text-transform:'capitalize'>"."<u>" ."<b>". $row['name']. "</b>"."</u>"."</style>"."<br>";
                       echo "<font-color='brown'>". $row['comment']. "</font>"."<br>";

                      
               }
           ?>

           <body  bgcolor="#FFFFCC">

            <br/><br/><br/>
        
        <form method="POST">

           <i>Leave a comment</i>
           <br> <input type="text" name="name" placeholder="Your name" required="required" /> <br/>
           <br> <textarea name="comment" rows="8" cols="100" placeholder="Enter your comment here..." required> </textarea> <br/>
           <input type="submit" value="Submit"/>
        </form>
      
   </body>
</html>   