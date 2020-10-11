<?php
require 'config.php';
session_start();

if (!isset($_SESSION['username']))
{
    header('location:login.php');
}

?>
<html>
    <head>

        <link rel="stylesheet" href="style/css.css">

    </head>

    <body>



        <header>
            <h1> Studenten Details</h1>
          </header>
          <aside>
            </aside>
          <main>
      <div class="video-container">
        <video autoplay loop muted>
          <source src="img/video.mp4" type="video/mp4">
        </video>
      </div>
            <body>
              <?php
              //zoekt de student id op via een session die al word gemaakt bij het inloggen
              $student = $_GET['id'];
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
            <br>
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
          </main>
        </body>
