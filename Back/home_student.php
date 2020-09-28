<?php

 session_start();

if (!isset($_SESSION['username']))
{
  header('location:login.php');
} else
{
 $_SESSION['naam'];
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student</title>
  </head>
  <body>
    <h1>Welkom, <?php echo $_SESSION['naam']; ?></h1>
    <?php
      require 'config.php';

      // $query = "SELECT * FROM Student";
      //
      // $resultaat = mysqli_query($mysql, $query);
      //
      // $rij = mysqli_fetch_array($resultaat);
     ?>
     <table>
       <h3>Bedrijf:</h3>
       <tr>
         <td>Bedrijf naam: </td>
         <td>Test</td>
       </tr>
       <tr>
         <td>Contactpersoon: </td>
         <td>testjes</td>
       </tr>
       <tr>
         <td>Contractdatum: </td>
         <td>12-1-2020</td>
       </tr>
       <tr>
         <td>Plaats: </td>
         <td>Test</td>
       </tr>
       <tr>
         <td>Website: </td>
         <td>Test</td>
       </tr>
     </table><br>
     <button type="button" name="Toevoegen"><a href=''>Toevoegen</a></button>
     <button type="button" name="Aanpassen"><a href=''>Aanpassen</a></button>
     <button type="button" name="Verwijderen"><a href=''>verwijderen</a></button>
     <button type="button" name="Evalueren"><a href=''>Evalueren</a></button><br>
     <h3>Vorige bedrijven:</h3>
     <table border="1">
       <tr>
         <th>Naam bedrijf</th>
         <th>Contactpersoon</th>
         <th>Contractdatum</th>
         <th>Plaats</th>
         <th>Website</th>
       </tr>
      <tr>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
      </tr>
     </table>
     <h3>Evaluatie:</h3>
     <table border="1">
       <tr>
         <th>Cijfer begeleiding</th>
         <th>Cijfer geleerde technieken</th>
         <th>Algemeen Cijfer</th>
         <th>Opmerking</th>
       </tr>
      <tr>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
      </tr>
     </table>
     <?php

      ?>
  </body>
</html>
