<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <?php
      if (isset($_POST['submit']))
      {
        require 'config.php';

        $gebruikersnaam = $_POST['Gebruikersnaam'];
        $wachtwoord = $_POST['Wachtwoord'];

        $username = $gebruikersnaam;
        $username = mysqli_real_escape_string($mysql,$username);

        $password = $wachtwoord;
        $password = mysqli_real_escape_string($mysql,$password);

        $query = "";

        if (preg_match("/^-?[1-9][0-9]*$/", $username)) {
            $query .= "SELECT * FROM studenten WHERE
                       StudentNummer = '$username' AND Wachtwoord = '$password'";

            //check connectie met de database en voer de query uit
            $resultaat = mysqli_query($mysql, $query);
        } else
        {
            $query .= "SELECT * FROM mentoren WHERE
                       Naam = '$username' AND Wachtwoord = '".md5($password)."'";
            $resultaat = mysqli_query($mysql, $query);
        }

        if (!$resultaat) {
            printf("Error: %s\n", mysqli_error($mysql));
            exit();
        }

        if (!$resultaat || mysqli_num_rows($resultaat) > 0)
        {
          if (preg_match("/^-?[1-9][0-9]*$/", $username)) {
              //pakt de user uit de database
              $gebruiker = mysqli_fetch_array($resultaat);
              //koppelt de session aan de gebruikersnaam
              $_SESSION['username'] = $gebruiker['StudentNummer'];
              $_SESSION['naam'] = $gebruiker['Naam'];
              $_SESSION['Student_ID'] = $gebruiker['StudentID'];
              header("Location:student_home.php");
          } else {
            //pakt de user uit de database
            $gebruiker = mysqli_fetch_array($resultaat);
            //koppelt de session aan de gebruikersnaam
            $_SESSION['username'] = $gebruiker['Naam'];
            header("location: home_mentor.php");
          }
        } else
        {
          echo "<p>Naam en/of wachtwoord zijn onjuist ingevoerd!</p>";
          echo "<p><a href='inlog.php'>ga terug</a></p>";
        }
      } else
      {
     ?>
     <form method="post" action="">
       <table border="1">
         <tr>
           <td>Gebruikersnaam: </td>
           <td><input type="text" name="Gebruikersnaam"></td>
         </tr>
         <tr>
           <td>Wachtwoord: </td>
           <td><input type="password" name="Wachtwoord"></td>
         </tr>
         <tr>
           <td>&nbsp </td>
           <td><input type="submit" name="submit" value="Login"></td>
         </tr>
       </table>
     </form>
    <?php
      }
     ?>
  </body>
</html>
