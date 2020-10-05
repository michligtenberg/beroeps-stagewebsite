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

if (isset($_POST['submit']))
{
  require 'config.php';

  //alle user variabelen voor de sql file
  $bedrijf_naam = $_POST['bedrijfNaam'];
  $contact_persoon = $_POST['contactPersoon'];
  $contract_datum = $_POST['contractDatum'];
  $plaats = $_POST['plaats'];
  $website = $_POST['website'];
  $student = $_SESSION['Student_ID'];

  //zorg dat er echte tekst in de mysql query komt
  $bedrijfNaam = $bedrijf_naam;
  $bedrijfNaam = mysqli_real_escape_string($mysql, $bedrijfNaam);

  $contactPersoon = $contact_persoon;
  $contactPersoon = mysqli_real_escape_string($mysql, $contactPersoon);

  $plaatsnaam = $plaats;
  $plaatsnaam = mysqli_real_escape_string($mysql, $plaatsnaam);

  $Link = $website;
  $Link = mysqli_real_escape_string($mysql, $Link);

  $websiteLink = "https://www.{$Link}";

  //controleer of er iets in ingevuld in de bovenstaande variabelen
  if ($bedrijfNaam == 0 ||
      $contactPersoon == 0 ||
      $contract_datum == 0 ||
      $plaatsnaam == 0 ||
      $websiteLink == 0)
  {
    //checked of de datum goed ingevuld is voor de database
    $datumCheck = strtotime($contract_datum);
    if (date('Y-m-d', $datumCheck) == $contract_datum)
    {
      //query om het bedrijf toe te voegen aan tabel
      $query = "INSERT INTO `bedrijven`
      (`BedrijfID`, `NaamBedrijf`, `Plaats`, `Link`, `ContactPersoon`, `ContractDatum`, `Student_ID`)
      VALUES (NULL, '$bedrijfNaam', '$plaatsnaam', '$websiteLink', '$contactPersoon', '$contract_datum', '$student')";

      $resultaat = mysqli_query($mysql, $query);

      //als het resultaat successvol is dan word degene direct terug gestuurd
      if ($resultaat)
      {
        header('location:student_home.php');
        exit;
      } else
      {
        //precies soort foutmelding die je krijgt als het fout gaat.
        echo "<p> Fout bij toevoegen </p>";
        echo "Query: $query";
        echo "Foutmelding: " . mysqli_error($mysql);
      }
    } else
    {
      echo "<p>De datum die is toegevoegd is niet correct!</p>";
      echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
    }
  } else
  {
    echo "<p>Een van de velden is leeg!</p>";
    echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
  }
}

?>
