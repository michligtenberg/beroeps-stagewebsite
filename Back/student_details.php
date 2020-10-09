<?php
session_start();
?>
<html>
    <head>

        <link rel="stylesheet" href="style/css.css">

    </head>

    <body>



        <header>
            Header
          </header>
          <aside>
            <?php
            //query voor de evaluatie
            $queryEv = "SELECT * FROM evaluatie WHERE Student_ID = $student";
            //resultaat voor de evaluatie
            $resultEv = mysqli_query($mysql, $queryEv);
            //check of er een resultaat is gevonden
            if ($resultEv)
            {
              $evaluatie = mysqli_fetch_array($resultEv);
              ?>
            </table>
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
               echo "<td>".$evaluatie['CijferBegeleiding']."</td>";
               echo "<td>".$evaluatie['CijferGeleerdeTech']."</td>";
               echo "<td>".$evaluatie['AlgemeenCijfer']."</td>";
               echo "<td>".$evaluatie['Opmerking']."</td>";
               echo "</tr>";
               ?>
              </table>
              <?php
            } else
            {
              //als er geen evaluatie is gevonden
              echo "Er kan geen evaluatie gevonden worden";
            }
           ?>
            </aside>
          <main>
            <?php
              require 'config.php';
              //zoekt de student id op via een session die al word gemaakt bij het inloggen
              $student = $_GET['id'];
              //var_dump($student);
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
                    echo "<td>".$bedrijf['NaamBedrijf']."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Contactpersoon: </td>";
                    echo "<td>".$bedrijf['ContactPersoon']."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Contractdatum: </td>";
                    echo "<td>".$bedrijf['ContractDatum']." </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Plaats: </td>";
                    echo "<td>".$bedrijf['Plaats']." </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Website: </td>";
                    echo "<td>".$bedrijf['Link']."</td>";
                    echo "</tr>";
                  }
                  ?>
                </table><br>
          </main>
        </body>
