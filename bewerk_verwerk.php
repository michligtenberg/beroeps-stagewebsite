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
    require "config.php";

    $id = $_POST['bedrijfID'];
    $student = $_POST['StudentID'];
    $bedrijfNaam = $_POST['bedrijfNaam'];
    $contactPersoon = $_POST['contactPersoon'];
    $contractDatum = $_POST['contractDatum'];
    $plaats = $_POST['plaats'];
    $website = $_POST['website'];

    if (is_numeric($id) && is_numeric($student)
        && strlen($bedrijfNaam) > 0 && strlen($contactPersoon) > 0 &&
        strlen($contractDatum) > 0 && strlen($plaats) > 0
        && strlen($website) > 0)
    {
        if ($student == $_SESSION['Student_ID'])
        {
            $query = "UPDATE `bedrijven` SET `BedrijfID`
          =NULL,`NaamBedrijf`='$bedrijfNaam',`Plaats`='$plaats',
          `Link`='$website',`ContactPersoon`='$contactPersoon',`ContractDatum`
          ='$contractDatum',`Student_ID`='$student' WHERE BedrijfID =" . $id;

            $resultaat = mysqli_query($mysql, $query);

            if ($resultaat)
            {
                header("location:student_home.php");
                exit;
            }
            else
            {
                echo "<p> Er is iets mis gegaan!</p>";
                echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
                exit;
            }
        }
        else
        {
            echo "<p> ID van de student en het ID wat in het bedrijf staat komen niet overeen</p>";
            echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
        }
    }
    else
    {
        echo "<p> Niet alle velden zijn ingevoerd</p>";
        echo "<p><a href='student_home.php'>Terug </a> naar homepagina</p>";
        exit;
    }
}

?>
