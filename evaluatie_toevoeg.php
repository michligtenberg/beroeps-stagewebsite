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
     <title>Evaluatie Toevoegen</title>
     <link rel="stylesheet" href="style/css.css">
   </head>
   <body>
     <h1>Evaluatie toevoegen voor <?php echo $_SESSION['naam']; ?></h1>
     <form action="evaluatie_verwerk.php" method="post">
       <table>
         <tr>
           <td>Cijfer begeleiding:</td>
           <td> <input type="number" name="cijferBegeleiding" id="cijferBegeleiding" required> </td>
         </tr>
         <tr>
           <td>Cijfer geleerde technieken:</td>
           <td> <input type="number" name="cijferTechnieken" id='cijferBegeleiding' required> </td>
         </tr>
         <tr>
           <td>Algemeen cijfer:</td>
           <td> <input type="number" name="algemeenCijfer" id="algemeenCijfer" required> </td>
         </tr>
         <tr>
           <td>Opmerking:</td>
           <td> <textarea name="opmerking" id="opmerking" rows="8" cols="80" required></textarea> </td>
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
     <div class="video-container">
        <video autoplay loop muted>
          <source src="img/video.mp4" type="video/mp4">
        </video>
      </div>
   </body>
 </html>
