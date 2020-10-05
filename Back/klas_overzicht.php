<?php
  session_start();
 ?>
<?php
require_once 'config.php';
$Klas = $_SESSION['Klas'];
//var_dump($Klas);
$sql = "SELECT * FROM studenten WHERE Klas = '$Klas'";
$result = mysqli_query($mysql, $sql);
echo  "<table>";
echo "<tr>";
echo "<th>Naam</th>";
echo "<th>Studentnummer</th>";

echo "</tr>";
if (!$result) {
  printf("Error: %s\n", mysqli_error($mysql));
  exit();
}
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Naam'] . "</td>";
    echo "<td>" . $row['StudentNummer'] . "</td>";
    echo "</tr>";
}
echo "</table>"
?>