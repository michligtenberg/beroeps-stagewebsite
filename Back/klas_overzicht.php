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
echo "<th>ID</th>";
echo "<th>Naam</th>";
echo "<th>Studentnummer</th>";

echo "</tr>";

//var_dump($id);
if (!$result) {
  printf("Error: %s\n", mysqli_error($mysql));
  exit();
}

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['StudentID'] . "</td>";
    echo "<td><a href='student_details.php?id=" .$row['StudentID']. "'>" . $row['Naam'] . "</td></a>";
    echo "<td>" . $row['StudentNummer'] . "</td>";
    echo "</tr>";

}
echo "</table>"
?>