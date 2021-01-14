<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Pokedex</title>
  </head>
  <body>
 <h1>My Pokedex</h1>
 <?php $link = mysqli_connect("localhost", "root", "", "pokedex");

   $req2 = "SELECT count(id) FROM pokemon";

   $result = mysqli_query($link,$req2);
   if($result){
     while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
       echo "<p>There are " . $row["count(id)"] . " pokemons from the database.</p>";


     }
   mysqli_free_result($result);
}
 mysqli_close($link);
?>


    <table>
      <thead>
        <tr>
          <th>Sprite</th>
          <th>ID</th>
          <th>Name</th>
          <th>Height</th>
          <th>Weight</th>
          <th>Base exp</th>
        </tr>
      </thead>
      <tbody>
        <div>
        <?php

            $link = mysqli_connect("localhost", "root", "", "pokedex");

              $req = "SELECT * FROM pokemon";

              $result = mysqli_query($link,$req);



              if($result){
                  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    if($row["base_experience"] >= 200){
                      echo"<tr><td>" ?><img src=<?php echo "sprites/" . $row["identifier"] . ".png"?>><?php "</td>";
                      echo"<td class=super>" . $row["id"] . "</td>";
                      echo"<td class=super>" . $row["identifier"] . "</td>";
                      echo"<td class=super>" . $row["height"] . "</td>";
                      echo"<td class=super>" . $row["weight"] . "</td>";
                      echo"<td class=super>" . $row["base_experience"] . "</td>";

                    }else{
                    echo"<tr><td>" ?><img src=<?php echo "sprites/" . $row["identifier"] . ".png"?>><?php "</td>";
                    echo"<td>" . $row["id"] . "</td>";
                    echo"<td>" . $row["identifier"] . "</td>";
                    echo"<td>" . $row["height"] . "</td>";
                    echo"<td>" . $row["weight"] . "</td>";
                    echo"<td>" . $row["base_experience"] . "</td>";
                  }
                  }
                mysqli_free_result($result);
              }
              mysqli_close($link);
                ?>

        </div>
      </tbody>
    </table>
  </body>
</html>
