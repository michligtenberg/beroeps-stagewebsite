<?php

 session_start();

if (!isset($_SESSION['username']))
{
  header('location:login.php');
} else
{
 $_SESSION['naam'];
 $_SESSION['Student_ID'];
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bedrijf Toevoegen</title>
  </head>
  <body>
    <h1>Bedrijf toevoegen voor <?php echo $_SESSION['naam']; ?></h1>
    <form action="toevoeg_verwerk.php" method="post">
      <table>
        <tr>
          <td>Bedrijf naam:</td>
          <td><input type="text" name="bedrijfNaam" id="bedrijfNaam" required></td>
        </tr>
        <tr>
          <td>Bedrijf contactpersoon:</td>
          <td><input type="text" name="contactPersoon" id="contactPersoon" required></td>
        </tr>
        <tr>
          <td>Datum contract getekend:</td>
          <td><input type="date" name="contractDatum" id="datumContract" required></td>
        </tr>
        <tr>
          <td>Plaats bedrijf:</td>
          <td><input type="text" name="plaats" id="plaats" required></td>
        </tr>
        <tr>
          <td>Website van het bedrijf:</td>
          <td><input type="text" name="website" id="website" required></td>
        </tr>
        <tr>
          <td>&nbsp</td>
          <td><input type="submit" name="submit" value="Toevoegen"></td>
        </tr>
        <tr>
          <td>&nbsp</td>
          <td><button onclick="history.back(); return false">Annuleren</button></td>
        </tr>
      </table>
    </form>
  </body>
</html>
