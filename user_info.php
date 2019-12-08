<!DOCTYPE html>
<html>
<head>
   <title>User information</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="newcart.css">
      <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

   <?php include "nevAdmin.php" ?>
   <?php include "db_con.php" ?>

<?php
      
   
   $sql = "SELECT name,email,phone FROM signup";
   mysqli_select_db($con,$db);
   $retval = mysqli_query($con,$sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   

         echo "<div >
         <table width='100%' border='1' cellpadding='5' cellspacing='0'>
         <tr>
         <th>Name</th>
         <th>Email</th>
         <th>Phone</th>
         </tr>";

         while($row = mysqli_fetch_array($retval))
         {
         echo "<tr>";
         echo "<td>" . $row['name'] . "</td>";
         echo "<td>" . $row['email'] . "</td>";
         echo "<td>" . $row['phone'] . "</td>";
         echo "</tr>";
         }
         echo "</table>

         </div>";
   
  
   
   mysqli_close($con);
?>



</body>
</html>