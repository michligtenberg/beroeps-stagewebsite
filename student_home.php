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
    <title>Student</title>
    <base href="student">
  </head>
  <body>
    <h1>Welkom, <?php echo $_SESSION['naam']; ?></h1>
    <?php
    require 'config.php';
    //zoekt de student id op via een session die al word gemaakt bij het inloggen
    $student = $_SESSION['Student_ID'];
    //query om een student zijn of haar bedrijf te vinden
    $query = "SELECT * FROM bedrijven WHERE Student_ID = $student";
    //resultaat als er een goede verbinding is en de query is uitgevoerd
    $resultaat = mysqli_query($mysql, $query);
    //checked of de query goed is gekomen
    if ($resultaat)
    {
        //haal de collommen uit de tabel
        $bedrijf = mysqli_fetch_array($resultaat);
    ?>
            <table>
              <h3>Bedrijf:</h3>
              <?php
        //echo alle data van het bedrijf wat op dat moment in de database stond.
        echo "<tr>";
        echo "<td>Bedrijf naam: </td>";
        echo "<td>" . $bedrijf['NaamBedrijf'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Contactpersoon: </td>";
        echo "<td>" . $bedrijf['ContactPersoon'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Contractdatum: </td>";
        echo "<td>" . $bedrijf['ContractDatum'] . " </td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Plaats: </td>";
        echo "<td>" . $bedrijf['Plaats'] . " </td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Website: </td>";
        echo "<td><a href='" . $bedrijf['Link'] . "'>" . $bedrijf['Link'] . "</a></td>";
        echo "</tr>";
    ?>
            </table><br>
            <button type="button" name="Toevoegen"><a href='bedrijf_toevoeg.php'>Toevoegen</a></button>
            <button type="button" name="Aanpassen"><a href='bedrijf_bewerk.php?id=<?php echo $bedrijf['BedrijfID'] ?>'>Aanpassen</a></button>
            <button type="button" name="Verwijderen"><a href='bedrijf_verwijder.php?id=<?php echo $bedrijf['BedrijfID'] ?>'>verwijderen</a></button>
            <button type="button" name="Evalueren"><a href=''>Evalueren</a></button><br>
            <?php
        //Array om de oude data in te doen
        // $bedrijven = array('NaamBedrijf' => $bedrijf['NaamBedrijf'],
        //                    'ContactPersoon' => $bedrijf['ContactPersoon'],
        //                    'ContractDatum' => $bedrijf['ContractDatum'],
        //                    'Plaats' => $bedrijf['Plaats'],
        //                    'Link' => $bedrijf['Link'],);
        //query voor de evaluatie
        $queryEv = "SELECT * FROM Evaluatie WHERE Student_ID = $student";
        //resultaat voor de evaluatie
        $resultEv = mysqli_query($mysql, $queryEv);
        //check of er een resultaat is gevonden
        if ($resultEv)
        {
            $evaluatie = mysqli_fetch_array($resultEv);
    ?>
                 <h3>Evaluatie:</h3>
                 <table border="1">
                   <tr>
                     <th>Cijfer begeleiding</th>
                     <th>Cijfer geleerde technieken</th>
                     <th>Algemeen Cijfer</th>
                     <th>Opmerking</th>
                   </tr>
                  <?php
            echo "<tr>";
            echo "<td>" . $evaluatie['CijferBegeleiding'] . "</td>";
            echo "<td>" . $evaluatie['CijferGeleerdeTech'] . "</td>";
            echo "<td>" . $evaluatie['AlgemeenCijfer'] . "</td>";
            echo "<td>" . $evaluatie['Opmerking'] . "</td>";
            echo "</tr>";
    ?>
                 </table>
                 <?php
        }
        else
        {
            //als er geen evaluatie is gevonden
            echo "Er kan geen evaluatie gevonden worden";
        }
    }
    else
    {
        //als er geen bedrijf is gevonden
        echo "Er kunnen geen bedrijven gevonden worden voor deze student!";
        echo "<a href='login.php'>Terug</a> naar de login pagina.";
    }
    ?>
  </body>
</html>
