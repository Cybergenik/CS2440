<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="css/main.css">
  </head>
  <body id='bg'>
    <h1>Luciano Remes</h1>
    <a class="mybutton" href="index.php">Back</a>
   <?php
     $album = array("The Black Parade By My Chemical Romance", "American Idiot By Green Day", "Dookie By Green Day", "21st Century Breakdown By Green Day", "Nimrod By Green Day", "Night at the Opera By Queen", "Innuendo By Queen", "Nevermind by Nirvana", "In Utero by Nirvana", "Abbey Road By The Beatles");
     echo "<table>";
     echo "<tr>";
     echo "<th>Albums I like:</th>";
     echo "</tr>";
     foreach ($album as $i) 
     {
      echo "<tr>";
      echo "<td>$i</td>";
      echo "</tr>";
     }
     echo "</table>";
   ?>
</body>
</html>
