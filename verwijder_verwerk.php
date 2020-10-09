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

  if (isset($_POST['submit']))
  {
    require 'config.php';

    $id = $_POST['bedrijfID'];
    $student = $_POST['StudentID'];
    if (is_numeric($id))
    {
      if ($student == $_SESSION['Student_ID'])
      {
        $query = "DELETE FROM bedrijven WHERE BedrijfID = ". $id;

        $resultaat = mysqli_query($mysql, $query);

        if ($resultaat)
        {
          header("location:student_home.php");
          exit;
        } else
        {
          echo "<p> Er is iets mis gegaan!</p>";
          echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
        }
      } else
      {
        echo "<p> ID van de student en het ID wat in het bedrijf staat komen niet overeen</p>";
        echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
      }
    } else
    {
      echo "Je ID blijkt geen getal te zijn!";
      echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
    }
  }
 ?>
