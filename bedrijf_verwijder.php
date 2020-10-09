<?php
session_start();

if (!isset($_SESSION['username']))
{
    header('location:login.php');
}
else
{
    $_SESSION['naam'];
    $_SESSION['Student_ID'];
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bedrijf verwijderen</title>
  </head>
  <body>
    <h1>Bedrijf verwijderen voor <?php echo $_SESSION['naam']; ?></h1>
    <?php
      require 'config.php';

      //pakt de id uit de url
      $id = $_GET['id'];

      if (is_numeric($id))
      {
        //query om te kijken of er een bedrijf is met dat id uit de url
        $query = "SELECT * FROM bedrijven WHERE BedrijfID = " .$id;

        //maakt een resultaat aan als er een bedrijf is met dat id
        $resultaat = mysqli_query($mysql, $query);

        if (mysqli_num_rows($resultaat) == 0)
        {
          echo "<p> Er is geen bedrijf met dat ID</p>";
          echo "<p><a href='student_home.php'>Terug</a> naar homepagina</p>";
        } else
        {
          $rij = mysqli_fetch_array($resultaat);
          ?>
            <form action="verwijder_verwerk.php" method="post">
              <table>
                <tr>
                  <td> <input type="hidden" name="bedrijfID" value="<?php echo $rij['BedrijfID']; ?>"> </td>
                </tr>
                <tr>
                  <td> <input type="hidden" name="StudentID" value="<?php echo $rij['Student_ID']; ?>"> </td>
                </tr>
                <tr>
                  <td>Bedrijf naam:</td>
                  <td><input type="text" name="bedrijfNaam" id="bedrijfNaam" value="<?php echo $rij['NaamBedrijf'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Bedrijf contactpersoon:</td>
                  <td><input type="text" name="contactPersoon" id="contactPersoon" value="<?php echo $rij['ContactPersoon'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Datum contract getekend:</td>
                  <td><input type="date" name="contractDatum" id="datumContract" value="<?php echo $rij['ContractDatum'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Plaats bedrijf:</td>
                  <td><input type="text" name="plaats" id="plaats" value="<?php echo $rij['Plaats'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Website van het bedrijf:</td>
                  <td><input type="text" name="website" id="website" value="<?php echo $rij['Link'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>&nbsp</td>
                  <td><input type="submit" name="submit" value="Verwijderen"></td>
                </tr>
                <tr>
                  <td>&nbsp</td>
                  <td><button onclick="history.back(); return false">Annuleren</button></td>
                </tr>
              </table>
            </form>
          <?php
        }
      } else
      {
        echo "<p>Onjuist ID</p>";
        echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
      }
     ?>
  </body>
</html>
